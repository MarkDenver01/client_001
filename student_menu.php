<li class="nav-item ">
  <a class="nav-link " href="./dashboard">
    <i class="ri-dashboard-fill"></i>
    <span>Dashboard</span>
  </a>
</li><!-- End Dashboard Nav -->


<?php global $db; ?>
<?php 
  $student_year = $_SESSION['key_session']['student_year'];
  $semester = $_SESSION['key_session']['academic_semester'];
  $school_year = $_SESSION['key_session']['academic_school_year'];
?>
<?php $sql = "SELECT exam_title FROM exam_schedule WHERE student_year ='$student_year' 
AND semester ='$semester' AND school_year ='$school_year' AND exam_status='Ready' GROUP BY exam_title"; ?>
<?php 
$result = $db->query($sql);
if ($db->num_rows($result)) {
  while ($row = $result->fetch_assoc()) {
?>
<?php if ($row['exam_title'] == 'Student Success Kit') { ?>

<li class="nav-item">
  <a class="nav-link " href="./available_exam" data-bs-target="#forms1-nav" data-bs-toggle="collapse" href="#">
    <i class="ri-todo-fill"></i>
    <span><?php echo $row['exam_title']; ?></span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="forms1-nav" class="nav-content collapsed" data-bs-parent="#sidebar-nav">
    <?php include_once('kit_exam_menu.php'); ?>
  </ul>
</li><!-- End Test Questionaires Nav -->

<?php } elseif ($row['exam_title'] == 'OASIS 3') { ?>

<li class="nav-item">
  <a class="nav-link " href="./available_exam" data-bs-target="#forms2-nav" data-bs-toggle="collapse" href="#">
    <i class="ri-todo-fill"></i>
    <span><?php echo $row['exam_title']; ?></span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="forms2-nav" class="nav-content collapsed" data-bs-parent="#sidebar-nav">
    <?php include_once('oasis_exam_menu.php'); ?>
  </ul>
</li><!-- End Test Questionaires Nav -->

<?php } elseif ($row['exam_title'] == 'BarOn EQ-i:S') { ?>


  <li class="nav-item">
  <a class="nav-link " href="./available_exam" data-bs-target="#forms3-nav" data-bs-toggle="collapse" href="#">
    <i class="ri-todo-fill"></i>
    <span><?php echo $row['exam_title']; ?></span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="forms3-nav" class="nav-content collapsed" data-bs-parent="#sidebar-nav">
    <?php include_once('baron_exam_menu.php'); ?>
  </ul>
</li><!-- End Test Questionaires Nav -->

<?php } elseif ($row['exam_title'] == 'The Keirsey Temperament Sorter') {?>

  <li class="nav-item">
  <a class="nav-link " href="./available_exam" data-bs-target="#forms4-nav" data-bs-toggle="collapse" href="#">
    <i class="ri-todo-fill"></i>
    <span><?php echo $row['exam_title']; ?></span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="forms4-nav" class="nav-content collapsed" data-bs-parent="#sidebar-nav">
    <?php include_once('keirsey_exam_menu.php'); ?>
  </ul>
</li><!-- End Test Questionaires Nav -->

<?php } elseif ($row['exam_title'] == 'Aptitude J and C') { ?>

  <li class="nav-item">
  <a class="nav-link " href="./available_exam" data-bs-target="#forms5-nav" data-bs-toggle="collapse" href="#">
    <i class="ri-todo-fill"></i>
    <span><?php echo $row['exam_title']; ?></span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="forms5-nav" class="nav-content collapsed" data-bs-parent="#sidebar-nav">
    <?php include_once('aptitude_j_n_c_exam_menu.php'); ?>
  </ul>
</li><!-- End Test Questionaires Nav -->

<?php } elseif ($row['exam_title'] == 'ESA') { ?>

<li class="nav-item">
  <a class="nav-link " href="./available_exam" data-bs-target="#forms6-nav" data-bs-toggle="collapse" href="#">
    <i class="ri-todo-fill"></i>
    <span><?php echo $row['exam_title']; ?></span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="forms6-nav" class="nav-content collapsed" data-bs-parent="#sidebar-nav">
    <?php include_once('esa_exam_menu.php'); ?>
  </ul>
</li><!-- End Test Questionaires Nav -->

<?php } elseif ($row['exam_title'] == 'Aptitude Verbal and Numerical') { ?>

  <li class="nav-item">
  <a class="nav-link " href="./available_exam" data-bs-target="#forms7-nav" data-bs-toggle="collapse" href="#">
    <i class="ri-todo-fill"></i>
    <span><?php echo $row['exam_title']; ?></span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="forms7-nav" class="nav-content collapsed" data-bs-parent="#sidebar-nav">
    <?php include_once('aptitude_n_n_v_exam_menu.php'); ?>
  </ul>
</li><!-- End Test Questionaires Nav -->

<?php } ?>


<?php } ?>
<?php } else { ?>

<li class="nav-item">
<a class="nav-link " href="#" data-bs-target="#forms2-nav" data-bs-toggle="collapse" href="#">
  <div class="nav-link text-danger">
    <i class="ri-todo-fill text-danger"></i>
    <span>Exam not available</span>
  </div>
</li><!-- End Test Questionaires Nav -->
</a>

<?php } ?>


