<?php require_once('../../lib/class.environment.php'); ?>
<?php $db = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']); ?>
<?php 
    session_start();
    extract($_POST);
    $student_id = $_SESSION['key_session']['student_id'];
    $student_no = $_SESSION['key_session']['student_no'];
    $semester = $_SESSION['key_session']['academic_semester'];
    $school_year = $_SESSION['key_session']['academic_school_year'];
    $submitted = date('Y-m-d h:i:s A');

    $sql_attempt = $db->query("SELECT * FROM examinee_attempt WHERE student_id ='$student_id'
    AND exam_id ='$exam_id'");
    
    $sql_ans = $db->query("SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' 
    AND exam_id = '$exam_id'");

    if ($main_category == "BarOn EQ-i:S") {
        if (empty($txt_a_27) || empty($txt_a_3) || empty($txt_a_33) || empty($tx_a_9) || empty($txt_a_39) || empty($txt_a_15) 
        || empty($txt_a_44) || empty($txt_a_21) || empty($txt_a_48) || empty($txt_a_50) || empty($txt_b_2) || empty($txt_b_32)
        || empty($txt_b_8) || empty($txt_b_38) || empty($txt_b_14) || empty($txt_b_43) || empty($txt_b_20) || empty($txt_b_47)
        || empty($txt_b_25) || empty($txt_b_51) || empty($txt_c_28) || empty($txt_c_4) || empty($txt_c_34) || empty($txt_c_10) 
        || empty($txt_c_40) || empty($txt_c_16) || empty($txt_c_45) || empty($txt_c_22) || empty($txt_d_29) || empty($txt_d_5) 
        || empty($txt_d_35) || empty($txt_d_11) || empty($txt_d_41) || empty($txt_d_17) || empty($tx_d_23) || empty($txt_e_1) 
        || empty($txt_e_31) || empty($txt_e_7) || empty($txt_e_37) || empty($txt_e_13) || empty($txt_e_42) || empty($txt_e_19) 
        || empty($txt_e_46) || empty($txt_e_49) || empty($txt_e_26) || empty($txt_g_30) || empty($txt_g_6) || empty($txt_g_36) 
        || empty($txt_g_12) || empty($txt_g_18) || empty($txt_g_24)) {
            $res = array("res" => "emptyField");
        } else {
           if ($sql_attempt->num_rows > 0) {
                $res = array("res" => "alreadyExam");
            } elseif ($sql_ans->num_rows > 0) {
                $update_ans = $db->query("UPDATE examinee_answer_v2 SET exam_answer_status='Completed', exam_submitted ='$submitted' 
                WHERE student_id ='$student_id' AND exam_id ='$exam_id'");

                // TODO update the answer here
                if ($update_ans) {
                
                }

                if ($insert_ans) {
                    $insert_at = $db->query("INSERT INTO examinee_attempt(student_no, student_id, exam_id, exam_attempt_status) VALUES(
                        '$student_no','$student_id','$exam_id', 'Completed')");
                    
                    if ($insert_at) {
                        $res = array("res" => "success");
                    } else {
                        $res = array("res" => "failed");
                    }
                } else {
                    $res = array("res" => "failed");
                }
            } else {

                // TODO update the answer here

                if ($insert_ans) {
                    $insert_at = $db->query("INSERT INTO examinee_attempt(student_no, student_id, exam_id, exam_attempt_status) VALUES(
                        '$student_no','$student_id','$exam_id', 'Completed')");
                    
                    if ($insert_at) {
                        $res = array("res" => "success");
                    } else {
                        $res = array("res" => "failed");
                    }
                } else {
                    $res = array("res" => "failed");
                }
            }
        }
    } else {
        $isproceed = false;
        foreach($_REQUEST['answer'] as $key => $value) {
          if (empty($value['correct_items'])) {
            $isproceed = true;
            break;
          }
        }

        if ($isproceed) {
            $res = array("res" => "emptyField");
        } else {
            if ($sql_attempt->num_rows > 0) {
                $res = array("res" => "alreadyExam");
            } elseif ($sql_ans->num_rows > 0) {
                $update_ans = $db->query("UPDATE examinee_answer_v2 SET exam_answer_status='Completed', exam_submitted ='$submitted' 
                WHERE student_id ='$student_id' AND exam_id ='$exam_id'");
                if ($update_ans) {
                    foreach($_REQUEST['answer'] as $key => $value) {
                        $correct_items = $value['item_correct'];
                        $value = $value['correct_items'];
                        $insert_ans = $db->query("INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, 
                        school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES(
                        '$student_no',
                        '$student_id',
                        '$exam_id',
                        '$semester',
                        '$school_year',
                        '$key',
                        '$correct_items',
                        '$value',
                        'Completed',
                        '$submitted')");
                    }
                    if ($insert_ans) {
                        $insert_at = $db->query("INSERT INTO examinee_attempt(student_no, student_id, exam_id, exam_attempt_status) VALUES(
                            '$student_no','$student_id','$exam_id', 'Completed')");
                        
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
                foreach($_REQUEST['answer'] as $key => $value) {
                    $correct_items = $value['item_correct'];
                    $value = $value['correct_items'];
                    $insert_ans = $db->query("INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, 
                    school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES(
                    '$student_no',
                    '$student_id',
                    '$exam_id',
                    '$semester',
                    '$school_year',
                    '$key',
                    '$correct_items',
                    '$value',
                    'Completed',
                    '$submitted')");
                }
                if ($insert_ans) {
                    $insert_at = $db->query("INSERT INTO examinee_attempt(student_no, student_id, exam_id, exam_attempt_status) VALUES(
                        '$student_no','$student_id','$exam_id', 'Completed')");
                    
                    if ($insert_at) {
                        $res = array("res" => "success");
                    } else {
                        $res = array("res" => "failed");
                    }
                } else {
                    $res = array("res" => "failed");
                }
            }
        }

    }

    echo json_encode($res);
?>