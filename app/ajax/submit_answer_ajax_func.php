<?php require_once('../../lib/class.environment.php'); ?>
<?php $db = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']); ?>
<?php 
    session_start();
    $email_address = $_SESSION['key_session']['email_address'];
    $student_year = $_SESSION['key_session']['student_year'];
    extract($_POST);

    $sqlAttempt = "SELECT * FROM examinee_answer WHERE email_address ='$email_address' 
    AND student_year ='$student_year' 
    AND exam_category ='$thisId' 
    AND exam_answer_status ='Completed'";
    
?>