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


<section class="section">
    <div class="row">
      <!-- start create account -->
      <div class="card rounded-0">
        <div class="card-body">
          <br/>
          <!-- General Form Elements -->
          <form class="row g-3" method="POST" action="">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <!-- Table with hoverable rows -->
                  <table class="table table-sm table-hover datatable">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center" style="width: 20%;">Student Year</th>
                        <th scope="col" class="text-center" style="width: 30%;">Exam Type</th>
                        <th scope="col" class="text-center" style="width: 30%;">Exam Description</th>
                        <th scope="col" class="text-center" style="width: 20%;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $created_exams = find_by_exam_created(); ?>
                      <?php foreach($created_exams as $created): ?>
                      <tr>
                        <td id="<?php echo $created['id']; ?>" scope="row" class="text-center" hidden>
                        <th data-target="name" scope="row" class="text-center" style="width: 20%;"><?php echo $created['student_year']; ?></th>
                        <td data-target="name" scope="row" class="text-center" style="width: 30%;"><?php echo $created['exam_title']; ?></td>
                        <td data-target="name" scope="row" class="text-center" style="width: 30%;"><?php echo $created['exam_description']; ?></td>
                        

                        <td class="text-center" style="width: 20%;">
                            <a href="../includes/delete_exam?id=<?php echo $created['id']; ?>" type="button" class="btn btn-danger rounded-pill btn-sm w-100">REMOVE</button>
                        </td>
                      </tr>
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
