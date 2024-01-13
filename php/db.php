<?php
    // Database credentials
    $servername = "localhost";  // usually "localhost" or an IP address
    $username = "root";
    $password = "";
    $database = "slu";

    // Create connection
    $db = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    
    // Set character set to utf8mb4
    $db->set_charset("utf8mb4");
?>
