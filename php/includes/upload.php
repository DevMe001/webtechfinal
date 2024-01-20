<?php
// import
include('../db.php');


// Set the target directory for video uploads
$targetDir = "../ContentCreator/uploads/";

// Specify the allowed video file formats
$allowedFormats = array("mp4", "avi", "mkv", "mov", "wmv");

// Update the maximum file size to 500MB
$maxFileSize = 500 * 1024 * 1024; // 500MB in bytes


$response = array();
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if a file was selected for upload
    if (!empty($_FILES["videoFile"]["name"])) {
        // Check if the file size exceeds the maximum allowed size
        if ($_FILES["videoFile"]["size"] > $maxFileSize) {
            // echo '<script>alert("Sorry, the file size exceeds the maximum allowed limit of 500MB.");</script>';
            // echo '<script>window.location.href = "../ContentCreator/contentCreatorsHub.php";</script>';

            $response = array('success' => false,'message' => 'Sorry, the file size exceeds the maximum allowed limit of 500MB');
           
        }

        // Get the uploaded file details
        $fileName = basename($_FILES["videoFile"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        

        // Check if the file format is allowed
        if (in_array($fileType, $allowedFormats)) {
            // Upload the file to the server
            $date = date('YmdHis');
            $removeSpace = str_replace('-', '', $date);
            $newFileName = generateUniqueFileName($targetDir, "recorded$removeSpace" . $fileName, $fileType);
            $targetFilePath = $targetDir . $newFileName;


            if (move_uploaded_file($_FILES["videoFile"]["tmp_name"], $targetFilePath)) {
                // File upload successful, now insert into the uploads folder
                $fileTitle = $_POST["fileTitle"];
                $filePath = $targetFilePath;

                // File upload successful, now insert into the database
                // Use prepared statement to prevent SQL injection
                $stmt = $db->prepare("INSERT INTO multimedia (fileTitle, filePath, uploadTime) VALUES (?, ?, CURRENT_TIMESTAMP)");
                $stmt->bind_param("ss", $fileTitle, $filePath);

                if ($stmt->execute()) {

                    $login_inserted = $db->prepare("INSERT INTO recent_logs (type, event,userId) VALUES (?, ?, ?)");

                    session_start();

                    $uploadName = 'uploaded';
                    $getName = ucwords($_SESSION['username']);
                    $events = "$getName uploaded  a file";
                    $userId = $_SESSION['userID'];

                     $respObj = [
                        (object) [
                            'uploadName' => $uploadName,
                            'events' => $events,
                            'userId' => $userId 
                        ]
                    ];

                    $login_inserted->bind_param("ssi",$uploadName, $events,$userId);
                    
                    if($login_inserted->execute()){
                        $response = array('success' => true, 'message' => 'File has been uploaded and database entry added successfully.', 'uploaded' => $newFileName, 'name' => $_POST['fileTitle'], 'logs' => $respObj);
                    }
                    else{
                    $response = array('success' => false, 'message' => 'Sorry, logs not working');

                    }
                    // echo '<script>alert("File has been uploaded and database entry added successfully.");</script>';
                } else {
                    $response = array('success' => false, 'message' => 'Sorry, there was an error inserting data into the database.');

                    // echo '<script>alert("Sorry, there was an error inserting data into the database.");</script>';
                }

                // echo '<script>window.location.href = "../ContentCreator/contentCreatorsHub.php";</script>';
                // exit();
            } else {
                $response = array('success' => false, 'message' => 'Sorry, there was an error uploading your file.');

                // echo '<script>alert("Sorry, there was an error uploading your file.");</script>';
                // echo '<script>window.location.href = "../ContentCreator/contentCreatorsHub.php";</script>';
                // exit();
            }
        } else {
            $response = array('success' => false, 'message' => 'Sorry, only MP4, AVI, MKV, MOV, and WMV files are allowed.');

            // echo '<script>alert("Sorry, only MP4, AVI, MKV, MOV, and WMV files are allowed.");</script>';
            // echo '<script>window.location.href = "../ContentCreator/contentCreatorsHub.php";</script>';
            // exit();
        }
    } else {
        $response = array('success' => false, 'message' => 'Please select a video file to upload.');

        // echo '<script>alert("Please select a video file to upload.");</script>';
        // echo '<script>window.location.href = "../ContentCreator/contentCreatorsHub.php";</script>';
        // exit();
    }

    echo json_encode($response);
}


function generateUniqueFileName($targetDir, $fileName, $fileType)
{
    // Replace spaces with underscores in the filename
    $fileName = str_replace(' ', '', $fileName);

    $newFileName = $fileName;
    $counter = 1;

    while (file_exists($targetDir . $newFileName)) {
        $newFileName = "recorded" . $counter . "." . $fileType;
        $counter++;
    }

    return $newFileName;
}