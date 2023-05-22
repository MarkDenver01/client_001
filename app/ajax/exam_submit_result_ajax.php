<?php require_once('../../lib/class.environment.php'); ?>
<?php $db = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']); ?>
<?php 
    session_start();
    extract($_POST);
    $sqlExist = $db->query("SELECT * FROM examinee WHERE student_id ='" .$_SESSION['key_session']['student_id']. "' 
    AND exam_id='$exam_id' 
    AND exam_title='$exam_title' 
    AND exam_description ='$exam_desc' 
    AND exam_category ='$exam_type'");
    if($sqlExist->num_rows > 0) {
        $sqlUpdate = $db->query("INSERT INTO student_exam_result(
            student_no,
            student_id, 
            exam_id,
            `name`,
            email_address,
            student_year,
            semester,
            school_year,
            exam_title,
            course,
            gender,
            grades,
            exam_result) VALUES(
                '" .$_SESSION['key_session']['student_no']. "',
                '" .$_SESSION['key_session']['student_id']. "',
                '$exam_id',
                '".$_SESSION['key_session']['name']. "',
                '" .$_SESSION['key_session']['email_address']."',
                '" .$_SESSION['key_session']['student_year']. "',
                '" .$_SESSION['key_session']['academic_semester']. "',
                '" .$_SESSION['key_session']['academic_school_year']. "',
                '$exam_title',
                '" .$_SESSION['key_session']['course']. "',
                '" .$_SESSION['key_session']['gender']. "',
                '$total_score',
                '$exam_result_status')");
    //   $sqlUpdate = $db->query("UPDATE examinee SET 
    //   start_exam_date='$start_date', 
    //   exam_answer='$exam_answers', 
    //   total_answer='$total_answers', 
    //   total_score='$total_score',
    //   exam_result_status='Done',
    //   counselor_notify_status='Pending' WHERE student_id='" .$_SESSION['key_session']['student_id']. "' 
    //   AND exam_id='$exam_id' 
    //   AND exam_title ='$exam_title' 
    //   AND exam_description='$exam_desc' 
    //   AND exam_category ='$exam_type'");

      if($sqlUpdate) {
        $sqlUpdateV2 = $db->query("UPDATE student_exam_result 
        SET grades ='$total_score',
        exam_result ='$exam_result_status' WHERE student_id='" .$_SESSION['key_session']['student_id']. "' ");

        $sqlDeleteNotify = $db->query("DELETE FROM notify_student WHERE student_id ='" .$_SESSION['key_session']['student_id']. "'");
        $sqlCounselingAppointment = $db->query("DELETE FROM counseling_appointment WHERE student_id ='" .$_SESSION['key_session']['student_id']. "'");

        if ($sqlUpdateV2) {
            $res = array("res" => "success");
        } else {
            $res = array("res" => "failed");
        }
      }

    } else {

        $sqlInsert = $db->query("INSERT INTO student_exam_result(
            student_no,
            student_id, 
            exam_id,
            `name`,
            email_address,
            student_year,
            semester,
            school_year,
            exam_title,
            course,
            gender,
            grades,
            exam_result) VALUES(
                '" .$_SESSION['key_session']['student_no']. "',
                '" .$_SESSION['key_session']['student_id']. "',
                '$exam_id',
                '".$_SESSION['key_session']['name']. "',
                '" .$_SESSION['key_session']['email_address']."',
                '" .$_SESSION['key_session']['student_year']. "',
                '" .$_SESSION['key_session']['academic_semester']. "',
                '" .$_SESSION['key_session']['academic_school_year']. "',
                '$exam_title',
                '" .$_SESSION['key_session']['course']. "',
                '" .$_SESSION['key_session']['gender']. "',
                '$total_score',
                '$exam_result_status')");
        
        if ($sqlInsert) {
            $sql = $db->query("INSERT INTO examinee(student_no, student_id, exam_id, `name`, email_address, gender, course, semester, 
        school_year, student_year, exam_title, exam_description, exam_category, start_exam_date, exam_answer,total_answer,total_score, exam_result_status, counselor_notify_status) VALUES(
        '" .$_SESSION['key_session']['student_no']. "',
        '" .$_SESSION['key_session']['student_id']. "',
        '$exam_id',
        '" .$_SESSION['key_session']['name']. "',
        '" .$_SESSION['key_session']['email_address']. "',
        '" .$_SESSION['key_session']['gender']. "',
        '" .$_SESSION['key_session']['course']. "',
        '" .$_SESSION['key_session']['academic_semester']. "',
        '" .$_SESSION['key_session']['academic_school_year']. "',
        '" .$_SESSION['key_session']['student_year']. "',
        '$exam_title',
        '$exam_desc',
        '$exam_type',
        '$start_date',
        '$exam_answers',
        '$total_answer',
        '$total_score',
        'Done',
        'Pending')");
        
        if ($sql) {
            $res = array("res" => "success");
        } else {
            $res = array("res" => "failed");
        }

        } else {
            $res = array("res" => "failed");
        }
    }

    echo json_encode($res);
?>