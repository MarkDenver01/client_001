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
    <h1>Upload Student Grade</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Student Probation under academic settings</a></li>
        <li class="breadcrumb-item active">Upload Student Grade</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


<section class="section" style="width: 2160px;">
    <div class="row">
      <!-- start create account -->
      <div class="card rounded-0 bg-light">
        <div class="card-body">
          <h5 class="card-title">Student List</h5>

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
                    <br/>
                    <button name="button_filter" type="submit" class="btn btn-secondary text-white rounded-pill btn-sm w-100"><i class="bi bi-search"></i> </button>
                </div>
                <div class="col-sm-4">
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
                <div class="col-sm-2">
                    <select id="exam_description" name="status" class="form-select rounded-0" aria-label="Default select example">
                        <option selected>Select probation status</option>
                        <option value="under probation">Under probation</option>
                        <option value="not under probation">Not under probation</option>
                    </select>
                </div>
              </div>
            </div>
            <div class="col-lg-12 ">
              <div class="card rounded-0" >
                <div class="card-body">
                  <!-- Table with hoverable rows -->
                  <table class="table table-sm table-hover datatable text-nowrap">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center" >Student Id</th>
                        <th scope="col" class="text-center" >Name</th>
                        <th scope="col" class="text-center" >Email address</th>
                        <th scope="col" class="text-center" >Age</th>
                        <th scope="col" class="text-center" >Gender</th>
                        <th scope="col" class="text-center" >Birthday</th>
                        <th scope="col" class="text-center" >Address</th>
                        <th scope="col" class="text-center" >Year</th>
                        <th scope="col" class="text-center" >Course</th>
                        <th scope="col" class="text-center" >Semester</th>
                        <th scope="col" class="text-center" >A.Y.</th>
                        <th scope="col" class="text-center" >Status</th>
                        <th scope="col" class="text-center" >Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                          if (isset($_POST['button_filter'])) {
                            $filterData = filter_student_probation(
                              $_POST['student_year'],
                              $_POST['school_year'],
                              $_POST['semester'],
                              $_POST['course'],
                              $_POST['status']
                            );

                            foreach ($filterData as $filtered) { ?>
                              
                     <tr>
                        <td id="<?php echo $filtered['id']; ?>" scope="row" class="text-center"hidden>
                        <th data-target="name" scope="row" class="text-center text-danger" ><?php echo $filtered['student_no']; ?></th>
                        <td class="text-center" ><?php echo $filtered['name']; ?></td>
                        <td class="text-center" ><?php echo $filtered['email_address']; ?></td>
                        <td class="text-center" ><?php echo $filtered['age']; ?></td>
                        <td class="text-center" ><?php echo $filtered['gender']; ?></td>
                        <td class="text-center" ><?php echo $filtered['birth_date']; ?></td>
                        <td class="text-center" ><?php echo $filtered['present_address']; ?></td>
                        <td class="text-center" ><?php echo $filtered['student_year']; ?></td>
                        <td class="text-center" ><?php echo $filtered['course']; ?></td>
                        <td class="text-center" ><?php echo $filtered['semester']; ?></td>
                        <td class="text-center" ><?php echo $filtered['school_year']; ?></td>
                        <td class="text-center" ><?php echo $filtered['probation_status']; ?></td>
                        <td class="text-center" >
                            <a href="./upload_student_grade?student_id=<?php echo $filtered['id']; ?>" type="submit" class="btn text-white rounded-pill btn-sm" style="background-image: linear-gradient(#4B6F44, #006B3C); width:100px;"><i class="bi bi-print"></i> Upload</a>
                            <a href="./view_student_grade?student_id=<?php echo $filtered['id']; ?>" type="submit" class="btn text-white rounded-pill btn-sm" style="background-image: linear-gradient(#AB274F, #9F2B68); width:100px;"><i class="bi bi-print"></i> View</a>
                            <?php if ($filtered['probation_status'] == 'not under probation') { ?>
                              <a href="../includes/under_probation?student_id=<?php echo $filtered['id']; ?>&probation_status=<?php echo $filtered['probation_status']; ?>" type="submit" class="btn text-white rounded-pill btn-sm" style="background-image: linear-gradient(#654321, #81613C); width:150px;"><i class="bi bi-print"></i> Under probation</a>
                            <?php } elseif($filtered['probation_status'] == 'under probation') { ?>
                              <a href="../includes/under_probation?student_id=<?php echo $filtered['id']; ?>&probation_status=<?php echo $filtered['probation_status']; ?>" type="submit" class="btn text-white rounded-pill btn-sm" style="background-image: linear-gradient(#E9D66B, #9F8170); width:150px;"><i class="bi bi-print"></i> Not under probation</a>
                            <?php } ?>
                           
                        </td>
                      </tr>
                      <?php include('./update_student_account.php'); ?>  
                      <?php }
                          } else { ?>
                      <?php $students = find_by_student(); ?>
                      <?php foreach($students as $student): ?>
                      <tr>
                        <td id="<?php echo remove_junk($student['id']); ?>" scope="row" class="text-center"hidden>
                        <th data-target="name" scope="row" class="text-center text-danger" ><?php echo remove_junk($student['student_no']); ?></th>
                        <td class="text-center" ><?php echo remove_junk($student['name']); ?></td>
                        <td class="text-center" ><?php echo remove_junk($student['email_address']); ?></td>
                        <td class="text-center" ><?php echo remove_junk($student['age']); ?></td>
                        <td class="text-center" ><?php echo remove_junk($student['gender']); ?></td>
                        <td class="text-center" ><?php echo remove_junk($student['birth_date']); ?></td>
                        <td class="text-center" ><?php echo remove_junk($student['present_address']); ?></td>
                        <td class="text-center" ><?php echo remove_junk($student['student_year']); ?></td>
                        <td class="text-center" ><?php echo remove_junk($student['course']); ?></td>
                        <td class="text-center" ><?php echo remove_junk($student['semester']); ?></td>
                        <td class="text-center" ><?php echo remove_junk($student['school_year']); ?></td>
                        <td class="text-center" ><?php echo remove_junk($student['probation_status']); ?></td>
                        <td class="text-center" >
                            <a href="./upload_student_grade?student_id=<?php echo $student['id']; ?>" type="submit" class="btn text-white rounded-pill btn-sm" style="background-image: linear-gradient(#4B6F44, #006B3C); width:100px;"><i class="bi bi-print"></i> Upload</a>
                            <a href="./view_student_grade?student_id=<?php echo $student['id']; ?>" type="submit" class="btn text-white rounded-pill btn-sm" style="background-image: linear-gradient(#AB274F, #9F2B68); width:100px;"><i class="bi bi-print"></i> View</a>
                            <?php if ($student['probation_status'] == 'not under probation') { ?>
                              <a href="../includes/under_probation?student_id=<?php echo $student['id']; ?>&probation_status=<?php echo $student['probation_status']; ?>" type="submit" class="btn text-white rounded-pill btn-sm" style="background-image: linear-gradient(#654321, #81613C); width:150px;"><i class="bi bi-print"></i> Under probation</a>
                            <?php } elseif($student['probation_status'] == 'under probation') { ?>
                              <a href="../includes/under_probation?student_id=<?php echo $student['id']; ?>&probation_status=<?php echo $student['probation_status']; ?>" type="submit" class="btn text-white rounded-pill btn-sm" style="background-image: linear-gradient(#967117, #9F8170); width:150px;"><i class="bi bi-print"></i> Not under probation</a>
                            <?php } ?>
                            
                        </td>
                      </tr>
                      <?php include('./update_student_account.php'); ?>
                      <?php endforeach; ?>
                      <?php } ?>
                    </tbody>
                  </table>
                  <!-- End Table with hoverable rows -->
                  <button name="button_print" onClick="window.print()" class="btn btn-danger text-white rounded-pill btn-sm" style="width: 150px;"><i class="bi bi-print"></i> Print</button>



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
