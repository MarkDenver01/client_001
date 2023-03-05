<?php require_once('./load.php'); ?>
<?php
  $email_address = secure::decrypt(($_GET['email_address']));
  $student_info = delete_by_email("student_info", $email_address);
  $student_account = delete_by_email("user_account", $email_address);

  if ($student_info && $student_account) {
    $session->message("s", "User has been deleted.");
    redirect('view_student_account');
  } else {
    $session->message('d', "User deletion failed.");
    redirect('view_student_account');
  }
?>
