<?php
// displayVideos.php
include('../db.php');

// Fetch all videos from the database ordered by upload time
$query = "SELECT fileTitle, filePath FROM multimedia ORDER BY uploadTime ASC";
$result = $db->query($query);

if ($result->num_rows > 0) {
    $response = array();
    $results = array();

    // Fetch all rows
    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
    }

    $response = array('success' => true, 'data' => $results);
} else {
    $response = array('success' => false, 'data' => []);
}



echo json_encode($response);
?>