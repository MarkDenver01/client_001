<?php
  session_start();

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

    public function logout() {
      unset($_SESSION['email_address']);
    }
    
  }

  $session = new session();
  $msg = $session->msg();

?>
