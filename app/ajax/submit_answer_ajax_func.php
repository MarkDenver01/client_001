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

// || empty($txt_a_3) || empty($txt_a_33) || empty($tx_a_9) || empty($txt_a_39) || empty($txt_a_15) 
// || empty($txt_a_44) || empty($txt_a_21) || empty($txt_a_48) || empty($txt_a_50) || empty($txt_b_2) || empty($txt_b_32)
// || empty($txt_b_8) || empty($txt_b_38) || empty($txt_b_14) || empty($txt_b_43) || empty($txt_b_20) || empty($txt_b_47)
// || empty($txt_b_25) || empty($txt_b_51) || empty($txt_c_28) || empty($txt_c_4) || empty($txt_c_34) || empty($txt_c_10) 
// || empty($txt_c_40) || empty($txt_c_16) || empty($txt_c_45) || empty($txt_c_22) || empty($txt_d_29) || empty($txt_d_5) 
// || empty($txt_d_35) || empty($txt_d_11) || empty($txt_d_41) || empty($txt_d_17) || empty($tx_d_23) || empty($txt_e_1) 
// || empty($txt_e_31) || empty($txt_e_7) || empty($txt_e_37) || empty($txt_e_13) || empty($txt_e_42) || empty($txt_e_19) 
// || empty($txt_e_46) || empty($txt_e_49) || empty($txt_e_26) || empty($txt_g_30) || empty($txt_g_6) || empty($txt_g_36) 
// || empty($txt_g_12) || empty($txt_g_18) || empty($txt_g_24)

    if ($main_category == "BarOn EQ-i:S") {
        if (empty($txt_a_27)) {
            $res = array("res" => "emptyField");
        } else {
           if ($sql_attempt->num_rows > 0) {
                $res = array("res" => "alreadyExam");
            } elseif ($sql_ans->num_rows > 0) {
                $update_ans = $db->query("UPDATE examinee_answer_v2 SET exam_answer_status='Completed', exam_submitted ='$submitted' 
                WHERE student_id ='$student_id' AND exam_id ='$exam_id'");

                if ($update_ans) {
                    $sql = "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',27, 'a','$txt_a_27','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',3, 'a','$txt_a_3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',33, 'a','$txt_a_33','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',9, 'a','$txt_a_9','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',39, 'a','$txt_a_39','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',15, 'a','$txt_a_15','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',44, 'a','$txt_a_44','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',21, 'a','$txt_a_21','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',48, 'a','$txt_a_48','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',50, 'a','$txt_a_50','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',2, 'b','$txt_b_2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',32, 'b','$txt_b_32','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',8, 'b','$txt_b_8','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',38, 'b','$txt_b_38','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',14, 'b','$txt_b_14','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',43, 'b','$txt_b_43','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',20, 'b','$txt_b_20','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',47, 'b','$txt_b_47','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',25, 'b','$txt_b_25','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',51, 'b','$txt_b_51','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',28, 'c','$txt_c_28','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',4, 'c','$txt_c_4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',34, 'c','$txt_c_34','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',10, 'c','$txt_c_10','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',40, 'c','$txt_c_40','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',16, 'c','$txt_c_16','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',45, 'c','$txt_c_45','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',22, 'c','$txt_c_22','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',29, 'd','$txt_d_29','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',5, 'd','$txt_d_5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',35, 'd','$txt_d_35','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',11, 'd','$txt_d_11','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',41, 'd','$txt_d_41','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',23, 'd','$txt_d_23','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',1, 'e','$txt_e_1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',31, 'e','$txt_e_31','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',7, 'e','$txt_e_7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',37, 'e','$txt_e_37','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',13, 'e','$txt_e_13','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',42, 'e','$txt_e_42','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',19, 'e','$txt_e_19','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',46, 'e','$txt_e_46','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',49, 'e','$txt_e_49','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',26, 'e','$txt_e_26','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',30, 'g','$txt_g_30','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',6, 'g','$txt_g_6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',36, 'g','$txt_g_36','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',12, 'g','$txt_g_12','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',18, 'g','$txt_g_18','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',24, 'g','$txt_g_24','Completed',  '$submitted');";
                    $insert_ans = $db->multi_query($sql);
                }

                $insert_at = $db->query("INSERT INTO examinee_attempt(student_no, student_id, exam_id, exam_attempt_status) VALUES(
                    '$student_no','$student_id','$exam_id', 'Completed')");
                
                if ($insert_at) {
                    $res = array("res" => "success");
                } else {
                    $res = array("res" => "failed");
                }

                // if ($insert_ans) {
                //     $insert_at = $db->query("INSERT INTO examinee_attempt(student_no, student_id, exam_id, exam_attempt_status) VALUES(
                //         '$student_no','$student_id','$exam_id', 'Completed')");
                    
                //     if ($insert_at) {
                //         $res = array("res" => "success");
                //     } else {
                //         $res = array("res" => "failed");
                //     }
                // } else {
                //     $res = array("res" => "failed");
                // }
            } else {

                    $sql = "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',27, 'a','$txt_a_27','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',3, 'a','$txt_a_3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',33, 'a','$txt_a_33','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',9, 'a','$txt_a_9','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',39, 'a','$txt_a_39','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',15, 'a','$txt_a_15','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',44, 'a','$txt_a_44','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',21, 'a','$txt_a_21','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',48, 'a','$txt_a_48','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',50, 'a','$txt_a_50','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',2, 'b','$txt_b_2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',32, 'b','$txt_b_32','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',8, 'b','$txt_b_8','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',38, 'b','$txt_b_38','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',14, 'b','$txt_b_14','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',43, 'b','$txt_b_43','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',20, 'b','$txt_b_20','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',47, 'b','$txt_b_47','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',25, 'b','$txt_b_25','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',51, 'b','$txt_b_51','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',28, 'c','$txt_c_28','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',4, 'c','$txt_c_4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',34, 'c','$txt_c_34','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',10, 'c','$txt_c_10','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',40, 'c','$txt_c_40','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',16, 'c','$txt_c_16','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',45, 'c','$txt_c_45','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',22, 'c','$txt_c_22','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',29, 'd','$txt_d_29','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',5, 'd','$txt_d_5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',35, 'd','$txt_d_35','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',11, 'd','$txt_d_11','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',41, 'd','$txt_d_41','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',23, 'd','$txt_d_23','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',1, 'e','$txt_e_1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',31, 'e','$txt_e_31','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',7, 'e','$txt_e_7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',37, 'e','$txt_e_37','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',13, 'e','$txt_e_13','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',42, 'e','$txt_e_42','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',19, 'e','$txt_e_19','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',46, 'e','$txt_e_46','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',49, 'e','$txt_e_49','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',26, 'e','$txt_e_26','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',30, 'g','$txt_g_30','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',6, 'g','$txt_g_6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',36, 'g','$txt_g_36','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',12, 'g','$txt_g_12','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',18, 'g','$txt_g_18','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                        '$exam_id','$semester','$school_year',24, 'g','$txt_g_24','Completed',  '$submitted');";
                    $insert_ans = $db->multi_query($sql);

                    $insert_at = $db->query("INSERT INTO examinee_attempt(student_no, student_id, exam_id, exam_attempt_status) VALUES(
                        '$student_no','$student_id','$exam_id', 'Completed')");
                    
                    if ($insert_at) {
                        $res = array("res" => "success");
                    } else {
                        $res = array("res" => "failed");
                    }

                // if ($insert_ans) {
                //     $insert_at = $db->query("INSERT INTO examinee_attempt(student_no, student_id, exam_id, exam_attempt_status) VALUES(
                //         '$student_no','$student_id','$exam_id', 'Completed')");
                    
                //     if ($insert_at) {
                //         $res = array("res" => "success");
                //     } else {
                //         $res = array("res" => "failed");
                //     }
                // } else {
                //     $res = array("res" => "failed");
                // }
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