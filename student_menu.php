<div class="row">
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
<?php if(isset($_SESSION['key_session']['exam_status']) && $_SESSION['key_session']['exam_status'] == 'Ready') { ?>
<li class="nav-item">
  <a class="nav-link " href="./available_exam" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
    <i class="ri-todo-fill"></i>
    <span><?php echo $_SESSION['key_session']['exam_title']; ?></span><i class="bi bi-chevron-down ms-auto"></i>
  </a>
  <ul id="forms-nav" class="nav-content collapsed" data-bs-parent="#sidebar-nav">
    <?php include_once('exam_menu.php'); ?>
  </ul>
</li><!-- End Test Questionaires Nav -->
<?php  } else { ?>
<li class="nav-item">
  <div class="nav-link text-danger">
    <i class="ri-todo-fill text-danger"></i>
    <span>Exam not available</span>
  </div>
</li><!-- End Test Questionaires Nav -->
<?php } ?>

<li class="nav-item">
  <a class="nav-link " href="../app/student_counseling_progress">
    <i class="ri-group-fill"></i>
    <span>Student Counseling Progress</span>
  </a>
</li><!-- End Student Counseling Progress Nav -->