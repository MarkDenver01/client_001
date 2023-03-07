<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php require_once('../lib/class.environment.php'); ?>
<?php
  if ($_ENV['SITE_INSTALLATION_COMPLETED'] == false) {
    redirect('../maintenace');
  }
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
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


<section class="section">
    <div class="row">
      <!-- start create account -->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">View Student & Account information</h5>

          <!-- General Form Elements -->
          <form class="row g-3" method="POST" action="">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <!-- Table with hoverable rows -->
                  <table class="table table-sm table-hover datatable">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center" style="width: 15%;">Name</th>
                        <th scope="col" class="text-center" style="width: 50px;">Age</th>
                        <th scope="col" class="text-center" style="width: 50px;">Gender</th>
                        <th scope="col" class="text-center" style="width: 15%;">Birthday</th>
                        <th scope="col" class="text-center" style="width: 15%;">Address</th>
                        <th scope="col" class="text-center" style="width: 15%;">Year</th>
                        <th scope="col" class="text-center" style="width: 15%;">Course</th>
                        <th scope="col" class="text-center" style="width: 15%;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $students = find_by_student(); ?>
                      <?php foreach($students as $student): ?>
                      <tr>
                        <td id="<?php echo remove_junk($student['id']); ?>" scope="row" class="text-center" style="width: 5%;" hidden>
                        <th data-target="name" scope="row" class="text-center" style="width: 15%;"><?php echo remove_junk($student['name']); ?></th>
                        <td class="text-center" style="width: 5%;"><?php echo remove_junk($student['age']); ?></td>
                        <td class="text-center" style="width: 5%;"><?php echo remove_junk($student['gender']); ?></td>
                        <td class="text-center" style="width: 10%;"><?php echo remove_junk($student['birth_date']); ?></td>
                        <td class="text-center" style="width: 20%;"><?php echo remove_junk($student['present_address']); ?></td>
                        <td class="text-center" style="width: 10%;"><?php echo remove_junk($student['student_year']); ?></td>
                        <td class="text-center" style="width: 15%;"><?php echo remove_junk($student['course']); ?></td>
                        <td class="text-center" style="width: 15%;">
                          <br/>
                          <button type="button" name="button_edit" class="btn btn-primary rounded-pill btn-sm w-50"  data-bs-toggle="modal" data-bs-target="#ExtralargeModal<?php echo $student['id']; ?>"><span></span>Edit</button>
                          <a href="../includes/delete_student?email_address=<?php echo secure::encrypt(remove_junk($student['email_address'])); ?>" type="button" class="btn btn-danger rounded-pill btn-sm">Delete</button>
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
              <button type="submit" name="button_create" class="btn btn-success w-25" data-bs-toggle="modal" data-bs-target="#insert_student" >Create new account</button>
            </div>
          </form><!-- End floating Labels Form -->
          <!-- End General Form Elements -->

        </div>
      </div>
      <!-- end create account -->
    </div>
</section>
<?php include('../footer.php'); ?>