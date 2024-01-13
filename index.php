<?php

// Check if the 'page' parameter is set in the URL
if (isset($_GET['page'])) {
  $page = $_GET['page'];

  // Use a switch statement for better readability
  switch ($page) {
    case 'viewer':
      // Include the viewer/index.php file
      header('Location:php/viewer/index.html');
      exit();
    
    case 'admin':
      // Include the index.php file
      header('Location:php');

      break;
      

    default:
      // Handle unexpected values of 'page'
      // You might want to redirect to a default page or display an error message
      header('Location:php');
      exit();
  
  }
} 

?>