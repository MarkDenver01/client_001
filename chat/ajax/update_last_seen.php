<?php
  if (isset($_SESSION['key_session']['email_address'])) {
    $id = $_SESSION['key_session']['id'];
    update_last_seen($id);
  }
?>
