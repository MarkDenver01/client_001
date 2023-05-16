<?php require_once('./load.php'); ?>
<?php global $db; ?>
<?php global $session; ?>
<?php 
    $student_id = $_GET['student_id'];
    $curr_date = date('Y-m-d H:i:s');
    $sqlDelete = $db->query("DELETE FROM counseling_appointment WHERE student_id = '$student_id'");
    if ($sqlDelete) {
        $sqlSelect = $db->query("SELECT * FROM notify_student WHERE student_id='$student_id' AND notify_status='unread'");
        if ($sqlSelect->num_rows > 0) {
            while ($row = $sqlSelect->fetch_assoc()) {
                $student_email = $row['sender'];
            }
            
            $sqlInsert = $db->query("INSERT INTO notify_student(student_id, sender, receiver, `message`, user_level, notify_date, notify_status) VALUES(
                '99999999',
                '" .$_SESSION['key_session']['email_address']. "',
                '" .$student_email. "',
                'Sorry but the guidance counselor is busy. Please re-schedule for your counseling appointment. Thank you!',
                '" .$_SESSION['key_session']['user_level']. "',
                '$curr_date',
                'unread' )");

            if ($sqlInsert) {
                $session->message('s', 'Counseling appointment has been re-schedule by counselor.');
                redirect('../app/counseling_records', false);
            } else {
                $session->message('d', 'Unexpected error occur');
                redirect('../app/counseling_records', false);
            }
        }
    }
?>