<?php
// import
include('../db.php');


// Update the maximum file size to 500MB
$maxFileSize = 1073741824 ; // 500MB in bytes


$response = array();
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $fileTitle = $_POST['fileTitle'];
    $filePath =$_POST['filePath'];


    $stmt = $db->prepare("INSERT INTO queue (quename, quepath, uploadTime) VALUES (?, ?, CURRENT_TIMESTAMP)");
    $stmt->bind_param("ss", $fileTitle, $filePath);

    if ($stmt->execute()) {

        $login_inserted = $db->prepare("INSERT INTO recent_logs (type, event,userId) VALUES (?, ?, ?)");

        session_start();

        $uploadName = 'watch';
        $getName = ucwords($_SESSION['username']);
        $logFile = $_POST['logFile'];
        $events = " $getName" . " watch" . " $logFile";
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
            $response = array('success' => true, 'message' => 'File added to queue', 'logs' => $respObj);

        }
        // echo '<script>alert("File has been uploaded and database entry added successfully.");</script>';
    } else {
        $response = array('success' => false, 'message' => 'Sorry, there was an error inserting data into the database.');

       
    }


    echo json_encode($response);
}

