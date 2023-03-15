<?php require_once('../lib/class.environment.php'); ?>
<?php
  if($_ENV['SITE_INSTALLATION_COMPLETED'] == false ){
    header('location:../maintenance');
    exit;
  } else {
    header('location:./login');
    exit;
  }
?>
