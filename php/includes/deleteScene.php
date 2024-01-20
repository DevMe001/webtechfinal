<?php
include('../db.php');




if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST['fileId'];
    $filePath = $_POST['filePath'];

    $response = array();

        $targetFile = "../ContentCreator/uploads/$filePath";

        // Delete the file from the uploads folder
        if (file_exists($targetFile)) {

            

            unlink($targetFile);
        }

      
        // Delete the record from the database
      $deleted =   $db->query("DELETE FROM multimedia WHERE fileID = {$id}");

        if($deleted){

            $login_inserted = $db->prepare("INSERT INTO recent_logs (type, event,userId) VALUES (?, ?, ?)");


            session_start();

            $uploadName = 'skip';
            $getName = ucwords($_SESSION['username']);
            $logFile = $_POST['logFile'];
            $events = "$getName" . " skip a video " . "$logFile";
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
           
                $response = array('success' => true, 'message' => 'Scene skipped successfully.','logs' => $respObj);

             }else{
                   $response = array('success' => false, 'message' => 'No files to skip.');

            }

    }
    
    else {
   
       $response = array('success' => false, 'message' => 'No files to skip.');

    }


    echo json_encode($response);

}

