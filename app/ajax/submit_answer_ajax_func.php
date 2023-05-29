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
        if (empty($txt_a_27)) {
            $res = array("res" => "emptyField");
        } else {
           if ($sql_attempt->num_rows > 0) {
                $res = array("res" => "alreadyExam");
            } elseif ($sql_ans->num_rows > 0) {
                $update_ans = $db->query("UPDATE examinee_answer_v2 SET exam_answer_status='Completed', exam_submitted ='$submitted' 
                WHERE student_id ='$student_id' AND exam_id ='$exam_id'");

                if ($update_ans) {
                    $insert_at = $db->query("INSERT INTO examinee_attempt(student_no, student_id, exam_id, exam_attempt_status) VALUES(
                        '$student_no','$student_id','$exam_id', 'Completed')");
                }

                if ($insert_at) {
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
                        '$exam_id','$semester','$school_year',17, 'd','$txt_d_17','Completed',  '$submitted');";
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
                
                    if ($insert_ans) {
                        $res = array("res" => "success");
                    } else {
                        $res = array("res" => "failed");
                    }
                } else {
                    $res = array("res" => "failed");
                }
            } else {
                $insert_at = $db->query("INSERT INTO examinee_attempt(student_no, student_id, exam_id, exam_attempt_status) VALUES(
                    '$student_no','$student_id','$exam_id', 'Completed')");
                
                if ($insert_at) {
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

                if ($insert_ans) {
                    $res = array("res" => "success");
                } else {
                    $res = array("res" => "failed");
                }
            }
        }
    } elseif ($main_category == "The Keirsey Temerament Sorter") {
        if (empty($rbo_k_1) || empty($rbo_k_2) || empty($rbo_k_3) || empty($rbo_k_4) || empty($rbo_k_5) || empty($rbo_k_6) || empty($rbo_k_7) || 
        empty($rbo_k_8) || empty($rbo_k_9) || empty($rbo_k_10) || empty($rbo_k_11) || empty($rbo_k_12) || empty($rbo_k_13) || empty($rbo_k_14) ||
        empty($rbo_k_15) || empty($rbo_k_16) || empty($rbo_k_17) || empty($rbo_k_18) || empty($rbo_k_19) || empty($rbo_k_20) || empty($rbo_k_21) ||
        empty($rbo_k_22) || empty($rbo_k_23) || empty($rbo_k_24) || empty($rbo_k_25) || empty($rbo_k_26) || empty($rbo_k_27) || empty($rbo_k_28) ||
        empty($rbo_k_29) || empty($rbo_k_30) || empty($rbo_k_31) || empty($rbo_k_32) || empty($rbo_k_33) || empty($rbo_k_34) || empty($rbo_k_35) ||
        empty($rbo_k_36) || empty($rbo_k_37) || empty($rbo_k_38) || empty($rbo_k_39) || empty($rbo_k_40) || empty($rbo_k_41) || empty($rbo_k_42) ||
        empty($rbo_k_43) || empty($rbo_k_44) || empty($rbo_k_45) || empty($rbo_k_46) || empty($rbo_k_47) || empty($rbo_k_48) || empty($rbo_k_49) ||
        empty($rbo_k_50) || empty($rbo_k_51) || empty($rbo_k_52) || empty($rbo_k_53) || empty($rbo_k_54) || empty($rbo_k_55) || empty($rbo_k_56) ||
        empty($rbo_k_57) || empty($rbo_k_58) || empty($rbo_k_59) || empty($rbo_k_60) || empty($rbo_k_61) || empty($rbo_k_62) || empty($rbo_k_63) ||
        empty($rbo_k_64) || empty($rbo_k_65) || empty($rbo_k_66) || empty($rbo_k_67) || empty($rbo_k_68) || empty($rbo_k_69) || empty($rbo_k_70)) {
            $res = array("res" => "emptyField");
        } else {
            if ($sql_attempt->num_rows > 0) {
                $res = array("res" => "alreadyExam");
            } elseif ($sql_ans->num_rows > 0) {
                $update_ans = $db->query("UPDATE examinee_answer_v2 SET exam_answer_status='Completed', exam_submitted ='$submitted' 
                WHERE student_id ='$student_id' AND exam_id ='$exam_id'");

                if ($update_ans) {
                    $insert_at = $db->query("INSERT INTO examinee_attempt(student_no, student_id, exam_id, exam_attempt_status) VALUES(
                        '$student_no','$student_id','$exam_id', 'Completed')");
                }

                if ($insert_at) {
                    $sql = "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',1, '$rbo_k_1','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',8, '$rbo_k_8','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',15, '$rbo_k_15','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',22, '$rbo_k_22','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',29, '$rbo_k_29','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',36, '$rbo_k_36','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',43, '$rbo_k_43','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',50, '$rbo_k_50','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',57, '$rbo_k_57','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',64, '$rbo_k_64','1','Completed',  '$submitted');";  
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',2, '$rbo_k_2','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',9, '$rbo_k_9','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',16, '$rbo_k_16','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',23, '$rbo_k_23','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',30, '$rbo_k_30','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',37, '$rbo_k_37','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',44, '$rbo_k_44','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',51, '$rbo_k_51','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',58, '$rbo_k_58','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',65, '$rbo_k_65','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',3, '$rbo_k_3','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',10, '$rbo_k_10','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',17, '$rbo_k_17','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',24, '$rbo_k_24','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',31, '$rbo_k_31','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',38, '$rbo_k_38','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',45, '$rbo_k_45','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',52, '$rbo_k_52','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',59, '$rbo_k_59','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',66, '$rbo_k_66','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',4, '$rbo_k_4','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',11, '$rbo_k_11','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',18, '$rbo_k_18','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',25, '$rbo_k_25','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',32, '$rbo_k_32','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',39, '$rbo_k_39','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',46, '$rbo_k_46','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',53, '$rbo_k_53','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',60, '$rbo_k_60','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',67, '$rbo_k_67','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',5, '$rbo_k_5','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',12, '$rbo_k_12','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',19, '$rbo_k_19','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',26, '$rbo_k_26','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',33, '$rbo_k_33','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',40, '$rbo_k_40','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',47, '$rbo_k_47','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',54, '$rbo_k_54','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',61, '$rbo_k_61','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',68, '$rbo_k_68','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',6, '$rbo_k_6','6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',13, '$rbo_k_13','6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',20, '$rbo_k_20','6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',27, '$rbo_k_27','6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',34, '$rbo_k_34','6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',41, '$rbo_k_41','6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',48, '$rbo_k_48','6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',55, '$rbo_k_55','6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',62, '$rbo_k_62','6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',69, '$rbo_k_69','6','Completed',  '$submitted');";                         
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',7, '$rbo_k_7','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',14, '$rbo_k_14','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',21, '$rbo_k_21','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',28, '$rbo_k_28','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',35, '$rbo_k_35','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',42, '$rbo_k_42','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',49, '$rbo_k_49','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',56, '$rbo_k_56','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',63, '$rbo_k_63','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',70, '$rbo_k_70','7','Completed',  '$submitted');";
                    $insert_ans = $db->multi_query($sql);
                }

                if ($insert_ans) {
                    $res = array("res" => "success");
                } else {
                    $res = array("res" => "failed");
                }
            } else {
                $insert_at = $db->query("INSERT INTO examinee_attempt(student_no, student_id, exam_id, exam_attempt_status) VALUES(
                    '$student_no','$student_id','$exam_id', 'Completed')");
                
                if ($insert_at) {
                    $sql = "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',1, '$rbo_k_1','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',8, '$rbo_k_8','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',15, '$rbo_k_15','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',22, '$rbo_k_22','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',29, '$rbo_k_29','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',36, '$rbo_k_36','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',43, '$rbo_k_43','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',50, '$rbo_k_50','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',57, '$rbo_k_57','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',64, '$rbo_k_64','1','Completed',  '$submitted');";  
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',2, '$rbo_k_2','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',9, '$rbo_k_9','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',16,'$rbo_k_16','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',23,'$rbo_k_23','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',30,'$rbo_k_30','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',37,'$rbo_k_37','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',44,'$rbo_k_44','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',51,'$rbo_k_51','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',58, '$rbo_k_58','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',65, '$rbo_k_65','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',3, '$rbo_k_3','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',10, '$rbo_k_10','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',17, '$rbo_k_17','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',24, '$rbo_k_24','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',31, '$rbo_k_31','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',38, '$rbo_k_38','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',45, '$rbo_k_45','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',52, '$rbo_k_52','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',59, '$rbo_k_59','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',66, '$rbo_k_66','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',4, '$rbo_k_4','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',11, '$rbo_k_11','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',18, '$rbo_k_18','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',25, '$rbo_k_25','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',32, '$rbo_k_32','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',39, '$rbo_k_39','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',46, '$rbo_k_46','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',53, '$rbo_k_53','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',60, '$rbo_k_60','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',67, '$rbo_k_67','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',5, '$rbo_k_5','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',12, '$rbo_k_12','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',19, '$rbo_k_19','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',26, '$rbo_k_26','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',33, '$rbo_k_33','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',40, '$rbo_k_40','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',47, '$rbo_k_47','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',54, '$rbo_k_54','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',61, '$rbo_k_61','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',68, '$rbo_k_68','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',6, '$rbo_k_6','6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',13, '$rbo_k_13','6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',20, '$rbo_k_20','6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',27, '$rbo_k_27','6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',34, '$rbo_k_34','6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',41, '$rbo_k_41','6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',48, '$rbo_k_48','6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',55, '$rbo_k_55','6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',62, '$rbo_k_62','6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',69, '$rbo_k_69','6','Completed',  '$submitted');";                         
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',7, '$rbo_k_7','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',14, '$rbo_k_14','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',21, '$rbo_k_21','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',28, '$rbo_k_28','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',35, '$rbo_k_35','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',42, '$rbo_k_42','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',49, '$rbo_k_49','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',56, '$rbo_k_56','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',63, '$rbo_k_63','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',70, '$rbo_k_70','7','Completed',  '$submitted');";
                    $insert_ans = $db->multi_query($sql);
                }
                if ($insert_ans) {
                    $res = array("res" => "success");
                } else {
                    $res = array("res" => "failed");
                }
            }
        }
    } elseif ($main_category == "ESA") {
        if (empty($rbo_w_1) || empty($rbo_w_2) || empty($rbo_w_3) || empty($rbo_w_4) || empty($rbo_w_5) || empty($rbo_w_6) || empty($rbo_w_7) || 
        empty($rbo_w_8) || empty($rbo_w_9) || empty($rbo_w_10) || empty($rbo_w_11) || empty($rbo_w_12) || empty($rbo_w_13) || empty($rbo_w_14) ||
        empty($rbo_w_15) || empty($rbo_w_16) || empty($rbo_w_17) || empty($rbo_w_18) || empty($rbo_w_19) || empty($rbo_w_20) || empty($rbo_w_21) ||
        empty($rbo_w_22) || empty($rbo_w_23) || empty($rbo_w_24) || empty($rbo_w_25) || empty($rbo_w_26) || empty($rbo_w_27) || empty($rbo_w_28) ||
        empty($rbo_w_29) || empty($rbo_w_30) || empty($rbo_w_31) || empty($rbo_w_32)) {
            $res = array("res" => "emptyField");
        } else {
            if ($sql_attempt->num_rows > 0) {
                $res = array("res" => "alreadyExam");
            } elseif ($sql_ans->num_rows > 0) {
                $update_ans = $db->query("UPDATE examinee_answer_v2 SET exam_answer_status='Completed', exam_submitted ='$submitted' 
                WHERE student_id ='$student_id' AND exam_id ='$exam_id'");

                if ($update_ans) {
                    $insert_at = $db->query("INSERT INTO examinee_attempt(student_no, student_id, exam_id, exam_attempt_status) VALUES(
                        '$student_no','$student_id','$exam_id', 'Completed')");
                }

                if ($insert_at) {
                    $sql = "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',1, '$rbo_w_1','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',13, '$rbo_w_13','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',21, '$rbo_w_21','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',31, '$rbo_w_31','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',7, '$rbo_w_7','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',14, '$rbo_w_14','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',18, '$rbo_w_18','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',19, '$rbo_w_19','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',23, '$rbo_w_23','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',6, '$rbo_w_6','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',10, '$rbo_w_10','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',17, '$rbo_w_17','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',22, '$rbo_w_22','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',3, '$rbo_w_3','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',11, '$rbo_w_11','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',15, '$rbo_w_15','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',30, '$rbo_w_30','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',2, '$rbo_w_2','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',5, '$rbo_w_5','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',12, '$rbo_w_12','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',29, '$rbo_w_29','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',4, '$rbo_w_4','6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',8, '$rbo_w_8','6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',32, '$rbo_w_32','6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',20, '$rbo_w_20','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',24, '$rbo_w_24','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',26, '$rbo_w_26','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',27, '$rbo_w_27','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',9, '$rbo_w_9','8','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',16, '$rbo_w_16','8','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',25, '$rbo_w_25','8','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',28, '$rbo_w_28','8','Completed',  '$submitted');";
                    $insert_ans = $db->multi_query($sql);
                }
                if ($insert_ans) {
                    $res = array("res" => "success");
                } else {
                    $res = array("res" => "failed");
                }
            } else {
                $insert_at = $db->query("INSERT INTO examinee_attempt(student_no, student_id, exam_id, exam_attempt_status) VALUES(
                    '$student_no','$student_id','$exam_id', 'Completed')");

                if ($insert_at) {
                    $sql = "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',1, '$rbo_w_1','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',13, '$rbo_w_13','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',21, '$rbo_w_21','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',31, '$rbo_w_31','1','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',7, '$rbo_w_7','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',14, '$rbo_w_14','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',18, '$rbo_w_18','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',19, '$rbo_w_19','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',23, '$rbo_w_23','2','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',6, '$rbo_w_6','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',10, '$rbo_w_10','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',17, '$rbo_w_17','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',22, '$rbo_w_22','3','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',3, '$rbo_w_3','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',11, '$rbo_w_11','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',15, '$rbo_w_15','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',30, '$rbo_w_30','4','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',2, '$rbo_w_2','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',5, '$rbo_w_5','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',12, '$rbo_w_12','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',29, '$rbo_w_29','5','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',4, '$rbo_w_4','6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',8, '$rbo_w_8','6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',32, '$rbo_w_32','6','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',20, '$rbo_w_20','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',24, '$rbo_w_24','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',26, '$rbo_w_26','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',27, '$rbo_w_27','7','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',9, '$rbo_w_9','8','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',16, '$rbo_w_16','8','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',25, '$rbo_w_25','8','Completed',  '$submitted');";
                    $sql .= "INSERT INTO examinee_answer_v2(student_no, student_id, exam_id, semester, school_year, exam_item_no, exam_correct_answer, exam_answer, exam_answer_status, exam_submitted) VALUES('$student_no', '$student_id',
                    '$exam_id','$semester','$school_year',28, '$rbo_w_28','8','Completed',  '$submitted');";
                    $insert_ans = $db->multi_query($sql);
                } 
                if ($insert_ans) {
                    $res = array("res" => "success");
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