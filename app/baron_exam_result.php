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
                    <div class="col-lg-2"></div>
                    <div class="col-lg-1">
                        <table class="table table-bordered mb-5 text-center">
                            <thead>
                                <tr>
                                    <td class="bg-success text-white"><h3>A</h3></td>
                                </tr>
                            </thead>
                            <tbody>              
                            <?php 
                                $results = baron_answer($_SESSION['key_session']['student_id'], $exam_id, $_SESSION['key_session']['academic_semester'], $_SESSION['key_session']['academic_school_year']);
                            ?>
                            <?php foreach ($results as $key) { ?>
                            <?php if ($key['exam_correct_answer'] == 'a') { ?>
                                <tr>   
                                    <td style="background-image: linear-gradient(#d9534f, #AB274F);" class="text-white"><h3><?php echo $key['exam_answer']; ?></h3></td>
                                </tr>
                            <?php } ?>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-1">
                            <table class="table table-bordered mb-5 text-center">
                        <thead>
                                <tr>
                                    <td class="bg-success text-white"><h3>B</h3></td>
                                </tr>
                            </thead>
                            <tbody>              
                            <?php 
                                $results = baron_answer($_SESSION['key_session']['student_id'], $exam_id, $_SESSION['key_session']['academic_semester'], $_SESSION['key_session']['academic_school_year']);
                            ?>
                            <?php foreach ($results as $key) { ?>
                            <?php if ($key['exam_correct_answer'] == 'b') { ?>
                                <tr>   
                                    <td style="background-image: linear-gradient(#d9534f, #AB274F);" class="text-white"><h3><?php echo $key['exam_answer']; ?></h3></td>
                                </tr>
                            <?php } ?>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-1">
                            <table class="table table-bordered mb-5 text-center">
                        <thead>
                                <tr>
                                    <td class="bg-success text-white"><h3>C</h3></td>
                                </tr>
                            </thead>
                            <tbody>              
                            <?php 
                                $results = baron_answer($_SESSION['key_session']['student_id'], $exam_id, $_SESSION['key_session']['academic_semester'], $_SESSION['key_session']['academic_school_year']);
                            ?>
                            <?php foreach ($results as $key) { ?>
                            <?php if ($key['exam_correct_answer'] == 'c') { ?>
                                <tr>   
                                    <td style="background-image: linear-gradient(#d9534f, #AB274F);" class="text-white"><h3><?php echo $key['exam_answer']; ?></h3></td>
                                </tr>
                            <?php } ?>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-1">
                        <table class="table table-bordered mb-5 text-center">
                            <thead>
                                <tr>
                                    <td class="bg-success text-white"><h3>D</h3></td>
                                </tr>
                            </thead>
                            <tbody>              
                            <?php 
                                $results = baron_answer($_SESSION['key_session']['student_id'], $exam_id, $_SESSION['key_session']['academic_semester'], $_SESSION['key_session']['academic_school_year']);
                            ?>
                            <?php foreach ($results as $key) { ?>
                            <?php if ($key['exam_correct_answer'] == 'd') { ?>
                                <tr>   
                                    <td style="background-image: linear-gradient(#d9534f, #AB274F);" class="text-white"><h3><?php echo $key['exam_answer']; ?></h3></td>
                                </tr>
                            <?php } ?>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-1">
                        <table class="table table-bordered mb-5 text-center">
                            <thead>
                                <tr>
                                    <td class="bg-success text-white"><h3>E</h3></td>
                                </tr>
                            </thead>
                            <tbody>              
                            <?php 
                                $results = baron_answer($_SESSION['key_session']['student_id'], $exam_id, $_SESSION['key_session']['academic_semester'], $_SESSION['key_session']['academic_school_year']);
                            ?>
                            <?php foreach ($results as $key) { ?>
                            <?php if ($key['exam_correct_answer'] == 'e') { ?>
                                <tr>   
                                    <td style="background-image: linear-gradient(#d9534f, #AB274F);" class="text-white"><h3><?php echo $key['exam_answer']; ?></h3></td>
                                </tr>
                            <?php } ?>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-1">
                        <table class="table table-bordered mb-5 text-center">
                            <thead>
                                <tr>
                                    <td class="bg-success text-white"><h3>F</h3></td>
                                </tr>
                            </thead>
                            <tbody>              
                                <tr>
                                    <td>-----</td>
                                </tr>          
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-1">
                        <table class="table table-bordered mb-5 text-center">
                            <thead>
                                <tr>
                                    <td class="bg-success text-white"><h3>G</h3></td>
                                </tr>
                            </thead>
                            <tbody>              
                            <?php 
                                $results = baron_answer($_SESSION['key_session']['student_id'], $exam_id, $_SESSION['key_session']['academic_semester'], $_SESSION['key_session']['academic_school_year']);
                            ?>
                            <?php foreach ($results as $key) { ?>
                            <?php if ($key['exam_correct_answer'] == 'g') { ?>
                                <tr>   
                                    <td style="background-image: linear-gradient(#d9534f, #AB274F);" class="text-white"><h3><?php echo $key['exam_answer']; ?></h3></td>
                                </tr>
                            <?php } ?>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-3"></div>
                  </div>
                  <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-1">
                    <table class="table table-bordered mb-5 text-center">
                            <?php 
                                $sql = "SELECT SUM(exam_answer) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a'";
                                $result = $db->query($sql);
                                if ($db->num_rows($result)) {
                                    $fetch = $db->fetch_assoc($result);
                                    $total_a = $fetch['total'];
                                }
                            ?>
                            <thead>              
                                <tr>   
                                    <td style="background-image: linear-gradient(#1560BD, #2243B6);" class="text-white"><h3><?php echo $total_a; ?></h3></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>   
                                    <td class="bg-success text-white"><h3>A</h3></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-1">
                        <table class="table table-bordered mb-5 text-center">
                            <?php 
                                $sql = "SELECT SUM(exam_answer) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b'";
                                $result = $db->query($sql);
                                if ($db->num_rows($result)) {
                                    $fetch = $db->fetch_assoc($result);
                                    $total_b = $fetch['total'];
                                }
                            ?>
                            <thead>              
                                <tr>   
                                    <td style="background-image: linear-gradient(#1560BD, #2243B6);" class="text-white"><h3><?php echo $total_b; ?></h3></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>   
                                    <td class="bg-success text-white"><h3>B</h3></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-1">
                        <table class="table table-bordered mb-5 text-center">
                            <?php 
                                $sql = "SELECT SUM(exam_answer) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='c'";
                                $result = $db->query($sql);
                                if ($db->num_rows($result)) {
                                    $fetch = $db->fetch_assoc($result);
                                    $total_c = $fetch['total'];
                                }
                            ?>
                            <thead>              
                                <tr>   
                                    <td style="background-image: linear-gradient(#1560BD, #2243B6);" class="text-white"><h3><?php echo $total_c; ?></h3></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>   
                                    <td class="bg-success text-white"><h3>C</h3></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-1">
                        <table class="table table-bordered mb-5 text-center">
                            <?php 
                                $sql = "SELECT SUM(exam_answer) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='d'";
                                $result = $db->query($sql);
                                if ($db->num_rows($result)) {
                                    $fetch = $db->fetch_assoc($result);
                                    $total_d = $fetch['total'];
                                }
                            ?>
                            <thead>              
                                <tr>   
                                    <td style="background-image: linear-gradient(#1560BD, #2243B6);" class="text-white"><h3><?php echo $total_d; ?></h3></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>   
                                    <td class="bg-success text-white"><h3>D</h3></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-1">
                        <table class="table table-bordered mb-5 text-center">
                            <?php 
                                $sql = "SELECT SUM(exam_answer) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='e'";
                                $result = $db->query($sql);
                                if ($db->num_rows($result)) {
                                    $fetch = $db->fetch_assoc($result);
                                    $total_e = $fetch['total'];
                                }
                            ?>
                            <thead>              
                                <tr>   
                                    <td style="background-image: linear-gradient(#1560BD, #2243B6);" class="text-white"><h3><?php echo $total_e; ?></h3></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>   
                                    <td class="bg-success text-white"><h3>E</h3></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-1">
                        <table class="table table-bordered mb-5 text-center">
                            <?php 
                                $overall_total = ($total_a + $total_b + $total_c + $total_d + $total_e);
                                $overall_total = $overall_total / 5;
                            ?>
                            <thead>              
                                <tr>   
                                    <td style="background-image: linear-gradient(#1560BD, #2243B6);" class="text-white"><h3><?php echo $overall_total; ?></h3></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>   
                                    <td class="bg-success text-white"><h3>F</h3></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-1">
                        <table class="table table-bordered mb-5 text-center">
                            <?php 
                                $sql = "SELECT SUM(exam_answer) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='g'";
                                $result = $db->query($sql);
                                if ($db->num_rows($result)) {
                                    $fetch = $db->fetch_assoc($result);
                                    $total_g = $fetch['total'];
                                }
                            ?>
                            <thead>              
                                <tr>   
                                    <td style="background-image: linear-gradient(#1560BD, #2243B6);" class="text-white"><h3><?php echo $total_g; ?></h3></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>   
                                    <td class="bg-success text-white"><h3>G</h3></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-3"></div>
                  </div>
                  <form id="submitExamResultFrm" method="POST">
                   <?php if ($exam_title == "BarOn EQ-i:S") { ?>
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
                  <?php } ?>
                    <a href="" class="btn btn-success rounded-0 w-100 btn-lg" name="button_submit" type="submit">Submit</a>
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
