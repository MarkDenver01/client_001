<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php if(isset($_POST['button_back'])) redirect('./exam_schedule', false); ?>
<?php include('../start_menu_bar.php'); ?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>View Schedule Exam</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">First Year - Fourth Year Exam Schedule</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


<section class="section">
    <div class="row">
      <!-- start create account -->
      <div class="card">
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
                        <th scope="col" class="text-center" style="width: 20%;">Exam Type</th>
                        <th scope="col" class="text-center" style="width: 20%;">Created On</th>
                        <th scope="col" class="text-center" style="width: 20%;">Expired On</th>
                        <th scope="col" class="text-center" style="width: 20%;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $schedules = find_by_exam_schedule(); ?>
                      <?php foreach($schedules as $schedule): ?>
                      <tr>
                        <td id="<?php echo $schedule['id']; ?>" scope="row" class="text-center" hidden>
                        <th data-target="name" scope="row" class="text-center" style="width: 20%;"><?php echo $schedule['student_year']; ?></th>
                        <td data-target="name" scope="row" class="text-center" style="width: 20%;"><?php echo $schedule['exam_title']; ?></td>
                        <td data-target="name" scope="row" class="text-center" style="width: 20%;"><?php echo $schedule['created_on']; ?></td>
                        <td data-target="name" scope="row" class="text-center" style="width: 20%;"><?php echo $schedule['expired_on']; ?></td>
                

                        <td class="text-center" style="width: 20%;">
                            <a href="#" type="button" class="btn btn-primary rounded-pill btn-sm w-50">EDIT</button>
                            <a href="#" type="button" class="btn btn-danger rounded-pill btn-sm w-50">REMOVE</button>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                  <!-- End Table with hoverable rows -->

                  <div class="text-left">
                    <button class="btn btn-secondary rounded-pill" type="submit" name="button_back">BACK</button>
                  </div>

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
