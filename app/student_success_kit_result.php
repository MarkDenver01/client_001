<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>

<?php CHECK_EXAM_AVAILABILITY(); ?>
<?php global $db; ?>
<?php  
  if (!isset($_SESSION['key_session']['student_id'])) {
    $student_id = $_GET['student_id'];
    $semester = $_GET['semester'];
    $school_year = $_GET['school_year'];
    $student_name = $_GET['name'];
    $course = $_GET['course'];
    $student_year = $_GET['student_year'];
  } else {
    $student_id = $_SESSION['key_session']['student_id'];
    $semester = $_SESSION['key_session']['academic_semester'];
    $school_year = $_SESSION['key_session']['academic_school_year']; 
    $student_name = $_SESSION['key_session']['name'];
  }

 
?>
<?php 

if(isset($_POST['button_counseling'])) {
  redirect('./counseling', false);
}
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
            <div class="card-body" id="print_content">
              <br/>
              <div class="text-center"><h2>RESULT</h2></div>
              <hr/>
              <div class="row">
                <div class="col-lg-12">
                  <br/>
                  <table class="table table-hover table-bordered mb-5">
                    <thead>
                        <tr>
                            <td style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" ><h5>Category</h5></td>
                            <td style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" ><h5>Score</h5></td>
                            <td style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" ><h5>Status</h5></td>
                        </tr>
                    </thead>
                    <tbody>                   
                    <?php       
                      $sql = "SELECT e.student_id AS student_id, e.exam_id AS exam_id, e.name AS name, e.email_address AS email_address, 
                      e.gender AS gender, e.course AS course, e.semester AS semester, e.school_year, e.student_year AS student_year, 
                      e.exam_title AS exam_title, e.exam_description AS exam_description, e.exam_category AS exam_category, 
                      s.exam_result AS exam_result, e.total_score as total_grades, s.grades as grades, e.exam_result_status AS examinee_status FROM `examinee` `e` 
                      LEFT JOIN `student_exam_result` `s` 
                      ON e.email_address = s.email_address WHERE e.student_id ='" .$student_id. "' AND e.exam_title='Student Success Kit' GROUP by e.exam_category";
                      $result = $db->query($sql);
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $exam_title = $row['exam_title']; 
                            $sampling = $row['total'] / 18;
                            $check_total = $row['total_grades'];
                            if ($check_total >= 25 && $check_total <= 40) {
                              $remarks = "HIGH";
                            } elseif ($check_monitor >= 0 && $check_total <= 24) {
                              $remarks = "LOW";
                            }
                    ?>
                        <tr>
                          <td><h5><?php echo $row['exam_category']; ?></h5></td>
                          <td><h5><?php echo $row['total_grades']; ?></h5></td>
                          <td><h5><?php echo $remarks; ?></h5></td>
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
        <?php if($user_level == '1' || $user_level == '2') { ?>
          <div class="card rounder-0">
            <div class="card-body">
              <br/>
              <div class="row">
                    <div class="col-lg-12">
                     <div class="text-center">
        
                      <div class="text-center"><h5></h5></div>
                        <a href="./view_grade?student_id=<?php echo $student_id; ?>" name="button_upload" type="submit" class="btn btn-danger btn-lg rounded-pill w-100">View Student Grade</a>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
          <?php } else if($user_level == '3') { ?>
        <div class="card rounder-0">
            <div class="card-body"  id="upload_grades">
              <br/>
              <div class="row">
                    <div class="col-lg-12">
                     <div class="text-center">
        
                      <div class="text-center"><h5></h5></div>
                        <a href="./monitoring" type="submit" class="btn btn-danger btn-lg rounded-pill w-100">Upload Student Grade</a>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
          <?php } ?>

          <div class="card rounded-0">
            <div class="card-body">
            <br/>
              <?php  if ($_SESSION['key_session']['user_level'] == '1' || $_SESSION['key_session']['user_level'] == '2') { ?>
                <label id="for_student_name" for="age" class="col-md-4 col-lg-3 col-form-label">Student Name</label>
                  <div class="col-md-8 col-lg-12">
                    <input id="student_name" type="text" class="form-control rounded-0" value="<?php echo $student_name; ?>">
                  </div>
                <br/>
                <label id="for_school_year" for="age" class="col-md-4 col-lg-3 col-form-label">Year Level</label>
                  <div class="col-md-8 col-lg-12">
                    <input id="school_year" type="text" class="form-control rounded-0" value="<?php echo $student_year; ?>">
                  </div>
                <br/>
                <label id="for_course" for="age" class="col-md-4 col-lg-3 col-form-label">Course</label>
                  <div class="col-md-8 col-lg-12">
                    <input id="course" type="text" class="form-control rounded-0" value="<?php echo $course; ?>">
                  </div>
                <br/>
              <?php } ?>
              <br/>
              <div class="text-center"><h2>Data Visualization</h2></div>
              <hr/>
                  <div class="row mb-3">
                    <div class="col-lg-12">
                      <table class="table text-nowrap " id="tableList">
                        <tbody>
                            <?php 
                                $check_monitor = false;
                                $sql = "SELECT exam_answer,counselor_notify_status, SUM(total_score) AS total FROM examinee WHERE student_id ='$student_id' 
                                AND semester ='$semester' AND school_year ='$school_year' AND exam_title = 'Student Success Kit'";
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
                                      $msg = "HIGH";
                                    break;
                                  case $data >= 0 and $data <= 24:
                                      $check_monitor = false;
                                      $msg = "LOW";
                                    break;
                                    default:
                                    break;
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
                            $sql = "SELECT * FROM examinee WHERE student_id='$student_id' AND exam_title = 'Student Success Kit'";
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
                          <br/>
                          <!-- End Line CHart -->
                          <?php  if ($_SESSION['key_session']['user_level'] == '1' || $_SESSION['key_session']['user_level'] == '2') { ?>
                            <button id="button_print" name="button_print" onClick="printContent()" class="btn text-white rounded-pill btn-lg w-100" style="background-image: linear-gradient(#3B7A57, #4B6F44);"><i class="bi bi-print"></i> Generate Report</button>
                          <?php } ?> 
                        </div>
                  </div>                
            </div>  
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <script>
		function printContent() {
			var content = document.getElementById("print_content");
      var button_print = document.getElementById("button_print");
      var top_header = document.getElementById("header");
      var side_bar = document.getElementById("sidebar");
      var for_student_name = document.getElementById("for_student_name");
      var for_student_year = document.getElementById("for_student_yeare");
      var for_course = document.getElementById("for_course");
      var student_name = document.getElementById("student_name");
      var school_year = document.getElementById("student_year");
      var course = document.getElementById("course");


      top_header.style.visibility ='hidden';
      button_print.style.visibility = 'hidden';
      side_bar.style.visibility = 'hidden';

			window.print(content);

      button_print.style.visibility = 'visible';
      top_header.style.visibility ='visible';
      side_bar.style.visibility = 'visible';
      for_student_name.style.visibility = 'visible';
      for_student_year.style.visibility = 'visible';
      for_course.style.visibility = 'visible';
      student_name.style.visibility = 'visible';
      student_year.style.visibility = 'visible';
      course.style.visibility = 'visible';
		}
	</script>
<?php include('../footer.php'); ?>
