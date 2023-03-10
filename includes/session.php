<?php session_start(); ?>
<?php
  class session {
    public $msg;
    private $user_is_logged_in = false;

    function __construct() {
      $this->message_status();
      $this->user_log_check();
    }

    public function is_user_logging_in() {
      return $this->user_is_logged_in;
    }

    public function login($user_id) {
      $_SESSION['user_id'] = $user_id;
    }

    public function user_log_check() {
      if (isset($_SESSION['user_id'])) {
        $this->user_is_logged_in = true;
      } else {
        $this->user_is_logged_in = false;
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
