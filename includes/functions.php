<?php
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
      $output .= "<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>";
      $output .= remove_junk(first_character($value));
      $output .= "</div>";
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
?>
