<?php
// Assuming your videos are stored in the "uploads" directory
$videoDirectory = '../uploads/';

//Connect to datbase with my database variable being $db
include('../db.php');

// Query to get video URLs in ascending order based on uploadTime
$query = "SELECT * FROM recentqueue";

// Execute the query
$result = $db->query($query);

if (!$result) {
    die("Error in query: " . $db->error);
}


// Fetch video URLs from the result set
$row = mysqli_fetch_row($result);

$response = array();


if($row){
    $response = array('success' => true,'data' => $row);
}
else{
    $response = array('success' => true,'data' => $row);

}



// Close the database connection
$db->close();

// Return the list of video URLs as JSON
echo json_encode($response);
?>
