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
  $exam_type = $_GET['exam_type']; 
  $exam_id = $_GET['exam_id'];
  $student_id = $_SESSION['key_session']['student_id'];
  $semester = $_SESSION['key_session']['academic_semester'];
  $school_year = $_SESSION['key_session']['academic_school_year'];
  $name = $_SESSION['key_session']['name'];
  $gender = $_SESSION['key_session']['gender'];
  $course = $_SESSION['key_session']['course'];
  $exam_title = $_GET['exam_title'];
  $exam_desc = $_GET['exam_desc'];
  $start_date = date('Y-m-d h:i:s A');
  $total_score = $_POST['total_score'];
  $exam_answers = $_POST['exam_answer'];
  $total_answers = $_POST['total_answer'];
  $email_address = $_SESSION['key_session']['email_address'];
  $student_year =$_SESSION['key_session']['student_year'];
?>
<?php 
  // if (isset($_POST['button_submit'])) {

  //   $sqlExist = $db->query("SELECT * FROM examinee WHERE student_id ='$student_id' 
  //   AND exam_id='$exam_id' 
  //   AND exam_title='$exam_title' 
  //   AND exam_description ='$exam_desc' 
  //   AND exam_category ='$exam_type'");
  //   if($sqlExist->num_rows > 0) {
  //     $sqlUpdate = $db->query("UPDATE examinee SET 
  //     start_exam_date='$start_date', 
  //     exam_answer='$exam_answers', 
  //     total_answer='$total_answers', 
  //     total_score='$total_score' WHERE student_id='$student_id' 
  //     AND exam_id='$exam_id' 
  //     AND exam_title ='$exam_title' 
  //     AND exam_description='$exam_desc' 
  //     AND exam_category ='$exam_type'");

  //     if($sqlUpdate) {
  //       if ($exam_title == "Student Success Kit") {
  //         redirect('./student_success_kit_result', false);
  //       } elseif ($exam_title == "OASIS 3") {
  //         redirect('./oasis_result.php');
  //       } else {
  //         redirect('./student_success_kit_result', false);
  //       }
  //     }

  //   } else {
  //     $sql = $db->query("INSERT INTO examinee(
  //       student_id, 
  //       exam_id, 
  //       name, 
  //       email_address, 
  //       gender, 
  //       course, 
  //       semester, 
  //       school_year, 
  //       student_year, 
  //       exam_title, 
  //       exam_description, 
  //       exam_category, 
  //       start_exam_date, 
  //       exam_answer,
  //       total_answer,
  //       total_score, 
  //       exam_result_status, 
  //       counselor_notify_status) VALUES(
  //       '$student_id',
  //       '$exam_id',
  //       '$name',
  //       '$email_address',
  //       '$gender',
  //       '$course',
  //       '$semester',
  //       '$school_year',
  //       '$student_year',
  //       '$exam_title',
  //       '$exam_desc',
  //       '$exam_type',
  //       '$start_date',
  //       '$exam_answers',
  //       '$total_answers',
  //       '$total_score',
  //       'Done',
  //       'Pending')");

  //     if($sql) {
  //       if ($exam_title == "Student Success Kit") {
  //         redirect('./student_success_kit_result', false);
  //       } elseif ($exam_title == "OASIS 3") {
  //         redirect('./oasis_result.php');
  //       } else {
  //         redirect('./student_success_kit_result', false);
  //       }
  //     }
  //   }
  // }
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
        <div class="col-sm-12">
          <div class="card rounded-0">
            <div class="card-body">
              <br/>
              <div class="text-center"><h2><?php echo $exam_type; ?>'s Exam Result </h2></div>
              <hr/>
              <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                  <br/>
                  <table class="table table-bordered mb-5 text-center">
                    <thead>
                      <tr>
                        <td class="bg-success text-white"><h3>Exam Item No</h3></td>
                        <td class="bg-success text-white"><h3>Exam Answer</h3></td>
                        <?php if($exam_title == 'OASIS 3' || $exam_title == 'BarOn EQ-i:S ' || $exam_title == 'The Keirsey Temperament Sorter') { ?>
                          <td class="bg-danger text-white"><h3>Correct Answer</h3></td>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>                   
                    <?php 
                      $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                      AND semester ='$semester' AND school_year ='$school_year'";
                      $result = $db->query($sql);
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                      <tr>
                        <td><h3><?php echo $row['exam_item_no']; ?></h3></td>
                        <?php if ($exam_title == "Student Success Kit") { ?>

                          <td><h3><?php echo $row['exam_answer']; ?></h3></td>

                        <?php } elseif($exam_title == "OASIS 3") { ?>

                            <?php if($row['exam_answer'] === $row['exam_correct_answer']) { ?>
                              <td style="background-image: linear-gradient(#d9534f, #AB274F);" class="text-white"><h3><?php echo $row['exam_answer']; ?></h3></td>
                              <td style="background-image: linear-gradient(#d9534f, #AB274F);" class="text-white"><h3><?php echo $row['exam_correct_answer']; ?></h3></td>
                            <?php } else { ?>
                              <td ><h3><?php echo $row['exam_answer']; ?></h3></td>
                              <td class="bg-light text-dark"><h3><?php echo $row['exam_correct_answer']; ?></h3></td>
                            <?php } ?>
                          

                        <?php } elseif ($exam_title == 'BarOn EQ-i:S') { ?>
                          <?php if($row['exam_answer'] === $row['exam_correct_answer']) { ?>
                              <td style="background-image: linear-gradient(#d9534f, #AB274F);" class="text-white"><h3><?php echo $row['exam_answer']; ?></h3></td>
                              <td style="background-image: linear-gradient(#d9534f, #AB274F);" class="text-white"><h3><?php echo $row['exam_correct_answer']; ?></h3></td>
                            <?php } else { ?>
                              <td ><h3><?php echo $row['exam_answer']; ?></h3></td>
                              <td class="bg-light text-dark"><h3><?php echo $row['exam_correct_answer']; ?></h3></td>
                            <?php } ?>
                        <?php } elseif ($exam_title == 'The Keirsey Temperament Sorter') { ?>
                          <?php if($row['exam_answer'] === $row['exam_correct_answer']) { ?>
                              <td style="background-image: linear-gradient(#d9534f, #AB274F);" class="text-white"><h3><?php echo $row['exam_answer']; ?></h3></td>
                              <td style="background-image: linear-gradient(#d9534f, #AB274F);" class="text-white"><h3><?php echo $row['exam_correct_answer']; ?></h3></td>
                            <?php } else { ?>
                              <td ><h3><?php echo $row['exam_answer']; ?></h3></td>
                              <td class="bg-light text-dark"><h3><?php echo $row['exam_correct_answer']; ?></h3></td>
                            <?php } ?>
                        <?php } ?>
                      </tr>
                    <?php
                        }
                      }
                    ?> 
                    <?php 
                     if ($exam_title =="Student Success Kit") {
                      
                      $sql = "SELECT exam_answer, COUNT(exam_answer) AS total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                      AND semester ='$semester' AND school_year ='$school_year' GROUP BY exam_answer ORDER BY COUNT(exam_answer) DESC LIMIT 1";
                      $result = $db->query($sql);
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          $exam_answer = $row['exam_answer'];
                          $total_answer =$row['total'];
                          $data = $row['total'] / 8 * 40;
                        }
                      }

                     } elseif ($exam_title == "OASIS 3") {
                      $counter = 0;
                      $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                      AND semester ='$semester' AND school_year ='$school_year'";
                      $result = $db->query($sql);
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          if ($row['exam_correct_answer'] == $row['exam_answer']) {
                            $exam_answer = "0";
                            if ($exam_desc == "Vocabulary") {
                              $total_answer = "40";
                            } elseif ($exam_desc == "Computation") {
                              $total_answer = "30";
                            } elseif ($exam_desc == "Spatial") {
                              $total_answer = "20";
                            } elseif ($exam_desc == "World Comparison") {
                              $total_answer = "100";
                            }
                            $counter = $counter + 1;
                          }
                        }
                      }
                     } elseif ($exam_title == 'BarOn EQ-i:S') {
                      $counter = 0;
                      $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                      AND semester ='$semester' AND school_year ='$school_year'";
                      $result = $db->query($sql);
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          if ($row['exam_correct_answer'] == $row['exam_answer']) {
                            $counter = $counter + 1;
                          }
                        }
                      }
                     } elseif ($exam_title == 'The Keirsey Temperament Sorter') {
                      $counter = 0;
                      $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                      AND semester ='$semester' AND school_year ='$school_year'";
                      $result = $db->query($sql);
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          if ($row['exam_correct_answer'] == $row['exam_answer']) {
                            $counter = $counter + 1;
                          }
                        }
                      }
                     }
                    ?>         
                      <tr>
                        <?php if($exam_title == "Student Success Kit") { ?>
                          <td class="text-success"><h3>Total Score</h3></td>
                          <td class="text-success"><h3><b><?php echo $data; ?></b></h3></td>
                        <?php } elseif ($exam_title == "OASIS 3") { ?>
                          <td class="text-success"><h3>Total Score</h3></td>
                          <td class="text-success"><h3><b><?php echo $counter; ?></b></h3></td>
                          <td class="text-success"><h3><b>
                            <?php 
                              echo "Remarks: -" ; 
                            ?>
                          </b></h3></td>
                        <?php } elseif ($exam_title == "BarOn EQ-i:S") { ?>
                          <td class="text-success"><h3>Total Score</h3></td>
                          <td class="text-success"><h3><b><?php echo $counter; ?></b></h3></td>
                          <td class="text-success"><h3><b>
                            <?php 
                              $exam_result_status = "";
                              if ($counter >= 30 && $counter <=51) { 
                                $exam_result_status = "PASSED";
                                echo "Remarks: " .$exam_result_status; 
                              } elseif ($counter >= 20 && $counter <= 29) { 
                                $exam_result_status = "AVERAGED";
                                echo "Remarks: " .$exam_result_status;
                              } else if ($counter >= 0 && $counter <= 19) {
                                $exam_result_status = "FAILED";
                                echo "Remarks: " .$exam_result_status;
                              } 
                            ?>
                          </b></h3></td>
                        <?php } elseif ($exam_title == 'The Keirsey Temperament Sorter') { ?>
                          <td class="text-success"><h3>Total Score</h3></td>
                          <td class="text-success"><h3><b><?php echo $counter; ?></b></h3></td>
                          <td class="text-success"><h3><b>
                            <?php 
                              $exam_result_status = "";
                              if ($counter >= 60 && $counter <=70) { 
                                $exam_result_status = "EXCELLENT";
                                echo "Remarks: " .$exam_result_status; 
                              } elseif ($counter >= 40 && $counter <= 59) { 
                                $exam_result_status = "GOOD";
                                echo "Remarks: " .$exam_result_status;
                              } else if ($counter >= 20 && $counter <= 39) {
                                $exam_result_status = "AVERAGED";
                                echo "Remarks: " .$exam_result_status;
                              }  elseif ($counter >= 0 && $counter <19) {
                                $exam_result_status = "FAILED";
                                echo "Remarks: " .$exam_result_status;
                              }
                            ?>
                          </b></h3></td>
                       <?php } ?>
                      </tr>
                    </tbody>
                  </table>
                  <form id="submitExamResultFrm" method="POST">
                   <?php if ($exam_title == "Student Success Kit") { ?>
                      <input type="hidden" name="exam_answer" value="<?php echo $exam_answer; ?>">
                      <input type="hidden"  name="total_answer" value="<?php echo $total_answer; ?>">
                      <input type="hidden" name="total_score" value="<?php echo $data; ?>">
                   <?php } elseif ($exam_title == "OASIS 3") { ?>
                      <input type="hidden" name="exam_answer" value="<?php echo $exam_answer; ?>">
                      <input type="hidden"  name="total_answer" value="<?php echo $total_answer; ?>">
                      <input type="hidden" name="total_score" value="<?php echo $counter; ?>">
                  <?php } elseif ($exam_title == "BarOn EQ-i:S") { ?>
                    <input type="hidden" id="student_id" name="student_id" value="<?php echo $student_id; ?>">
                      <input type="hidden" id="exam_type" name="exam_type" value="<?php echo $exam_type; ?>">
                      <input type="hidden" id="exam_id" name="exam_id" value="<?php echo $exam_id; ?>">
                      <input type="hidden" id="exam_title" name="exam_title" value="<?php echo $exam_title; ?>">
                      <input type="hidden" id="exam_desc" name="exam_desc" value="<?php echo $exam_desc; ?>">
                      <input type="hidden" id="exam_result_status" name="exam_result_status" value="<?php echo $exam_result_status; ?>">
                      <input type="hidden" id="exam_answer" name="exam_answer" value="0">
                      <input type="hidden" id="total_answer" name="total_answer" value="51">
                      <input type="hidden" id="total_score" name="total_score" value="<?php echo $counter; ?>">

                      <input type="hidden" id="semester" value="<?php echo $semester; ?>">
                      <input type="hidden" id="school_year" value="<?php echo $school_year; ?>">
                      <input type="hidden" id="full_name" value="<?php echo $name; ?>">
                      <input type="hidden" id="gender" value="<?php echo $gender; ?>">
                      <input type="hidden" id="course" value="<?php echo $course; ?>">
                      <input type="hidden" id="start_date" value="<?php echo date('Y-md h:i:s A'); ?>">
                      <input type="hidden" id="email_address" value="<?php echo $email_address; ?>">
                      <input type="hidden" id="student_year" value="<?php echo $student_year; ?>">
                      
                  <?php } elseif ($exam_title == 'The Keirsey Temperament Sorter') { ?>
                      <input type="hidden" id="student_id" name="student_id" value="<?php echo $student_id; ?>">
                      <input type="hidden" id="exam_type" name="exam_type" value="<?php echo $exam_type; ?>">
                      <input type="hidden" id="exam_id" name="exam_id" value="<?php echo $exam_id; ?>">
                      <input type="hidden" id="exam_title" name="exam_title" value="<?php echo $exam_title; ?>">
                      <input type="hidden" id="exam_desc" name="exam_desc" value="<?php echo $exam_desc; ?>">
                      <input type="hidden" id="exam_result_status" name="exam_result_status" value="<?php echo $exam_result_status; ?>">
                      <input type="hidden" id="exam_answer" name="exam_answer" value="0">
                      <input type="hidden" id="total_answer" name="total_answer" value="70">
                      <input type="hidden" id="total_score" name="total_score" value="<?php echo $counter; ?>">

                      <input type="hidden" id="semester" value="<?php echo $semester; ?>">
                      <input type="hidden" id="school_year" value="<?php echo $school_year; ?>">
                      <input type="hidden" id="full_name" value="<?php echo $name; ?>">
                      <input type="hidden" id="gender" value="<?php echo $gender; ?>">
                      <input type="hidden" id="course" value="<?php echo $course; ?>">
                      <input type="hidden" id="start_date" value="<?php echo date('Y-md h:i:s A'); ?>">
                      <input type="hidden" id="email_address" value="<?php echo $email_address; ?>">
                      <input type="hidden" id="student_year" value="<?php echo $student_year; ?>">
                  <?php } ?>
                    <a href="" class="btn btn-success rounded-0 w-100 btn-lg" name="button_submit" type="submit">Submit</a>
                  </form>
                  </div>
                <div class="col-lg-3">
                
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->
<?php include('../footer.php'); ?>
