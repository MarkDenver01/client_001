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
              <h6>0</h6>
              <span class="text-success small pt-1 fw-bold">0%</span> <span class="text-muted small pt-2 ps-1">increase</span>

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

        <div class="card-body">
          <h5 class="card-title">Exam Already Taken <span>| First Year</span></h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri-chat-check-line"></i>
            </div>
            <div class="ps-3">
              <h6>0</h6>
              <span class="text-success small pt-1 fw-bold">0%</span> <span class="text-muted small pt-2 ps-1">result</span>

            </div>
          </div>

        </div>
      </div>

    </div><!-- End number of visits Card -->

    <!-- Number of visits Card -->
    <div class="col-xxl-6 col-md-6">

      <div class="card info-card customers-card rounded-0">

        <div class="card-body">
          <h5 class="card-title">Exam Not Already Taken <span>| First Year</span></h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri-chat-delete-line"></i>
            </div>
            <div class="ps-3">
              <h6>0</h6>
              <span class="text-danger small pt-1 fw-bold">0%</span> <span class="text-muted small pt-2 ps-1">result</span>

            </div>
          </div>

        </div>
      </div>

    </div><!-- End number of visits Card -->


              <!-- Number of visits Card -->
              <div class="col-xxl-6 col-md-6">

<div class="card info-card revenue-card rounded-0">

<div class="card-body">
<h5 class="card-title">Exam Already Taken <span>| Second Year</span></h5>

<div class="d-flex align-items-center">
<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
  <i class="ri-chat-check-line"></i>
</div>
<div class="ps-3">
  <h6>0</h6>
  <span class="text-success small pt-1 fw-bold">0%</span> <span class="text-muted small pt-2 ps-1">result</span>

</div>
</div>

</div>
</div>

</div><!-- End number of visits Card -->

<!-- Number of visits Card -->
<div class="col-xxl-6 col-md-6">

<div class="card info-card customers-card rounded-0">

<div class="card-body">
<h5 class="card-title">Exam Not Already Taken <span>| Second Year</span></h5>

<div class="d-flex align-items-center">
<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
  <i class="ri-chat-delete-line"></i>
</div>
<div class="ps-3">
  <h6>0</h6>
  <span class="text-danger small pt-1 fw-bold">0%</span> <span class="text-muted small pt-2 ps-1">result</span>

</div>
</div>

</div>
</div>

</div><!-- End number of visits Card -->

    <!-- Number of visits Card -->
    <div class="col-xxl-6 col-md-6">

      <div class="card info-card revenue-card rounded-0">

        <div class="card-body">
          <h5 class="card-title">Exam Already Taken <span>| Third Year</span></h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri-chat-check-line"></i>
            </div>
            <div class="ps-3">
              <h6>0</h6>
              <span class="text-success small pt-1 fw-bold">0%</span> <span class="text-muted small pt-2 ps-1">result</span>

            </div>
          </div>

        </div>
      </div>

    </div><!-- End number of visits Card -->

    <!-- Number of visits Card -->
    <div class="col-xxl-6 col-md-6">

      <div class="card info-card customers-card rounded-0">

        <div class="card-body">
          <h5 class="card-title">Exam Not Already Taken <span>| Third Year</span></h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri-chat-delete-line"></i>
            </div>
            <div class="ps-3">
              <h6>0</h6>
              <span class="text-danger small pt-1 fw-bold">0%</span> <span class="text-muted small pt-2 ps-1">result</span>

            </div>
          </div>

        </div>
      </div>

    </div><!-- End number of visits Card -->

              <!-- Number of visits Card -->
              <div class="col-xxl-6 col-md-6">

<div class="card info-card revenue-card rounded-0">

<div class="card-body">
<h5 class="card-title">Exam Already Taken <span>| Fourth Year</span></h5>

<div class="d-flex align-items-center">
<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
  <i class="ri-chat-check-line"></i>
</div>
<div class="ps-3">
  <h6>0</h6>
  <span class="text-success small pt-1 fw-bold">0%</span> <span class="text-muted small pt-2 ps-1">result</span>

</div>
</div>

</div>
</div>

</div><!-- End number of visits Card -->

<!-- Number of visits Card -->
<div class="col-xxl-6 col-md-6">

<div class="card info-card customers-card rounded-0">

<div class="card-body">
<h5 class="card-title">Exam Not Already Taken <span>| Fourth Year</span></h5>

<div class="d-flex align-items-center">
<div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
  <i class="ri-chat-delete-line"></i>
