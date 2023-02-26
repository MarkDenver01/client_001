<?php

function sec_session_start() {
  $session_name = 'sec_session_id'; // set a custome session name
  $secure = SECURE;
  $http_only = true; // stops js being able to access to session id


  // force sessions to only use cookies
  if (ini_set('session.use_only_cookies', true) === FALSE) {
    header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
    exit();
  }

  // gets current cookies param
  $cookie_params = session_get_cookie_param();
  $session_set_cookie_param(
    $cookie_params["lifetime"],
    $cookie_params["path"],
    $cookie_params["domain"],
    $secure,
    $http_only);

  // sets the session name
  session_name($session_name);

  session_start(); // start php session
  session_regenerate_id(); // regenerated the session, delete the old one
}

?>
