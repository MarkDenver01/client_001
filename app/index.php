<?php include('../includes/load.php'); ?>
<?php require_once('../lib/class.environment.php'); ?>
<?php
if ($session->user_log_check()) {
  if($_ENV['SITE_INSTALLATION_COMPLETED'] == true ){
    header('location:./dashboard');
    exit;
  } else {
    header('location:../maintenance');
    exit;
  }
} else {
  header('location:./login');
  exit;
}
?>
