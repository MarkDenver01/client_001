<?php require_once('../../lib/class.environment.php'); ?>
<?php session_start(); ?>
<?php $db = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']); ?>
<?php 
    $exam_title = $_SESSION['key_session']['exam_title'];
    $student_year = $_SESSION['key_session']['student_year'];
    extract($_POST);
    $sql = "SELECT * FROM exam_created WHERE student_year ='$student_year' AND exam_title='$thisId'";
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