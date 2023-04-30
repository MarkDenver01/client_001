<?php require_once('../../lib/class.environment.php'); ?>
<?php session_start(); ?>
<?php 
    $db = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']); ?>
<?php 
    $student_id = $_SESSION['key_session']['student_id'];
    $email_address = $_SESSION['key_session']['email_address'];
    $student_year = $_SESSION['key_session']['student_year'];
    extract($_POST);

    if ($thisId == 'Reading' || 
        $thisId == 'Writing' || 
        $thisId == 'Speaking Skills' || 
        $thisId == 'Listening Skills' || 
        $thisId == 'Learning Styles' || 
        $thisId == 'Memory' || 
        $thisId == 'Study Skills' || 
        $thisId == 'Creative and Critical Thinking Skills' || 
        $thisId == 'Motivation' || 
        $thisId == 'Self-Esteem' || 
        $thisId == 'Personal relationships' || 
        $thisId == 'Conflict Resolution' || 
        $thisId == 'Health' || 
        $thisId == 'Time Management' || 
        $thisId == 'Money Management' || 
        $thisId == 'Personal Purpose' || 
        $thisId == 'Career Planning' || 
        $thisId == 'Support Resources') {
        $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' 
        AND exam_id ='$thisId' AND exam_answer_status ='Completed'";
    } else {
        $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' 
        AND exam_id ='$thisId' AND exam_answer_status ='Completed'";
    } 
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        $res = array("res" => "alreadyExam");
    } else {
        $res = array("res" => "takeNow");
    }

    echo json_encode($res);
?> 