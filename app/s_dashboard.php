
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
    <?php $notify_count = count_notification($_SESSION['key_session']['email_address']); ?>
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