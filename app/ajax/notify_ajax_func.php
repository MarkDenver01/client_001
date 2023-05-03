<?php require_once('../../lib/class.environment.php'); ?>
<?php $db = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']); ?>
<?php 
    session_start();
    extract($_POST);
    $submitted = date('Y-m-d h:i:s A');
    $sql = $db->query("UPDATE examinee SET counselor_notify_status ='Notified' WHERE student_id='$thisId'");
    if ($sql) {
        $sqlInsert = $db->query("INSERT INTO notify_student(student_id, `message`, notify_date, notify_status) VALUES( 
        '$thisId',
        'Please visit to the guidance office for counseling. Thank you',
        '$submitted',
        'unread')");
        if ($sqlInsert) {

            // $sqlSelect = "SELECT * FROM examinee WHERE student_id ='$thisId'";
            // $result = $db->query($sqlSelect);
            // if ($db->num_rows($result)) {
            //      $exams = $db->fetch_assoc($result);
            //      $get_mail_address = $exams['email_address'];
            //      $get_name = $exams['name'];
            // }

            // $subject = "You've received an email from Guidance Counselor";
            // $content = 'Hi ' .$get_name;
            // $content .= '<br/>';
            // $content .= 'We would like to inform you that you need to go in Guidance office for counseling. Thank you!';
            // $content .= '<br/>';

            // // send mail account created
            // $send = send_email(
            //   $get_mail_address,
            //   $get_name,
            //   $subject,
            //   $content
            // );
      
            // if ($send) {
            //     $res = array("res" => "success");
            // } else {
            //     $res = array("res" => "failed");
            // }

            $sqlTruncate1 = $db->query("TRUNCATE TABLE examinee_attempt");
            $sqlRetake = $db->query("TRUNCATE TABLE examinee_answer_v2");
            if($sqlTruncate1 && $sqlRetake ) {
                $res = array("res" => "success");
            } else {
                $res = array("res" => "failed");
            }     
            
        } else {
            $res = array("res" => "failed");
        }

    } else {
        $res = array("res" => "failed");
    }
    
    echo json_encode($res);
?>