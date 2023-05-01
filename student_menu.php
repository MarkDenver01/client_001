<div class="row">
<hr/>
  <div class="col-lg-12">
    <p class=" text-center text-success"> :: Semester :: </p>
    <input type="text" name="disp" id="txt" class="btn btn-outline-success rounded-0 clock" style="width: 250px;" value="<?php echo $_SESSION['key_session']['academic_semester']; ?>" disabled>
    <br/>  <br/> 
  </div>
  <div class="col-lg-12">
    <p class=" text-center text-success"> :: Academic School Year :: </p>
    <input type="text" name="disp" id="txt" class="btn btn-outline-success rounded-0 clock" style="width: 250px;" value="<?php echo $_SESSION['key_session']['academic_school_year']; ?>" disabled>
  </div>
</div>
<hr/>
<li class="nav-item">
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

<?php } ?>


<?php } ?>
<?php } else { ?>

<li class="nav-item">
  <div class="nav-link text-danger">
    <i class="ri-todo-fill text-danger"></i>
    <span>Exam not available</span>
  </div>
</li><!-- End Test Questionaires Nav -->

<?php } ?>

<?php 
  $examinee = find_examinee_complete(
    $_SESSION['key_session']['student_id'],
    $_SESSION['key_session']['academic_semester'],
    $_SESSION['key_session']['academic_school_year']
  );
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
  <a class="nav-link " href="../app/baron_result">
    <i class="ri-sticky-note-fill"></i>
    <span><?php echo $examinee['exam_title']; ?>'s Result</span>
  </a>
</li>  
<?php } elseif ($examinee['exam_title'] == 'The Keirsey Temperament Sorter') { ?>
<li class="nav-item">
  <a class="nav-link " href="../app/keirsey_result">
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
  <a class="nav-link " href="../app/aptitude_verbal_n_numeric_result">
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