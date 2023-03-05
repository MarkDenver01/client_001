<?php include('../includes/load.php'); ?>
<?php update_last_login_status($_SESSION['user_id'], '0'); ?>
<?php
  session_start();

  // unset all session values
  $_SESSION = array();

  // get session parameters
  $params = session_get_cookie_params();

  // delete actual cookie
  setcookie(session_name(), '', time() - 42000,
   $params["path"],
   $params["domain"],
   $params["secure"],
   $params["httponly"]);



   // destroy session
   session_destroy();
   header('location: ../app/login')
?>
