<?php
// Assuming your videos are stored in the "uploads" directory
$videoDirectory = '../uploads/';

//Connect to datbase with my database variable being $db

function getRecentLogs()
{
  include('../db.php');

  $query = "SELECT * FROM recent_logs ORDER by log_created DESC";

  // Execute the query
  $result = $db->query($query);

  if ($result) {
    // Fetch all rows as an associative array
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    // Check if there are any rows
    if (count($rows) > 0) {
      return $rows;
    } else {
      return [];
    }
  } else {
    return [];
  }
}