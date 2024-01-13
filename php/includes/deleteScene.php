<?php
include('../db.php');

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['deleteScene'])) {
    // Fetch the oldest uploaded file from the database
    $result = $db->query("SELECT * FROM multimedia ORDER BY fileID ASC LIMIT 1");
    $row = $result->fetch_assoc();

    if ($row) {
        // Delete the file from the uploads folder
        $filePath = $row['filePath'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Delete the record from the database
        $db->query("DELETE FROM multimedia WHERE fileID = {$row['fileID']}");

        echo '<script>alert("Scene skipped successfully.");</script>';
    } else {
        echo '<script>alert("No files to skip.");</script>';
    }

    echo '<script>window.location.href = "../ContentCreator/contentCreatorsHub.php";</script>';
    exit();
}
?>
