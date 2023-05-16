<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php header("Refresh: 30"); ?>
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
            <div class="col-lg-12 ">
              <div class="card rounded-0">
                <div class="card-body">
                  <!-- Table with hoverable rows -->
                  <table class="table table-sm table-hover datatable text-nowrap">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center" style="width: 10%;">Name</th>
                        <th scope="col" class="text-center" style="width: 10%;">Email address</th>
                        <th scope="col" class="text-center" style="width: 5%;">Age</th>
                        <th scope="col" class="text-center" style="width: 5%;">Gender</th>
                        <th scope="col" class="text-center" style="width: 5%;">Birthday</th>
                        <th scope="col" class="text-center" style="width: 15%;">Address</th>
                        <th scope="col" class="text-center" style="width: 10%;">Year</th>
                        <th scope="col" class="text-center" style="width: 20%;">Course</th>
                        <th scope="col" class="text-center" style="width: 5%;">Semester</th>
                        <th scope="col" class="text-center" style="width: 5%;">A.Y.</th>
                        <th scope="col" class="text-center" style="width: 10%;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $students = find_by_student(); ?>
                      <?php foreach($students as $student): ?>
                      <tr>
                        <td id="<?php echo remove_junk($student['id']); ?>" scope="row" class="text-center"hidden>
                        <th data-target="name" scope="row" class="text-center" style="width: 10%;"><?php echo remove_junk($student['name']); ?></th>
                        <td class="text-center" style="width: 10%;"><?php echo remove_junk($student['email_address']); ?></td>
                        <td class="text-center" style="width: 5%;"><?php echo remove_junk($student['age']); ?></td>
                        <td class="text-center" style="width: 5%;"><?php echo remove_junk($student['gender']); ?></td>
                        <td class="text-center" style="width: 5%;"><?php echo remove_junk($student['birth_date']); ?></td>
                        <td class="text-center" style="width: 15%;"><?php echo remove_junk($student['present_address']); ?></td>
                        <td class="text-center" style="width: 10%;"><?php echo remove_junk($student['student_year']); ?></td>
                        <td class="text-center" style="width: 20%;"><?php echo remove_junk($student['course']); ?></td>
                        <td class="text-center" style="width: 5%;"><?php echo remove_junk($student['semester']); ?></td>
                        <td class="text-center" style="width: 5%;"><?php echo remove_junk($student['school_year']); ?></td>
                        <td class="text-center" style="width: 10%;">
                          <button type="button" name="button_edit" class="btn btn-primary rounded-pill btn-sm w-50"  data-bs-toggle="modal" data-bs-target="#ExtralargeModal<?php echo $student['id']; ?>"><span></span>Edit</button>
                          <a href="../includes/delete_account?email_address=<?php echo remove_junk($student['email_address']); ?>" type="button" class="btn btn-danger rounded-pill btn-sm">Delete</button>
                        </td>
                      </tr>
                      <?php include('./update_student_account.php'); ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                  <!-- End Table with hoverable rows -->


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
