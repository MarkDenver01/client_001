<?php require_once('../../lib/class.environment.php'); ?>
<?php session_start(); ?>
<?php $db = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']); ?>
<?php 
    $exam_title = $_SESSION['key_session']['exam_title'];
    $student_year = $_SESSION['key_session']['student_year'];
    extract($_POST);
    if ($exam_title == 'Reading' || 
        $exam_title == 'Writing' || 
        $exam_title == 'Speaking Skills' || 
        $exam_title == 'Listening Skills' || 
        $exam_title == 'Learning Styles' || 
        $exam_title == 'Memory' || 
        $exam_title == 'Study Skills' || 
        $exam_title == 'Creative and Critical Thinking Skills' || 
        $exam_title == 'Motivation' || 
        $exam_title == 'Self-Esteem' || 
        $exam_title == 'Personal relationships' || 
        $exam_title == 'Conflict Resolution' || 
        $exam_title == 'Health' || 
        $exam_title == 'Time Management' || 
        $exam_title == 'Money Management' || 
        $exam_title == 'Personal Purpose' || 
        $exam_title == 'Career Planning' || 
        $exam_title == 'Support Resources') {
        $sql = "SELECT * FROM examinee_answer WHERE email_address = '$email_address' 
        AND student_year = '$student_year' 
        AND exam_category = '$exam_title'  
        AND exam_answer_status ='$exam_answer_status'";
    } else {
        $sql = "SELECT * FROM examinee_answer WHERE email_address = '$email_address' 
        AND student_year = '$student_year' 
        AND exa = '$exam_title' 
        AND exam_answer_status ='$exam_answer_status'";
    }
    
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        $json_result = array(
            "res" => "alreadyExam",
            "msg" => $thisId
        );
    } else {
        $json_result = array(
            "res" => "takeNow"
        );
    }

    echo json_encode($json_result);
?>