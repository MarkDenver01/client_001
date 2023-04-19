<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php 
  if (isset($_POST['button_create'])) {
    redirect('./create_exam', false);
  }

  if (isset($_POST['button_reload'])) {
    redirect('./view_exam', false);
  }
?>
<?php include('../start_menu_bar.php'); ?>


<main id="main" class="main">
  <div class="pagetitle">
    <h1>View Created Exam</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">First Year - Fourth Year Records</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


<section class="section" style="width: 1460px;">
    <div class="row">
      <!-- start create account -->
      <div class="card rounded-0">
      </br>
        <div class="row">
          <div class="box">
            <div class="box-body">
            <form action="" method="POST">
		          <div class="row">
        	      <div class="col-sm-4">
				          <!-- <button type="button" class="btn btn-secondary rounded-0 btn-sm"><i class="bi bi-printer-fill"></i> Print</button> -->
			          </div>
                
			          <div class="form-group col-sm-4 text-center">
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
                <div class="col-sm-2"></div>
			          <div class="col-sm-2">
                  <form action="" method="POST">
                    <button name="button_create" type="submit" class="btn btn-primary rounded-0 btn-sm"><i class="bx bxs-plus-circle"></i> Create Exam</button>
					          <button name="button_reload" type="submit" class="btn btn-success btn-sm rounded-0"><i class="bx bx-refresh"></i> Reload</button>
                  </form>
			          </div>
		          </div>
            </form>
            </div>
          </div>
        <br/>

        <div class="card-body">
          <br/>
          <?php echo display_message($msg); ?>
          <!-- General Form Elements -->
          <form class="row g-3" method="POST" action="">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <!-- Table with hoverable rows -->
                  <table class="table table-sm table-hover datatable text-nowrap ">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center" style="width: 20%;">Student Year</th>
                        <th scope="col" class="text-center" style="width: 20%;">Exam Type</th>
                        <th scope="col" class="text-center" style="width: 20%;">Exam Description</th>
                        <th scope="col" class="text-center" style="width: 20%;">Exam Category</th>
                        <th scope="col" class="text-center" style="width: 20%;">Action</th>
                      </tr>
                    </thead>
                    <tbody >
                      <?php if (isset($_POST['button_filter'])) { ?>
                      <?php $student_year = $_POST['student_year']; ?>
                      <?php $created_exams = find_by_exam_created_by_student_year($student_year); ?>
                      <?php foreach($created_exams as $created): ?>
                        <tr>
                        <td name="id" id="<?php echo $created['id']; ?>" scope="row" class="text-center" hidden>
                        <th id="student_year" data-target="name" scope="row" class="text-center text-primary" style="width: 20%;"><?php echo $created['student_year']; ?></th>
                        <td id="exam_title" data-target="name" scope="row" class="text-center" style="width: 20%;"><?php echo $created['exam_title']; ?></td>
                        <td id="exam_description" data-target="name" scope="row" class="text-center" style="width: 20%;"><?php echo $created['exam_description']; ?></td>
                        <td id="exam_category" data-target="name" scope="row" class="text-center" style="width: 20%;"><?php echo $created['exam_category']; ?></td>

                        <td id="exam_action" class="text-center" style="width: 20%;">                         
                            <?php if ($created['exam_status'] == 0) { ?>
                              <button name="button_update" type="button" class="btn btn-success rounded-pill btn-sm w-50" data-bs-toggle="modal" data-bs-target="#ExtralargeModal<?php echo $created['id']; ?>" disabled>Update Answer</button>
                              <a href="../includes/update_exam_func?id=<?php echo $created['id']; ?>&exam_status=<?php echo $created['exam_status']; ?>" type="button" class="btn btn-warning rounded-pill btn-sm w-50 text-light">Activate Exam</a>
                            <?php } else { ?>
                              <button name="button_update" type="button" class="btn btn-success rounded-pill btn-sm w-50" data-bs-toggle="modal" data-bs-target="#ExtralargeModal<?php echo $created['id']; ?>">Update Answer</button>
                              <a href="../includes/update_exam_func?id=<?php echo $created['id']; ?>&exam_status=<?php echo $created['exam_status']; ?>" type="button" class="btn btn-danger rounded-pill btn-sm w-50 text-light">Deactivate Exam</a>
                            <?php } ?>
                        </td>
                      </tr>
                      <?php include('./update_answer.php'); ?>
                      <?php endforeach; ?>
                      <?php } else { ?>
                      <?php $created_exams = find_by_exam_created(); ?>
                      <?php foreach($created_exams as $created): ?>
                        <tr>
                        <td name="id" id="<?php echo $created['id']; ?>" scope="row" class="text-center" hidden>
                        <th id="student_year" data-target="name" scope="row" class="text-center text-primary" style="width: 20%;"><?php echo $created['student_year']; ?></th>
                        <td id="exam_title" data-target="name" scope="row" class="text-center" style="width: 20%;"><?php echo $created['exam_title']; ?></td>
                        <td id="exam_description" data-target="name" scope="row" class="text-center" style="width: 20%;"><?php echo $created['exam_description']; ?></td>
                        <td id="exam_category" data-target="name" scope="row" class="text-center" style="width: 20%;"><?php echo $created['exam_category']; ?></td>

                        <td id="exam_action" class="text-center" style="width: 20%;">                         
                            <?php if ($created['exam_status'] == 0) { ?>
                              <button name="button_update" type="button" class="btn btn-success rounded-pill btn-sm w-50" data-bs-toggle="modal" data-bs-target="#ExtralargeModal<?php echo $created['id']; ?>" disabled>Update Answer</button>
                              <a href="../includes/update_exam_func?id=<?php echo $created['id']; ?>&exam_status=<?php echo $created['exam_status']; ?>" type="button" class="btn btn-warning rounded-pill btn-sm w-50 text-light">Activate Exam</a>
                            <?php } else { ?>
                              <button name="button_update" type="button" class="btn btn-success rounded-pill btn-sm w-50" data-bs-toggle="modal" data-bs-target="#ExtralargeModal<?php echo $created['id']; ?>">Update Answer</button>
                              <a href="../includes/update_exam_func?id=<?php echo $created['id']; ?>&exam_status=<?php echo $created['exam_status']; ?>" type="button" class="btn btn-danger rounded-pill btn-sm w-50 text-light">Deactivate Exam</a>
                            <?php } ?>
                        </td>
                      </tr>
                      <?php include('./update_answer.php'); ?>
                      <?php endforeach; ?>
                      <?php } ?>
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
