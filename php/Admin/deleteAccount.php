<?php
    require('../db.php');
    
    $userID = $_GET['userID'];

    // Use a prepared statement to prevent SQL injection
    $query = "DELETE FROM accounts WHERE userID = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('i', $userID);

    // Execute the statement
    if ($stmt->execute()) {
        // Check if any row was affected
        if ($stmt->affected_rows > 0) {
            echo '<script>alert("Account deleted successfully.");</script>';
            echo '<script>window.location.href = "adminHub.php";</script>';
            exit();
        } else {
            echo "No account found with the given userID.";
        }
    } else {
        echo "Error deleting account: " . $stmt->error;
    }

    

    // Close the statement
    $stmt->close();
?>
