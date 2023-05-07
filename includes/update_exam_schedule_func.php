<?php require_once('./load.php'); ?>
<?php
  $id = $_GET['id'];
  $status = $_GET['exam_status'];

  if ($status == 'Not Ready') {
    update_exam_schedule($id, 'Ready');
  } else {
    update_exam_schedule($id, 'Not Ready');
  }

  redirect('../app/view_exam_schedule', false);
?>
