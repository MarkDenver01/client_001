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
                  <table class="table table-hover table-bordered mb-5">
                    <thead>
                        <tr>
                            <td><h5>Category</h5></td>
                            <!-- <td><h5>Highest Probility Answered</h5></td> -->
                            <td><h5>Total of Items</h5></td>
                            <td><h5>Total Score</h5></td>
                        </tr>
                    </thead>
                    <tbody>                   
                    <?php       
                      $sql = "SELECT * FROM examinee WHERE student_id ='$student_id' AND exam_title = 'ESA'";
                      $result = $db->query($sql);
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $exam_title = $row['exam_title']; 
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
