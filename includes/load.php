<?php
/** separator and directory **/
define("URL_SEPARATOR", "/");
define("DS", DIRECTORY_SEPARATOR);

/** define lib path and site root path **/
defined('SITE_ROOT') ? null : define('SITE_ROOT', realpath(dirname(__FILE__)));
define("LIB_PATH_INC", SITE_ROOT.DS);

/** use for require **/
require_once(LIB_PATH_INC.'config_env.php');
require_once(LIB_PATH_INC.'db_connection.php');
require_once(LIB_PATH_INC.'functions.php');
require_once(LIB_PATH_INC.'session.php');
require_once(LIB_PATH_INC.'sql.php');
require_once(LIB_PATH_INC.'action.php');
require_once(LIB_PATH_INC.'security.php');
?>
