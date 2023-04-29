<?php require_once('../../lib/class.environment.php'); ?>
<?php $db = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']); ?>
<?php 
    session_start();
    extract($_POST);
    $student_id = $_SESSION['key_session']['student_id'];
    $semester = $_SESSION['key_session']['academic_semester'];
    $school_year = $_SESSION['key_session']['academic_school_year'];
    $submitted = date('Y-m-d h:i:s A');

    $sql_attempt = $db->query("SELECT * FROM examinee_attempt WHERE student_id ='$student_id'
    AND exam_id ='$exam_id'");
    
    $sql_ans = $db->query("SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' 
    AND exam_id = '$exam_id'");

    if ($sql_attempt->num_rows > 0) {
        $res = array("res" => "alreadyExam");
    } elseif ($sql_ans->num_rows > 0) {
        $update_ans = $db->query("UPDATE examinee_answer_v2 SET exam_answer_status='old', exam_submitted ='$submitted' 
        WHERE student_id ='$student_id' AND exam_id ='$exam_id'");
        if ($update_ans) {
            foreach($_REQUEST['answer'] as $key => $value) {
                $value = $value['correct'];
                $insert_ans = $db->query("INSERT INTO examinee_answer_status(student_id, exam_id, semester, 
                school_year, exam_item_no, exam_answer) VALUES( 
                '$student_id',
                '$exam_id',
                '$semester,
                '$school_year',
                '$key',
                '$value')");
            }
            if ($insert_ans) {
                $insert_at = $db->query("INSERT INTO examinee_attempt(student_id, exam_id) VALUES(
                    '$student_id','$exam_id')");
                if ($insert_at) {
                    $res = array("res" => "success");
                } else {    
                    $res = array("res" => "failed");
                }           
            } else {
                $res = array("res" => "failed");
            }
        }
    } else {
        foreach ($_REQUEST['answer'] as $key => $value) {
            $value = $value['correct'];
            $insert_ans = $db->query("INSERT INTO examinee_answer_status(student_id, exam_id, semester, 
                school_year, exam_item_no, exam_answer) VALUES( 
                '$student_id',
                '$exam_id',
                '$semester,
                '$school_year',
                '$key',
                '$value')");
        }
        if ($insert_ans) {
            $insert_at = $db->query("INSERT INTO examinee_attempt(student_id, exam_id) VALUES(
                '$student_id','$exam_id')");
            
            if ($insert_at) {
                $res = array("res" => "success");
            } else {
                $res = array("res" => "failed");
            }
        } else {
            $res = array("res" => "failed");
        }
    }

    // $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_answer_status ='Completed'";
    // $result = $db->query($sql);
    // if ($result->num_rows > 0) {
    //     $res = array("res" => "alreadyExam");
    // } else {
    //     $sql = "INSERT INTO examinee_answer_v2(
    //         student_id, exam_id, semester, school_year, exam_item_no, 
    //         exam_correct_answer,  exam_answer, exam_answer_status, exam_submitted) VALUES(
    //         '$student_id',
    //         '$exam_id',
    //         '$semester',
    //         '$school_year',
    //         '',
    //         '$row[$i]',
    //         '$answer',
    //         'Completed',
    //         '$submitted')";
    //     $db->query($sql);
    //     $res = array("res" => "success");
    // }
    echo json_encode($res);
?>