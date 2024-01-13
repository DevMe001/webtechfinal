<?php
if (isset($_GET['sortOrder'])) {
    $sortOrder = $_GET['sortOrder'];
    header("Location: ../Admin/adminHub.php?sortOrder=$sortOrder");
    exit();
} else {
    header("Location: ../Admin/adminHub.php");
    exit();
}
?>
