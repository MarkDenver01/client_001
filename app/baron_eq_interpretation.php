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
  $student_year = $_GET['student_year'];
  $course = $_GET['course'];
} else {
  $student_id = $_SESSION['key_session']['student_id'];
  $semester = $_SESSION['key_session']['academic_semester'];
  $school_year = $_SESSION['key_session']['academic_school_year']; 
  $student_name = $_SESSION['key_session']['name'];
  $exam_title = $_GET['exam_title'];
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

    <section class="section profile" style="width: 1360px;">
      <div class="row">
        <!-- center -->
        <div class="col-lg-5">
          <div class="card rounded-0">
            <div class="card-body" id="print_content">
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
                            <td class="bg-success text-white"><h5>A</h5></td>
                          </tr>
                        </thead>
                        <tbody>              
                          <?php 
                             $results = baron_answer($_SESSION['key_session']['student_id'], $exam_id, $_SESSION['key_session']['academic_semester'], $_SESSION['key_session']['academic_school_year']);          
                          ?>
                          <?php foreach ($results as $key) { ?>
                          <?php if ($key['exam_correct_answer'] == 'a') { ?>
                            <tr>   
                              <td class="text-danger"><h5><?php echo $key['exam_answer']; ?></h5></td>
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
                            <td class="bg-success text-white"><h5>B</h5></td>
                          </tr>
                        </thead>
                        <tbody>              
                          <?php 
                            $results = baron_answer($_SESSION['key_session']['student_id'], $exam_id, $_SESSION['key_session']['academic_semester'], $_SESSION['key_session']['academic_school_year']);
                          ?>
                          <?php foreach ($results as $key) { ?>
                          <?php if ($key['exam_correct_answer'] == 'b') { ?>
                            <tr>   
                              <td class="text-danger"><h5><?php echo $key['exam_answer']; ?></h5></td>
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
                            <td class="bg-success text-white"><h5>C</h5></td>
                          </tr>
                        </thead>
                        <tbody>              
                          <?php 
                            $results = baron_answer($_SESSION['key_session']['student_id'], $exam_id, $_SESSION['key_session']['academic_semester'], $_SESSION['key_session']['academic_school_year']);
                          ?>
                          <?php foreach ($results as $key) { ?>
                          <?php if ($key['exam_correct_answer'] == 'c') { ?>
                            <tr>   
                              <td class="text-danger"><h5><?php echo $key['exam_answer']; ?></h5></td>
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
                            <td class="bg-success text-white"><h5>D</h5></td>
                          </tr>
                        </thead>
                        <tbody>              
                          <?php 
                            $results = baron_answer($_SESSION['key_session']['student_id'], $exam_id, $_SESSION['key_session']['academic_semester'], $_SESSION['key_session']['academic_school_year']);
                          ?>
                          <?php foreach ($results as $key) { ?>
                          <?php if ($key['exam_correct_answer'] == 'd') { ?>
                            <tr>   
                              <td class="text-danger"><h5><?php echo $key['exam_answer']; ?></h5></td>
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
                            <td class="bg-success text-white"><h5>E</h5></td>
                          </tr>
                        </thead>
                        <tbody>              
                          <?php 
                            $results = baron_answer($_SESSION['key_session']['student_id'], $exam_id, $_SESSION['key_session']['academic_semester'], $_SESSION['key_session']['academic_school_year']);
                          ?>
                          <?php foreach ($results as $key) { ?>
                          <?php if ($key['exam_correct_answer'] == 'e') { ?>
                            <tr>   
                              <td class="text-danger"><h5><?php echo $key['exam_answer']; ?></h5></td>
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
                            <td class="bg-success text-white"><h5>G</h5></td>
                          </tr>
                        </thead>
                        <tbody>              
                          <?php 
                            $results = baron_answer($_SESSION['key_session']['student_id'], $exam_id, $_SESSION['key_session']['academic_semester'], $_SESSION['key_session']['academic_school_year']);
                          ?>
                          <?php foreach ($results as $key) { ?>
                          <?php if ($key['exam_correct_answer'] == 'g') { ?>
                            <tr>   
                              <td class="text-danger"><h5><?php echo $key['exam_answer']; ?></h5></td>
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
                                    $data_x_graph[] = $total_a;
                                    $data_y_graph[] = "A";
                                }
                            ?>
                            <thead>              
                                <tr>   
                                    <td style="background-image: linear-gradient(#1560BD, #2243B6);" class="text-white"><h5><?php echo $total_a; ?></h5></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>   
                                    <td class="bg-success text-white"><h5>A</h5></td>
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
                                    $data_x_graph[] = $total_b;
                                    $data_y_graph[] = "B";
                                }
                            ?>
                            <thead>              
                                <tr>   
                                    <td style="background-image: linear-gradient(#1560BD, #2243B6);" class="text-white"><h5><?php echo $total_b; ?></h5></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>   
                                    <td class="bg-success text-white"><h5>B</h5></td>
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
                                    $data_x_graph[] = $total_c;
                                    $data_y_graph[] = "C";
                                }
                            ?>
                            <thead>              
                                <tr>   
                                    <td style="background-image: linear-gradient(#1560BD, #2243B6);" class="text-white"><h5><?php echo $total_c; ?></h5></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>   
                                    <td class="bg-success text-white"><h5>C</h5></td>
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
                                    $data_x_graph[] = $total_d;
                                    $data_y_graph[] = "D";
                                }
                            ?>
                            <thead>              
                                <tr>   
                                    <td style="background-image: linear-gradient(#1560BD, #2243B6);" class="text-white"><h5><?php echo $total_d; ?></h5></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>   
                                    <td class="bg-success text-white"><h5>D</h5></td>
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
                                    $data_x_graph[] = $total_e;
                                    $data_y_graph[] = "E";
                                }
                            ?>
                            <thead>              
                                <tr>   
                                    <td style="background-image: linear-gradient(#1560BD, #2243B6);" class="text-white"><h5><?php echo $total_e; ?></h5></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>   
                                    <td class="bg-success text-white"><h5>E</h5></td>
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
                                    $data_x_graph[] = $total_g;
                                    $data_y_graph[] = "G";
                                }
                            ?>
                            <thead>              
                                <tr>   
                                    <td style="background-image: linear-gradient(#1560BD, #2243B6);" class="text-white"><h5><?php echo $total_g; ?></h5></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>   
                                    <td class="bg-success text-white"><h5>G</h5></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr/>
                    <div class="col-lg-12">
                    <?php 
                      $overall_total = ($total_a + $total_b + $total_c + $total_d + $total_e);
                      $overall_total = $overall_total / 5;
                      $data_x_graph[] = $overall_total;
                      $data_y_graph[] = "F";
                    ?>
                      <table class="table table-bordered mb-5 text-center">
                        <thead>
                          <tr>
                            <td style="background-image: linear-gradient(#d9534f, #AB274F);" class="text-white"><h5>F (total)</h5>
                            <td style="background-image: linear-gradient(#d9534f, #AB274F);" class="text-white">
                              <h5>
                                <?php echo $overall_total; ?>
                              </h5>
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

                            $data_remarks[] = $remarks;
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
                            $data_remarks[] = $remarks;
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
                            $data_remarks[] = $remarks;
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
                            $data_remarks[] = $remarks;
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
                            $data_remarks[] = $remarks;
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
                            $data_remarks[] = $remarks;
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
                            $data_remarks[] = $remarks;
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
                    <div class="col-lg-12">
                  <br/>
                    <div class="text-center"><h2>BarOn EQ-i:S - Data Visualization</h2></div>
                    <hr/>

              <!-- Line Chart -->
              <canvas id="lineChart" style="max-height: 400px;"></canvas>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new Chart(document.querySelector('#lineChart'), {
                    type: 'line',
                    data: {
                      labels: [
                        '<?php echo $data_y_graph[0]; ?> (<?php echo $data_remarks[0]; ?>)',
                        '<?php echo $data_y_graph[1]; ?> (<?php echo $data_remarks[1]; ?>)',
                        '<?php echo $data_y_graph[2]; ?> (<?php echo $data_remarks[2]; ?>)',
                        '<?php echo $data_y_graph[3]; ?> (<?php echo $data_remarks[3]; ?>)',
                        '<?php echo $data_y_graph[4]; ?> (<?php echo $data_remarks[4]; ?>)',
                        '<?php echo $data_y_graph[6]; ?> (<?php echo $data_remarks[6]; ?>)',
                        '<?php echo $data_y_graph[5]; ?> (<?php echo $data_remarks[5]; ?>)'
                      ],
                      datasets: [{
                        label: 'BarOn EQ-i:S Result',
                        data: [
                          '<?php echo $data_x_graph[0]; ?>',
                          '<?php echo $data_x_graph[1]; ?>',
                          '<?php echo $data_x_graph[2]; ?>',
                          '<?php echo $data_x_graph[3]; ?>',
                          '<?php echo $data_x_graph[4]; ?>',
                          '<?php echo $data_x_graph[6]; ?>',
                          '<?php echo $data_x_graph[5]; ?>'
                        ],
                        fill: true,
                        borderColor: 'rgb(255, 99, 132)',
                        tension: 0.5
                      }],
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true
                        }
                      }
                    }
                  });
                });
              </script>
              <!-- End Line CHart -->
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
