<?php if (!isset($_SESSION)) session_start(); ?>
<?php
  class session {
    public $msg;
    private $user_mail_is_logged_in = false;

    function __construct() {
      $this->message_status();
      $this->user_mail_log_check();
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

    public function user_email_check() {
      if (!empty($this->key_session)) {
        if (isset($_SESSION[$this->key_session['email_address']])) {
          $this->user_mail_is_logged_in = true;
        } else {
          $this->user_mail_is_logged_in = false;
        }
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

    private function message_status() {
      if (isset($_SESSION['msg'])) {
        $this->msg = $_SESSION['msg'];
        unset($_SESSION['msg']);
      } else {
        $this->msg;
      }
    }
  }

  $session = new session();
  $msg = $session->message();
?>
