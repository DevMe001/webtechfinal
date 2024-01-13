<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="icon" type="image/x-icon" href="../style/images/samcis_logo.png" sizes="16x16">
    <title>Login Page</title>
</head>
<?php
    // Start the session if it is not already started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    include "includes/headerMain.php";

    if(!isset($_SESSION["username"])){
        include "logInForm.php";
    }else{
        // Check user role
        $userRole = $_SESSION["role"]; // Assuming you have a session variable for user role

        // Redirect based on role
        if ($userRole == 'a') {
            header("Location: Admin/adminHub.php");
            exit();
        } elseif ($userRole == 'c') {
            header("Location: ContentCreator/contentCreatorsHub.php");
            exit();
        }
    }

    include "includes/footer.php";
?>
