<li class="nav-item">
  <a class="nav-link " href="./dashboard">
    <i class="ri-dashboard-fill"></i>
    <span>Dashboard</span>
  </a>
</li><!-- End Dashboard Nav -->

<?php if(isset($_SESSION['key_session']['exam_status']) && $_SESSION['key_session']['exam_status'] == 'Ready') { ?>
<li class="nav-item">
  <a class="nav-link " href="./available_exam">
    <i class="ri-todo-fill"></i>
    <span>Available Exam</span>
  </a>
</li><!-- End Test Questionaires Nav -->
<?php } ?>

<li class="nav-item">
  <a class="nav-link " href="#">
    <i class="ri-group-fill"></i>
    <span>Student Counseling Progress</span>
  </a>
</li><!-- End Student Counseling Progress Nav -->
