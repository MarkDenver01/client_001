<?php
  # check if the user is logged in
  if (isset($_SESSION['key_session']['email_address'])) {
    # get the logged in user's email address from SESSION
    $id = $_SESSION['key_session']['id'];
    last_seen_query($id);
  }
?>
