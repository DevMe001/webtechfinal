<?php
include('../db.php');


$login_inserted = $db->prepare("INSERT INTO recent_logs (type, event,userId) VALUES (?, ?, ?)");

session_start();

$uploadName = $_POST['type'];
$getName = ucwords($_SESSION['username']);
$getEvent = $_POST['event'];
$events = "$getName" . " $getEvent";
$userId = $_SESSION['userID'];

$respObj = [
  (object) [
    'uploadName' => $uploadName,
    'events' => $events,
    'userId' => $userId
  ]
];

$login_inserted->bind_param("ssi", $uploadName, $events, $userId);

if ($login_inserted->execute()) {
  $response = array('success' => true, 'message' => 'File has been uploaded and database entry added successfully.',  'logs' => $respObj);
}else{
  $response = [];
}

echo json_encode($response);


