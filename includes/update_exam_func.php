<?php require_once('./load.php'); ?>
<?php
  $id = $_GET['id'];
  $status = $_GET['exam_status'];

  if ($status == 0) {
    update_created_exam($id, 1);
  } else {
    update_created_exam($id, 0);
  }

  redirect('../app/view_exam', false);
?>
