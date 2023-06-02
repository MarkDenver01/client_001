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
                  <div class="col-lg-6">
                            <table class="table table-bordered table-hover text-nowrap text-center" id="tableList">
                              <thead>
                                <tr>
                                  <td colspan="3" style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">Linguistics</td>
                                </tr>
                              </thead>
                              <thead>
                                <tr>
                                  <td  style="background-image: linear-gradient(#0B6623, #3F704D);" class="text-white">Item No.</td>
                                  <td  style="background-image: linear-gradient(#0B6623, #3F704D);" class="text-white">Answer</td>
                                  <td  style="background-image: linear-gradient(#0B6623, #3F704D);" class="text-white">Correct Answer</td>
                                </tr>
                              </thead>
                              <tbody>
                                    <?php 
                                         $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                         AND semester ='$semester' AND school_year ='$school_year' 
                                         AND exam_item_no 
                                         IN( 1,2,4,5,8,9,11,12,15,16,18,19,22,23,25,26,29,30,32,33,36,37,39,40,43,44,46,47,50,51,53,54,57,58,60,61,64,65,67,68,71,72,74,75,78,79,81,82)";
                                         $result = $db->query($sql);
                                         if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                    ?> 
                                <tr>
                                    <td ><?php echo $row['exam_item_no']; ?></td>
                                    <?php 
                                        if ($row['exam_answer'] == $row['exam_correct_answer']) {
                                    ?>
                                        <td style="background-image: linear-gradient(#568203, #568203);" class="text-white"><h3><?php echo $row['exam_answer']; ?></h3></td>
                                        <td style="background-image: linear-gradient(#568203, #568203);" class="text-white"><h3><?php echo $row['exam_correct_answer']; ?></h3></td>
                        
                                    <?php 
                                        } else { 
                                    ?>
                                        <td ><h3><?php echo $row['exam_answer']; ?></h3></td>
                                        <td class="bg-light text-dark"><h3><?php echo $row['exam_correct_answer']; ?></h3></td>
                                    <?php } ?>
                                </tr>
                                    <?php
                                            }
                                         }
                                    ?>
                              </tbody>
                            </table>
                          </div>

                          <div class="col-lg-6">
                            <table class="table table-bordered table-hover text-nowrap text-center" id="tableList">
                              <thead>
                                <tr>
                                  <td colspan="3" style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">Quantitative</td>
                                </tr>
                              </thead>
                              <thead>
                                <tr>
                                  <td  style="background-image: linear-gradient(#0B6623, #3F704D);" class="text-white">Item No.</td>
                                  <td  style="background-image: linear-gradient(#0B6623, #3F704D);" class="text-white">Answer</td>
                                  <td  style="background-image: linear-gradient(#0B6623, #3F704D);" class="text-white">Correct Answer</td>
                                </tr>
                              </thead>
                              <tbody>
                                    <?php 
                                         $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                         AND semester ='$semester' AND school_year ='$school_year' 
                                         AND exam_item_no 
                                         IN(3,6,7,10,13,14,17,20,21,24,27,28,31,34,35,38,41,42,45,48,49,52,55,56,59,62,63,66,69,70,73,76,77,80,83,84)";
                                         $result = $db->query($sql);
                                         if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                    ?> 
                                <tr>
                                    <td ><?php echo $row['exam_item_no']; ?></td>
                                    <?php 
                                        if ($row['exam_answer'] == $row['exam_correct_answer']) {
                                    ?>
                                        <td style="background-image: linear-gradient(#568203, #568203);" class="text-white"><h3><?php echo $row['exam_answer']; ?></h3></td>
                                        <td style="background-image: linear-gradient(#568203, #568203);" class="text-white"><h3><?php echo $row['exam_correct_answer']; ?></h3></td>
                        
                                    <?php 
                                        } else { 
                                    ?>
                                        <td ><h3><?php echo $row['exam_answer']; ?></h3></td>
                                        <td class="bg-light text-dark"><h3><?php echo $row['exam_correct_answer']; ?></h3></td>
                                    <?php } ?>
                                </tr>
                                    <?php
                                            }
                                         }
                                    ?>
                              </tbody>
                            </table>
                          </div>
                  </div>
                  <form id="submitExamResultFrm" method="POST">
                   <?php if ($exam_title == "Aptitude Verbal and Numerical") { ?>
                    <?php 
                        $counter_l= 0;
                        $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                        AND semester ='$semester' AND school_year ='$school_year' 
                        AND exam_item_no 
                        IN( 1,2,4,5,8,9,11,12,15,16,18,19,22,23,25,26,29,30,32,33,36,37,39,40,43,44,46,47,50,51,53,54,57,58,60,61,64,65,67,68,71,72,74,75,78,79,81,82)";
                        $result = $db->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {  
                                if ($row['exam_answer'] == $row['exam_correct_answer']) {
                                    $counter_l++;
                                } 
                            }
                        }
                        $linguistics = $counter_l;

                        $counter_q = 0;
                        $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                        AND semester ='$semester' AND school_year ='$school_year' 
                        AND exam_item_no 
                        IN(3,6,7,10,13,14,17,20,21,24,27,28,31,34,35,38,41,42,45,48,49,52,55,56,59,62,63,66,69,70,73,76,77,80,83,84)";
                        $result = $db->query($sql);
                        if ($result->num_rows > 0) {
                           while ($row = $result->fetch_assoc()) {
                            if ($row['exam_answer'] == $row['exam_correct_answer']) {
                                $counter_q++;
                            } 
                           }
                        }
                        $quantitative = $counter_q;

                        $total_score = $linguistics + $quantitative;

                        if ($total_score >= 63 && $total_score <= 68) {
                            $exam_result_status = "Superior";
                        } elseif ($total_score >= 50 && $total_score <= 62) {
                            $exam_result_status = "Above Average";
                        } elseif ($total_score >= 34 && $total_score <= 49) {
                            $exam_result_status = "Average";
                        } elseif ($total_score >= 27 && $total_score <= 33) {
                            $exam_result_status = "Below Average";
                        } elseif ($total_score >= 0 && $total_score <= 26) {
                            $exam_result_status = "Low";
                        }
                    ?>
                    <input type="hidden" id="student_id" name="student_id" value="<?php echo $student_id; ?>">
                      <input type="hidden" id="exam_type" name="exam_type" value="<?php echo $exam_type; ?>">
                      <input type="hidden" id="exam_id" name="exam_id" value="<?php echo $exam_id; ?>">
                      <input type="hidden" id="exam_title" name="exam_title" value="<?php echo $exam_title; ?>">
                      <input type="hidden" id="exam_desc" name="exam_desc" value="<?php echo $exam_desc; ?>">
                      <input type="hidden" id="exam_result_status" name="exam_result_status" value="<?php echo $exam_result_status; ?>">
                      <input type="hidden" id="exam_answer" name="exam_answer" value="0">
                      <input type="hidden" id="total_answer" name="total_answer" value="84">
                      <input type="hidden" id="total_score" name="total_score" value="<?php echo $total_score; ?>">

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
