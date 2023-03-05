<?php require_once('../lib/class.environment.php'); ?>
<?php
  if($_ENV['SITE_INSTALLATION_COMPLETED'] == false ){
    header('location:../maintenance');
    exit;
  }
?>
<?php include('../includes/session.php'); ?>
<?php
if ($session->user_log_check()) {
  if($_ENV['SITE_INSTALLATION_COMPLETED'] == true ){
    header('location:./dashboard');
    exit;
  }
} else {
  header('location:./login');
  exit;
}
?>
