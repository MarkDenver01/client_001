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
    $exam_id = $_GET['exam_id'];
  }

  $data_x_graph = array();
  $data_y_graph = array();
  $data_remarks = array();
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
            <div class="card-body" id="print_content">
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

                                     $data_x_graph[] = "Written Communications";
                                     $data_y_graph[] = $score_1;
                                     $data_remarks[] = $remarks;
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

                                    $data_x_graph[] = "Negotiating & Persuading";
                                    $data_y_graph[] = $score_2;
                                    $data_remarks[] = $remarks;
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

                                    $data_x_graph[] = "Verbal Communication";
                                    $data_y_graph[] = $score_3;
                                    $data_remarks[] = $remarks;
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

                                    $data_x_graph[] = "Co-operating";
                                    $data_y_graph[] = $score_4;
                                    $data_remarks[] = $remarks;
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

                                    $data_x_graph[] = "Investigating & Analyzing";
                                    $data_y_graph[] = $score_5;
                                    $data_remarks[] = $remarks;
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

                                    $data_x_graph[] = "Leadership";
                                    $data_y_graph[] = $score_6;
                                    $data_remarks[] = $remarks;
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

                                    $data_x_graph[] = "Planning & Organizing";
                                    $data_y_graph[] = $score_7;
                                    $data_remarks[] = $remarks;
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

                                    $data_x_graph[] = "Numeracy";
                                    $data_y_graph[] = $score_8;
                                    $data_remarks[] = $remarks;
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
                  <div class="col-lg-12">
                  <br/>
                    <div class="text-center"><h2>ESA - Data Visualization</h2></div>
                    <hr/>
              <div id="pieChart" style="min-height: 400px;" class="echart"></div>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#pieChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    series: [{
                      type: 'pie',
                      radius: '80%',
                      data: [
                        {
                          value: '<?php echo $data_y_graph[0]; ?>',
                          name: '<?php echo $data_x_graph[0]; ?> (<?php echo $data_remarks[0]; ?>) '
                        },
                        {
                          value: '<?php echo $data_y_graph[1]; ?>',
                          name: '<?php echo $data_x_graph[1]; ?> (<?php echo $data_remarks[1]; ?>)'
                        },
                        {
                          value: '<?php echo $data_y_graph[2]; ?>',
                          name: '<?php echo $data_x_graph[2]; ?> (<?php echo $data_remarks[2]; ?>)'
                        },
                        {
                          value: '<?php echo $data_y_graph[3]; ?>',
                          name: '<?php echo $data_x_graph[3]; ?> (<?php echo $data_remarks[3]; ?>)'
                        },
                        {
                          value: '<?php echo $data_y_graph[4]; ?>',
                          name: '<?php echo $data_x_graph[4]; ?> (<?php echo $data_remarks[4]; ?>)'
                        },
                        {
                          value: '<?php echo $data_y_graph[5]; ?>',
                          name: '<?php echo $data_x_graph[5]; ?> (<?php echo $data_remarks[5]; ?>)'
                        },
                        {
                          value: '<?php echo $data_y_graph[6]; ?>',
                          name: '<?php echo $data_x_graph[6]; ?> (<?php echo $data_remarks[6]; ?>)'
                        },
                        {
                          value: '<?php echo $data_y_graph[7]; ?>',
                          name: '<?php echo $data_x_graph[7]; ?> (<?php echo $data_remarks[7]; ?>)'
                        },
                        {
                          value: '<?php echo $data_y_graph[8]; ?>',
                          name: '<?php echo $data_x_graph[8]; ?> (<?php echo $data_remarks[8]; ?>)'
                        }
                      ],
                      emphasis: {
                        itemStyle: {
                          shadowBlur: 10,
                          shadowOffsetX: 0,
                          shadowColor: 'rgba(0, 0, 0, 0.5)'
                        }
                      }
                    }]
                  });
                });
              </script>
              <!-- End Pie Chart -->
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
