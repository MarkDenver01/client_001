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
      $student_id  = $_GET['student_id'];
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

    <section class="section profile" style="width: 1660px;">
      <div class="row">
        <!-- center -->
        <div class="col-lg-6">
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
                                    $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' 
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
                                    $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' 
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
                                    $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' 
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
                                    $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' 
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
                                    $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' 
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
                                    $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' 
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
                                    $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' 
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
                                    $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' 
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
                                    $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' 
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
                                    $sql = "SELECT * FROM examinee_answer_v2 WHERE student_id ='$student_id' 
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
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(1,8,15,22,29,36,43,50,57,64)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(1,8,15,22,29,36,43,50,57,64)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_b = $row['total'];
                                  ?>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_a; ?></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_b; ?></td>
                                  <?php 
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(2,9,16,23,30,37,44,51,58,65)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(2,9,16,23,30,37,44,51,58,6)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_b = $row['total'];
                                  ?>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_a; ?></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_b; ?></td>
                                  <?php 
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(3,10,17,24,31,38,45,52,59,66)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(3,10,17,24,31,38,45,52,59,66)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_b = $row['total'];
                                  ?>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_a; ?></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_b; ?></td>
                                  <?php 
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(4,11,18,25,32,39,46,53,60,67)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(4,11,18,25,32,39,46,53,60,67)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_b = $row['total'];
                                  ?>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_a; ?></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_b; ?></td>
                                  <?php 
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(5,12,19,26,33,40,47,54,61,68)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(5,12,19,26,33,40,47,54,61,68)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_b = $row['total'];
                                  ?>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_a; ?></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_b; ?></td>
                                  <?php 
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(6,13,20,27,34,41,48,55,62,69)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(6,13,20,27,34,41,48,55,62,69)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_b = $row['total'];
                                  ?>
                                  <td style="background-image: linear-gradient(#4B3621, #4B3621);"></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_a; ?></td>
                                  <td class="text-white" style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $result_k_ans_b; ?></td>
                                  <?php 
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id'  
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(7,14,21,28,35,42,49,56,63,70)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
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
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(2,9,16,23,30,37,44,51,58,65)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
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
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(4,11,18,25,32,39,46,53,60,67)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
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
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(6,13,20,27,34,41,48,55,62,69)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
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
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(1,8,15,22,29,36,43,50,57,64)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $total_a_1 = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
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
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(2,9,16,23,30,37,44,51,58,65)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_1_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(2,9,16,23,30,37,44,51,58,6)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_1_b = $row['total'];

                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(3,10,17,24,31,38,45,52,59,66)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_2_a  = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
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
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(4,11,18,25,32,39,46,53,60,67)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_1_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(4,11,18,25,32,39,46,53,60,67)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_1_b = $row['total'];

                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(5,12,19,26,33,40,47,54,61,68)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_2_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
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
                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(6,13,20,27,34,41,48,55,62,69)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_1_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='b' AND exam_item_no IN(6,13,20,27,34,41,48,55,62,69)";
                                     $result = $db->query($sql_b);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_1_b = $row['total'];

                                     $sql_a = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
                                     AND semester ='$semester' AND school_year ='$school_year' AND exam_correct_answer='a' AND exam_item_no IN(7,14,21,28,35,42,49,56,63,70)";
                                     $result = $db->query($sql_a);
                                     $row = mysqli_fetch_assoc($result);
                                     $result_k_ans_2_a = $row['total'];

                                     $sql_b = "SELECT count(*) as total FROM examinee_answer_v2 WHERE student_id ='$student_id' 
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
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="card rounded-0">
            <div class="card-body">
              <br/>
              <div class="text-center"><h2>Interpretation</h2></div>
              <hr/>
                  <div class="row mb-3">
                    <div class="col-lg-12">
                    <table class="table table-hover table-bordered text-center">
                      <thead>
                        <tr>
                          <th class="text-white" style="background-image: linear-gradient(#4B3621, #4B3621);"><h2>RESULT</h2></th>
                          <td class="text-white" style="background-image: linear-gradient(#4B3621, #4B3621);"><h2>
                          <?php 
                            foreach ($char as $key) {
                              $result = $key;
                              echo $result;
                            }
                          ?>
                          </h2>
                          </td>
                        </tr>
                      
                      </thead>
                    </table>

                    <table class="table table-hover table-bordered text-center">
                      <thead>
                        <tr>
                          <th>
                            <p class="text-center">
                              ISTJ 
                            </p>
                          </th>
                          <td>
                            Seriousm quite, earn success, reserved by concentration
                            and thoroughness. Practical, order matler-of-fact, logical,
                            realistic, and dependable. See to it that everything is
                            well organized. Take responsibility. Make up their own
                            minds as to what should be accomplished and work toward it
                            steadily, regardless of protests or distractions.
                            
                          </td>
                        </tr>
                        <tr>
                          <th class="text-center">
                            ISFJ
                          </th>
                          <td>
                            Quiet, friendly, responsible, and conscientious.
                            Work devotedly to meet their obligations. Lend
                            stability to any project or group. Thorough,
                            painstaking, accurate. Their interests are usually
                            not technical. Can be patient with necessary details.
                            Loyal, considerate, perceptive, concerned with other
                            peoply feel.
                          </td>
                        </tr>
                        <tr>
                          <th class="text-center">
                            INFJ
                          </th>
                          <td>
                            Success by perseverance, originality and desire
                            to do whatever is needed or wanted. Put their best
                            efforts into their work. Quietly forceful, conscientious,
                            concerned for others. Respected for their firm principles.
                            Likely to be honored and followed for their clear convictions
                            as to how best to serve the common good.
                          </td>
                        </tr>
                        <tr>
                          <th class="text-center">
                            INTJ
                          </th>
                          <td>
                            Usually have original minds and great drive for their own 
                            ideas and purposes. In fields that appeal to them, they have 
                            a fine power to organize a job and carry it through with or 
                            without help. Skeptical, critical, independent, determined, 
                            sometimes stubborn. Must learn to yield less important points in 
                            order to win the most important.
                          </td>
                        </tr>
                        <tr>
                          <th class="text-center">
                            ISTP
                          </th>
                          <td>
                            Cool onlookers-quite, reserved, observing and analyzing life with detached curiousity and
                            unexpected flashes of original humor. Usually interested in cause and effect, how and 
                            why mechanical things work, and in organizing facts using logical principles.
                          </td>
                        </tr>
                        <tr>
                          <th class="text-center">
                            ISPF
                          </th>
                          <td>
                            Retiring, quietly friendly, sensitive, kind, modest about their abilities. 
                            Shun disagreements, do not force their opinions or values on others. Usually 
                            do not care to lead but are often loyal followers. Often relaxed about getting 
                            things done because they enjoy the present moment and do not want to spoil it by 
                            undue haste or exertion.
                          </td>
                        </tr>
                        <tr>
                          <th class="text-center">
                            INFP
                          </th>
                          <td>
                            Full of enthusiams and loyalties, but seldom talk of these until they know you well.
                            Care about learning, ideas, language, and independent projects of their own. Tend to undertake 
                            too much, then somehow get it done. Friendly, but often too absorbed in what they are doing to be 
                            sociable. Little concerned with possessions or physical surroindings.
                          </td>
                        </tr>
                        <tr>
                          <th class="text-center">
                            INTP
                          </th>
                          <td>
                            Quiet and reserved. Especially enjoy theorical or scientific pursuits. Like solving probles with 
                            logic and analysis. Usually interested mainly in ideas, with little liking for parties or small talk 
                            Tend to have sharply defined interests. Need careers where some strong interest can be used and useful
                          </td>
                        </tr>
                        <tr>
                          <th class="text-center">
                            ESTP
                          </th>
                          <td>
                            Good at on-the-spot problem solving, Do not worry, enjoy whaever comes along. Tend to like mechanical 
                            things and sports with friends on the side. Adaptable, tolerant, generally consevative in values. Dislike
                            long explanations. Are best with real things that can be worked, handled, take apart, or put together.
                          </td>
                        </tr>
                        <tr>
                          <th class="text-center">
                            ESFP
                          </th>
                          <td>
                            Outgoing, easygoing, accepting, friendly, enjoyh everyhing and make things more fun for others by their 
                            enjoyment. Like sports and making things happen. Know what's going on and join in eagerly. Find
                            remembering facts easier than mastering theories. Are best in situations that need sound common sense 
                            and pratical ability with people as well as with things
                          </td>
                        </tr>
                        <tr>
                          <th class="text-center">
                            ENFP
                          </th>
                          <td>
                            Warmly enthusiatic, high-spirited, ingenious, imaginative. Able to do almost anything that interests them.
                            Quick with a solution for any difficulty and ready to help anyone with a problem. Often rely on their ability
                            to improvise instead of preparing in advance. Can usually find compelling reasons for whatever they want.
                          </td>
                        </tr>
                        <tr>
                          <th class="text-center">
                            ENTP
                          </th>
                          <td>
                            Quick, ingenious, good at many things. Stimulating company, alert and outspoken, May argue for fun on either 
                            side of a question. Resourceful in solving new and challenging problems, but may neglect routine assignments.
                            Apt to turn to one new interest after another. Skillful in finding logical reasons for what they want.
                          </td>
                        </tr>
                        <tr>
                          <th class="text-center">
                            ESTJ
                          </th>
                          <td>
                            Practical, realistic, matter-of-fact, with a natural head for business or mechanics. Not interested in subjects 
                            they see no use for, but can apply themselves when necessary. Like to organize and run activities. May make good 
                            administrations, especially if they remember to consider others' feelings and points of view.
                          </td>
                        </tr>
                        <tr>
                          <th class="text-center">
                            ESFJ
                          </th>
                          <td>
                            Warm-hearted, talkative, popular, conscientious, born cooeprators , active committee members. need harmony and 
                            may be good at creating it. Always doing something nice for someone. Work best with encouragement and praise, Main
                            interest is in things that directly and visibly affect people's lives.
                          </td>
                        </tr>
                        <tr>
                          <th class="text-center">
                            ENFJ
                          </th>
                          <td>
                            Responsive and responsible. Generally feel real concern for what others think or want, and try to handle things with 
                            due regard for the other person's feelings.  Cna present a proposal or lead a group discussion with ease and fact.
                            Sociable, popular shympathetic. Responsive to praise and criticism.
                          </td>
                        </tr>
                        <tr>
                          <th class="text-center">
                            ENTJ
                          </th>
                          <td>
                            Hearly, fran, decisive,leaders in activities. Usually good in anything that requires reasoning and intelligent talk,
                            such as public speaking. Are usually well informed and enjoy adding to their fund of knowledge. May sometimes appear 
                            more positive and confident than their experience in an area warrants.
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
