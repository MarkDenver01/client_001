<?php
// setting up the time Zone
// It Depends on your location or your P.c settings
define('TIMEZONE', 'Africa/Addis_Ababa');
date_default_timezone_set(TIMEZONE);

$errors = array();
/** remove html characters **/
function remove_junk($str) {
  $str = nl2br($str);
  $str = htmlspecialchars(strip_tags($str, ENT_QUOTES));
  return $str;
}

/** uppercase first character **/
function first_character($str) {
  $val = str_replace('-', " ", $str);
  $val = ucfirst($val);
  return $val;
}

/** checking inputs not empty **/
function validate_fields($var) {
  global $errors;
  foreach ($var as $field) {
    $value = remove_junk($_POST[$field]);
    if (isset($value) && $value == '') {
      $errors = $field ." can't be blank";
      return $errors;
    }
  }
}

/** display session message **/
function display_message($msg = '') {
  $output = array();
  if (!empty($msg)) {
    foreach ($msg as $key => $value) {
      $output  = "<div class=\"alert alert-{$key}\">";
      $output .= remove_junk(first_character($value));
      $output .= "</div>";
    }
    return $output;
  } else {
    return "";
  }
}

function display_log_count($login_log = 0) {
  $output = array();
  if (!empty($login_log)) {
    foreach ($login_log as $key => $value) {
      $output  = $value;
    }
    return $output;
  } else {
    return "";
  }
}

/** redirect page **/
function redirect($url, $permanent = false) {
  if (headers_sent() == false) {
    header('location: ' .$url, true, ($permanent === true) ? 301 : 302);
  }
  exit();
}

/** create random string **/
function randomString($length = 5) {
  $str = '';
  $pattern = "0123456789abcdefghijklmnopqrstuvwxyz";

  for($x = 0; $x < $length; $x++) {
    $str .= $pattern[mt_rand(0, strlen($cha))];
  }
  return $str;
}

/** counter **/
function count_id() {
  static $count = 1;
  return $count++;
}

/** readable make date **/
function make_date() {
  return strftime("%Y-%m-%d %H:%M:%S", time());
}

/** readable date and time **/
function read_data($str) {
  if($str) {
    return date('F j, Y, g:i:s a', strtotime($str));
  } else {
    return null;
  }
}

/** real escape string **/
function real_escape($data) {
  global $con;
  return mysqli_real_escape_string($con, trim($data));
}

/** log file **/
function debug_mode($log_msg) {
  $is_debugging = true; // set true to enable debugging, otherwise false
  if($is_debugging) {
    $log_filename = "log";
    if (!file_exists($log_filename)) {
        // create directory/folder uploads.
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/log_' . date('d-m-Y') . '.log';
    // if you don't add `FILE_APPEND`, the file will be erased each time you add a log
    file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
  }
}

/** one time password **/
function generateOTP($length, $special_chars, $alpha_chars, $numbers) {
  $one_time_password = "";
  $chars = array();

  // special characters
  if (isset($_POST[$special_chars])) {
     array_merge($chars,
     array(
       33,35,36,37,38,40,41,42,43,44,45,
       46,47,58,59,60,61,62,63,64,91,93,
        94,95,123,124,125,126
      ));
  }

  // alpha characters
  if (isset($_POST[$alpha_chars])) {
    array_merge($chars,
    array(
      65,66,67,68,69,70,71,72,73,74,
      75,76,77,78,79,80,81,82,83,84,
      85,86,87,88,89,90,
      97,98,99,100,101,102,103,104,105,106,
      107,108,109,110,111,112,113,114,115,116,
      117,118,119,120,121,122
    ));
  }

  // numbers
  if(isset($_POST[$numbers])) {
     array_merge($chars,
     array(
       48,49,50,51,52,53,54,55,56,57
     ));
  }

   // let's random the character that depends on length
   // and if type is special chars or alpha chars or numbers
   for($i=0; $i<$length; $i++) {
     shuffle($chars);
     $one_time_password .= chr(reset($chars));
   }
   return $one_time_password;
}

function getIdAddr() {
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else{
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function last_seen($date_time){

   $timestamp = strtotime($date_time);

   $strTime = array("second", "minute", "hour", "day", "month", "year");
   $length = array("60","60","24","30","12","10");

   $currentTime = time();
   if($currentTime >= $timestamp) {
		$diff     = time()- $timestamp;
		for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
		$diff = $diff / $length[$i];
		}

		$diff = round($diff);
		if ($diff < 59 && $strTime[$i] == "second") {
			return 'Active';
		}else {
			return $diff . " " . $strTime[$i] . "(s) ago ";
		}

   }
}
?>
