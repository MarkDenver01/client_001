<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php IS_HIGHER_LEVEL(); ?>
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


<section class="section" style="width: 2660px;">
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
                        <option value="" selected>Select Year Level</option>
                        <option value="First Year">First Year</option>
                        <option value="Second Year">Second Year</option>
                        <option value="Third Year">Third Year</option>
                        <option value="Fourth Year">Fourth Year</option>
                      </select>
                      <br/>
                    </div>
                    <div class="col-sm-3">
                      <select id="school_year" name="school_year" class="form-select rounded-0" aria-label="Default select example">
                        <option value="" selected>Academic Year</option>
                        <?php global $db; ?>
                        <?php 
                          $sql = "SELECT * FROM academic_settings";
                          $result = $db->query($sql);
                          if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                              echo '<option value="' .$row['school_year']. '">' .$row['school_year']. '</option>';
                            }
                          }
                        ?>
                      </select>
                      <br/>
                      <button name="button_filter" type="submit" class="btn btn-secondary text-white rounded-0 btn-sm w-100"><i class="bi bi-search"></i> </button>
                    </div>
                    <div class="col-sm-3">
                      <select id="semester" name="semester" class="form-select rounded-0" aria-label="Default select example">
                         <option value="" selected>Semester</option>
                        <?php 
                          $sql = "SELECT * FROM academic_settings";
                          $result = $db->query($sql);
                          if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                              echo '<option value="' .$row['semester']. '">' .$row['semester']. '</option>';
                            }
                          }
                        ?>
                      </select>
                      <br/>
                    </div>
                    
                    <div class="col-sm-3">
                      <select id="exam_description" name="course" class="form-select rounded-0" aria-label="Default select example">
                      <?php 
                          $sql = "SELECT * FROM course_tbl";
                          $result = $db->query($sql);
                          if ($result->num_rows > 0) {
                            echo '<option value="" disabled>Select course</option>';
                            while ($row = $result->fetch_assoc()) {
                              echo '<option value="' .$row['course']. '">' .$row['course']. '</option>';
                            }
                          }
                        ?>
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
                  <table id="scroll_view" class="table table-sm table-hover table-striped datatable text-nowrap display" style="width:100%">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center" >Student Id</th>
                        <th scope="col" class="text-center" >Name</th>
                        <th scope="col" class="text-center" >Email address</th>
                        <th scope="col" class="text-center" >Gender</th>
                        <th scope="col" class="text-center" >Course</th>
                        <th scope="col" class="text-center" >Semester</th>
                        <th scope="col" class="text-center" >School Year</th>
                        <th scope="col" class="text-cemter" >Student Year</th>
                        <th scope="col" class="text-center" >Exam Type</th>
                        <th scope="col" class="text-center" >Exam Description</th>
                        <th scope="col" class="text-center" >Exam Category</th>
                        <th scope="col" class="text-center" >Grades</th>
                        <th scope="col" class="text-center" >Exam Result Status</th>
                        <th scope="col" class="text-center" >Examinee Status</th>
                        <th scope="col" class="text-center" >Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                      if (isset($_POST['button_filter'])) {
                        $filterData = student_exam_result_combine($_POST['student_year'], $_POST['school_year'], $_POST['semester'], $_POST['course']);
                      foreach ($filterData as $filtered) { ?>
                      <?php 
                      
                        if ($filtered['exam_title'] == 'Student Success Kit') {
                            $redirect = "../app/student_success_kit_result.php?student_id=" .$filtered['student_id'];
                        } else if ($filtered['exam_title'] == 'OASIS 3') {
                            $redirect = "../app/oasis_result.php?student_id=" .$filtered['student_id'];
                        } else if($filtered['exam_title'] == 'BarOn EQ-i:S') {
                            $redirect = "../app/baron_eq_interpretation.php?student_id=" .$filtered['student_id'];
                        } else if ($filtered['exam_title'] == 'The Keirsey Temperament Sorter') {
                            $redirect = "../app/keirsey_temp_intrepretation.php?student_id=" .$filtered['student_id'];
                        } else if ($filtered['exam_title'] == 'Aptitude J and C') {
                            $redirect = "../app/aptitude_j_n_c_result.php?student_id=" .$filtered['student_id'];
                        } else if ($filtered['exam_title'] == 'ESA') {
                            $redirect = "../app/esa_result.php?student_id=" .$filtered['student_id'];
                        } else if ($filtered['exam_title'] == 'Aptitude Verbal and Numerical') {
                            $redirect = "../app/aptitude_verbal_n_numerical.php?student_id=" .$filtered['student_id'];
                        }
                      ?>

                      <tr class="text-success">
                        <th scope="row" class="text-center" hidden ><?php echo $filtered['student_id']; ?></th>
                        <th scope="row" class="text-center" hidden ><?php echo $filtered['exam_id']; ?></th>
                        <th scope="row" class="text-center text-danger" ><?php echo $filtered['student_no']; ?></th>
                        <th scope="row" class="text-center" ><?php echo $filtered['name']; ?></th>
                        <td scope="row" class="text-center" ><?php echo $filtered['email_address']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $filtered['gender']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $filtered['course']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $filtered['semester']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $filtered['school_year']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $filtered['student_year']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $filtered['exam_title']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $filtered['exam_description']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $filtered['exam_category']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $filtered['total_grades']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $filtered['exam_result']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $filtered['examinee_status']; ?></td>
                        <td>
                            <a href="<?php echo $redirect; ?>" type="submit" class="btn btn-success text-white rounded-0 btn-sm w-100"><i class="bi bi-print"></i> View result</a>
                        </td>
                      </tr>

                    <?php    }  ?>
                    <?php  } else { ?>

                    <?php       
                      $sql = "SELECT e.student_no, e.student_id AS student_id, e.exam_id AS exam_id, e.name AS name, e.email_address AS email_address, 
                        e.gender AS gender, e.course AS course, e.semester AS semester, e.school_year, e.student_year AS student_year, 
                        e.exam_title AS exam_title, e.exam_description AS exam_description, e.exam_category AS exam_category, 
                        s.exam_result AS exam_result, s.grades as total_grades, e.exam_result_status AS examinee_status FROM `examinee` `e` LEFT JOIN `student_exam_result` `s` 
                        ON e.email_address = s.email_address GROUP by e.exam_category";
                        $result = $db->query($sql);
                      $result =$db->query($sql);
                      if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
          
                        if ($row['exam_title'] == 'Student Success Kit') {
                            $redirect = "../app/student_success_kit_result.php?student_id=" .$row['student_id'];
                        } else if ($row['exam_title'] == 'OASIS 3') {
                            $redirect = "../app/oasis_result.php?student_id=" .$row['student_id'];
                        } else if($row['exam_title'] == 'BarOn EQ-i:S') {
                            $redirect = "../app/baron_eq_interpretation.php?student_id=" .$row['student_id']. "&semester=" .$row['semester']. "&school_year=" .$row['school_year']. "&name=" .$row['name'];
                        } else if ($row['exam_title'] == 'The Keirsey Temperament Sorter') {
                            $redirect = "../app/keirsey_temp_intrepretation.php?student_id=" .$row['student_id']. "&semester=" .$row['semester']. "&school_year=" .$row['school_year']. "&name=" .$row['name'];
                        } else if ($row['exam_title'] == 'Aptitude J and C') {
                            $redirect = "../app/aptitude_j_n_c_result.php?student_id=" .$row['student_id']. "&semester=" .$row['semester']. "&school_year=" .$row['school_year']. "&name=" .$row['name'];
                        } else if ($row['exam_title'] == 'ESA') {
                            $redirect = "../app/esa_result.php?student_id=" .$row['student_id']. "&semester=" .$row['semester']. "&school_year=" .$row['school_year']. "&name=" .$row['name']. "&exam_id=" .$row['exam_id'];
                        } else if ($row['exam_title'] == 'Aptitude Verbal and Numerical') {
                            $redirect = "../app/aptitude_verbal_n_numerical.php?student_id=" .$row['student_id']. "&semester=" .$row['semester']. "&school_year=" .$row['school_year']. "&name=" .$row['name']. "&exam_id=" .$row['exam_id'];;
                        }
                    ?>
                      <tr class="text-success">

                        <th scope="row" class="text-center" hidden ><?php echo $row['student_id']; ?></th>
                        <th scope="row" class="text-center" hidden ><?php echo $row['exam_id']; ?></th>
                        <th scope="row" class="text-center text-danger" ><?php echo $row['student_no']; ?></th>
                        <th scope="row" class="text-center" ><?php echo $row['name']; ?></th>
                        <td scope="row" class="text-center" ><?php echo $row['email_address']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $row['gender']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $row['course']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $row['semester']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $row['school_year']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $row['student_year']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $row['exam_title']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $row['exam_description']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $row['exam_category']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $row['total_grades']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $row['exam_result']; ?></td>
                        <td scope="row" class="text-center" ><?php echo $row['examinee_status']; ?></td>
                        <td>
                            <a href="<?php echo $redirect; ?>" type="submit" class="btn btn-success text-white rounded-0 btn-sm w-100"><i class="bi bi-print"></i> View result</a>
                      </td>
                      </tr>
                    <?php
                        }
                      } 
                    }
                    ?>
                    </tbody>
                  </table>
                  <!-- End Table with hoverable rows -->
           
                 <button name="button_print" onClick="window.print()" class="btn btn-danger text-white rounded-0 btn-sm" style="width: 150px;"><i class="bi bi-print"></i> Print</button>


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
<script>
  $(document).ready(function () {
    $('#scroll_view').DataTable({
        scrollX: true,
    });
});
</script>
<?php include('../footer.php'); ?>
