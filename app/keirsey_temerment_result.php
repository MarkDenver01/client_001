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
  $student_no = $_SESSION['key_session']['student_no']; 
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
                <div class="col-lg-12">
                  <br/>
                  <div class="row">
                  <div class="col-lg-12">
                            <table class="table table-bordered table-hover text-nowrap text-center" id="tableList">
                              <thead>
                                <tr>
                                  <td  style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white"></td>
                                  <td  style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">a</td>
                                  <td  style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">b</td>
                                  <td  style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white"></td>
                                  <td  style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">a</td>
                                  <td  style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">b</td>
                                  <td  style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white"></td>
                                  <td  style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">a</td>
                                  <td  style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">b</td>
                                  <td  style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white"></td>
                                  <td  style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">a</td>
                                  <td  style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">b</td>
                                  <td  style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white"></td>
                                  <td  style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">a</td>
                                  <td  style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">b</td>
                                  <td  style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white"></td>
                                  <td  style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">a</td>
                                  <td  style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">b</td>
                                  <td  style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white"></td>
                                  <td  style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">a</td>
                                  <td  style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">b</td>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                <?php
                                    $count = 0; // Variable to keep track of the current iteration count
                                    $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                    AND semester ='$semester' AND school_year ='$school_year' ORDER BY exam_item_no ASC LIMIT 0, 7";
                                    $result = $db->query($sql);
                                    if ($db->num_rows($result)) {
                                      while ($row = $result->fetch_assoc()) { 
                                      $count++;
                                ?>
                                <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white"><?php echo $count; ?></th>
                                <td>
                                <?php 
                                    if ($row['exam_correct_answer'] == 'a') {
                                        echo $row['exam_correct_answer'];
                                    }
                                ?>
                                </td>
                                <td>
                                <?php 
                                    if ($row['exam_correct_answer'] == 'b') {
                                        echo $row['exam_correct_answer'];
                                    }
                                ?>
                                </td> 
                                <?php
                                  }
                                }                                    
                                ?>
                                </tr>

                                <tr>
                                <?php
                                    $count = 7;
                                    $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                    AND semester ='$semester' AND school_year ='$school_year' ORDER BY exam_item_no ASC LIMIT 7, 7";
                                    $result = $db->query($sql);
                                    if ($db->num_rows($result)) {
                                      while ($row = $result->fetch_assoc()) { 
                                        $count++;
                                   
                                ?>
                                <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white"><?php echo $count; ?></th>
                                <td>
                                <?php 
                                    if ($row['exam_correct_answer'] == 'a') {
                                        echo $row['exam_correct_answer'];
                                    }
                                ?>
                                </td>
                                <td>
                                <?php 
                                    if ($row['exam_correct_answer'] == 'b') {
                                        echo $row['exam_correct_answer'];
                                    }
                                ?>
                                </td> 
                                <?php 
                                    }
                                }                                    
                                ?>
                                </tr>
 
                                <tr>
                                <?php
                                    $count = 14; // Variable to keep track of the current iteration count
                                    $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                    AND semester ='$semester' AND school_year ='$school_year' ORDER BY exam_item_no ASC LIMIT 14, 7";
                                    $result = $db->query($sql);
                                    if ($db->num_rows($result)) {
                                      while ($row = $result->fetch_assoc()) { 
                                      $count++;
                                ?>
                                <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white"><?php echo $count; ?></th>
                                <td>
                                <?php 
                                    if ($row['exam_correct_answer'] == 'a') {
                                        echo $row['exam_correct_answer'];
                                    }
                                ?>
                                </td>
                                <td>
                                <?php 
                                    if ($row['exam_correct_answer'] == 'b') {
                                        echo $row['exam_correct_answer'];
                                    }
                                ?>
                                </td> 
                                <?php
                                  }
                                }                                    
                                ?>
                                </tr>

                                <tr>

                                <?php
                                    $count = 21; // Variable to keep track of the current iteration count
                                    $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                    AND semester ='$semester' AND school_year ='$school_year' ORDER BY exam_item_no ASC LIMIT 21, 7";
                                    $result = $db->query($sql);
                                    if ($db->num_rows($result)) {
                                      while ($row = $result->fetch_assoc()) { 
                                      $count++;
                                ?>
                                <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white"><?php echo $count; ?></th>
                                <td>
                                <?php 
                                    if ($row['exam_correct_answer'] == 'a') {
                                        echo $row['exam_correct_answer'];
                                    }
                                ?>
                                </td>
                                <td>
                                <?php 
                                    if ($row['exam_correct_answer'] == 'b') {
                                        echo $row['exam_correct_answer'];
                                    }
                                ?>
                                </td> 
                                <?php
                                  }
                                }                                    
                                ?>

                                </tr>
                                
                                <tr>
            
                                <?php
                                    $count = 28; // Variable to keep track of the current iteration count
                                    $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                    AND semester ='$semester' AND school_year ='$school_year' ORDER BY exam_item_no ASC LIMIT 28, 7";
                                    $result = $db->query($sql);
                                    if ($db->num_rows($result)) {
                                      while ($row = $result->fetch_assoc()) { 
                                      $count++;
                                ?>
                                <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white"><?php echo $count; ?></th>
                                <td>
                                <?php 
                                    if ($row['exam_correct_answer'] == 'a') {
                                        echo $row['exam_correct_answer'];
                                    }
                                ?>
                                </td>
                                <td>
                                <?php 
                                    if ($row['exam_correct_answer'] == 'b') {
                                        echo $row['exam_correct_answer'];
                                    }
                                ?>
                                </td> 
                                <?php
                                  }
                                }                                    
                                ?>

                                </tr>

                                <tr>

                                <?php
                                    $count = 35; // Variable to keep track of the current iteration count
                                    $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                    AND semester ='$semester' AND school_year ='$school_year' ORDER BY exam_item_no ASC LIMIT 35, 7";
                                    $result = $db->query($sql);
                                    if ($db->num_rows($result)) {
                                      while ($row = $result->fetch_assoc()) { 
                                      $count++;
                                ?>
                                <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white"><?php echo $count; ?></th>
                                <td>
                                <?php 
                                    if ($row['exam_correct_answer'] == 'a') {
                                        echo $row['exam_correct_answer'];
                                    }
                                ?>
                                </td>
                                <td>
                                <?php 
                                    if ($row['exam_correct_answer'] == 'b') {
                                        echo $row['exam_correct_answer'];
                                    }
                                ?>
                                </td> 
                                <?php
                                  }
                                }                                    
                                ?>

                                </tr>
                                
                                <tr>

                                <?php
                                    $count = 42; // Variable to keep track of the current iteration count
                                    $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                    AND semester ='$semester' AND school_year ='$school_year' ORDER BY exam_item_no ASC LIMIT 42, 7";
                                    $result = $db->query($sql);
                                    if ($db->num_rows($result)) {
                                      while ($row = $result->fetch_assoc()) { 
                                      $count++;
                                ?>
                                <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white"><?php echo $count; ?></th>
                                <td>
                                <?php 
                                    if ($row['exam_correct_answer'] == 'a') {
                                        echo $row['exam_correct_answer'];
                                    }
                                ?>
                                </td>
                                <td>
                                <?php 
                                    if ($row['exam_correct_answer'] == 'b') {
                                        echo $row['exam_correct_answer'];
                                    }
                                ?>
                                </td> 
                                <?php
                                  }
                                }                                    
                                ?>

                                </tr>

                                <tr>

                                <?php
                                    $count = 49; // Variable to keep track of the current iteration count
                                    $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                    AND semester ='$semester' AND school_year ='$school_year' ORDER BY exam_item_no ASC LIMIT 49, 7";
                                    $result = $db->query($sql);
                                    if ($db->num_rows($result)) {
                                      while ($row = $result->fetch_assoc()) { 
                                      $count++;
                                ?>
                                <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white"><?php echo $count; ?></th>
                                <td>
                                <?php 
                                    if ($row['exam_correct_answer'] == 'a') {
                                        echo $row['exam_correct_answer'];
                                    }
                                ?>
                                </td>
                                <td>
                                <?php 
                                    if ($row['exam_correct_answer'] == 'b') {
                                        echo $row['exam_correct_answer'];
                                    }
                                ?>
                                </td> 
                                <?php
                                  }
                                }                                    
                                ?>

                                </tr>

                                <tr>
                                <?php
                                    $count = 56; // Variable to keep track of the current iteration count
                                    $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                    AND semester ='$semester' AND school_year ='$school_year' ORDER BY exam_item_no ASC LIMIT 56, 7";
                                    $result = $db->query($sql);
                                    if ($db->num_rows($result)) {
                                      while ($row = $result->fetch_assoc()) { 
                                      $count++;
                                ?>
                                <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white"><?php echo $count; ?></th>
                                <td>
                                <?php 
                                    if ($row['exam_correct_answer'] == 'a') {
                                        echo $row['exam_correct_answer'];
                                    }
                                ?>
                                </td>
                                <td>
                                <?php 
                                    if ($row['exam_correct_answer'] == 'b') {
                                        echo $row['exam_correct_answer'];
                                    }
                                ?>
                                </td> 
                                <?php
                                  }
                                }                                    
                                ?>
                                </tr>

                                <tr>
                                <?php
                                    $count = 63; // Variable to keep track of the current iteration count
                                    $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                    AND semester ='$semester' AND school_year ='$school_year' ORDER BY exam_item_no ASC LIMIT 63, 7";
                                    $result = $db->query($sql);
                                    if ($db->num_rows($result)) {
                                      while ($row = $result->fetch_assoc()) { 
                                      $count++;
                                ?>
                                <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white"><?php echo $count; ?></th>
                                <td>
                                <?php 
                                    if ($row['exam_correct_answer'] == 'a') {
                                        echo $row['exam_correct_answer'];
                                    }
                                ?>
                                </td>
                                <td>
                                <?php 
                                    if ($row['exam_correct_answer'] == 'b') {
                                        echo $row['exam_correct_answer'];
                                    }
                                ?>
                                </td> 
                                <?php
                                  }
                                }                                    
                                ?>
                                </tr>

                                <tr>
                                  <?php 
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(1,8,15,22,29,36,43,50,57,64)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(1,8,15,22,29,36,43,50,57,64)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_b = $row['total'];
                                  ?>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_a; ?></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_b; ?></td>
                                  <?php 
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(2,9,16,23,30,37,44,51,58,65)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(2,9,16,23,30,37,44,51,58,6)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_b = $row['total'];
                                  ?>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_a; ?></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_b; ?></td>
                                  <?php 
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(3,10,17,24,31,38,45,52,59,66)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(3,10,17,24,31,38,45,52,59,66)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_b = $row['total'];
                                  ?>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_a; ?></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_b; ?></td>
                                  <?php 
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(4,11,18,25,32,39,46,53,60,67)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(4,11,18,25,32,39,46,53,60,67)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_b = $row['total'];
                                  ?>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_a; ?></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_b; ?></td>
                                  <?php 
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(5,12,19,26,33,40,47,54,61,68)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(5,12,19,26,33,40,47,54,61,68)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_b = $row['total'];
                                  ?>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_a; ?></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_b; ?></td>
                                  <?php 
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(6,13,20,27,34,41,48,55,62,69)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(6,13,20,27,34,41,48,55,62,69)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_b = $row['total'];
                                  ?>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_a; ?></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_b; ?></td>
                                  <?php 
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(7,14,21,28,35,42,49,56,63,70)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(7,14,21,28,35,42,49,56,63,70)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_b = $row['total'];
                                  ?>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_a; ?></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_b; ?></td>
                                </tr>
                                <tr>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <?php 
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(2,9,16,23,30,37,44,51,58,65)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(2,9,16,23,30,37,44,51,58,6)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_b = $row['total'];
                                  ?>
                                  <td class="text-white" style="background-image: linear-gradient(#6F2DA8, #9A2CA0);"><?php echo $result_k_ans_a; ?></td>
                                  <td class="text-white" style="background-image: linear-gradient(#6F2DA8, #9A2CA0);"><?php echo $result_k_ans_b; ?></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <?php 
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(4,11,18,25,32,39,46,53,60,67)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(4,11,18,25,32,39,46,53,60,67)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_b = $row['total'];
                                  ?>
                                  <td class="text-white" style="background-image: linear-gradient(#6F2DA8, #9A2CA0);"><?php echo $result_k_ans_a; ?></td>
                                  <td class="text-white" style="background-image: linear-gradient(#6F2DA8, #9A2CA0);"><?php echo $result_k_ans_b; ?></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <?php 
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(6,13,20,27,34,41,48,55,62,69)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(6,13,20,27,34,41,48,55,62,69)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_b = $row['total'];
                                  ?>
                                  <td class="text-white" style="background-image: linear-gradient(#6F2DA8, #9A2CA0);"><?php echo $result_k_ans_a; ?></td>
                                  <td class="text-white" style="background-image: linear-gradient(#6F2DA8, #9A2CA0);"><?php echo $result_k_ans_b; ?></td>
                                </tr>
                                <tr>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                </tr>
                                <tr>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);">&nbsp;</td>
                                </tr>
                                
                                <tr>
                                <?php 
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(1,8,15,22,29,36,43,50,57,64)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $total_a_1 = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(1,8,15,22,29,36,43,50,57,64)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $total_b_1 = $row['total'];

                                     $data = array();
                                     $data[] = $total_a_1;
                                     $data[] = $total_b_1;
                                     $highest_k_a_b_1 = max($data);
                                  ?>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td class="text-white" style="background-image: linear-gradient(#6F2DA8, #9A2CA0);"><?php echo $total_a_1; ?></td>
                                  <td class="text-white" style="background-image: linear-gradient(#6F2DA8, #9A2CA0);"><?php echo $total_b_1; ?></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <?php 
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(2,9,16,23,30,37,44,51,58,65)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_1_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(2,9,16,23,30,37,44,51,58,6)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_1_b = $row['total'];

                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(3,10,17,24,31,38,45,52,59,66)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_2_a  = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(3,10,17,24,31,38,45,52,59,66)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_2_b = $row['total'];

                                     $total_a_2 = ($result_k_ans_1_a + $result_k_ans_2_a);
                                     $total_b_2 = ($result_k_ans_1_b + $result_k_ans_2_b);

                                     $data = array();
                                     $data[] = $total_a_2;
                                     $data[] = $total_b_2;
                                     $highest_k_a_b_2 = max($data);
                                  ?>
                                  <td class="text-white" style="background-image: linear-gradient(#6F2DA8, #9A2CA0);"><?php echo $total_a_2; ?></td>
                                  <td class="text-white" style="background-image: linear-gradient(#6F2DA8, #9A2CA0);"><?php echo $total_b_2; ?></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <?php 
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(4,11,18,25,32,39,46,53,60,67)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_1_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(4,11,18,25,32,39,46,53,60,67)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_1_b = $row['total'];

                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(5,12,19,26,33,40,47,54,61,68)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_2_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(5,12,19,26,33,40,47,54,61,68)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_2_b = $row['total'];

                                     $total_a_3 = ($result_k_ans_1_a + $result_k_ans_2_a);
                                     $total_b_3 = ($result_k_ans_1_b + $result_k_ans_2_b);

                                     $data = array();
                                     $data[] = $total_a_3;
                                     $data[] = $total_b_3;
                                     $highest_k_a_b_3 = max($data);
                                  ?>
                                  <td class="text-white" style="background-image: linear-gradient(#6F2DA8, #9A2CA0);"><?php echo $total_a_3; ?></td>
                                  <td class="text-white" style="background-image: linear-gradient(#6F2DA8, #9A2CA0);"><?php echo $total_b_3; ?></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"  ></td>
                                  <?php 
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(6,13,20,27,34,41,48,55,62,69)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_1_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(6,13,20,27,34,41,48,55,62,69)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_1_b = $row['total'];

                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(7,14,21,28,35,42,49,56,63,70)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_2_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' AND exam_id ='$exam_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(7,14,21,28,35,42,49,56,63,70)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_2_b = $row['total'];

                                     $total_a_4 = ($result_k_ans_1_a + $result_k_ans_2_a);
                                     $total_b_4 = ($result_k_ans_1_b + $result_k_ans_2_b);

                                     $data = array();
                                     $data[] = $total_a_4;
                                     $data[] = $total_b_4;
                                     $highest_k_a_b_4 = max($data);
                                  ?>
                                  <td class="text-white" style="background-image: linear-gradient(#6F2DA8, #9A2CA0);"><?php echo $total_a_4; ?></td>
                                  <td class="text-white" style="background-image: linear-gradient(#6F2DA8, #9A2CA0);"><?php echo $total_b_4; ?></td>
                                </tr>
                                <tr>
                                 <?php $char = []; ?>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <?php 
                                    if ($highest_k_a_b_1 == $total_a_1) { ?>
                                        <td id="blink_1" class="text-white" style="background-image: linear-gradient(#005A92, #0066B2);"><h3>E</h3></td>
                                        <td class="text-white" style="background-image: linear-gradient(#80461B, #8B4513);">I</td>
                                        <?php $char[] = "E"; ?>
                                  <?php } elseif ($highest_k_a_b_1 == $total_b_1) { ?>
                                        <td class="text-white" style="background-image: linear-gradient(#80461B, #8B4513);">E</td>
                                        <td id="blink_1" class="text-white" style="background-image: linear-gradient(#005A92, #0066B2);"><h3>I</h3></td>
                                        <?php $char[] = "I"; ?>
                                  <?php } ?>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <?php if ($highest_k_a_b_2 == $total_a_2) { ?>
                                        <td id="blink_2" class="text-white" style="background-image: linear-gradient(#005A92, #0066B2);"><h3>S</h3></td>
                                        <td class="text-white" style="background-image: linear-gradient(#80461B, #8B4513);">N</td>
                                        <?php $char[] = "S"; ?>
                                  <?php } elseif ($highest_k_a_b_2 == $total_b_2) { ?>
                                        <td class="text-white" style="background-image: linear-gradient(#80461B, #8B4513);">S</td>
                                        <td id="blink_2" class="text-white" style="background-image: linear-gradient(#005A92, #0066B2);"><h3>N</h3></td>
                                        <?php $char[] = "N"; ?>
                                  <?php } ?>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <?php if ($highest_k_a_b_3 == $total_a_3) { ?>
                                        <td id="blink_3" class="text-white" style="background-image: linear-gradient(#005A92, #0066B2);"><h3>T</h3></td>
                                        <td class="text-white" style="background-image: linear-gradient(#80461B, #8B4513);">F</td>
                                        <?php $char[] = "T"; ?>
                                  <?php } elseif ($highest_k_a_b_3 == $total_b_3) { ?>
                                        <td class="text-white" style="background-image: linear-gradient(#80461B, #8B4513);">T</td>
                                        <td id="blink_3" class="text-white" style="background-image: linear-gradient(#005A92, #0066B2);"><h3>F</h3></td>
                                        <?php $char[] = "F"; ?>
                                  <?php } ?>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <?php if ($highest_k_a_b_4 == $total_a_4) { ?>
                                        <td id="blink_4" class="text-white" style="background-image: linear-gradient(#005A92, #0066B2);"><h3>J</h3></td>
                                        <td class="text-white" style="background-image: linear-gradient(#80461B, #8B4513);">P</td>
                                        <?php $char[] = "J"; ?>
                                  <?php } elseif ($highest_k_a_b_4 == $total_b_4) { ?>
                                        <td class="text-white" style="background-image: linear-gradient(#80461B, #8B4513);">J</td>
                                        <td id="blink_4" class="text-white" style="background-image: linear-gradient(#005A92, #0066B2);"><h3>P</h3></td>
                                        <?php $char[] = "P"; ?>
                                  <?php } ?>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                  </div>
                  <form id="submitExamResultFrm" method="POST">
                   <?php if ($exam_title == "The Keirsey Temperament Sorter") { ?>
                   <?php 
                      foreach ($char as $key) {
                        $exam_result_status .= $key;
                      }
                   ?>
                      <input type="hidden" id="student_id" name="student_id" value="<?php echo $student_id; ?>">
                      <input type="hidden" id="exam_type" name="exam_type" value="<?php echo $exam_type; ?>">
                      <input type="hidden" id="exam_id" name="exam_id" value="<?php echo $exam_id; ?>">
                      <input type="hidden" id="exam_title" name="exam_title" value="<?php echo $exam_title; ?>">
                      <input type="hidden" id="exam_desc" name="exam_desc" value="<?php echo $exam_desc; ?>">
                      <input type="hidden" id="exam_result_status" name="exam_result_status" value="<?php echo $exam_result_status; ?>">
                      <input type="hidden" id="exam_answer" name="exam_answer" value="0">
                      <input type="hidden" id="total_answer" name="total_answer" value="51">
                      <input type="hidden" id="total_score" name="total_score" value="N/A">

                      <input type="hidden" id="semester" value="<?php echo $semester; ?>">
                      <input type="hidden" id="school_year" value="<?php echo $school_year; ?>">
                      <input type="hidden" id="full_name" value="<?php echo $name; ?>">
                      <input type="hidden" id="gender" value="<?php echo $gender; ?>">
                      <input type="hidden" id="course" value="<?php echo $course; ?>">
                      <input type="hidden" id="start_date" value="<?php echo date('Y-md h:i:s A'); ?>">
                      <input type="hidden" id="email_address" value="<?php echo $email_address; ?>">
                      <input type="hidden" id="student_year" value="<?php echo $student_year; ?>">
                  <?php } ?>
                    <a href="" class="btn btn-success rounded-pill w-100 btn-lg" name="button_submit" type="submit">Submit</a>
                  </form>
                  </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <script>
        var textField1 = document.getElementById('blink_1');
        setInterval(function() {
            textField1.classList.toggle('blinking');
        }, 1000);

        var textField2 = document.getElementById('blink_2');
        setInterval(function() {
            textField2.classList.toggle('blinking');
        }, 1000);

        var textField3 = document.getElementById('blink_3');
        setInterval(function() {
            textField3.classList.toggle('blinking');
        }, 1000);

        var textField4 = document.getElementById('blink_4');
        setInterval(function() {
            textField4.classList.toggle('blinking');
        }, 1000);
    </script>
<?php include('../footer.php'); ?>
