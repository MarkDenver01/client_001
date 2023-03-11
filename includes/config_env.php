<?php
error_reporting(-1);
require_once('./../lib/class.environment.php');
require_once('./../includes/security.php');

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

/** smtp server **/
define("SMTP_HOST", $_ENV['SMTP_HOST']);
define("SMTP_PORT", $_ENV['SMTP_PORT']);
define("SMTP_USER_MAIL", $_ENV['SMTP_USER_MAIL']);
define("SMTP_PASSWORD", secure::decrypt($_ENV['SMTP_PASSWORD']));

?>