<?php $sql = "SELECT exam_title FROM examinee WHERE student_year ='$student_year' 
AND semester ='$semester' AND school_year ='$school_year' AND exam_result_status='Done' GROUP BY exam_title"?>
<?php 
$result = $db->query($sql);
if ($db->num_rows($result)) {
  while ($examinee = $result->fetch_assoc()) {
?>

<?php if ($examinee['exam_title'] == 'Student Success Kit') { ?>
<li class="nav-item">
  <a class="nav-link " href="../app/student_success_kit_result">
    <i class="ri-sticky-note-fill"></i>
    <span><?php echo $examinee['exam_title']; ?>'s Result</span>
  </a>
</li>
<?php } elseif ($examinee['exam_title'] == 'OASIS 3') { ?>
<li class="nav-item">
  <a class="nav-link " href="../app/oasis_result">
    <i class="ri-sticky-note-fill"></i>
    <span><?php echo $examinee['exam_title']; ?>'s Result</span>
  </a>
</li>  
<?php } elseif ($examinee['exam_title'] == 'BarOn EQ-i:S') { ?>
<li class="nav-item">
  <a class="nav-link " href="../app/baron_eq_interpretation?exam_title=<?php echo $examinee['exam_title']; ?>">
    <i class="ri-sticky-note-fill"></i>
    <span><?php echo $examinee['exam_title']; ?>'s Result</span>
  </a>
</li>  
<?php } elseif ($examinee['exam_title'] == 'The Keirsey Temperament Sorter') { ?>
<li class="nav-item">
  <a class="nav-link " href="../app/keirsey_temp_intrepretation">
    <i class="ri-sticky-note-fill"></i>
    <span><?php echo $examinee['exam_title']; ?>'s Result</span>
  </a>
</li>  
<?php } elseif ($examinee['exam_title'] == 'Aptitude J and C') { ?>
<li class="nav-item">
  <a class="nav-link " href="../app/aptitude_j_n_c_result">
    <i class="ri-sticky-note-fill"></i>
    <span><?php echo $examinee['exam_title']; ?>'s Result</span>
  </a>
</li>  
<?php } elseif ($examinee['exam_title'] == 'ESA') { ?>
<li class="nav-item">
  <a class="nav-link " href="../app/esa_result">
    <i class="ri-sticky-note-fill"></i>
    <span><?php echo $examinee['exam_title']; ?>'s Result</span>
  </a>
</li>  
<?php } elseif ($examinee['exam_title'] == 'Aptitude Verbal and Numerical') { ?>
<li class="nav-item">
  <a class="nav-link " href="../app/aptitude_verbal_n_numerical">
    <i class="ri-sticky-note-fill"></i>
    <span><?php echo $examinee['exam_title']; ?>'s Result</span>
  </a>
</li>  
<?php } else { ?>
<li class="nav-item">
  <i class="ri-sticky-note-fill"></i>
    <span class="text-danger">Not Available</span>
</li>  
<?php } ?>

<?php } ?>
<?php } ?>

