<?php if (!isset($_SESSION)) session_start(); ?>
<?php
  class session {
    public $msg;
    public $login_count = 0;
    private $user_mail_is_logged_in = false;

    function __construct() {
      $this->message_status();
      $this->user_mail_log_check();
      $this->login_attempts_status();
    }

    public function is_user_logged_in() {
      return $this->user_mail_is_logged_in;
    }

    public function login_session(array $arr = array()) {
      $_SESSION['key_session'] = $arr;
    }

    public function user_mail_log_check() {
      if (isset($_SESSION['key_session']['email_address'])
        && isset($_SESSION['key_session']['is_logged_in'])) {
          $is_logged_in = $_SESSION['key_session']['is_logged_in'];
          if ($is_logged_in == '1') {
            $this->user_mail_is_logged_in = true;
          } else {
            $this->user_mail_is_logged_in = false;
          }
      } else {
        $this->user_mail_is_logged_in = false;
      }
    }

    public function logout() {
      unset($_SESSION['user_id']);
    }

    public function message($type = '', $msg = '') {
      if (!empty($msg)) {
        if (strlen(trim($type)) == 1) {
            $type = str_replace(
              array('d', 'i', 'w', 's'),
              array('danger', 'info', 'warning', 'success'),
            $type);
        }
        $_SESSION['msg'][$type] = $msg;
      } else {
        return $this->msg;
      }
    }

    public function attempt_login($type = '', $login_count = 0) {
      if (!empty($login_count)) {
        if (strlen(trim($type)) == 1) {
          $type = str_replace(
            array('d', 'i', 'w', 's'),
            array('danger', 'info', 'warning', 'success'),
            $type
          );
        }
        $_SESSION['login_count_attempts'][$type] = $login_count;
      } else {
        return $this->login_count;
      }
    }

    private function message_status() {
      if (isset($_SESSION['msg'])) {
        $this->msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
      } else {
        $this->msg;
      }
    }

    private function login_attempts_status() {
      if (isset($_SESSION['login_count_attempts'])) {
        $this->login_count = $_SESSION['login_count_attempts'];
        unset($_SESSION['login_count']);
      } else {
        return $this->login_count;
      }
    }
  }

  $session = new session();
  $msg = $session->message();
  $login_count = $session->attempt_login();
?>
