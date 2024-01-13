<?php
    session_start(); // Start the session

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: index.php");
    exit();

    // Clear browser cache
    echo '<script type="text/javascript">';
    echo 'window.location.href = "index.php";'; // Redirect to the home page or login page
    echo 'window.location.reload(true);'; // Force a reload and clear cache
    echo '</script>';
?>