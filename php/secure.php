<?php
    // Start the session if it is not already started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Check if the user is not logged in
    if (!isset($_SESSION['username'])) {
        // Redirect to the login page
        header("Location: index.php");
        exit();
    }
?>
