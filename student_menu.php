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
  <a class="nav-link " href="#">
    <i class="ri-group-fill"></i>
    <span>Student Counseling Progress</span>
  </a>
</li><!-- End Student Counseling Progress Nav -->