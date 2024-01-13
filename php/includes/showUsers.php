<?php
    require('../db.php');

    $searchTerm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';
    $sortOrder = isset($_GET['sortOrder']) ? $_GET['sortOrder'] : 'asc';  // Default to ascending order
    $roleFilter = isset($_GET['roleFilter']) ? $_GET['roleFilter'] : 'all';

    // Modify the original query
    $sql = "SELECT userID, username, firstName, surName, role FROM accounts";

    // Add WHERE clause for search term
    if ($searchTerm !== '') {
        $sql .= " WHERE username LIKE ?";
    }

    // Add WHERE clause for role filtering
    if ($roleFilter !== 'all') {
        $sql .= ($searchTerm === '') ? " WHERE" : " AND";
        $sql .= " role = ?";
    }

    // Add ORDER BY clause for sorting
    $sql .= " ORDER BY username $sortOrder";  // Use the provided or default sorting order

    $query = $db->prepare($sql);

    // Bind parameters for search term, if applicable
    if ($searchTerm !== '') {
        $searchTerm = '%' . $searchTerm . '%';
        $query->bind_param('s', $searchTerm);
    }

    // Bind parameters for role filtering, if applicable
    if ($roleFilter !== 'all') {
        $query->bind_param('s', $roleFilter);
    }

    $query->execute();
    $query->bind_result($userID, $username, $firstName, $surName, $role);
    $result = $query->get_result();

    function renderAccounts($result, $loggedInUserID, $roleFilter, $searchTerm = '') {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Skip the row if the search term is set and doesn't match the username
                if ($searchTerm !== '' && stripos($row['username'], $searchTerm) === false) {
                    continue;
                }
    
                // Skip the row if the role filter is set and doesn't match
                if ($roleFilter !== 'all' && $row['role'] !== ($roleFilter == 'a' ? 'a' : 'c')) {
                    continue;
                }
    
                $userID = $row["userID"];
                echo "<tr>";
                echo "<td>" . $row["userID"] . "</td>";
                echo "<td>" . $row["username"] . "</td>";
                echo "<td>" . $row["firstName"] . " " . $row["surName"] . "</td>";
                echo "<td>" . $row["role"] . "</td>";
                echo "<td> 
                        <a href='../Admin/updateAccount.php?userID={$userID}'><button id='updateBtn'>Update</button></a>";
    
                // Check if the userID to be deleted is the same as the logged-in user's userID
                if ($loggedInUserID !== $userID) {
                    echo "<a href='../includes/askDelete.php?userID={$userID}'><button id='deleteBtn'>Delete</button></a>";
                } else {
                    echo "<button id='noDelete'>Delete</button>";
                }
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No users found</td></tr>";
        }
    }
?>