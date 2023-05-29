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
        <div class="col-sm-6">
          <div class="card rounded-0">
            <div class="card-body">
              <br/>
              <div class="text-center"><h2>RESULT</h2></div>
              <hr/>
              <div class="row">
                  <div class="col-lg-12">
                            <table class="table table-bordered table-hover text-nowrap text-center" id="tableList">
                              <thead>
                                <tr>
                                  <td  style="background-image: linear-gradient(#0B6623, #3F704D);" class="text-white"></td>
                                  <td  style="background-image: linear-gradient(#0B6623, #3F704D);" class="text-white">Raw Score</td>
                                  <td  style="background-image: linear-gradient(#0B6623, #3F704D);" class="text-white">Remarks</td>
                                </tr>
                              </thead>
                              <tbody>
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

                                  if ($linguistics >= 39 && $linguistics <= 43) {
                                      $remarks_l = "Superior";
                                  } elseif ($linguistics >= 31 && $linguistics <= 38) {
                                      $remarks_l = "Above Average";
                                  } elseif ($linguistics >= 20 && $linguistics <= 30) {
                                      $remarks_l = "Average";
                                  } elseif ($linguistics >= 15 && $linguistics <= 19) {
                                      $remarks_l = "Below Average";
                                  } elseif ($linguistics >= 0 && $linguistics <= 14) {
                                      $remarks_l = "Low";
                                  }

                                  if ($quantitative >= 28 && $quantitative <= 30) {
                                      $remarks_q = "Superior";
                                  } elseif ($quantitative >= 22 && $quantitative <= 27) {
                                      $remarks_q = "Above Average";
                                  } elseif ($quantitative >= 14 && $quantitative <= 21) {
                                      $remarks_q = "Average";
                                  } elseif ($quantitative >= 9 && $quantitative <= 13) {
                                      $remarks_q = "Below Average";
                                  } elseif ($quantitative >= 0 && $quantitative <= 8) {
                                      $remarks_q = "Low";
                                  }
                                  
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
                                  <tr>
                                    <td><h3>Linguistics (verbal)</h3></td>
                                    <td><h3><?php echo $linguistics; ?></h3></td>
                                    <td><h3><?php echo $remarks_l; ?></h3></td>
                                  </tr>
                                  <tr>
                                    <td><h3>Quantitative (numerical)</h3></td>
                                    <td><h3><?php echo $quantitative; ?></h3></td>
                                    <td><h3><?php echo $remarks_q; ?></h3></td>
                                  </tr>
                                  <tr>
                                    <td><h3>Total score</h3></td>
                                    <td><h3><?php echo $total_score; ?></h3></td>
                                    <td><h3><?php echo $exam_result_status; ?></h3></td>
                                  </tr>

                              </tbody>
                            </table>
                          </div>
                  </div>

            </div>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="card rounded-0">
            <div class="card-body">
              <br/>
              <div class="text-center"><h2>Data Visualization</h2></div>
              <hr/>
                  <div class="row mb-3">
                    <div class="col-lg-4">
                      <table class="table table-bordered table-hover text-nowrap text-center" id="tableList">
                      <thead>
                        <tr>
                          <td colspan="2" style="background-image: linear-gradient(#0B6623, #3F704D);" class="text-white">Linguistics (verbal)</td>
                        </tr>
                      </thead>
                      <thead>
                        <tr>
                          <td  style="background-image: linear-gradient(#0066B2, #002D62);" class="text-white">Raw Score</td>
                          <td  style="background-image: linear-gradient(#0066B2, #002D62);" class="text-white">Remarks</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1 - 14</td>
                          <td>LOW</td>
                        </tr>
                        <tr>
                          <td>15 - 19</td>
                          <td>Below Average</td>
                        </tr>
                        <tr>
                          <td>20 - 30</td>
                          <td>Average</td>
                        </tr>
                        <tr>
                          <td>31 - 38</td>
                          <td>Above Average</td>
                        </tr>
                        <tr>
                          <td>38 - 43</td>
                          <td>Superior</td>
                        </tr>
                      </tbody>
                      </table>
                    </div>
                    
                    <div class="col-lg-4">
                      <table class="table table-bordered table-hover text-nowrap text-center" id="tableList">
                      <thead>
                        <tr>
                          <td colspan="2" style="background-image: linear-gradient(#0B6623, #3F704D);" class="text-white">Quantitative (numerical)</td>
                        </tr>
                      </thead>
                      <thead>
                        <tr>
                          <td  style="background-image: linear-gradient(#0066B2, #002D62);" class="text-white">Raw Score</td>
                          <td  style="background-image: linear-gradient(#0066B2, #002D62);" class="text-white">Remarks</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1 - 8</td>
                          <td>LOW</td>
                        </tr>
                        <tr>
                          <td>9 - 13</td>
                          <td>Below Average</td>
                        </tr>
                        <tr>
                          <td>14 - 21</td>
                          <td>Average</td>
                        </tr>
                        <tr>
                          <td>22 - 27</td>
                          <td>Above Average</td>
                        </tr>
                        <tr>
                          <td>28</td>
                          <td>Superior</td>
                        </tr>
                      </tbody>
                      </table>
                    </div>

                    <div class="col-lg-4">
                      <table class="table table-bordered table-hover text-nowrap text-center" id="tableList">
                      <thead>
                        <tr>
                          <td colspan="2" style="background-image: linear-gradient(#0B6623, #3F704D);" class="text-white">Total Score</td>
                        </tr>
                      </thead>
                      <thead>
                        <tr>
                          <td  style="background-image: linear-gradient(#0066B2, #002D62);" class="text-white">Raw Score</td>
                          <td  style="background-image: linear-gradient(#0066B2, #002D62);" class="text-white">Remarks</td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1 - 26</td>
                          <td>LOW</td>
                        </tr>
                        <tr>
                          <td>27 - 33</td>
                          <td>Below Average</td>
                        </tr>
                        <tr>
                          <td>34 - 49</td>
                          <td>Average</td>
                        </tr>
                        <tr>
                          <td>50 - 62</td>
                          <td>Above Average</td>
                        </tr>
                        <tr>
                          <td>63 - 68</td>
                          <td>Superior</td>
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
