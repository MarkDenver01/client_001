<?php require_once('../../lib/class.environment.php'); ?>
<?php $db = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']); ?>
<?php 
    session_start();
    extract($_POST);
    
?>