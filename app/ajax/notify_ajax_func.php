<?php require_once('../../lib/class.environment.php'); ?>
<?php $db = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']); ?>
<?php 
    session_start();
    extract($_POST);
    $submitted = date('Y-m-d h:i:s A');
    $sql = $db->query("UPDATE examinee SET counselor_notify_status ='Notified' WHERE student_id='$thisId'");
    if ($sql) {
        $sqlInsert = $db->query("INSERT INTO notify_student(student_id, `message`, notify_date, notify_status) VALUES( 
        '$thisId',
        'Please visit to the guidance office for counseling. Thank you',
        '$submitted',
        'unread')");
        if ($sqlInsert) {
            $res = array("res" => "success");
        } else {
            $res = array("res" => "failed");
        }

    } else {
        $res = array("res" => "failed");
    }
    
    echo json_encode($res);
?>