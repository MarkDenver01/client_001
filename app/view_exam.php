<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
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
              <h3>
              <hr/>
		          <div class="row">
        	      <div class="col-sm-4">
				          <button type="button" class="btn btn-secondary rounded-0 btn-sm"><i class="bi bi-printer-fill"></i> Print</button>
			          </div>
			          <div class="form-group col-sm-4 text-center">
                  <select id="student_year" name="student_year" class="form-select rounded-0" aria-label="Default select example">
                    <option selected>Select Year Level</option>
                    <option value="First Year">First Year</option>
                    <option value="Second Year">Second Year</option>
                    <option value="Third Year">Third Year</option>
                    <option value="Fourth Year">Fourth Year</option>
                  </select>
			          </div>
                <div class="col-sm-2"></div>
			          <div class="col-sm-2">
                  <a href="" class="btn btn-primary rounded-0 btn-sm"><i class="bx bxs-plus-circle"></i> Create Exam</a>
					        <button type="button" class="btn btn-success btn-sm rounded-0"><i class="bx bx-refresh"h"></i> Reload</button>
			          </div>
		          </div>
            </div>
          </div>
        <br/>

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
                        <th scope="col" class="text-center" style="width: 20%;">Student Year</th>
                        <th scope="col" class="text-center" style="width: 20%;">Exam Type</th>
                        <th scope="col" class="text-center" style="width: 20%;">Exam Description</th>
                        <th scope="col" class="text-center" style="width: 20%;">Exam Category</th>
                        <th scope="col" class="text-center" style="width: 20%;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $created_exams = find_by_exam_created(); ?>
                      <?php foreach($created_exams as $created): ?>
                      <tr>
                        <td id="<?php echo $created['id']; ?>" scope="row" class="text-center" hidden>
                        <th data-target="name" scope="row" class="text-center" style="width: 20%;"><?php echo $created['student_year']; ?></th>
                        <td data-target="name" scope="row" class="text-center" style="width: 20%;"><?php echo $created['exam_title']; ?></td>
                        <td data-target="name" scope="row" class="text-center" style="width: 20%;"><?php echo $created['exam_description']; ?></td>
                        <td data-target="name" scope="row" class="text-center" style="width: 20%;"><?php echo $created['exam_category']; ?></td>

                        <td class="text-center" style="width: 20%;">
                            <button name="button_update" type="button" class="btn btn-success rounded-pill btn-sm w-50" data-bs-toggle="modal" data-bs-target="#ExtralargeModal<?php echo $created['id']; ?>">Update Answer</button>
                            <a href="../includes/delete_exam?id=<?php echo $created['id']; ?>" type="button" class="btn btn-danger rounded-pill btn-sm w-50">De-active Exam</a>
                        </td>
                      </tr>
                      <?php include('./update_answer.php'); ?>
                      <?php endforeach; ?>
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
