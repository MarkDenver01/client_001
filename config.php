<?php
/** Created by denver */
$dir_path = $_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'];
require_once(realpath(__DIR__."/lib/class.environment.php"));
if($_ENV['SITE_INSTALLATION_COMPLETED'] == false) {
  header('location:./installation');
  exit;
} else {
  header('location:./app');
  exit;
}

?>
