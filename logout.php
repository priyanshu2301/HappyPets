<?php
  // If the user is logged in, delete the session vars to log them out
  session_start();
  if (isset($_SESSION['loggedin'])) {
  //Deleting the session vars by clearing the $_SESSION array
  session_unset();
  session_destroy();
  session_write_close();

  }
  
  // Redirect to the home page
  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/login.php';
  header('Location: ' . $home_url);
?>
