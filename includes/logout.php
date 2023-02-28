<?php  include_once 'functions.php'; ?>
<?php
  sec_session_start();

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
   header('location: ../app/index')
   exit();
?>
