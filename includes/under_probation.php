<?php require_once('./load.php'); ?>
<?php global $db; ?>
<?php 
    $id = $_GET['student_id'];
    $status = $_GET['probation_status'];

    if (empty($status) || $status == 'not under probation') {
        $sql = "UPDATE student_info SET probation_status ='under probation' WHERE id ='$id'";
        $result = $db->query($sql);
        if ($result) {
            redirect('../app/view_student_probation', false);
        } else {
            redirect('../app/dashboard', false);
        }
    } elseif($status == 'under probation') {
        $sql = "UPDATE student_info SET probation_status ='not under probation' WHERE id ='$id'";
        $result = $db->query($sql);
        if ($result) {
            redirect('../app/view_student_probation', false);
        } else {
            redirect('../app/dashboard', false);
        }
    }
?>