<?php
    include('../secure.php');
    include('../includes/checkRole.php');
    checkUserRole('a');
    include('../db.php');
    include('validateAndAlert.php');
    
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $userID = $_POST['userID']; // Add this line to get the user ID
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
        $firstName = $_POST['firstName'];
        $surName = $_POST['lastName'];
        $role = $_POST['role'];

        validateAndAlert($firstName, 'firstName');
        validateAndAlert($surName, 'lastName');

        // Validate password (minimum 8 characters)
        if (strlen($password) < 8) {
            echo '<script>alert("Error: Password must be at least 8 characters long.");</script>';
            echo '<script>window.location.href = "../Admin/updateAccount.php?userID=<?php echo $userID; ?>";</script>';
            exit();
        }

        // Validate and update the database
        if (!empty($password) && !empty($firstName) && !empty($surName) && !empty($role)) {
            $query = "UPDATE accounts SET password=?, firstName=?, surName=?, role=? WHERE userID=?";
            $stmt = $db->prepare($query);

            if ($stmt) {
                $stmt->bind_param("ssssi", $password, $firstName, $surName, $role, $userID);

                if ($stmt->execute()) {
                    echo '<script>alert("Account updated successfully.");</script>';
                    echo '<script>window.location.href = "../Admin/adminHub.php";</script>';
                } else {
                    echo "Error updating account: " . $stmt->error;
                }

                $stmt->close();
            } else {
                echo "Error in the prepared statement: " . $db->error;
            }

            $db->close();
        } else {
            echo "All fields are required.";
        }
    }
?>