<?php
error_reporting(-1);
require_once('./../lib/class.environment.php');
require_once('../includes/security.php');
require_once('../includes/session.php');
if($_ENV['SITE_INSTALLATION_COMPLETED'] == true){
  header('location:../app/dashboard');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once('header.php') ?>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-gradient">
    <div class="container">
      <a class="navbar-brand" href="./">Site Installation</a>
    </div>
  </nav>
  <?php
  $identifier = isset($_GET['step']) ? $_GET['step'] : '';
  switch($identifier) {
    case 1:
    include_once('./pages/step1.php');
    break;
    case 2:
    include_once('./pages/step2.php');
    break;
    case 3:
    include_once('./pages/step3.php');
    break;
    case 4:
    include_once('./pages/step4.php');
    break;
    case 'installation_complete':
    include_once('./pages/installation_complete.php');
    break;
    default:
    include_once('./pages/installation.php');
  }
  ?>

</body>
