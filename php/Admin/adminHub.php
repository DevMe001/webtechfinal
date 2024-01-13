<?php
    include('../secure.php');
    include('../includes/checkRole.php');
    checkUserRole('a');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/style.css">
    <link rel="icon" type="image/x-icon" href="../../style/images/samcis_logo.png" sizes="16x16">
    <title>Dashboard</title>
    <script defer src="../../style/scriptA.js"></script>
</head>
<body>
    <?php
        include('../includes/headerHub.php');
        include('../includes/time.php');
    ?>

    <h1>Welcome, Admin <?php echo $_SESSION['username']; ?></h1>

    <div id='buttonContainer'>
        <h2>Account Control</h2>

        <!-- Search Form -->
        <div class="form-container">
            <form method="get" action="../includes/search.php">
                <label for="searchTerm">Search Username:</label>
                <input type="text" name="searchTerm" id="searchTerm" placeholder="Enter username">
                <button type="submit" name="searchBtn">Search</button>
            </form>
        </div>

        <!-- Sort Form -->
        <div class="form-container">
            <form method="get" action="../includes/sort.php" id="sortForm">
                <label for="sortOrder">Sort Username Alphabetically:</label>
                <select name="sortOrder" id="sortOrder">
                    <option value="asc" <?php echo (isset($_GET['sortOrder']) && $_GET['sortOrder'] == 'asc') ? 'selected' : ''; ?>>Ascending</option>
                    <option value="desc" <?php echo (isset($_GET['sortOrder']) && $_GET['sortOrder'] == 'desc') ? 'selected' : ''; ?>>Descending</option>
                </select>
            </form>
        </div>

        <!-- Filter Form -->
        <div class="form-container">
            <form method="get" action="../includes/filter.php" id="filterForm">
                <label for="roleFilter">Filter by Role:</label>
                <select name="roleFilter" id="roleFilter">
                    <option value="all" <?php echo (!empty($_GET['roleFilter']) && $_GET['roleFilter'] == 'all') ? 'selected' : ''; ?>>All</option>
                    <option value="a" <?php echo (!empty($_GET['roleFilter']) && $_GET['roleFilter'] == 'a') ? 'selected' : ''; ?>>Admin</option>
                    <option value="c" <?php echo (!empty($_GET['roleFilter']) && $_GET['roleFilter'] == 'c') ? 'selected' : ''; ?>>Content Creator</option>
                </select>
            </form>
        </div>

        <!-- Add Account Button -->
        <a href='addAccount.php' id="addLink"><button id="addBtn">Add Account</button></a>
    
        <!-- Accounts Generation -->
        <table id='tabAcc'>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            <?php
                $loggedInUserID = isset($_SESSION['userID']) ? $_SESSION['userID'] : null;

                // Get the roleFilter parameter from the URL
                $roleFilter = isset($_GET['roleFilter']) ? $_GET['roleFilter'] : 'all';

                include('../includes/showUsers.php');
                renderAccounts($result, $loggedInUserID, $roleFilter);
            ?>
        </table>
    </div>
</body>
</html>
