<?php require_once('./load.php'); ?>
<?php global $db; ?>
<?php global $session; ?>
<?php 
    $id = $_GET['id'];
    $status = $_GET['status'];

    if ($status == 'active') {
        $sql = "UPDATE announcement_logs SET status ='inactive' WHERE id ='$id'";
    } elseif ($status == 'inactive') {
        $sql = "UPDATE announcement_logs SET status ='active' WHERE id ='$id'";
    }
    $result = $db->query($sql);

    if ($result) {
        redirect('../app/announcement_history', false);
    } else {
        redirect('../app/dashboard', false);
    }
?>