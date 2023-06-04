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
    <h1>Login History </h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Login</a></li>
        <li class="breadcrumb-item active">History</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


<section class="section" style="width: 1760px;">
    <div class="row">
      <!-- start create account -->
      <div class="card rounded-0 bg-light">
        <div class="card-body">
          <h5 class="card-title">View Login History</h5>

          <!-- General Form Elements -->
          <form class="row g-3" method="POST" action="">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-2">
                    <label for="birth_date" class="col-md-12 col-lg-12 col-form-label">Date From</label>
                     <div class="col-md-8 col-lg-12">
                        <input name="birth_date" type="date" class="form-control rounded-0" id="birth_date">
                      </div>
                </div>
                <div class="col-lg-2">
                    <label for="birth_date" class="col-md-12 col-lg-12 col-form-label">Date To</label>
                     <div class="col-md-8 col-lg-12">
                        <input name="birth_date" type="date" class="form-control rounded-0" id="birth_date">
                      </div>
                </div>
              </div>
              <div class="col-lg-8"></div>
              <br/>
              <div class="col-lg-4">
                <button name="button_filter" type="submit" class="btn btn-secondary text-white rounded-pill btn-sm w-100"><i class="bi bi-search"></i> </button>
              </div>
              <div class="col-lg-8"></div>
            </div>
            <br/>
            <div class="col-lg-12 ">
              <div class="card rounded-0">
                <div class="card-body">
                  <!-- Table with hoverable rows -->
                  <table class="table table-sm table-hover datatable text-nowrap">
                    <thead>
                      <tr>
                      <th scope="col" class="text-center" style="width: 5%;">Account Id</th>
                        <th scope="col" class="text-center" style="width: 10%;">Name</th>
                        <th scope="col" class="text-center" style="width: 10%;">Email address</th>
                        <th scope="col" class="text-center" style="width: 5%;">User Level</th>
                        <th scope="col" class="text-center" style="width: 5%;">User Status</th>
                        <th scope="col" class="text-center" style="width: 5%;">Last Login</th>
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
                  <button id="button_print" name="button_print" onClick="printContent()" class="btn btn-danger text-white rounded-pill btn-sm" style="width: 150px;"><i class="bi bi-print"></i> Print</button>
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
		function printContent() {
			var content = document.getElementById("print_content");
      var button_print = document.getElementById("button_print");
      var button_create = document.getElementById("button_create");
      var header = document.getElementById("header");
      var filter = document.getElementById("filter");

      header.style.visibility = 'hidden';
      button_print.style.visibility = 'hidden';
      button_create.style.visibility = 'hidden';
      filter.style.visibility = 'hidden';
			window.print(content);
      header.style.visibility = 'visible';
      button_print.style.visibility = 'visible';
      button_create.style.visibility = 'visible';
      filter.style.visibility = 'visible';
		}
	</script>
<?php include('../footer.php'); ?>
