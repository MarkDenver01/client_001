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
              <div class="text-center"><h2>Remarks</h2></div>
              <div class="row-mb-3">
                <div class="col-lg-12">
                      <table class="table table-bordered mb-5 text-center">
                        <thead>
                          <tr>
                            <td class="text-white" style="background-image: linear-gradient(#005A92, #0066B2);">Types</td>
                            <td class="text-white" style="background-image: linear-gradient(#005A92, #0066B2);">Score</td>
                            <td class="text-white" style="background-image: linear-gradient(#005A92, #0066B2);">Remarks</td>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            if ($total_a >= 45 && $total_a <= 50) {
                              $remarks = "Enhanced Skills";
                            } elseif ($total_a >= 32 && $total_a <= 44) {
                              $remarks = "Effective functioning";
                            } elseif ($total_a >= 0 && $total_a <= 31) {
                              $remarks = "Area of enrichment";
                            }
                          ?>
                          <tr>
                            <td>A</td>
                            <td><?php echo $total_a; ?></td>
                            <td><?php echo $remarks; ?>
                          </tr>

                          <?php 
                            if ($total_b >= 45 && $total_b <= 50) {
                              $remarks = "Enhanced Skills";
                            } elseif ($total_b >= 32 && $total_b <= 44) {
                              $remarks = "Effective functioning";
                            } elseif ($total_b >= 0 && $total_b <= 31) {
                              $remarks = "Area of enrichment";
                            }
                          ?>
                          <tr>
                            <td>B</td>
                            <td><?php echo $total_b; ?></td>
                            <td><?php echo $remarks; ?>
                          </tr>

                          <?php 
                            if ($total_c >= 45 && $total_c <= 50) {
                              $remarks = "Enhanced Skills";
                            } elseif ($total_c >= 32 && $total_c <= 44) {
                              $remarks = "Effective functioning";
                            } elseif ($total_c >= 0 && $total_c <= 31) {
                              $remarks = "Area of enrichment";
                            }
                          ?>
                          <tr>
                            <td>C</td>
                            <td><?php echo $total_c; ?></td>
                            <td><?php echo $remarks; ?>
                          </tr>


                          <?php 
                            if ($total_d >= 45 && $total_d <= 50) {
                              $remarks = "Enhanced Skills";
                            } elseif ($total_d >= 32 && $total_d <= 44) {
                              $remarks = "Effective functioning";
                            } elseif ($total_d >= 0 && $total_d <= 31) {
                              $remarks = "Area of enrichment";
                            }
                          ?>
                          <tr>
                            <td>D</td>
                            <td><?php echo $total_d; ?></td>
                            <td><?php echo $remarks; ?>
                          </tr>

                          <?php 
                            if ($total_e >= 45 && $total_e <= 50) {
                              $remarks = "Enhanced Skills";
                            } elseif ($total_e >= 32 && $total_e <= 44) {
                              $remarks = "Effective functioning";
                            } elseif ($total_e >= 0 && $total_e <= 31) {
                              $remarks = "Area of enrichment";
                            }
                          ?>
                          <tr>
                            <td>E</td>
                            <td><?php echo $total_e; ?></td>
                            <td><?php echo $remarks; ?>
                          </tr>

                          <?php 
                            if ($overall_total >= 45 && $overall_total <= 50) {
                              $remarks = "Enhanced Skills";
                            } elseif ($overall_total >= 32 && $overall_total <= 44) {
                              $remarks = "Effective functioning";
                            } elseif ($overall_total >= 0 && $overall_total <= 31) {
                              $remarks = "Area of enrichment";
                            }
                          ?>
                          <tr>
                            <td>F</td>
                            <td><?php echo $overall_total; ?></td>
                            <td><?php echo $remarks; ?>
                          </tr>


                          <?php 
                            if ($total_g >= 45 && $total_g <= 50) {
                              $remarks = "Enhanced Skills";
                            } elseif ($total_g >= 32 && $total_g <= 44) {
                              $remarks = "Effective functioning";
                            } elseif ($total_g >= 0 && $total_g <= 31) {
                              $remarks = "Area of enrichment";
                            }
                          ?>
                          <tr>
                            <td>G</td>
                            <td><?php echo $total_g; ?></td>
                            <td><?php echo $remarks; ?>
                          </tr>
                        </tbody>
                      </table>
                </div>
              </div>
              <hr/>
              <div class="text-center"><h2>Interpretation</h2></div>
              <hr/>
                  <div class="row mb-3">
                    <div class="col-lg-6">
                      <table class="table table-bordered mb-5 text-center">
                        <thead>
                          <tr><td class="text-white" style="background-image: linear-gradient(#005A92, #0066B2);">A</td></tr>
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
                            <td>Enhanced Skills</td<>
                          </tr>
                        </thead>
                      </table>
                    </div>
                    <div class="col-lg-6">
                    <table class="table table-bordered mb-5 text-center">
                        <thead>
                          <tr><td class="text-white" style="background-image: linear-gradient(#005A92, #0066B2);">D</td></tr>
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
                            <td>Enhanced Skills</td<>
                          </tr>
                        </thead>
                      </table>
                    </div>

                    <div class="col-lg-6">
                      <table class="table table-bordered mb-5 text-center">
                        <thead>
                          <tr><td class="text-white" style="background-image: linear-gradient(#005A92, #0066B2);">B</td></tr>
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
                            <td>Enhanced Skills</td<>
                          </tr>
                        </thead>
                      </table>
                    </div>
                    <div class="col-lg-6">
                    <table class="table table-bordered mb-5 text-center">
                        <thead>
                          <tr><td class="text-white" style="background-image: linear-gradient(#005A92, #0066B2);">E</td></tr>
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
                            <td>Enhanced Skills</td<>
                          </tr>
                        </thead>
                      </table>
                    </div>

                    <div class="col-lg-6">
                      <table class="table table-bordered mb-5 text-center">
                        <thead>
                          <tr><td class="text-white" style="background-image: linear-gradient(#005A92, #0066B2);">C</td></tr>
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
                            <td>Enhanced Skills</td<>
                          </tr>
                        </thead>
                      </table>
                    </div>
                    <div class="col-lg-6">
                    <table class="table table-bordered mb-5 text-center">
                        <thead>
                          <tr><td class="text-white" style="background-image: linear-gradient(#005A92, #0066B2);">F</td></tr>
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
                            <td>Enhanced Skills</td<>
                          </tr>
                        </thead>
                      </table>
                    </div>

                    <div class="col-lg-6">
                    </div>
                    <div class="col-lg-6">
                    <table class="table table-bordered mb-5 text-center">
                        <thead>
                          <tr><td class="text-white" style="background-image: linear-gradient(#005A92, #0066B2);">G</td></tr>
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
                            <td>Enhanced Skills</td<>
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
