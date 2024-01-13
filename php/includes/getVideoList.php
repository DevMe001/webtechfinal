<?php
// Assuming your videos are stored in the "uploads" directory
$videoDirectory = '../uploads/';

//Connect to datbase with my database variable being $db
include('../db.php');

// Query to get video URLs in ascending order based on uploadTime
$query = "SELECT filePath FROM multimedia ORDER BY uploadTime ASC";

// Execute the query
$result = $db->query($query);

if (!$result) {
    die("Error in query: " . $db->error);
}

// Create an array to store video URLs
$videoUrls = [];

// Fetch video URLs from the result set
while ($row = $result->fetch_assoc()) {
    $videoUrls[] = $videoDirectory . $row['filePath'];
}

// Close the database connection
$db->close();

// Return the list of video URLs as JSON
echo json_encode($videoUrls);
?>
