<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>

<?php include('../start_menu_bar.php'); ?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Student Counseling</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Student Records</a></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


<section class="section" style="width: 1660px;">
    <div class="row">
      <!-- start create account -->
            <!-- start create account -->
            <div class="card rounded-0">
      </br>
        <div class="row">
          <div class="box">
            <div class="box-body">
            <form action="" method="POST">
		          <div class="row">
			          <div class="form-group col-sm-12 text-center">

                  <div class="row">
                    <div class="col-sm-3">
                    <select id="student_year" name="student_year" class="form-select rounded-0" aria-label="Default select example">
                        <option selected>Select Year Level</option>
                        <option value="First Year">First Year</option>
                        <option value="Second Year">Second Year</option>
                        <option value="Third Year">Third Year</option>
                        <option value="Fourth Year">Fourth Year</option>
                      </select>
                      <br/>
                    </div>
                    <div class="col-sm-3">
                      <select id="exam_title" name="exam_title" class="form-select rounded-0" aria-label="Default select example">
                        <option value="" selected>Academic Year</option>
                      </select>
                      <br/>
                      <button name="button_filter" type="submit" class="btn btn-secondary text-white rounded-0 btn-sm w-100"><i class="bi bi-search"></i> </button>
                    </div>
                    <div class="col-sm-3">
                      <select id="exam_description" name="exam_description" class="form-select rounded-0" aria-label="Default select example">
                         <option value="" selected>Semester</option>
                      </select>
                      <br/>
                    </div>
                    
                    <div class="col-sm-3">
                      <select id="exam_description" name="exam_description" class="form-select rounded-0" aria-label="Default select example">
                         <option value="" selected>Course</option>
                      </select>
                      <br/>
                    </div>


                  </div>

                </div>
		          </div>
            </form>
            </div>
          </div>
        <br/>
      <div class="card rounded-0">
        <div class="card-body">
          <br/>
          <!-- General Form Elements -->
          <form class="row g-3" method="POST" action="">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <!-- Table with hoverable rows -->
                  <table class="table table-sm table-hover datatable text-nowrap">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center" >Name</th>
                        <th scope="col" class="text-center" >Gender</th>
                        <th scope="col" class="text-center" >Student Year</th>
                        <th scope="col" class="text-center" >Course</th>
                        <th scope="col" class="text-cemter" >Semester</th>
                        <th scope="col" class="text-center" >School Year</th>
                        <th scope="col" class="text-center" >Exam Title</th>
                        <th scope="col" class="text-center" >Grades</th>
                        <th scope="col" class="text-center" >Exam Result</th>
                        <th scope="col" class="text-center" >Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php       
                      // $sql = "SELECT * FROM examinee GROUP BY exam_title ORDER BY exam_title LIMIT 1";
                      // $result = $db->query($sql);
                      // if ($result->num_rows > 0) {
                      //   while ($row = $result->fetch_assoc()) {
                      //     $id = $row['id'];
                      //     $name = $row['name'];
                      //     $student_year = $row['student_year'];
                      //     $course = $row['course'];
                      //     $gender = $row['gender'];
                      //     $counseling_status = $row['counselor_notify_status'];
                      //     $student_id = $row['student_id'];
                      $sql = "SELECT DISTINCT exam_title, `name`, gender, course, student_year, semester, school_year, grades, exam_result FROM student_exam_result ORDER BY id DESC";
                      $result =$db->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    ?>
                      <tr class="text-success">
                        <th scope="row" class="text-center" ><?php echo $row['name']; ?></th>
                        <td scope="row" class="text-center" ><?php echo $row['gender']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $row['course']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $row['student_year']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $row['semester']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $row['school_year']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $row['exam_title']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $row['grades']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $row['exam_result']; ?></td>
                        <td>
                        <button name="button_print" type="submit" class="btn btn-success text-white rounded-0 btn-sm w-50"><i class="bi bi-print"></i> View result</button>
                        <button name="button_print" type="submit" class="btn btn-danger text-white rounded-0 btn-sm w-50"><i class="bi bi-print"></i> Print</button>
                        </td>
                      </tr>
                    <?php
                        }
                      } 
                    ?>
                    </tbody>
                  </table>
                  <!-- End Table with hoverable rows -->

                </div>
                
              </div>
            </div>
          </form><!-- End floating Labels Form -->
          <!-- End General Form Elements -->

        </div>
      </div>
      <!-- end create account -->
    </div>
</section>
<?php include('../footer.php'); ?>
