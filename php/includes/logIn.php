<?php
    require('../db.php');
    session_start();

    if (isset($_POST['username'])) {
        // Get the username and password from the form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Use prepared statement to prevent SQL injection
        $query = $db->prepare("SELECT * FROM accounts WHERE username=?");
        $query->bind_param('s', $username);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows != 0) {
            // Fetch user data
            $user = $result->fetch_assoc();
            
            // Verify password using password_verify
            if (password_verify($password, $user['password'])) {
                // Check the role of the user
                $role = $user['role'];

                // Set the session variables for the username, role, and userID
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;
                $_SESSION['userID'] = $user['userID']; // Assuming 'userID' is the correct column name in your database

                // Redirect based on the user's role
                if ($role == 'a') {
                    // Redirect to adminHub.php for role 'a'
                    header('Location: ../Admin/adminHub.php');
                    exit();
                } elseif ($role == 'c') {
                    // Redirect to contentCreatorsHub.php for role 'c'
                    header('Location: ../ContentCreator/contentCreatorsHub.php');
                    exit();
                }
            }
        } else {
            // If the password verification fails, set an error parameter in the URL
            header('Location: ../index.php?error=wrong_credentials');
            exit();
        }
        
        // If the login fails, set an error parameter in the URL
        header('Location: ../index.php?error=wrong_credentials');
        exit();

        $query->close();
    }

    // Redirect to index.php if login fails
    header('Location: ../index.php');
    exit();
?>
