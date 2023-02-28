<?php
  class session {
    private $msg;
    private $user_is_logged_in = false;

    function __constructor() {
      $this->flash_msg();
      $this->userLoginSetup();
    }

    private function flash_msg() {
      if (isset($_SESSION['msg'])) {
        $this->msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
      } else {
        $this->msg;
      }
    }

    public function msg($type = '', $msg = '') {
      if (!empty($msg)) {
        if(strlen(trim($type)) == 1) {
          $type = str_replace(array('d','i','w','s'), array('danger', 'info', 'warning', 'success'), $type);
        }
        $_SESSION['msg'][$type] = $msg;
      } else {
        return $this->msg;
      }
    }

    function logout() {
      unset($_SESSION['email_address']);
    }

    function isUserLoggedIn() {
      return $this->user_is_logged_in;
    }

    function login($user_id) {
      $_SESION['user_id'] = $user_id;
    }

    function userLoginStatus() {
      if (isset($_SESSION['user_id'])) {
        $this->user_is_logged_in = true;
      } else {
        $this->user_is_logged_in = false;
      }
    }

  }

  $session = new session();
  $msg = $session->msg();

?>
