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
  $student_no = $_SESSION['key_session']['student_no']; 
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
                <div class="col-lg-12">
                  <br/>
                  <div class="row">
                          <div class="col-lg-12">
                            <table class="table table-hover table-bordered text-nowrap text-center" id="tableList">
                              <thead>
                                <tr>
                                  <td><h3>5</h3</td>
                                  <td><h3>Strongly Angree</h3</td>
                                </tr>
                                <tr>
                                  <td><h3>4</h3</td>
                                  <td><h3>Agree Moderately</h3</td>
                                </tr>
                                <tr>
                                  <td><h3>3</h3</td>
                                  <td><h3>Agree a little</h3</td>
                                </tr>
                                <tr>
                                  <td><h3>2</h3</td>
                                  <td><h3>Nuetral</h3</td>
                                </tr>
                                <tr>
                                  <td><h3>1</h3</td>
                                  <td><h3>Disagree</h3></td>
                                </tr>
                              </thead>
                            </table>
                          </div>
                          <div class="col-lg-12">
                            <table class="table table-hover table-bordered text-nowrap text-center" id="tableList">
                                <?php 
                                     $sql_a = "SELECT SUM(exam_correct_answer) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_item_no IN(1, 13, 21, 31)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_w = $row['total'];
                                     $score_1 = ($result_w / 4);
                                ?>
                                <tr>
                                  <thead>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Skills</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Item No.</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Score</th>
                                  </thead>
                                </tr>
                                <tr>
                                  <td rowspan="1" class="text-center"><h3>Written Communications</h3></td>
                                  <td>( 1, 13, 21, 31 )</td>
                                  <td><?php echo $score_1; ?></td>
                                </tr>

                                <?php 
                                     $sql_a = "SELECT SUM(exam_correct_answer) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_item_no IN(7, 14, 18, 19, 23)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_w = $row['total'];
                                     $score_2 = ($result_w / 5);
                                ?>

                                <tr>
                                  <thead>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Skills</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Item No.</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Score</th>
                                  </thead>
                                </tr>
                                <tr>
                                  <td rowspan="1" class="text-center"><h3>Negotiating & Persuading</h3></td>
                                  <td>( 7, 14, 18, 19, 23 )</td>
                                  <td><?php echo $score_2; ?></td>
                                </tr>

                                <?php 
                                     $sql_a = "SELECT SUM(exam_correct_answer) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_item_no IN(6, 10, 17, 22)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_w = $row['total'];
                                     $score_3 = ($result_w / 4);
                                ?>

                                <tr>
                                  <thead>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Skills</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Item No.</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Score</th>
                                  </thead>
                                </tr>
                                <tr>
                                  <td rowspan="1" class="text-center"><h3>Verbal Communication</h3></td>
                                  <td>( 6, 10, 17, 22 )</td>
                                  <td><?php echo $score_3; ?></td>
                                </tr>

                                <?php 
                                     $sql_a = "SELECT SUM(exam_correct_answer) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_item_no IN(3, 11, 15, 30)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_w = $row['total'];
                                     $score_4 = ($result_w / 4);
                                ?>

                                <tr>
                                  <thead>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Skills</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Item No.</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Score</th>
                                  </thead>
                                </tr>
                                <tr>
                                  <td rowspan="1" class="text-center"><h3>Co-operating</h3></td>
                                  <td>( 3, 11, 15, 30 )</td>
                                  <td><?php echo $score_4; ?></td>
                                </tr>

                                <?php 
                                     $sql_a = "SELECT SUM(exam_correct_answer) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_item_no IN(2, 5, 12, 29)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_w = $row['total'];
                                     $score_5 = ($result_w / 4);
                                ?>

                                <tr>
                                  <thead>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Skills</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Item No.</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Score</th>
                                  </thead>
                                </tr>
                                <tr>
                                  <td rowspan="1" class="text-center"><h3>Investigating & Analyzing</h3></td>
                                  <td>( 2, 5, 12, 29 )</td>
                                  <td><?php echo $score_5; ?></td>
                                </tr>

                                <?php 
                                     $sql_a = "SELECT SUM(exam_correct_answer) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_item_no IN(4, 8, 32)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_w = $row['total'];
                                     $score_6 = ($result_w / 3);
                                ?>

                                <tr>
                                  <thead>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Skills</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Item No.</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Score</th>
                                  </thead>
                                </tr>
                                <tr>
                                  <td rowspan="1" class="text-center"><h3>Leadership</h3></td>
                                  <td>( 4, 8, 32 )</td>
                                  <td><?php echo $score_6; ?></td>
                                </tr>

                                <?php 
                                     $sql_a = "SELECT SUM(exam_correct_answer) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_item_no IN(20, 24, 26, 27)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_w = $row['total'];
                                     $score_7 = ($result_w / 4);
                                ?>

                                <tr>
                                  <thead>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Skills</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Item No.</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Score</th>
                                  </thead>
                                </tr>
                                <tr>
                                  <td rowspan="1" class="text-center"><h3>Planning & Organizing</h3></td>
                                  <td>( 20, 24, 26, 27 )</td>
                                  <td><?php echo $score_7; ?></td>
                                </tr>

                                <?php 
                                     $sql_a = "SELECT SUM(exam_correct_answer) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_item_no IN(9, 16, 25, 28)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_w = $row['total'];
                                     $score_8 = ($result_w / 4);
                                ?>

                                <tr>
                                  <thead>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Skills</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Item No.</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Score</th>
                                  </thead>
                                </tr>
                                <tr>
                                  <td rowspan="1" class="text-center"><h3>Numeracy</h3></td>
                                  <td>( 9, 16, 25, 28 )</td>
                                  <td><?php echo $score_8; ?></td>
                                </tr>
                               
                            </table>
                          </div>
                        </div>
                  <form id="submitExamResultFrm" method="POST">
                   <?php if ($exam_title == "ESA") { ?>
                      <input type="hidden" id="student_id" name="student_id" value="<?php echo $student_id; ?>">
                      <input type="hidden" id="exam_type" name="exam_type" value="<?php echo $exam_type; ?>">
                      <input type="hidden" id="exam_id" name="exam_id" value="<?php echo $exam_id; ?>">
                      <input type="hidden" id="exam_title" name="exam_title" value="<?php echo $exam_title; ?>">
                      <input type="hidden" id="exam_desc" name="exam_desc" value="<?php echo $exam_desc; ?>">
                      <input type="hidden" id="exam_result_status" name="exam_result_status" value="<?php echo $exam_result_status; ?>">
                      <input type="hidden" id="exam_answer" name="exam_answer" value="0">
                      <input type="hidden" id="total_answer" name="total_answer" value="32">
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
                    <a href="" class="btn btn-success rounded-pill w-100 btn-lg" name="button_submit" type="submit">Submit</a>
                  </form>
                  </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->
<?php include('../footer.php'); ?>
