<?php   
    include('../secure.php');
    include('../includes/checkRole.php');
    checkUserRole('a');
    include('../db.php');
    include('validateAndAlert.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Process the form data
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstName = $_POST['firstName'];
        $surName = $_POST['lastName'];

        // Validate username
        validateAndAlert($username, 'username');

        // Validate password
        if (strlen($password) < 8) {
            echo '<script>alert("Error: Password must be at least 8 characters long.");</script>';
            echo '<script>window.history.back();</script>';
            exit();
        }

        // Validate firstName
        validateAndAlert($firstName, 'firstName');

        // Validate surName
        validateAndAlert($surName, 'lastName');

        // Check if the username already exists
        $checkQuery = "SELECT * FROM accounts WHERE username = ?";
        $checkStatement = mysqli_prepare($db, $checkQuery);
        mysqli_stmt_bind_param($checkStatement, "s", $username);
        mysqli_stmt_execute($checkStatement);
        mysqli_stmt_store_result($checkStatement);

        if (mysqli_stmt_num_rows($checkStatement) > 0) {
            // Username already exists, display an alert box
            echo '<script>alert("Error: Username already exists. Please choose a different username.");</script>';
            echo '<script>window.location.href = "../Admin/addAccount.php";</script>';
        } else {
            // Username is unique, proceed with account creation
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $selectedRole = $_POST['role'];

            // Map selected role to the corresponding character
            $role = ($selectedRole == 'admin') ? 'a' : (($selectedRole == 'content_creator') ? 'c' : '');

            // SQL query to insert the data into the database
            $insertQuery = "INSERT INTO accounts (username, password, firstName, surName, role) 
                            VALUES (?, ?, ?, ?, ?)";
            $insertStatement = mysqli_prepare($db, $insertQuery);
            mysqli_stmt_bind_param($insertStatement, "sssss", $username, $hashedPassword, $firstName, $surName, $role);

            // Execute the query
            if (mysqli_stmt_execute($insertStatement)) {
                // Redirect to index.php if account creation is successful
                header('Location: ../Admin/adminHub.php');
                exit();
            } else {
                // Display an alert box for database insertion error
                echo '<script>alert("Error: ' . mysqli_stmt_error($insertStatement) . '");</script>';
            }

            // Close the prepared statement
            mysqli_stmt_close($insertStatement);
        }

        // Close the database connection
        mysqli_close($db);
    }
?>
