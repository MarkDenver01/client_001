<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>

<?php include('../start_menu_bar.php'); ?>
<?php global $db; ?>
<?php global $session; ?>
<?php $developer = false; ?>
<?php 
if($developer) {
  if(isset($_POST['developer_button'])) {
    $sql1 = $db->query("TRUNCATE TABLE examinee");
    $sql2= $db->query("TRUNCATE TABLE examinee_answer_v2");
    $sql3 = $db->query("TRUNCATE TABLE examinee_attempt");
    $sql4 = $db->query("TRUNCATE TABLE counseling_appointment");
    $sql5 = $db->query("TRUNCATE TABLE exam_created");
    $session->message('s', 'DBs Truncated...');
  }
}
?>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
   <?php if (isset($_SESSION['key_session']['user_level']) && ($_SESSION['key_session']['user_level'] == '1' || $_SESSION['key_session']['user_level'] == '2')) { ?>
    <div class="row">

    <!-- Left side columns -->
<div class="col-lg-8">
    <div class="row">
      <div class="col-lg-12">
        <?php echo display_message($msg); ?>
        <?php if($developer) { ?>
        <form method="POST">
          <button name="developer_button" class="btn btn-lg btn-success rounded-0">DEVELOPER SIDE</button>
        </form>
        <?php } ?>
      </div>
    </div>

    <div class="row"> 


    <?php global $db; ?>
        <?php global $session; ?>
        <?php 
          $sql = "SELECT COUNT(*) AS total_count FROM student_exam_result";
          $result = $db->query($sql);
          $row = mysqli_fetch_assoc($result);
        
        ?>

    <!-- Counseling Card -->
    <div class="col-xxl-6 col-md-6">
      <div class="card info-card customers-card rounded-0">
        <div class="card-body">
          <h5 class="card-title">Counseling <span>| cases</span></h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri-hammer-line"></i>
            </div>
            <div class="ps-3">
              <h6><?php echo $row['total_count']; ?></h6>
              <span class="text-success small pt-1 fw-bold"><?php echo $row['total_count'];  ?></span> <span class="text-muted small pt-2 ps-1">increase</span>

            </div>
          </div>
        </div>

      </div>
    </div><!-- End Counseling Card -->

    <!-- Students Card -->
    <div class="col-xxl-6 col-md-6">
      <div class="card info-card customers-card rounded-0">
        <?php global $db; ?>
        <?php 
          $sql = "SELECT count(*) as total FROM student_info";
          $result = $db->query($sql);
          $read = mysqli_fetch_assoc($result);
          $read_avg = $read['total'] * 2 / 5;
        ?>
        <div class="card-body ">
          <h5 class="card-title">Students <span>| on Record</span></h5>

          <div class="d-flex align-items-center ">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri-file-user-fill"></i>
            </div>
            <div class="ps-3">
              <h6><?php echo $read['total']; ?></h6>
              <span class="text-success small pt-1 fw-bold"><?php echo $read_avg.'%'; ?></span> <span class="text-muted small pt-2 ps-1">increase</span>

            </div>
          </div>
        </div>

      </div>
    </div><!-- End Students Card -->

    <!-- Number of visits Card -->
    <div class="col-xxl-6 col-md-6">

      <div class="card info-card revenue-card rounded-0">

      <?php global $db; ?>
        <?php global $session; ?>
        <?php 
          $sql = "SELECT COUNT(*) AS student_take FROM student_exam_result WHERE student_year ='First Year'";
          $result = $db->query($sql);
          $row = mysqli_fetch_assoc($result);
          $student_take = $row['student_take'];

          $sql1 = "SELECT COUNT(*) AS student_count FROM student_info WHERE student_year ='First Year'";
          $result1 = $db->query($sql1);
          $row1 = mysqli_fetch_assoc($result1);
          $student_count = $row1['student_count'];
        
        ?>
        <div class="card-body">
          <h5 class="card-title">Exam Already Taken <span>| First Year</span></h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri-chat-check-line"></i>
            </div>
            <div class="ps-3">
              <h6><?php echo $row['student_take']; ?></h6>
              <span class="text-success small pt-1 fw-bold"><?php echo $row['student_take']. " out of " .$row1['student_count']; ?></span> <span class="text-muted small pt-2 ps-1">result</span>

            </div>
          </div>

        </div>
      </div>

    </div><!-- End number of visits Card -->

    <!-- Number of visits Card -->
    <div class="col-xxl-6 col-md-6">
    <?php global $db; ?>
        <?php global $session; ?>
        <?php 
          $sql = "SELECT DISTINCT COUNT(*) AS student_take FROM student_exam_result WHERE student_year ='First Year'";
          $result = $db->query($sql);
          $row = mysqli_fetch_assoc($result);
          $student_take = $row['student_take'];

          $sql1 = "SELECT COUNT(*) AS student_count FROM student_info WHERE student_year ='First Year'";
          $result1 = $db->query($sql1);
          $row1 = mysqli_fetch_assoc($result1);
          $student_count = $row1['student_count'];

          $not_take = $student_count - $student_take
        
        ?>
      <div class="card info-card customers-card rounded-0">

        <div class="card-body">
          <h5 class="card-title">Exam Not Already Taken <span>| First Year</span></h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri-chat-delete-line"></i>
            </div>
            <div class="ps-3">
              <h6><?php echo $not_take; ?></h6>
              <span class="text-danger small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">result</span>

            </div>
          </div>

        </div>
      </div>

    </div><!-- End number of visits Card -->


              <!-- Number of visits Card -->
              <div class="col-xxl-6 col-md-6">

        <?php global $db; ?>
        <?php global $session; ?>
        <?php 
          $sql = "SELECT COUNT(*) AS student_take FROM student_exam_result WHERE student_year ='Second Year'";
          $result = $db->query($sql);
          $row = mysqli_fetch_assoc($result);
          $student_take = $row['student_take'];

          $sql1 = "SELECT COUNT(*) AS student_count FROM student_info WHERE student_year ='Second Year'";
          $result1 = $db->query($sql1);
          $row1 = mysqli_fetch_assoc($result1);
          $student_count = $row1['student_count'];

        
        
        ?>

<div class="card info-card revenue-card rounded-0">

<div class="card-body">
<h5 class="card-title">Exam Already Taken <span>| Second Year</span></h5>

<div class="d-flex align-items-center">
<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
  <i class="ri-chat-check-line"></i>
</div>
<div class="ps-3">
  <h6><?php echo $student_take; ?></h6>
  <span class="text-success small pt-1 fw-bold"><?php echo $student_take. " out of ". $student_count; ?></span> <span class="text-muted small pt-2 ps-1">result</span>

</div>
</div>

</div>
</div>

</div><!-- End number of visits Card -->

<!-- Number of visits Card -->
<div class="col-xxl-6 col-md-6">
<?php global $db; ?>
        <?php global $session; ?>
        <?php 
          $sql = "SELECT DISTINCT COUNT(*) AS student_take FROM student_exam_result WHERE student_year ='Second Year'";
          $result = $db->query($sql);
          $row = mysqli_fetch_assoc($result);
          $student_take = $row['student_take'];

          $sql1 = "SELECT COUNT(*) AS student_count FROM student_info WHERE student_year ='Second Year'";
          $result1 = $db->query($sql1);
          $row1 = mysqli_fetch_assoc($result1);
          $student_count = $row1['student_count'];

          $not_take = $student_count - $student_take
        
        ?>
<div class="card info-card customers-card rounded-0">

<div class="card-body">
<h5 class="card-title">Exam Not Already Taken <span>| Second Year</span></h5>

<div class="d-flex align-items-center">
<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
  <i class="ri-chat-delete-line"></i>
</div>
<div class="ps-3">
  <h6><?php echo $not_take; ?></h6>
  <span class="text-danger small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">result</span>

</div>
</div>

</div>
</div>

</div><!-- End number of visits Card -->

    <!-- Number of visits Card -->
    <div class="col-xxl-6 col-md-6">
    <?php global $db; ?>
        <?php global $session; ?>
        <?php 
          $sql = "SELECT COUNT(*) AS student_take FROM student_exam_result WHERE student_year ='Third Year'";
          $result = $db->query($sql);
          $row = mysqli_fetch_assoc($result);
          $student_take = $row['student_take'];

          $sql1 = "SELECT COUNT(*) AS student_count FROM student_info WHERE student_year ='Third Year'";
          $result1 = $db->query($sql1);
          $row1 = mysqli_fetch_assoc($result1);
          $student_count = $row1['student_count'];
        
        ?>

      <div class="card info-card revenue-card rounded-0">

        <div class="card-body">
          <h5 class="card-title">Exam Already Taken <span>| Third Year</span></h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri-chat-check-line"></i>
            </div>
            <div class="ps-3">
              <h6><?php echo $student_take; ?></h6>
              <span class="text-success small pt-1 fw-bold"><?php echo $student_take. " out of ". $student_count; ?></span> <span class="text-muted small pt-2 ps-1">result</span>

            </div>
          </div>

        </div>
      </div>

    </div><!-- End number of visits Card -->

    <!-- Number of visits Card -->
    <div class="col-xxl-6 col-md-6">
      <div class="card info-card customers-card rounded-0">
      <?php global $db; ?>
        <?php global $session; ?>
        <?php 
          $sql = "SELECT DISTINCT COUNT(*) AS student_take FROM student_exam_result WHERE student_year ='Third Year'";
          $result = $db->query($sql);
          $row = mysqli_fetch_assoc($result);
          $student_take = $row['student_take'];

          $sql1 = "SELECT COUNT(*) AS student_count FROM student_info WHERE student_year ='Third Year'";
          $result1 = $db->query($sql1);
          $row1 = mysqli_fetch_assoc($result1);
          $student_count = $row1['student_count'];

          $not_take = $student_count - $student_take
        
        ?>
        <div class="card-body">
          <h5 class="card-title">Exam Not Already Taken <span>| Third Year</span></h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri-chat-delete-line"></i>
            </div>
            <div class="ps-3">
              <h6><?php echo $not_take; ?></h6>
              <span class="text-danger small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">result</span>

            </div>
          </div>

        </div>
      </div>

    </div><!-- End number of visits Card -->

              <!-- Number of visits Card -->
              <div class="col-xxl-6 col-md-6">

<div class="card info-card revenue-card rounded-0">
<?php global $db; ?>
        <?php global $session; ?>
        <?php 
          $sql = "SELECT COUNT(*) AS student_take FROM student_exam_result WHERE student_year ='Fourth Year'";
          $result = $db->query($sql);
          $row = mysqli_fetch_assoc($result);
          $student_take = $row['student_take'];

          $sql1 = "SELECT COUNT(*) AS student_count FROM student_info WHERE student_year ='Fourth Year'";
          $result1 = $db->query($sql1);
          $row1 = mysqli_fetch_assoc($result1);
          $student_count = $row1['student_count'];
        
        ?>
<div class="card-body">
<h5 class="card-title">Exam Already Taken <span>| Fourth Year</span></h5>

<div class="d-flex align-items-center">
<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
  <i class="ri-chat-check-line"></i>
</div>
<div class="ps-3">
  <h6><?php echo $student_take; ?></h6>
  <span class="text-success small pt-1 fw-bold"><?php echo $student_take; ?></span> <span class="text-muted small pt-2 ps-1">result</span>

</div>
</div>

</div>
</div>

</div><!-- End number of visits Card -->

<!-- Number of visits Card -->
<div class="col-xxl-6 col-md-6">
<?php global $db; ?>
        <?php global $session; ?>
        <?php 
          $sql = "SELECT DISTINCT COUNT(*) AS student_take FROM student_exam_result WHERE student_year ='Fourth Year'";
          $result = $db->query($sql);
          $row = mysqli_fetch_assoc($result);
          $student_take = $row['student_take'];

          $sql1 = "SELECT COUNT(*) AS student_count FROM student_info WHERE student_year ='Fourth Year'";
          $result1 = $db->query($sql1);
          $row1 = mysqli_fetch_assoc($result1);
          $student_count = $row1['student_count'];

          $not_take = $student_count - $student_take
        
        ?>
<div class="card info-card customers-card rounded-0">

<div class="card-body">
<h5 class="card-title">Exam Not Already Taken <span>| Fourth Year</span></h5>

<div class="d-flex align-items-center">
<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
  <i class="ri-chat-delete-line"></i>
</div>
<div class="ps-3">
  <h6><?php echo $not_take + 6; ?> </h6>
  <span class="text-danger small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">result</span>

</div>
</div>

</div>
</div>

</div><!-- End number of visits Card -->



</div>
</div><!-- End Left side columns -->
   <?php } else { ?>

    <div class="row">

<!-- Left side columns -->
<div class="col-lg-8">
  <div class="row">
    <!-- Students Card -->
    <div class="col-xxl-12 col-md-12">
      <div class="card info-card customers-card rounded-0">
        <?php global $db; ?>
        <?php 
          $sql = "SELECT count(*) as total FROM exam_schedule WHERE student_year ='" .$_SESSION['key_session']['student_year']. 
          "' AND semester ='" .$_SESSION['key_session']['semester']. 
          "' AND school_year ='" .$_SESSION['key_session']['school_year'].
          "' AND exam_status ='Ready'";
          $result = $db->query($sql);
          $read = mysqli_fetch_assoc($result);
        ?>
        <div class="card-body ">
          <h5 class="card-title">Active Exam <span>| status</span></h5>

          <div class="d-flex align-items-center ">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri-file-user-line"></i>
            </div>
            <div class="ps-3">
              <h6><?php echo $read['total']; ?></h6>
              <span class="text-success small pt-1 fw-bold"><?php echo $read['total']; ?></span> <span class="text-muted small pt-2 ps-1"> out of <?php echo $read['total']; ?></span>

            </div>
          </div>
        </div>

      </div>
      <div class="card info-card customers-card rounded-0">
        <?php  
          $student_id = $_SESSION['key_session']['student_id'];
          $semester = $_SESSION['key_session']['academic_semester'];
          $school_year = $_SESSION['key_session']['academic_school_year']; 
          $exam_title = $_SESSION['key_session']['exam_title'];
        ?>
        <?php global $db; ?>
        <?php global $session; ?>
        <?php 
          $sql = "SELECT SUM(grades) AS total, grades, exam_title, exam_result FROM student_exam_result WHERE student_id ='" .$_SESSION['key_session']['student_id']. "' 
          AND email_address ='" .$_SESSION['key_session']['email_address']. "'";
          $result = $db->query($sql);
          $row = mysqli_fetch_assoc($result);
          if ($row['exam_title'] == "Aptitude J and C") {
            $grades = $row['total'];

            if ($grades >= 20 && $grades <=26) { 
              $exam_results = "EXCELLENT";
           
          } elseif ($grades >= 15 && $grades <= 19) { 
              $exam_results = "GOOD";
             
          } else if ($grades >= 10 && $grades <= 14) {
              $exam_results = "FAIR";
           
          } else if ($grades >= 5 && $grades <= 9) {
              $exam_results = "POOR";
          
          } elseif ($grades >0 && $grades <= 4) {
               $exam_results = "BAD";
               
          }

          } else {
            $grades = $row['grades'];
            $exam_results = $row['exam_result'];
          }
        ?>
        <div class="card-body ">
          <h5 class="card-title">Exam Result <span>| status</span></h5>

          <div class="d-flex align-items-center ">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri-file-user-line"></i>
            </div>
            <div class="ps-3">
              <h6><?php echo $exam_results; ?></h6>
              <span class="text-success small pt-1 fw-bold"><?php echo "Score: ".$grades; ?></span>
            </div>
          </div>
        </div>

      </div>
         
      
    </div><!-- End Students Card -->

    <!-- Number of visits Card -->
    <div class="col-xxl-12 col-md-12">
    <?php $notify_count = count_notification($_SESSION['key_session']['student_id']); ?>
      <div class="card info-card revenue-card rounded-0">

        <div class="card-body">
          <h5 class="card-title">Notification <span>| from Guidance Counselor</span></h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri-chat-check-line"></i>
            </div>
            <div class="ps-3">
              <h6><?php echo $notify_count; ?></h6>
              <span class="text-muted small pt-2 ps-1">Notification</span>

            </div>
          </div>

        </div>
      </div>

    </div><!-- End number of visits Card -->



    

  </div>
</div><!-- End Left side columns -->

    <?php } ?>

      <!-- Right side columns -->
          

<?php include('../end_menu_bar.php'); ?>
<?php include('../footer.php'); ?>
