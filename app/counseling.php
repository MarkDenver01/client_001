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
    $curr_date = date('Y-m-d H:i:s');
    $name = $_SESSION['key_session']['name'];
    $student_name = $_POST['name'];
    $date_appointment_default = $_POST['date_counseling'];
    $date_appointment_formatted = date("Y-m-d h:i:s a",strtotime($date_appointment_default));
    $test_msg = "";

    $sqlExist = $db->query("SELECT * FROM counseling_appointment WHERE student_name ='$student_name'");

    $sqlCheck = $db->query("SELECT SUM(slots_available) AS slots FROM counseling_appointment WHERE appointment_date='$date_appointment_formatted'");

    if ($sqlCheck->num_rows > 0) {
      $row = $sqlCheck->fetch_assoc();
      $slots_available = $row['slots'];

      if($slots_available == 0 || $slots_available == "") {
          if(!$sqlExist->num_rows > 0) {
            $sqlInsert = $db->query("INSERT INTO counseling_appointment(student_name, appointment_date, slots_available) VALUES('$name','$date_appointment_formatted','1')");
            if($sqlInsert) {

              $sqlUpdate = $db->query("UPDATE examinee SET counselor_notify_status='Counseling Appointment' WHERE student_id ='$id'");
              if($sqlUpdate) {

                $session->message('s', 'Appointment Success!');
                redirect('./counseling', false);
              } else {
                $session->message('d', 'Unexpected issued occour');
                redirect('./counseling', false);
              }   

            } else {
              $session->message('d', 'Unexpected issued occour');
              redirect('./counseling', false);
            }
          } else {
            $session->message('w', 'Already exist');
            redirect('./counseling', false);
          }
      } elseif($slots_available <= 5) {
        if(!$sqlExist->num_rows > 0) {
          $sqlInsert = $db->query("INSERT INTO counseling_appointment(student_name, appointment_date, slots_available) VALUES('$name','$date_appointment_formatted','1')");
          if($sqlInsert) {
           $sqlUpdate = $db->query("UPDATE examinee SET counselor_notify_status='Counseling Appointment' WHERE student_id ='$id'");
              if($sqlUpdate) {
                $session->message('s', 'Appointment Success!');
                redirect('./counseling', false);
              } else {
                $session->message('d', 'Unexpected issued occour');
                redirect('./counseling', false);
              }   
          } else {
            $session->message('d', 'Unexpected issued occour');
            redirect('./counseling', false);
          }
        } else {
          $session->message('w', 'Already exist');
          redirect('./counseling', false);
        }
      } else {
        $session->message('w', 'Not available');
        redirect('./counseling', false);
      }
        
    } else {
      $session->message('w', 'Unexpected error occour');
      redirect('./counseling', false);
    }



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
                  </div>
                  <div class="col-3"></div>

                  

                  <div class="col-3">
                    
                  </div>
                  <div class="col-6">
                    <button name="button_apply" class="btn btn-primary w-100 rounded-0" type="submit">Apply</button>
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
