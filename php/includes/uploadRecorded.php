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

        $response = array('success' => true, 'message' => 'File added to queue');

        // echo '<script>alert("File has been uploaded and database entry added successfully.");</script>';
    } else {
        $response = array('success' => false, 'message' => 'Sorry, there was an error inserting data into the database.');

       
    }


    echo json_encode($response);
}
?>
