<?php 
    session_start();
    require_once('../lib/class.environment.php');
    if($_ENV['SITE_INSTALLATION_COMPLETED'] == true){
      header('location:../app/dashboard');
      exit;
    }
  ?>