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
    $student_id = $_SESSION['key_session']['student_id'];
    $semester = $_SESSION['key_session']['academic_semester'];
    $school_year = $_SESSION['key_session']['academic_school_year']; 
    $student_name = $_SESSION['key_session']['name'];
    $exam_title = $_GET['exam_title'];
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
        <div class="col-lg-5">
          <div class="card rounded-0">
            <div class="card-body">
              <br/>
              <div class="text-center"><h2>RESULT</h2></div>
              <hr/>
              <div class="row">
                <div class="col-lg-12">
                  <br/>
                  <div class="row">
                    <div class="col-lg-2">
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
                              <td class="text-danger"><h3><?php echo $key['exam_answer']; ?></h3></td>
                            </tr>
                          <?php } ?>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-lg-2">
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
                              <td class="text-danger"><h3><?php echo $key['exam_answer']; ?></h3></td>
                            </tr>
                          <?php } ?>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-lg-2">
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
                              <td class="text-danger"><h3><?php echo $key['exam_answer']; ?></h3></td>
                            </tr>
                          <?php } ?>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-lg-2">
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
                              <td class="text-danger"><h3><?php echo $key['exam_answer']; ?></h3></td>
                            </tr>
                          <?php } ?>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-lg-2">
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
                              <td class="text-danger"><h3><?php echo $key['exam_answer']; ?></h3></td>
                            </tr>
                          <?php } ?>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-lg-2">
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
                              <td class="text-danger"><h3><?php echo $key['exam_answer']; ?></h3></td>
                            </tr>
                          <?php } ?>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-lg-2">
                        <table class="table table-bordered mb-5 text-center">
                            <?php 
                                if (!isset($_SESSION['key_session']['student_id'])) {
                                  $sql = "SELECT SUM(exam_answer) as total FROM examinee_answer_v2 WHERE student_id ='" .$_GET['student_id']. "'AND exam_correct_answer='a'";
                                } else {
                                  $sql = "SELECT SUM(exam_answer) as total FROM examinee_answer_v2 WHERE student_id ='" .$_SESSION['key_session']['student_id']. "' 
                                  AND semester ='" .$_SESSION['key_session']['academic_semester']. "' AND school_year ='" .$_SESSION['key_session']['academic_school_year']. "'
                                  AND exam_correct_answer='a'";
                                }                             
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
                    <div class="col-lg-2">
                        <table class="table table-bordered mb-5 text-center">
                            <?php 
                                if (!isset($_SESSION['key_session']['student_id'])) {
                                  $sql = "SELECT SUM(exam_answer) as total FROM examinee_answer_v2 WHERE student_id ='" .$_GET['student_id']. "'AND exam_correct_answer='b'";
                                } else {
                                  $sql = "SELECT SUM(exam_answer) as total FROM examinee_answer_v2 WHERE student_id ='" .$_SESSION['key_session']['student_id']. "' 
                                  AND semester ='" .$_SESSION['key_session']['academic_semester']. "' AND school_year ='" .$_SESSION['key_session']['academic_school_year']. "'
                                  AND exam_correct_answer='b'";
                                }
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
                    <div class="col-lg-2">
                        <table class="table table-bordered mb-5 text-center">
                            <?php 
                                if (!isset($_SESSION['key_session']['student_id'])) {
                                  $sql = "SELECT SUM(exam_answer) as total FROM examinee_answer_v2 WHERE student_id ='" .$_GET['student_id']. "'AND exam_correct_answer='c'";
                                } else {
                                  $sql = "SELECT SUM(exam_answer) as total FROM examinee_answer_v2 WHERE student_id ='" .$_SESSION['key_session']['student_id']. "' 
                                  AND semester ='" .$_SESSION['key_session']['academic_semester']. "' AND school_year ='" .$_SESSION['key_session']['academic_school_year']. "'
                                  AND exam_correct_answer='c'";
                                }
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
                    <div class="col-lg-2">
                        <table class="table table-bordered mb-5 text-center">
                            <?php 
                                if (!isset($_SESSION['key_session']['student_id'])) {
                                  $sql = "SELECT SUM(exam_answer) as total FROM examinee_answer_v2 WHERE student_id ='" .$_GET['student_id']. "'AND exam_correct_answer='d'";
                                } else {
                                  $sql = "SELECT SUM(exam_answer) as total FROM examinee_answer_v2 WHERE student_id ='" .$_SESSION['key_session']['student_id']. "' 
                                  AND semester ='" .$_SESSION['key_session']['academic_semester']. "' AND school_year ='" .$_SESSION['key_session']['academic_school_year']. "'
                                  AND exam_correct_answer='d'";
                                }
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
                    <div class="col-lg-2">
                        <table class="table table-bordered mb-5 text-center">
                            <?php 
                                if (!isset($_SESSION['key_session']['student_id'])) {
                                  $sql = "SELECT SUM(exam_answer) as total FROM examinee_answer_v2 WHERE student_id ='" .$_GET['student_id']. "'AND exam_correct_answer='e'";
                                } else {
                                  $sql = "SELECT SUM(exam_answer) as total FROM examinee_answer_v2 WHERE student_id ='" .$_SESSION['key_session']['student_id']. "' 
                                  AND semester ='" .$_SESSION['key_session']['academic_semester']. "' AND school_year ='" .$_SESSION['key_session']['academic_school_year']. "'
                                  AND exam_correct_answer='e'";
                                }
                               
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
                    <div class="col-lg-2">
                        <table class="table table-bordered mb-5 text-center">
                            <?php 
                                if (!isset($_SESSION['key_session']['student_id'])) {
                                  $sql = "SELECT SUM(exam_answer) as total FROM examinee_answer_v2 WHERE student_id ='" .$_GET['student_id']. "'AND exam_correct_answer='g'";
                                } else {
                                  $sql = "SELECT SUM(exam_answer) as total FROM examinee_answer_v2 WHERE student_id ='" .$_SESSION['key_session']['student_id']. "' 
                                  AND semester ='" .$_SESSION['key_session']['academic_semester']. "' AND school_year ='" .$_SESSION['key_session']['academic_school_year']. "'
                                  AND exam_correct_answer='g'";
                                }

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
                    <hr/>
                    <div class="col-lg-12">
                    <?php 
                      $overall_total = ($total_a + $total_b + $total_c + $total_d + $total_e);
                      $overall_total = $overall_total / 5;
                    ?>
                      <table class="table table-bordered mb-5 text-center">
                        <thead>
                          <tr>
                            <td style="background-image: linear-gradient(#d9534f, #AB274F);" class="text-white"><h3>F (total)</td>
                            <td style="background-image: linear-gradient(#d9534f, #AB274F);" class="text-white">
                              <h3>
                                <?php echo $overall_total; ?>
                              </h3>
                            </td>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="card rounded-0">
            <div class="card-body">
              <br/>
              <div class="text-center"><h2>Data Interpretation</h2></div>
              <hr/>
                  <div class="row mb-3">
                    <div class="col-lg-6">
                      <table class="table table-bordered mb-5 text-center">
                        <thead>
                          <tr><td>A</td></tr>
                          <tr>
                            <td></td>
                            <td>31 and below</td<>
                            <td>Area of enrichment</td<>
                          </tr>
                          <tr>
                            <td></td>
                            <td>32 - 44</td<>
                            <td>Effective functioning</td<>
                          </tr>
                          <tr>
                            <td></td>
                            <td>45 > 50</td<>
                            <td>Enhancement Skills</td<>
                          </tr>
                        </thead>
                      </table>
                    </div>
                    <div class="col-lg-6">
                    <table class="table table-bordered mb-5 text-center">
                        <thead>
                          <tr><td>D</td></tr>
                          <tr>
                            <td></td>
                            <td>18 - 23</td<>
                            <td>Area of enrichment</td<>
                          </tr>
                          <tr>
                            <td></td>
                            <td>24 - 31</td<>
                            <td>Effective functioning</td<>
                          </tr>
                          <tr>
                            <td></td>
                            <td>32  > 35</td<>
                            <td>Enhancement Skills</td<>
                          </tr>
                        </thead>
                      </table>
                    </div>

                    <div class="col-lg-6">
                      <table class="table table-bordered mb-5 text-center">
                        <thead>
                          <tr><td>B</td></tr>
                          <tr>
                            <td></td>
                            <td>27 - 34</td<>
                            <td>Area of enrichment</td<>
                          </tr>
                          <tr>
                            <td></td>
                            <td>34 - 45</td<>
                            <td>Effective functioning</td<>
                          </tr>
                          <tr>
                            <td></td>
                            <td>46 > 50</td<>
                            <td>Enhancement Skills</td<>
                          </tr>
                        </thead>
                      </table>
                    </div>
                    <div class="col-lg-6">
                    <table class="table table-bordered mb-5 text-center">
                        <thead>
                          <tr><td>E</td></tr>
                          <tr>
                            <td></td>
                            <td>26 - 33</td<>
                            <td>Area of enrichment</td<>
                          </tr>
                          <tr>
                            <td></td>
                            <td>34 - 35</td<>
                            <td>Effective functioning</td<>
                          </tr>
                          <tr>
                            <td></td>
                            <td>46  > 50</td<>
                            <td>Enhancement Skills</td<>
                          </tr>
                        </thead>
                      </table>
                    </div>

                    <div class="col-lg-6">
                      <table class="table table-bordered mb-5 text-center">
                        <thead>
                          <tr><td>C</td></tr>
                          <tr>
                            <td></td>
                            <td>17 - 22</td<>
                            <td>Area of enrichment</td<>
                          </tr>
                          <tr>
                            <td></td>
                            <td>25 - 35</td<>
                            <td>Effective functioning</td<>
                          </tr>
                          <tr>
                            <td></td>
                            <td>36 > 40</td<>
                            <td>Enhancement Skills</td<>
                          </tr>
                        </thead>
                      </table>
                    </div>
                    <div class="col-lg-6">
                    <table class="table table-bordered mb-5 text-center">
                        <thead>
                          <tr><td>F</td></tr>
                          <tr>
                            <td></td>
                            <td>25 - 30</td<>
                            <td>Area of enrichment</td<>
                          </tr>
                          <tr>
                            <td></td>
                            <td>31 - 39</td<>
                            <td>Effective functioning</td<>
                          </tr>
                          <tr>
                            <td></td>
                            <td>40  > 43</td<>
                            <td>Enhancement Skills</td<>
                          </tr>
                        </thead>
                      </table>
                    </div>

                    <div class="col-lg-6">
                    </div>
                    <div class="col-lg-6">
                    <table class="table table-bordered mb-5 text-center">
                        <thead>
                          <tr><td>G</td></tr>
                          <tr>
                            <td></td>
                            <td>6 - 8</td<>
                            <td>Area of enrichment</td<>
                          </tr>
                          <tr>
                            <td></td>
                            <td>9 - 17</td<>
                            <td>Effective functioning</td<>
                          </tr>
                          <tr>
                            <td></td>
                            <td>18  > 21</td<>
                            <td>Enhancement Skills</td<>
                          </tr>
                        </thead>
                      </table>
                    </div>
            </div>  
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->
<?php include('../footer.php'); ?>
