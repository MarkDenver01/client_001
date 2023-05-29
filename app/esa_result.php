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
  } else {
    $student_id = $_SESSION['key_session']['student_id'];
    $semester = $_SESSION['key_session']['academic_semester'];
    $school_year = $_SESSION['key_session']['academic_school_year']; 
    $student_name = $_SESSION['key_session']['name'];
    $exam_id = $_GET['exam_id'];
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

    <section class="section profile" style="width: 1760px;">
      <div class="row">
        <!-- center -->
        <div class="col-sm-7">
          <div class="card rounded-0">
            <div class="card-body">
              <br/>
              <div class="text-center"><h2>RESULT</h2></div>
              <hr/>
              <div class="row">
                <div class="col-lg-12">
                            <table class="table table-hover table-bordered text-nowrap text-center" id="tableList">
                                <?php 
                                     $sql_a = "SELECT SUM(exam_correct_answer) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_item_no IN(1, 13, 21, 31)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_w = $row['total'];
                                     $score_1 = ($result_w / 4);

                                     if ($score_1 >= 4.50 && $score_1 <= 5.00) {
                                       $remarks = "Very Satisfactory";
                                     } elseif ($score_1 >= 4.00 && $score_1 <= 4.49) {
                                       $remarks  = "Satisfactory";
                                     } elseif ($score_1 >= 3.50 && $score_1 <= 3.99) {
                                      $remarks = "Moderately Satisfactory";
                                     } elseif ($score_1 >= 3.00 && $score_1 <= 3.49) {
                                      $remarks = "Needs Enhancement";
                                     } elseif ($score_1 >= 0.00 && $score_1 <= 2.99) {
                                      $remarks = "Need thorough improvement";
                                     }
                                ?>
                                <tr>
                                  <thead>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Skills</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Item No.</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Score</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Remarks</th>
                                  </thead>
                                </tr>
                                <tr>
                                  <td rowspan="1" class="text-center"><h3>Written Communications</h3></td>
                                  <td>( 1, 13, 21, 31 )</td>
                                  <td><?php echo $score_1; ?></td>
                                  <td><?php echo $remarks; ?>
                                </tr>

                                <?php 
                                     $sql_a = "SELECT SUM(exam_correct_answer) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_item_no IN(7, 14, 18, 19, 23)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_w = $row['total'];
                                     $score_2 = ($result_w / 5);

                                    if ($score_2 >= 4.50 && $score_2 <= 5.00) {
                                      $remarks = "Very Satisfactory";
                                    } elseif ($score_2 >= 4.00 && $score_2 <= 4.49) {
                                      $remarks  = "Satisfactory";
                                    } elseif ($score_2 >= 3.50 && $score_2 <= 3.99) {
                                     $remarks = "Moderately Satisfactory";
                                    } elseif ($score_2 >= 3.00 && $score_2 <= 3.49) {
                                     $remarks = "Needs Enhancement";
                                    } elseif ($score_2 >= 0.00 && $score_2 <= 2.99) {
                                     $remarks = "Need thorough improvement";
                                    }
                                ?>

                                <tr>
                                  <thead>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Skills</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Item No.</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Score</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Remarks</th>
                                  </thead>
                                </tr>
                                <tr>
                                  <td rowspan="1" class="text-center"><h3>Negotiating & Persuading</h3></td>
                                  <td>( 7, 14, 18, 19, 23 )</td>
                                  <td><?php echo $score_2; ?></td>
                                  <td><?php echo $remarks; ?></td>
                                </tr>

                                <?php 
                                     $sql_a = "SELECT SUM(exam_correct_answer) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_item_no IN(6, 10, 17, 22)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_w = $row['total'];
                                     $score_3 = ($result_w / 4);

                                    if ($score_3 >= 4.50 && $score_3 <= 5.00) {
                                      $remarks = "Very Satisfactory";
                                    } elseif ($score_3 >= 4.00 && $score_3 <= 4.49) {
                                      $remarks  = "Satisfactory";
                                    } elseif ($score_3 >= 3.50 && $score_3 <= 3.99) {
                                     $remarks = "Moderately Satisfactory";
                                    } elseif ($score_3 >= 3.00 && $score_3 <= 3.49) {
                                     $remarks = "Needs Enhancement";
                                    } elseif ($score_3 >= 0.00 && $score_3 <= 2.99) {
                                     $remarks = "Need thorough improvement";
                                    }
                                ?>

                                <tr>
                                  <thead>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Skills</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Item No.</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Score</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Remarks</th>
                                  </thead>
                                </tr>
                                <tr>
                                  <td rowspan="1" class="text-center"><h3>Verbal Communication</h3></td>
                                  <td>( 6, 10, 17, 22 )</td>
                                  <td><?php echo $score_3; ?></td>
                                  <td><?php echo $remarks; ?></td>
                                </tr>

                                <?php 
                                     $sql_a = "SELECT SUM(exam_correct_answer) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_item_no IN(3, 11, 15, 30)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_w = $row['total'];
                                     $score_4 = ($result_w / 4);

                                    if ($score_4 >= 4.50 && $score_4 <= 5.00) {
                                      $remarks = "Very Satisfactory";
                                    } elseif ($score_4 >= 4.00 && $score_4 <= 4.49) {
                                      $remarks  = "Satisfactory";
                                    } elseif ($score_4 >= 3.50 && $score_4 <= 3.99) {
                                     $remarks = "Moderately Satisfactory";
                                    } elseif ($score_4 >= 3.00 && $score_4 <= 3.49) {
                                     $remarks = "Needs Enhancement";
                                    } elseif ($score_4 >= 0.00 && $score_4 <= 2.99) {
                                     $remarks = "Need thorough improvement";
                                    }
                                ?>

                                <tr>
                                  <thead>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Skills</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Item No.</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Score</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Remarks</th>
                                  </thead>
                                </tr>
                                <tr>
                                  <td rowspan="1" class="text-center"><h3>Co-operating</h3></td>
                                  <td>( 3, 11, 15, 30 )</td>
                                  <td><?php echo $score_4; ?></td>
                                  <td><?php echo $remarks; ?></td>
                                </tr>

                                <?php 
                                     $sql_a = "SELECT SUM(exam_correct_answer) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_item_no IN(2, 5, 12, 29)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_w = $row['total'];
                                     $score_5 = ($result_w / 4);

                                    if ($score_5 >= 4.50 && $score_5 <= 5.00) {
                                      $remarks = "Very Satisfactory";
                                    } elseif ($score_5 >= 4.00 && $score_5 <= 4.49) {
                                      $remarks  = "Satisfactory";
                                    } elseif ($score_5 >= 3.50 && $score_5 <= 3.99) {
                                     $remarks = "Moderately Satisfactory";
                                    } elseif ($score_5 >= 3.00 && $score_5 <= 3.49) {
                                     $remarks = "Needs Enhancement";
                                    } elseif ($score_5 >= 0.00 && $score_5 <= 2.99) {
                                     $remarks = "Need thorough improvement";
                                    }
                                ?>

                                <tr>
                                  <thead>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Skills</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Item No.</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Score</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Remarks</th>
                                  </thead>
                                </tr>
                                <tr>
                                  <td rowspan="1" class="text-center"><h3>Investigating & Analyzing</h3></td>
                                  <td>( 2, 5, 12, 29 )</td>
                                  <td><?php echo $score_5; ?></td>
                                  <td><?php echo $remarks; ?></td>
                                </tr>

                                <?php 
                                     $sql_a = "SELECT SUM(exam_correct_answer) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_item_no IN(4, 8, 32)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_w = $row['total'];
                                     $score_6 = ($result_w / 3);

                                    if ($score_6 >= 4.50 && $score_6 <= 5.00) {
                                      $remarks = "Very Satisfactory";
                                    } elseif ($score_6 >= 4.00 && $score_6 <= 4.49) {
                                      $remarks  = "Satisfactory";
                                    } elseif ($score_6 >= 3.50 && $score_6 <= 3.99) {
                                     $remarks = "Moderately Satisfactory";
                                    } elseif ($score_6 >= 3.00 && $score_6 <= 3.49) {
                                     $remarks = "Needs Enhancement";
                                    } elseif ($score_6 >= 0.00 && $score_6 <= 2.99) {
                                     $remarks = "Need thorough improvement";
                                    }
                                ?>

                                <tr>
                                  <thead>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Skills</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Item No.</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Score</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Remarks</th>
                                  </thead>
                                </tr>
                                <tr>
                                  <td rowspan="1" class="text-center"><h3>Leadership</h3></td>
                                  <td>( 4, 8, 32 )</td>
                                  <td><?php echo $score_6; ?></td>
                                  <td><?php echo $remarks; ?></td>
                                </tr>

                                <?php 
                                     $sql_a = "SELECT SUM(exam_correct_answer) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_item_no IN(20, 24, 26, 27)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_w = $row['total'];
                                     $score_7 = ($result_w / 4);

                                    if ($score_7 >= 4.50 && $score_7 <= 5.00) {
                                      $remarks = "Very Satisfactory";
                                    } elseif ($score_7 >= 4.00 && $score_7 <= 4.49) {
                                      $remarks  = "Satisfactory";
                                    } elseif ($score_7 >= 3.50 && $score_7 <= 3.99) {
                                     $remarks = "Moderately Satisfactory";
                                    } elseif ($score_7 >= 3.00 && $score_7 <= 3.49) {
                                     $remarks = "Needs Enhancement";
                                    } elseif ($score_7 >= 0.00 && $score_7 <= 2.99) {
                                     $remarks = "Need thorough improvement";
                                    }
                                ?>

                                <tr>
                                  <thead>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Skills</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Item No.</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Score</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Remarks</th>
                                  </thead>
                                </tr>
                                <tr>
                                  <td rowspan="1" class="text-center"><h3>Planning & Organizing</h3></td>
                                  <td>( 20, 24, 26, 27 )</td>
                                  <td><?php echo $score_7; ?></td>
                                  <td><?php echo $remarks; ?></td>
                                </tr>

                                <?php 
                                     $sql_a = "SELECT SUM(exam_correct_answer) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_item_no IN(9, 16, 25, 28)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_w = $row['total'];
                                     $score_8 = ($result_w / 4);

                                    if ($score_8 >= 4.50 && $score_8 <= 5.00) {
                                      $remarks = "Very Satisfactory";
                                    } elseif ($score_8 >= 4.00 && $score_8 <= 4.49) {
                                      $remarks  = "Satisfactory";
                                    } elseif ($score_8 >= 3.50 && $score_8 <= 3.99) {
                                     $remarks = "Moderately Satisfactory";
                                    } elseif ($score_8 >= 3.00 && $score_8 <= 3.49) {
                                     $remarks = "Needs Enhancement";
                                    } elseif ($score_8 >= 0.00 && $score_8 <= 2.99) {
                                     $remarks = "Need thorough improvement";
                                    }
                                ?>

                                <tr>
                                  <thead>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Skills</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Item No.</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Score</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Remarks</th>
                                  </thead>
                                </tr>
                                <tr>
                                  <td rowspan="1" class="text-center"><h3>Numeracy</h3></td>
                                  <td>( 9, 16, 25, 28 )</td>
                                  <td><?php echo $score_8; ?></td>
                                  <td><?php echo $remarks; ?></td>
                                </tr>
                               
                            </table> 
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-5">
          <div class="card rounded-0">
            <div class="card-body">
              <br/>
              <div class="text-center"><h2>Interpretation</h2></div>
              <hr/>
                  <div class="row mb-3">
                    <div class="col-lg-12">
                    <table class="table table-hover table-bordered mb-5 text-center text-nowrap">
                    <tbody>                   
                        <tr>
                          <td><h5>4.50 - 5.00</h5></td>
                          <td><h5>Very Satisfactory</h5></td>
                        </tr>     
                        <tr>
                          <td><h5>4.00 - 4.49</h5></td>
                          <td><h5>Satisfactory</h5></td>
                        </tr>   
                        <tr>
                          <td><h5>3.50 - 3.99</h5></td>
                          <td><h5>Moderately Satisfactory</h5></td>
                        </tr>  
                        <tr>
                          <td><h5>3.00 - 3.49</h5></td>
                          <td><h5>Needs Enhancement</h5></td>
                        </tr>  
                        <tr>
                          <td><h5>Below - 2.99</h5></td>
                          <td><h5>Need thorough improvement</h5></td>
                        </tr>  
                    </tbody>
                  </table>
                        </div>
                  </div> 
            </div>  
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->
<?php include('../footer.php'); ?>