</div>
<div class="ps-3">
  <h6>0</h6>
  <span class="text-danger small pt-1 fw-bold">0%</span> <span class="text-muted small pt-2 ps-1">result</span>

</div>
</div>

</div>
</div>

</div><!-- End number of visits Card -->

    <!-- Reports -->
    <div class="col-12">
      <div class="card rounded-0">

        <div class="filter">
          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
              <h6>Filter</h6>
            </li>

            <li><a class="dropdown-item" href="#">Today</a></li>
            <li><a class="dropdown-item" href="#">This Month</a></li>
            <li><a class="dropdown-item" href="#">This Year</a></li>
          </ul>
        </div>

        <div class="card-body">
          <h5 class="card-title">Summary <span>/Report</span></h5>

          <!-- Line Chart -->
          <div id="reportsChart"></div>

          <script>
          document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#reportsChart"), {
              series: [{
                name: 'Counseling',
                data: [31, 40, 28, 51, 42, 82, 56],
              }, {
                name: 'Student',
                data: [11, 32, 45, 32, 34, 52, 41]
              },{
                name: 'Excuse',
                data: [11, 32, 45, 32, 34, 52, 41]
              }, {
                name: 'Visits',
                data: [11, 32, 45, 32, 34, 52, 41]
              },  {
                name: 'Clearance',
                data: [15, 11, 32, 18, 9, 24, 11]
              }],
              chart: {
                height: 350,
                type: 'area',
                toolbar: {
                  show: false
                },
              },
              markers: {
                size: 4
              },
              colors: ['#4154f1', '#2eca6a', '#ff771d', "#6a1b9a", "#f50057"],
              fill: {
                type: "gradient",
                gradient: {
                  shadeIntensity: 1,
                  opacityFrom: 0.3,
                  opacityTo: 0.4,
                  stops: [0, 90, 100]
                }
              },
              dataLabels: {
                enabled: false
              },
              stroke: {
                curve: 'smooth',
                width: 2
              },
              xaxis: {
                type: 'datetime',
                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
              },
              tooltip: {
                x: {
                  format: 'dd/MM/yy HH:mm'
                },
              }
            }).render();
          });
          </script>
          <!-- End Line Chart -->

        </div>

      </div>
    </div><!-- End Reports -->

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
                                $check_monitor = false;
                            $sql = "SELECT exam_answer,counselor_notify_status, SUM(total_score) AS total FROM examinee WHERE student_id ='$student_id' 
                                AND semester ='$semester' AND school_year ='$school_year' AND exam_title = '$exam_title'";
                                if ($exam_title == 'Student Success Kit') {
                                  $result = $db->query($sql);
                                  if ($result->num_rows > 0) {
                                      while ($row = $result->fetch_assoc()) {
                                          $highest_prob = $row['exam_answer'];
                                          $data = $row['total'] / 18;
                                          $counselour_stats = $row['counselor_notify_status'];
                                      }
                                  }
                                  switch($data) {
                                    case $data >= 25 and $data <= 40:
                                        $check_monitor = true;
                                        $msg = "Monitoring";
                                        if ($counselour_stats == "Pending") {
                                          for($i = 0; $i < $data; $i++) {
                                            $sql = "UPDATE examinee SET counselor_notify_status='$msg' WHERE student_id ='$student_id'";
                                            $db->query($sql);
                                          }
                                        }
                                      break;
                                    case $data >= 0 and $data <= 20:
                                        $check_monitor = false;
                                        $msg = "Counseling";
                                        if ($counselour_stats == 'Pending') {
                                          for($i = 0; $i < $data; $i++) {
                                            $sql = "UPDATE examinee SET counselor_notify_status='$msg' WHERE student_id ='$student_id'";
                                            $db->query($sql);
                                          }
                                        }
                                      break;
                                      default:
                                        $msg = "Not in range";
                                  }
                                } else {
                                  $dev_msg = "Dev is still fixing this issue. Pls. wait.";
                                }
                                
                               
                            ?>
        <div class="card-body ">
          <h5 class="card-title">Exam Result <span>| status</span></h5>

          <div class="d-flex align-items-center ">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
              <i class="ri-file-user-line"></i>
            </div>
            <div class="ps-3">
              <?php if ($exam_title == 'Student Success Kit') { ?>
                <h6><?php echo $data."%"; ?></h6>
                <span class="text-success small pt-1 fw-bold"><?php echo $msg; ?></span> 
               
              <?php } else { ?>
                <h6><?php echo $dev_msg; ?></h6>
                <span class="text-success small pt-1 fw-bold"><?php echo $dev_msg; ?></span>
              <?php } ?>
             

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
