<?php
    require('../db.php');
    
    $userID = $_GET['userID'];

    // Display a confirmation dialog using JavaScript
    echo '<script>';
    echo 'var confirmDelete = confirm("Are you sure you want to delete this account?");';
    echo 'if(confirmDelete) {';
    echo '  var userID = ' . $userID . ';';
    echo '  window.location.href = "../Admin/deleteAccount.php?userID=" + userID;';
    echo '} else {';
    echo '  window.location.href = "../Admin/adminHub.php";';
    echo '}';
    echo '</script>';
?>
