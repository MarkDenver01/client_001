<?php require_once('./load.php'); ?>
<?php
  $email_address = secure::decrypt($_GET['email_address']);

  $check_user_level = current_user_account("user_account", $email_address);

  if ($check_user_level['user_level'] == 2) {
    echo "Guidance";
    delete_by_email("guidance_info", $email_address);
    delete_by_email("user_account", $email_address);

    redirect('../app/view_guidance_account', false);
  } elseif ($check_user_level['user_level'] == 3) {
    echo "Student";
    delete_by_email("student_info", $email_address);
    delete_by_email("user_account", $email_address);

    redirect('../app/view_student_account', false);
  }
?>
