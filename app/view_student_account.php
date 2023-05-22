<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php IS_HIGHER_LEVEL(); ?>
<?php onClickButton("button_create", "./register_student_account"); ?>
<?php include('../start_menu_bar.php'); ?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Student Information</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Profiling</a></li>
        <li class="breadcrumb-item active">View student information</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


<section class="section" style="width: 1960px;">
    <div class="row">
      <!-- start create account -->
      <div class="card rounded-0 bg-light">
        <div class="card-body">
          <h5 class="card-title">View Student & Account information</h5>

          <!-- General Form Elements -->
          <form class="row g-3" method="POST" action="">
            <div class="col-lg-12">
              <div class="row">
              <div class="col-sm-2">
                    <select id="student_year" name="student_year" class="form-select rounded-0" aria-label="Default select example">
                        <option selected>Select Year Level</option>
                        <option value="First Year">First Year</option>
                        <option value="Second Year">Second Year</option>
                        <option value="Third Year">Third Year</option>
                        <option value="Fourth Year">Fourth Year</option>
                    </select>
                    <br/>
                    <button name="button_filter" type="submit" class="btn btn-secondary text-white rounded-0 btn-sm w-100"><i class="bi bi-search"></i> </button>
                </div>
                <div class="col-sm-2">
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
                </div>
                <div class="col-sm-2">
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
                </div>
                <div class="col-sm-3">
                    <select id="exam_description" name="course" class="form-select rounded-0" aria-label="Default select example">
                      <?php 
                          $sql = "SELECT * FROM course_tbl";
                          $result = $db->query($sql);
                          if ($result->num_rows > 0) {
                            echo '<option value="">Select course</option>';
                            while ($row = $result->fetch_assoc()) {
                              echo '<option value="' .$row['course']. '">' .$row['course']. '</option>';
                            }
                          }
                        ?>
                    </select>
                </div>
                <div class="col-sm-3">
              </div>
            </div>
            <br/>
            <div class="col-lg-12 ">
              <div class="card rounded-0">
                <div class="card-body">
                  <!-- Table with hoverable rows -->
                  <table class="table table-sm table-hover datatable text-nowrap">
                    <thead>
                      <tr>
                      <th scope="col" class="text-center" style="width: 5%;">Student Id</th>
                        <th scope="col" class="text-center" style="width: 10%;">Name</th>
                        <th scope="col" class="text-center" style="width: 10%;">Email address</th>
                        <th scope="col" class="text-center" style="width: 5%;">Age</th>
                        <th scope="col" class="text-center" style="width: 5%;">Gender</th>
                        <th scope="col" class="text-center" style="width: 5%;">Birthday</th>
                        <th scope="col" class="text-center" style="width: 15%;">Address</th>
                        <th scope="col" class="text-center" style="width: 10%;">Year</th>
                        <th scope="col" class="text-center" style="width: 15%;">Course</th>
                        <th scope="col" class="text-center" style="width: 5%;">Semester</th>
                        <th scope="col" class="text-center" style="width: 5%;">A.Y.</th>
                        <th scope="col" class="text-center" style="width: 10%;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                          if (isset($_POST['button_filter'])) {
                            $filterData = filter_student_info(
                              $_POST['student_year'],
                              $_POST['school_year'],
                              $_POST['semester'],
                              $_POST['course']
                            );

                            foreach ($filterData as $filtered) { ?>
                             <tr>
                        <td id="<?php echo remove_junk($filtered['id']); ?>" scope="row" class="text-center"hidden>
                        <th data-target="name" scope="row" class="text-center text-danger" style="width: 5;"><?php echo remove_junk($filtered['student_no']); ?></th>
                        <th data-target="name" scope="row" class="text-center" style="width: 10%;"><?php echo remove_junk($filtered['name']); ?></th>
                        <td class="text-center" style="width: 10%;"><?php echo remove_junk($filtered['email_address']); ?></td>
                        <td class="text-center" style="width: 5%;"><?php echo remove_junk($filtered['age']); ?></td>
                        <td class="text-center" style="width: 5%;"><?php echo remove_junk($filtered['gender']); ?></td>
                        <td class="text-center" style="width: 5%;"><?php echo remove_junk($filtered['birth_date']); ?></td>
                        <td class="text-center" style="width: 15%;"><?php echo remove_junk($filtered['present_address']); ?></td>
                        <td class="text-center" style="width: 10%;"><?php echo remove_junk($filtered['student_year']); ?></td>
                        <td class="text-center" style="width: 15%;"><?php echo remove_junk($filtered['course']); ?></td>
                        <td class="text-center" style="width: 5%;"><?php echo remove_junk($filtered['semester']); ?></td>
                        <td class="text-center" style="width: 5%;"><?php echo remove_junk($filtered['school_year']); ?></td>
                        <td class="text-center" style="width: 10%;">
                          <button type="button" name="button_edit" class="btn btn-primary rounded-pill btn-sm w-50"  data-bs-toggle="modal" data-bs-target="#ExtralargeModal<?php echo $filtered['id']; ?>"><span></span>Edit</button>
                          <a href="../includes/delete_account?email_address=<?php echo remove_junk($filtered['email_address']); ?>" type="button" class="btn btn-danger rounded-pill btn-sm">Delete</button>
                        </td>
                      </tr>
                      <?php include('./update_student_account.php'); ?>
                      <?php }
                          } else { ?>
                      <?php $students = find_by_student(); ?>
                      <?php foreach($students as $student): ?>
                      <tr>
                        <td id="<?php echo remove_junk($student['id']); ?>" scope="row" class="text-center"hidden>
                        <th data-target="name" scope="row" class="text-center text-danger" style="width: 5%;"><?php echo remove_junk($student['student_no']); ?></th>
                        <th data-target="name" scope="row" class="text-center" style="width: 10%;"><?php echo remove_junk($student['name']); ?></th>
                        <td class="text-center" style="width: 10%;"><?php echo remove_junk($student['email_address']); ?></td>
                        <td class="text-center" style="width: 5%;"><?php echo remove_junk($student['age']); ?></td>
                        <td class="text-center" style="width: 5%;"><?php echo remove_junk($student['gender']); ?></td>
                        <td class="text-center" style="width: 5%;"><?php echo remove_junk($student['birth_date']); ?></td>
                        <td class="text-center" style="width: 15%;"><?php echo remove_junk($student['present_address']); ?></td>
                        <td class="text-center" style="width: 10%;"><?php echo remove_junk($student['student_year']); ?></td>
                        <td class="text-center" style="width: 15%;"><?php echo remove_junk($student['course']); ?></td>
                        <td class="text-center" style="width: 5%;"><?php echo remove_junk($student['semester']); ?></td>
                        <td class="text-center" style="width: 5%;"><?php echo remove_junk($student['school_year']); ?></td>
                        <td class="text-center" style="width: 10%;">
                          <button type="button" name="button_edit" class="btn btn-primary rounded-pill btn-sm w-50"  data-bs-toggle="modal" data-bs-target="#ExtralargeModal<?php echo $student['id']; ?>"><span></span>Edit</button>
                          <a href="../includes/delete_account?email_address=<?php echo remove_junk($student['email_address']); ?>" type="button" class="btn btn-danger rounded-pill btn-sm">Delete</button>
                        </td>
                      </tr>
                      <?php include('./update_student_account.php'); ?>
                      <?php endforeach; ?>
                      <?php } ?>
                    </tbody>
                  </table>
                  <!-- End Table with hoverable rows -->
                  <button name="button_print" onClick="window.print()" class="btn btn-danger text-white rounded-0 btn-sm" style="width: 150px;"><i class="bi bi-print"></i> Print</button>
                </div>
              </div>


            </div>

            <div class="text-center">
              <button type="submit" name="button_create" class="btn btn-success rounded-0 w-25">Create new account</button>
            </div>
          </form><!-- End floating Labels Form -->
          <!-- End General Form Elements -->

        </div>
      </div>
      <!-- end create account -->
    </div>
</section>
<?php include('../footer.php'); ?>
