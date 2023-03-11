<?php
function send_email_account_created($email_address,
                                    $name,
                                    $subject,
                                    $content) {
  global $mail;
  $is_success = $mail->send_mail($email_address, $name, $subject, $content);
  if (!$is_success) {
    return false;
  } else {
    return true;
  }
}

?>
