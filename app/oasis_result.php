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
    $exam_id = $_GET['exam_id'];
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
if (isset($_POST['button_upload'])) {
    redirect('./monitoring',false);
}

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
                            <td><h5>Category</h5></td>
                            <td><h5>Score</h5></td>
                            <td><h5>Status</h5></td>
                        </tr>
                    </thead>
                    <tbody>                   
                    <?php       
                      $sql = "SELECT e.student_id AS student_id, e.exam_id AS exam_id, e.name AS name, e.email_address AS email_address, 
                      e.gender AS gender, e.course AS course, e.semester AS semester, e.school_year, e.student_year AS student_year, 
                      e.exam_title AS exam_title, e.exam_description AS exam_description, e.exam_category AS exam_category, 
                      s.exam_result AS exam_result, e.total_score as total_grades, s.grades as grades, e.exam_result_status AS examinee_status FROM `examinee` `e` 
                      LEFT JOIN `student_exam_result` `s` 
                      ON e.email_address = s.email_address WHERE e.student_id ='" .$student_id. "' AND e.exam_title='OASIS 3' GROUP by e.exam_category";
                      $result = $db->query($sql);
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $exam_title = $row['exam_title']; 
                            $sampling = $row['total'] / 18;

                            if ($row['exam_category'] == 'Vocabulary') {
                              $vocabulary_score = $row['total_grades'];
                              if ($vocabulary_score >= 39 && $vocabulary_score <= 40) {
                                $remarks = "Superior";
                              } elseif ($vocabulary_score >= 33 && $vocabulary_score <= 38) {
                                $remarks = "Above Average";
                              } elseif ($vocabulary_score >= 21 && $vocabulary_score <= 32) {
                                $remarks = "Average";
                              } elseif ($vocabulary_score >= 13 && $vocabulary_score <= 20) {
                                $remarks = "Below Average";
                              } elseif ($vocabulary_score >= 0 && $vocabulary_score <= 9) {
                                $remarks = "Low";
                              }
                            } elseif ($row['exam_category'] == 'Computation') {
                              $computation_score = $row['total_grades'];
                              if ($computation_score >= 26 && $computation_score <= 30) {
                                $remarks = "Superior";
                              } elseif ($computation_score >= 20 && $computation_score <= 25) {
                                $remarks = "Above Average";
                              } elseif ($computation_score >= 13 && $computation_score <= 19) {
                                $remarks = "Average";
                              } elseif ($computation_score >= 9 && $computation_score <= 12) {
                                $remarks = "Below Average";
                              } elseif ($computation_score >= 0 && $computation_score <= 8) {
                                $remarks = "Low";
                              }
                            } elseif ($row['exam_category'] == 'Spatial') {
                              $spatial_score = $row['total_grades'];
                              if ($spatial_score >= 19 && $spatial_score <= 20) {
                                $remarks = "Superior";
                              } elseif ($spatial_score >= 15 && $spatial_score <= 18) {
                                $remarks = "Above Average";
                              } elseif ($spatial_score >= 8 && $spatial_score <= 14) {
                                $remarks = "Average";
                              } elseif ($spatial_score >= 4 && $spatial_score <= 7) {
                                $remarks = "Below Average";
                              } elseif ($spatial_score >= 0 && $spatial_score <= 3) {
                                $remarks = "Low";
                              }
                            } elseif ($row['exam_category'] == 'Word Comparison') {
                              $word_score = $row['total_grades'];
                              if ($word_score >= 19 && $word_score <= 20) {
                                $remarks = "Superior";
                              } elseif ($word_score >= 15 && $word_score <= 18) {
                                $remarks = "Above Average";
                              } elseif ($word_score >= 8 && $word_score <= 14) {
                                $remarks = "Average";
                              } elseif ($word_score >= 4 && $word_score <= 7) {
                                $remarks = "Below Average";
                              } elseif ($word_score >= 0 && $word_score <= 3) {
                                $remarks = "Low";
                              }
                            } elseif ($row['exam_category'] == 'Making marks Part 1' || $row['exam_category'] == 'Making marks Part 2' ) {
                              $remarks = "-";
                            }

                            $vc_score = ($vocabulary_score + $computation_score);
                            if ($vc_score >= 63 && $vc_score <= 70) {
                              $remarks_vc = "Superior";
                            } elseif ($vc_score >= 52 && $vc_score <= 62) {
                              $remarks_vc = "Above Average";
                            } elseif ($vc_score >= 36 && $vc_score <= 51) {
                              $remarks_vc = "Average";
                            } elseif ($vc_score >= 25 && $vc_score <= 35) {
                              $remarks_vc = "Below Average";
                            } elseif ($vc_score >= 0 && $vc_score <= 24) {
                              $remarks_vc = "Low";
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
                      <tr>
                        <td><h5>Vocabulary + Computation</h5></td>
                        <td><h5><?php echo $vc_score; ?></h5></td>
                        <td><h5><?php echo $remarks_vc; ?></h5></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-7">
        <?php if($counselour_stats == 'Monitoring') { ?>
          <div class="card rounder-0">
            <div class="card-body">
              <br/>
              <div class="row">
                    <div class="col-lg-12">
                     <div class="text-center">
        
                      <div class="text-center"><h5></h5></div>
                        <form action ="" method="POST">
                           
                                <button name="button_upload" type="submit" class="btn btn-success btn-lg rounded-pill w-100">Upload Student Grade</button>
                           
                        </form>
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
              <div class="text-center"><h2>Data Interpretation</h2></div>
              <hr/>
                  <div class="row mb-3">
                    <div class="col-lg-12">
                    <table class="table table-bordered mb-5 text-center">
                        <thead>
                          <tr><td colspan="2" class="text-white" style="background-image: linear-gradient(#005A92, #0066B2);">Vocabulary + Computation</td></tr>
                          <tr>
                            <td>0 - 24</td<>
                            <td>Low</td<>
                          </tr>
                          <tr>
                            <td>25 - 35</td<>
                            <td>Below Average</td<>
                          </tr>
                          <tr>
                            <td>36  - 51</td<>
                            <td>Average</td<>
                          </tr>
                          <tr>
                            <td>52  - 62</td<>
                            <td>Above Average</td<>
                          </tr>
                          <tr>
                            <td>63  - 70</td<>
                            <td>Above Average</td<>
                          </tr>
                        </thead>
                      </table>
                    </div>

                    <div class="col-lg-12">
                    <table class="table table-bordered mb-5 text-center">
                        <thead>
                          <tr><td colspan="2" class="text-white" style="background-image: linear-gradient(#005A92, #0066B2);">Vocabulary</td></tr>
                          <tr>
                            <td>0 - 9</td<>
                            <td>Low</td<>
                          </tr>
                          <tr>
                            <td>13 - 20</td<>
                            <td>Below Average</td<>
                          </tr>
                          <tr>
                            <td>21  - 32</td<>
                            <td>Average</td<>
                          </tr>
                          <tr>
                            <td>33  - 38</td<>
                            <td>Above Average</td<>
                          </tr>
                          <tr>
                            <td>39  - 40</td<>
                            <td>Above Average</td<>
                          </tr>
                        </thead>
                      </table>
                    </div>

                    <div class="col-lg-12">
                    <table class="table table-bordered mb-5 text-center">
                        <thead>
                          <tr><td colspan="2" class="text-white" style="background-image: linear-gradient(#005A92, #0066B2);">Computation</td></tr>
                          <tr>
                            <td>0 - 8</td<>
                            <td>Low</td<>
                          </tr>
                          <tr>
                            <td>9 - 12</td<>
                            <td>Below Average</td<>
                          </tr>
                          <tr>
                            <td>13  - 19</td<>
                            <td>Average</td<>
                          </tr>
                          <tr>
                            <td>20  - 25</td<>
                            <td>Above Average</td<>
                          </tr>
                          <tr>
                            <td>26  - 30</td<>
                            <td>Above Average</td<>
                          </tr>
                        </thead>
                      </table>
                    </div>

                    <div class="col-lg-12">
                    <table class="table table-bordered mb-5 text-center">
                        <thead>
                          <tr><td colspan="2" class="text-white" style="background-image: linear-gradient(#005A92, #0066B2);">Spatial Relationship</td></tr>
                          <tr>
                            <td>0 - 3</td<>
                            <td>Low</td<>
                          </tr>
                          <tr>
                            <td>4 - 7</td<>
                            <td>Below Average</td<>
                          </tr>
                          <tr>
                            <td>8  - 14</td<>
                            <td>Average</td<>
                          </tr>
                          <tr>
                            <td>15  - 18</td<>
                            <td>Above Average</td<>
                          </tr>
                          <tr>
                            <td>19  - 20</td<>
                            <td>Above Average</td<>
                          </tr>
                        </thead>
                      </table>
                    </div>

                    <div class="col-lg-12">
                    <table class="table table-bordered mb-5 text-center">
                        <thead>
                          <tr><td colspan="2" class="text-white" style="background-image: linear-gradient(#005A92, #0066B2);">World Comparison </td></tr>
                          <tr>
                            <td>0 - 17</td<>
                            <td>Low</td<>
                          </tr>
                          <tr>
                            <td>18 - 29</td<>
                            <td>Below Average</td<>
                          </tr>
                          <tr>
                            <td>30  - 46</td<>
                            <td>Average</td<>
                          </tr>
                          <tr>
                            <td>47  - 57</td<>
                            <td>Above Average</td<>
                          </tr>
                          <tr>
                            <td>58  - 100</td<>
                            <td>Above Average</td<>
                          </tr>
                        </thead>
                      </table>
                    </div>
                    <br/>
                      <div class="text-center"><h2>Data Visualization</h2></div>
                      <hr/>
                    <div class="col-lg-12">
                        <!-- Line Chart -->
                        <canvas class="border border-danger" id="lineChart" style="max-height: 400px; background-image: linear-gradient(#FFFADA, #FDF6E4);"></canvas>
                            <?php 
                            $sql = "SELECT * FROM examinee WHERE student_id='$student_id' AND exam_title = 'OASIS 3'";
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
                              type: 'bar',
                              data: {
                                labels: [
                                    '<?php echo $data_chart[0]; ?>',
                                    '<?php echo $data_chart[1]; ?>',
                                    '<?php echo $data_chart[2]; ?>',
                                    '<?php echo $data_chart[3]; ?>',
                                    '<?php echo $data_chart[4]; ?>',
                                    '<?php echo $data_chart[5]; ?>',
                                ],
                                datasets: [{
                                  label: 'OASIS 3',
                                  data: [
                                    '<?php echo $score_data[0]; ?>',
                                    '<?php echo $score_data[1]; ?>',
                                    '<?php echo $score_data[2]; ?>',
                                    '<?php echo $score_data[3]; ?>',
                                    '<?php echo $score_data[4]; ?>',
                                    '<?php echo $score_data[5]; ?>',
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
                  <?php  if ($_SESSION['key_session']['user_level'] == '1' || $_SESSION['key_session']['user_level'] == '2') { ?>
                    <button id="button_print" name="button_print" onClick="printContent()" class="btn text-white rounded-pill btn-lg w-100" style="background-image: linear-gradient(#3B7A57, #4B6F44);"><i class="bi bi-print"></i> Generate Report</button>
                  <?php } ?>            
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
