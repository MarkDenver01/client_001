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
  if (isset($_POST['button_submit'])) {

    $sqlExist = $db->query("SELECT * FROM examinee WHERE student_id ='$student_id' 
    AND exam_id='$exam_id' 
    AND exam_title='$exam_title' 
    AND exam_description ='$exam_desc' 
    AND exam_category ='$exam_type'");
    if($sqlExist->num_rows > 0) {
      $sqlUpdate = $db->query("UPDATE examinee SET 
      start_exam_date='$start_date', 
      exam_answer='$exam_answers', 
      total_answer='$total_answers', 
      total_score='$total_score' WHERE student_id='$student_id' 
      AND exam_id='$exam_id' 
      AND exam_title ='$exam_title' 
      AND exam_description='$exam_desc' 
      AND exam_category ='$exam_type'");

      if($sqlUpdate) {
        if ($exam_title == "Student Success Kit") {
          redirect('./student_success_kit_result', false);
        } elseif ($exam_title == "OASIS 3") {
          redirect('./oasis_result.php');
        } else {
          redirect('./student_success_kit_result', false);
        }
      }

    } else {
      $sql = $db->query("INSERT INTO examinee(
        student_id, 
        exam_id, 
        name, 
        email_address, 
        gender, 
        course, 
        semester, 
        school_year, 
        student_year, 
        exam_title, 
        exam_description, 
        exam_category, 
        start_exam_date, 
        exam_answer,
        total_answer,
        total_score, 
        exam_result_status, 
        counselor_notify_status) VALUES(
        '$student_id',
        '$exam_id',
        '$name',
        '$email_address',
        '$gender',
        '$course',
        '$semester',
        '$school_year',
        '$student_year',
        '$exam_title',
        '$exam_desc',
        '$exam_type',
        '$start_date',
        '$exam_answers',
        '$total_answers',
        '$total_score',
        'Done',
        'Pending')");

      if($sql) {
        if ($exam_title == "Student Success Kit") {
          redirect('./student_success_kit_result', false);
        } elseif ($exam_title == "OASIS 3") {
          redirect('./oasis_result.php');
        } else {
          redirect('./student_success_kit_result', false);
        }
      }
    }
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
                        <?php if($exam_title == 'OASIS 3') { ?>
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
                        <?php } ?>
                      </tr>
                    </tbody>
                  </table>
                  <form action="" method="POST">
                   <?php if ($exam_title == "Student Success Kit") { ?>
                      <input type="hidden" name="exam_answer" value="<?php echo $exam_answer; ?>">
                      <input type="hidden"  name="total_answer" value="<?php echo $total_answer; ?>">
                      <input type="hidden" name="total_score" value="<?php echo $data; ?>">
                   <?php } elseif ($exam_title == "OASIS 3") { ?>
                      <input type="hidden" name="exam_answer" value="<?php echo $exam_answer; ?>">
                      <input type="hidden"  name="total_answer" value="<?php echo $total_answer; ?>">
                      <input type="hidden" name="total_score" value="<?php echo $counter; ?>">
                  <?php } ?>
                    <button class="btn btn-success rounded-0 w-100 btn-lg" name="button_submit" type="submit">Submit</button>
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
