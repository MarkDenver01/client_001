<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php global $db; ?>
<?php global $session; ?>
<?php 

  if(isset($_POST['button_apply'])) {
    $student_id = $_GET['student_id'];
    $id = $_SESSION['key_session']['student_id'];
    $name =$_SESSION['key_session']['name'];
    $email_address = $_SESSION['key_session']['email_address'];
    $curr_date = date('Y-m-d H:i:s');
    $name = $_SESSION['key_session']['name'];
    $student_name = $_POST['name'];
    $date_appointment_default = $_POST['date_counseling'];
    $time_picker = $_POST['time_counseling'];

    $date_appointment_formatted = date("Y/m/d",strtotime($date_appointment_default));
    $time_appointment_formatted = date("h:i:s a", strtotime($time_picker));
    $date_time_picker = $date_appointment_formatted. " " .$time_appointment_formatted;
    $test_msg = "";

    $sqlExist = $db->query("SELECT * FROM counseling_appointment WHERE student_name ='$student_name'");

    $sqlCheckAM = $db->query("SELECT * FROM counseling_appointment WHERE date(appointment_date) = '$date_appointment_formatted' AND time(appointment_date) BETWEEN '08:00:00' AND '12:00:00'");
    $sqlCheckPM = $db->query("SELECT * FROM counseling_appointment WHERE date(appointment_date) = '$date_appointment_formatted' AND time(appointment_date) BETWEEN '13:00:00' AND '17:00:00'");

if ($sqlCheckAM->num_rows > 0) {
    $session->message('w', 'No slot available on this morning.');
    redirect('./counseling', false);
} elseif ($sqlCheckPM->num_rows > 0) {
    $session->message('w', 'No slot available on this afternoon.');
    redirect('./counseling', false);
} else {
  $sqlInsert = $db->query("INSERT INTO counseling_appointment(student_name, appointment_date, slots_available) VALUES('$name', '$date_time_picker','1')");
  if ($sqlInsert) {
    $sqlUpdate = $db->query("UPDATE examinee SET counselor_notify_status ='Counseling' WHERE student_id='$id'");

    if ($sqlUpdate) {
      $sqlCheckAdmin = $db->query("SELECT `name`,email_address FROM user_account WHERE user_level ='1' OR user_level='2'");
      $email[] = array();
      while($row = $sqlCheckAdmin->fetch_assoc()) {
        $email[] = $row['email_address'];

        $subject = "Student's Appointment";
        $content = 'Hi Sir/Maam';
        $content .= '<br/>';
        $content .= '<br/>';
        $content .= 'Good day!';
        $content .= '<br/>';
        $content .= $_POST['message'];
        $content .= '<br/>';
        $content .= '---------------------------------------';
        $content .= '<br/>';
        $content .= 'Thank you.';
  
         // send mail account created
        $send = send_email(
          $row['email_address'],
          $row['name'],
          $subject,
          $content
        );
      }
      
      foreach ($email as $key) {
        $sqlNotify = $db->query("INSERT INTO notify_student(student_id, sender, receiver, `message`, user_level, notify_date, notify_status) 
        VALUES('$id','$email_address', '$key', '" .$_POST['message']. "','3','$curr_date','unread')");
      }

      if ($sqlNotify) {
        $session->message('s', 'Appointment success!');
        redirect('./counseling', false);
      }
    } else {
      $session->message('d', 'Unexpected issued occour');
      redirect('./counseling', false);
    }
  }
}

    


   // $sqlCheck = $db->query("SELECT SUM(slots_available) AS slots FROM counseling_appointment WHERE appointment_date='$date_appointment_formatted'");

    // if ($sqlCheck->num_rows > 0) {
    //   $row = $sqlCheck->fetch_assoc();
    //   $slots_available = $row['slots'];

    //   if($slots_available == 0 || $slots_available == "") {
    //       if(!$sqlExist->num_rows > 0) {
    //         $sqlInsert = $db->query("INSERT INTO counseling_appointment(student_name, appointment_date, slots_available) VALUES('$name','$date_appointment_formatted','1')");
    //         if($sqlInsert) {

    //           $sqlUpdate = $db->query("UPDATE examinee SET counselor_notify_status='Counseling' WHERE student_id ='$id'");
    //           if($sqlUpdate) {
    //             $session->message('s', 'Appointment Success!');
    //             redirect('./counseling', false);
    //           } else {
    //             $session->message('d', 'Unexpected issued occour');
    //             redirect('./counseling', false);
    //           }   

    //         } else {
    //           $session->message('d', 'Unexpected issued occour');
    //           redirect('./counseling', false);
    //         }
    //       } else {
    //         $sqlUpdateExist = $db->query("UPDATE counseling_appointment SET student_name ='$name', appointment_date ='$date_appointment_formatted', slots_available ='1' WHERE student_id='$id'");
    //         if ($sqlUpdateExist) {
    //           $sqlUpdateAgain = $db->query("UPDATE examinee SET counselor_notify_status='Counseling' WHERE student_id ='$id'");
    //           if ($sqlUpdateAgain) {
    //             $session->message('s', 'Appointment Success!');
    //             redirect('./counseling', false);
    //           } else {
    //             $session->message('d', 'Unexpected issued occour');
    //             redirect('./counseling', false);
    //           }
             
    //         } else {
    //           $session->message('d', 'Unexpected issued occour');
    //           redirect('./counseling', false);
    //         }    
    //       }
    //   } elseif($slots_available <= 5) {
    //     if(!$sqlExist->num_rows > 0) {
    //       $sqlInsert = $db->query("INSERT INTO counseling_appointment(student_name, appointment_date, slots_available) VALUES('$name','$date_appointment_formatted','1')");
    //       if($sqlInsert) {
    //        $sqlUpdate = $db->query("UPDATE examinee SET counselor_notify_status='Counseling' WHERE student_id ='$id'");
    //           if($sqlUpdate) {
    //             $session->message('s', 'Appointment Success!');
    //             redirect('./counseling', false);
    //           } else {
    //             $session->message('d', 'Unexpected issued occour');
    //             redirect('./counseling', false);
    //           }   
    //       } else {
    //         $session->message('d', 'Unexpected issued occour');
    //         redirect('./counseling', false);
    //       }
    //     } else {
    //         $sqlUpdateExist = $db->query("UPDATE counseling_appointment SET student_name ='$name', appointment_date ='$date_appointment_formatted', slots_available ='1' WHERE student_id='$id'");
    //         if ($sqlUpdateExist) {
    //           $sqlUpdateAgain = $db->query("UPDATE examinee SET counselor_notify_status='Counseling' WHERE student_id ='$id'");
    //           if ($sqlUpdateAgain) {
    //             $session->message('s', 'Appointment Success!');
    //             redirect('./counseling', false);
    //           } else {
    //             $session->message('d', 'Unexpected issued occour');
    //             redirect('./counseling', false);
    //           }
    //         } else {
    //           $session->message('d', 'Unexpected issued occour');
    //           redirect('./counseling', false);
    //         }   
    //     }
    //   } else {
    //     $session->message('w', 'Not available');
    //     redirect('./counseling', false);
    //   }
        
    // } else {
    //   $session->message('w', 'Unexpected error occour');
    //   redirect('./counseling', false);
    // }



  }
?>

<?php include('../start_menu_bar.php'); ?>
<main id="main" class="main">
  <div class="pagetitle">
  <h1>Apply schedule for Counseling</h1>
  </div><!-- End Page Title -->


<section class="section" style="width: 1360px;">
        <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
        <!-- start create account -->
        <div class="card rounded-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pt-4 pb-2">
                  <?php echo $test_msg; ?>
                  <span class="text-center"><?php echo display_message($msg); ?></span>
                </div>

                <form action="" method="POST" class="row g-3 needs-validation" novalidate>

                  <div class="col-3"></div>
                  <div class="col-6">

                    <label for="yourNewPassword" class="form-label">Name</label>
                    <div class="input-group has-validation">
                      <input class="form-control new_password rounded-0" type="text" name="name" id="yourNewPassword" value="<?php echo $_SESSION['key_session']['name']; ?>" readonly>
                    </div>
                    <br/>
                    <label for="yourNewPassword" class="form-label">Date of Counseling</label>
                    <div class="input-group has-validation">
                      <input class="form-control new_password rounded-0" type="date" name="date_counseling" id="yourNewPassword" required>
                    </div>
                    <br/>
                    <label for="yourNewPassword" class="form-label">Time</label>
                    <div class="input-group has-validation">
                      <input class="form-control new_password rounded-0" type="time" name="time_counseling" id="yourNewPassword" required>
                    </div>

                    <label for="present_address" class="col-md-4 col-lg-6 col-form-label">Message</label>
                      <div class="col-md-8 col-lg-12">
                        <textarea name="message" class="form-control rounded-0" id="present_address" style="height: 100px"></textarea>
                      </div>
                  </div>
                  <div class="col-3"></div>

                  

                  <div class="col-3">
                    
                  </div>
                  <div class="col-6">
                    <button name="button_apply" class="btn btn-primary w-100 rounded-0" type="submit">Submit</button>
                  </div>
                  <div class="col-3">
                  </div>
                </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end create account -->
        </div>
        <div class="col-lg-3"></div>
    
    </div>
</section>

<?php include('../footer.php'); ?>
