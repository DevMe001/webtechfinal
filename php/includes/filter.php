<?php
if (isset($_GET['roleFilter'])) {
    $roleFilter = $_GET['roleFilter'];
    header("Location: ../Admin/adminHub.php?roleFilter=$roleFilter");
    exit();
} else {
    header("Location: ../Admin/adminHub.php");
    exit();
}
?>
