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

    <section class="section profile" style="width: 2160px;">
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
                  <table class="table table-hover table-bordered mb-5">
                    <thead>
                        <tr>
                            <td><h5>Category</h5></td>
                            <!-- <td><h5>Highest Probility Answered</h5></td> -->
                            <td><h5>Total Test Items</h5></td>
                            <td><h5>Score</h5></td>
                        </tr>
                    </thead>
                    <tbody>                   
                    <?php       
                      $sql = "SELECT * FROM examinee WHERE student_id ='$student_id' AND exam_title = 'Aptitude J and C'";
                      $result = $db->query($sql);
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $exam_title = $row['exam_title']; 
                            $test = $row['total_score'];
                    ?>
                        <tr>
                          <td><h5><?php echo $row['exam_category']; ?></h5></td>
                          <!-- <td><h5><?php echo $row['exam_answer']; ?></h5></td> -->
                          <td><h5><?php echo $row['total_answer']; ?></h5></td>
                          <td><h5><?php echo $row['total_score']; ?></h5></td>
                        </tr>          
                    <?php 
                        }
                      }
                    ?>
                    </tbody>
                  </table>
                  <hr/>
                   <?php 
                    $sql = "SELECT SUM(total_score) AS total FROM examinee WHERE student_id ='$student_id' 
                      AND semester ='$semester' AND school_year ='$school_year' AND exam_title = 'Aptitude J and C'";
                      $result = $db->query($sql);
                       if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          $total_score_final = $row['total'];
                        }
                      }
                  ?>
                  <table class="table table-hover table-bordered mb-5">
                    <thead>
                      <th style="background-image: linear-gradient(#1560BD, #2243B6);" class="text-white"><h3>TOTAL SCORE</h3></th>
                      <th style="background-image: linear-gradient(#1560BD, #2243B6);" class="text-white"><h3><?php echo $total_score_final; ?></h3></th>
                    </thead>
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
                                $sql = "SELECT exam_answer,counselor_notify_status, SUM(total_score) AS total FROM examinee WHERE student_id ='$student_id' 
                                AND semester ='$semester' AND school_year ='$school_year' AND exam_title = 'Aptitude J and C'";
                               $result = $db->query($sql);
                               if ($result->num_rows > 0) {
                                   while ($row = $result->fetch_assoc()) {
                                       $highest_prob = $row['exam_answer'];
                                       $data = $row['total'];
                                       $total_score = $row['total_score'];
                                       $counselour_stats = $row['counselor_notify_status'];
                                   }
                               }
                               if ($data >= 21 && $data <=26) { 
                                   $exam_result_status = "SUPERIOR";
                                   $msg = $exam_result_status;
                               } elseif ($data >= 16 && $data <= 20) { 
                                   $exam_result_status = "ABOVE AVERAGE";
                                   $msg = $exam_result_status;
                               } else if ($data >= 8 && $data <= 15) {
                                   $exam_result_status = "AVERAGE";
                                   $msg = $exam_result_status;
                               } else if ($data >= 4 && $data <= 7) {
                                   $exam_result_status = "BELOW AVERAGE";
                                   $msg = $exam_result_status;
                               } elseif ($data >0 && $data <= 3) {
                                    $exam_result_status = "LOW";
                                    $msg = $exam_result_status;
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
                                        <h3><?php echo $data; ?></h3>
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
                    <table class="table table-hover table-bordered text-center text-nowrap">
                    <tbody>                   
                        <tr>
                          <td>
                            <br/>
                            <br/>
                            <h3>1 - 3</h3>
                          </td>
                          <td>
                            <br/>
                            <br/>
                            <h3>LOW</h3>
                          </td>
                          <td>
                            Respondents having POOR as their rank were not able to pass the test also.<br/> Having the lowest scores, we can say that
                            they were not able to get the meaning of the texts given.<br/> They should improve more on their comprehension 
                            and judgement skills.<br/> Also they should try and expose themselves more in reading and understanding what they
                            have read.<br/> Another problem that they might have encountered was the pressure of having the time limit.  
                          </td>
                        </tr>     
                        <tr>
                          <td> <br/>
                            <br/><h3>4 - 7</h3></td>
                          <td> <br/>
                            <br/><h3>BELOW AVERAGE</h3></td>
                          <td>
                            Respondents having BELOW AVERAGE as their rank were not able to pass the test. <br/>
                            They are having a little difficulty in comprehending and understanding the given texts.<br/>
                            We can say that were probably not comfortable of answering the test with a time limit or<br/>
                            that they were not able to get the essence of the given texts. <br/>
                            However, there's a lways a room for imporvement if they try to focus more on their reading and comprehension skills.
                          </td>
                        </tr>   
                        <tr>
                          <td><br/>
                            <br/><h3>8 - 15</h3></td>
                          <td><br/>
                            <br/><h3>AVERAGE</h3></td>
                          <td>
                            Respondents having AVERAGE as their rank were able to pass the test. <br/>
                            They got a score which is not very high and which is not very low either.<br/>
                            We can sy that their skills in reading and comprehension, also their understanding<br/>
                            were not poor but just fair.
                          </td>
                        </tr>  
                        <tr>
                          <td><br/>
                            <br/><h3>16 - 20</h3></td>
                          <td><br/>
                            <br/><h3>ABOVE AVERAGE</h3></td>
                          <td>
                            Respondents having ABOVE AVERAGE as their rank were good and were able to understand <br/>
                            the test well also. They got a high score as well, meaning that they were able to <br/>
                            maximize their time in answering the test quickly but correctly.
                          </td>
                        </tr>  
                        <tr>
                          <td><br/>
                            <br/><h3>21 - 25</h3></td>
                          <td><br/>
                            <br/><h3>SUPERIOR</h3></td>
                          <td>
                            Respondents having SUPERIOR as their rank posses an excellent understanding of the given test.<br/>
                            They were able to fully grasp the essence of the paragraphs and sentences<br/>
                            having a score of almost perfect to perfect even though their time is limited.<br/>
                            We can say that they were also able to recall very well some parts of the <br/>
                            sentences, saving them time to look and read again.
                          </td>
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
