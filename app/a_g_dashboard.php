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
            <div class="col-xxl-6 col-md-6" id="print_content">
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
  <h6><?php echo $not_take; ?> </h6>
  <span class="text-danger small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1">result</span>

</div>
</div>

</div>
</div>

</div><!-- End number of visits Card -->



</div>
</div><!-- End Left side columns -->