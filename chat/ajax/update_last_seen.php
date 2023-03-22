<?php
  if (isset($_SESSION['key_session']['email_address'])) {
    $id = $_SESSION['id'];
    last_seen_query($id);
  }
?>
