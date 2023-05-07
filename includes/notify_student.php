<?php require_once('./load.php'); ?>
<?php global $db; ?>
<?php 
    $student_id = $_GET['student_id'];
    $curr_date = date('Y-m-d H:i:s');
    $sqlUpdate = $db->query("UPDATE examinee SET counselor_notify_status='Re-assestment' WHERE student_id ='$student_id'");
    if ($sqlUpdate) {
        $sqlSelect = $db->query("SELECT * FROM notify_student WHERE student_id='$student_id'");
        if ($sqlSelect->num_rows > 0) {
            while ($row = $sqlSelect->fetch_assoc()) {
                $sqlInsert = $db->query("INSERT INTO notify_student(student_id, sender, receiver, `message`, user_level, notify_date, notify_status) VALUES(
                    '99999999',
                    '" .$_SESSION['key_session']['email_address']. "',
                    '" .$row['sender']. "',
                    'You can now re-take the exam. Good luck',
                    '" .$_SESSION['key_session']['user_level']. "',
                    '$curr_date',
                    'unread' )");
    
                    if ($sqlInsert) {

                        $sqlAttempt = $db->query("DELETE FROM examinee_attempt WHERE student_id='$student_id'");
                        $sqlExaminee = $db->query("DELETE FROM examinee_answer_v2 WHERE student_id='$student_id'");

                        if ($sqlAttempt && $sqlExaminee) {
                            $sqlDeleteStudent = $db->query("DELETE FROM student_exam_result WHERE student_id='$student_id'");
                            $sqlLastPart = $db->query("UPDATE examinee SET exam_answer='', total_answer='', total_score='', exam_result_status='Re-take' WHERE student_id='$student_id'");
                            if ($sqlLastPart && $sqlDeleteStudent) {
                                redirect('../app/counseling_records', false);
                            } else {
                                redirect('../app/dasboard', false);
                            }

                            
                        } else {
                            redirect('../app/dasboard', false);
                        }
                        
                    } else {
                        redirect('../app/dasboard', false);
                    }
            }
        } else {
            redirect('../app/dasboard', false);
        }       
    }
?>