<?php
    if(isset($_GET['searchBtn'])) {
        $searchTerm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';
        header("Location: ../Admin/adminHub.php?searchTerm=$searchTerm");
        exit();
    } else {
        header("Location: ../Admin/adminHub.php");
        exit();
    }
?>
