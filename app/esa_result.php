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
    $student_name = $_SESSION['key_session']['name'];
    $exam_id = $_GET['exam_id'];
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
            <div class="card-body">
              <br/>
              <div class="text-center"><h2>RESULT</h2></div>
              <hr/>
              <div class="row">
                <div class="col-lg-12">
                  <br/>
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
                                $sql = "SELECT exam_answer,counselor_notify_status, total_score FROM examinee WHERE student_id ='$student_id' 
                                AND semester ='$semester' AND school_year ='$school_year' AND exam_title = 'ESA'";
                                $result = $db->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $highest_prob = $row['exam_answer'];
                                        $data = $row['total_score'];
                                        $total_score = $row['total_score'];
                                        $counselour_stats = $row['counselor_notify_status'];
                                    }
                                }
     
                                if ($data >= 25 && $data <=32) { 
                                    $exam_result_status = "EXCELLENT";
                                    $msg = $exam_result_status; 
                                  } elseif ($data >= 15 && $data <= 24) { 
                                    $exam_result_status = "GOOD";
                                    $msg =$exam_result_status;
                                  } elseif ($data >= 5 && $data <= 14) {
                                    $exam_result_status = "POOR";
                                    $msg =$exam_result_status;
                                  }  elseif ($data >= 0 && $data <= 4) {
                                    $exam_result_status = "BAD";
                                    $msg =$exam_result_status;
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
                                        <h3><?php echo $total_score ." out of 32"; ?></h3>
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
                                            <?php if ($counselour_stats == 'Completed') { ?>
                                            <?php echo $counselour_stats; ?>
                                            <?php } else { ?>
                                            <?php echo $msg; ?>
                                            <?php } ?>
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
                    <table class="table table-hover table-bordered mb-5 text-center text-nowrap">
                    <tbody>                   
                        <tr>
                          <td><h5>25 - 32</h5></td>
                          <td><h5>EXCELLENT</h5></td>
                        </tr>     
                        <tr>
                          <td><h5>15 - 24</h5></td>
                          <td><h5>GOOD</h5></td>
                        </tr>   
                        <tr>
                          <td><h5>5 - 14</h5></td>
                          <td><h5>POOR</h5></td>
                        </tr>  
                        <tr>
                          <td><h5>0 - 4</h5></td>
                          <td><h5>BAD</h5></td>
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
