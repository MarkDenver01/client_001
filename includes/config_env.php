<?php
error_reporting(-1);
require_once('./../lib/class.environment.php');

/** Database credential **/
define("DB_HOST", ($_ENV['DB_HOST'] != null ? $_ENV['DB_HOST'] : "localhost"));
define("DB_USERNAME", ($_ENV['DB_USERNAME'] != null ? $_ENV['DB_USERNAME'] : "root"));
define("DB_PASSWORD", ($_ENV['DB_PASSWORD'] != null ? $_ENV['DB_PASSWORD'] : ""));
define("DB_NAME", ($_ENV['DB_NAME'] != null ? $_ENV['DB_NAME'] : "client_db_001"));

/** account role **/
define("CAN_REGISTER", "any");
define("DEFAULT_ROLE", "member");

/** check secured connection, if you are using HTTPS connection, change this TRUE **/
define("SECURE", FALSE);
?>
