<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php IS_STUDENT_LEVEL(); ?>
<?php CHECK_EXAM_AVAILABILITY(); ?>
<?php global $db; ?>
<?php  
    $student_id = $_SESSION['key_session']['student_id'];
    $semester = $_SESSION['key_session']['academic_semester'];
    $school_year = $_SESSION['key_session']['academic_school_year']; 
?>
<?php include('../start_menu_bar.php'); ?>
<script type="text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>View Student Exam </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Student Exam Result</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile" style="width: 1360px;">
      <div class="row">
        <!-- center -->
        <div class="col-sm-5">
          <div class="card rounded-0">
            <div class="card-body">
              <br/>
              <div class="text-center"><h2>RESULT</h2></div>
              <hr/>
              <div class="row">
                <div class="col-lg-12">
                  <br/>
                  <table class="table table-hover table-bordered mb-5">
                    <thead>
                        <tr>
                            <td><h5>Category</h5></td>
                            <td><h5>Highest Probility Answered</h5></td>
                            <td><h5>Total Count of answer</h5></td>
                            <td><h5>Total Score</h5></td>
                        </tr>
                    </thead>
                    <tbody>                   
                    <?php       
                      $sql = "SELECT * FROM examinee WHERE student_id ='$student_id'";
                      $result = $db->query($sql);
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $exam_title = $row['exam_title']; 
                    ?>
                        <tr>
                          <td><h5><?php echo $row['exam_category']; ?></h5></td>
                          <td><h5><?php echo $row['exam_answer']; ?></h5></td>
                          <td><h5><?php echo $row['total_answer']; ?></h5></td>
                          <td><h5><?php echo $row['total_score']; ?></h5></td>
                        </tr>          
                    <?php 
                        }
                      }
                    ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-7">
          <div class="card rounded-0">
            <div class="card-body">
              <br/>
              <div class="text-center"><h2>Data Visualization</h2></div>
              <hr/>
                  <div class="row mb-3">
                    <div class="col-lg-12">
                      <table class="table text-nowrap " id="tableList">
                        <tbody>
                            <?php 
                                $check_monitor = false;
                                $sql = "SELECT exam_answer,counselor_notify_status, COUNT(exam_answer) AS total FROM examinee WHERE student_id ='$student_id' 
                                AND semester ='$semester' AND school_year ='$school_year' GROUP BY exam_answer ORDER BY COUNT(exam_answer) DESC LIMIT 1";
                                $result = $db->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $highest_prob = $row['exam_answer'];
                                        $data = $row['total'] / 18 * 40;
                                        $counselour_stats = $row['counselor_notify_status'];
                                    }
                                }
                                if ($data >= 40 && $data <= 25) {
                                    $check_monitor = true;
                                    $msg = "Monitoring(Upload the grades at the end of semester.)";
                                } else if($data <= 20) {
                                    $check_monitor = false;
                                    $msg = "For Counselor Scheduling";
                                    if ($counselour_stats == "Pending") {
                                        $sql = "UPDATE examinee SET counselor_notify_status='Counseling' WHERE student_id ='$student_id'";
                                        $db->query($sql);
                                    }
                                } 
                            ?>    
                            <tr>
                              <td>
                              <div class="col-xxl-12 col-md-6">
                                <div class="card info-card revenue-card rounded-0 text-white " style="background-image: linear-gradient(#d9534f, #AB274F);">

                                  <div class="card-body">
                                    <h3 class="card-title text-white">Score <span class="text-light">| <?php echo $exam_title; ?></span></h3>

                                    <div class="d-flex align-items-center">
                                      <div class="text-center">
                                        <h3><?php echo $data; ?></h3>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              </td>
                              <td>
                              <div class="col-xxl-12 col-md-6">
                                <div class="card info-card revenue-card rounded-0 text-white " style="background-image: linear-gradient(#4B6F44, #7BB661);">

                                  <div class="card-body">
                                    <h3 class="card-title text-white"><?php echo $exam_title; ?>'s Result</h3>

                                    <div class="d-flex align-items-center">
                                      <div class="text-center">
                                        <h3>
                                            <?php echo $msg; ?>
                                        </h3>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              </td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-lg-12">
                        <!-- Line Chart -->
                        <canvas class="border border-danger" id="lineChart" style="max-height: 400px; background-image: linear-gradient(#FFFADA, #FDF6E4);"></canvas>
                            <?php 
                            $sql = "SELECT * FROM examinee WHERE student_id='$student_id'";
                            $run_query = $db->query($sql);
                            $data_chart = array();
                            foreach ($run_query as $row) {
                                $score_data[] = $row['total_score'];
                                $data_chart[] = $row['exam_category'];
                            }
                            ?>
                         <script>
                          document.addEventListener("DOMContentLoaded", () => {
                            new Chart(document.querySelector('#lineChart'), {
                              type: 'line',
                              data: {
                                labels: [
                                    '<?php echo $data_chart[0]; ?>',
                                    '<?php echo $data_chart[1]; ?>',
                                    '<?php echo $data_chart[2]; ?>',
                                    '<?php echo $data_chart[3]; ?>',
                                    '<?php echo $data_chart[4]; ?>',
                                    '<?php echo $data_chart[5]; ?>',
                                    '<?php echo $data_chart[6]; ?>',
                                    '<?php echo $data_chart[7]; ?>',
                                    '<?php echo $data_chart[8]; ?>',
                                    '<?php echo $data_chart[9]; ?>',
                                    '<?php echo $data_chart[10]; ?>',
                                    '<?php echo $data_chart[11]; ?>',
                                    '<?php echo $data_chart[12]; ?>',
                                    '<?php echo $data_chart[13]; ?>',
                                    '<?php echo $data_chart[14]; ?>',
                                    '<?php echo $data_chart[15]; ?>',
                                    '<?php echo $data_chart[16]; ?>',
                                    '<?php echo $data_chart[17]; ?>',
                                ],
                                datasets: [{
                                  label: 'Student Success Kit',
                                  data: [
                                    '<?php echo $score_data[0]; ?>',
                                    '<?php echo $score_data[1]; ?>',
                                    '<?php echo $score_data[2]; ?>',
                                    '<?php echo $score_data[3]; ?>',
                                    '<?php echo $score_data[4]; ?>',
                                    '<?php echo $score_data[5]; ?>',
                                    '<?php echo $score_data[6]; ?>',
                                    '<?php echo $score_data[7]; ?>',
                                    '<?php echo $score_data[8]; ?>',
                                    '<?php echo $score_data[9]; ?>',
                                    '<?php echo $score_data[10]; ?>',
                                    '<?php echo $score_data[11]; ?>',
                                    '<?php echo $score_data[12]; ?>',
                                    '<?php echo $score_data[13]; ?>',
                                    '<?php echo $score_data[14]; ?>',
                                    '<?php echo $score_data[15]; ?>',
                                    '<?php echo $score_data[16]; ?>',
                                    '<?php echo $score_data[17]; ?>',
                                  ],
                                  fill: true,
                                  borderColor: 'rgb(255, 12, 10)',
                                  tension: 0.1
                                }]
                              },
                              options: {
                                scales: {
                                  y: {
                                    beginAtZero: true
                                  }
                                }
                              }
                            });
                          });
                          </script>
                          <!-- End Line CHart -->
                        </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                     <div class="text-center">

                        <form action ="" method="POST">
                        <?php if ($check_monitor) { ?>
                            <button id="submitAnswerFrmBtn" name="button_upload" type="submit" class="btn btn-success btn-lg rounded-0 w-100">Upload</button>
                        <?php } ?>
                        </form>
                      </div>
                    </div>
                  </div>
                
            </div>  
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->
<?php include('../footer.php'); ?>
