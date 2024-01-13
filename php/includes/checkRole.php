<?php
    // authFunctions.php
    function checkUserRole($allowedRole) {
        // Start the session if it is not already started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Check if the user is logged in and has the specified role
        if (!isset($_SESSION["username"]) || $_SESSION['role'] !== $allowedRole) {
            // Unset all session variables
            session_unset();

            // Destroy the session and log the user out
            session_destroy();

            // Redirect to index.html with an error parameter
            header('Location: index.php?error=wrong_roles');
            exit; // Make sure to exit after the header redirect
        }
    }
?>
