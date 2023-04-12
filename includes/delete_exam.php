<?php require_once('./load.php'); ?>
<?php
    if (isset($_GET['id'])) {
        delete_exam_created($_GET['id']);
        redirect('../app/view_exam', false);
    }
?>
