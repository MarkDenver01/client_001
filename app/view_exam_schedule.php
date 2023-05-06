<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php if(isset($_POST['button_back'])) redirect('./exam_schedule', false); ?>
<?php 
  if (isset($_POST['button_schedule'])) {
    redirect('exam_schedule', false);
  }

  if (isset($_POST['button_reload'])) {
    redirect('./view_exam_schedule', false);
  }
?>
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


<section class="section" style="width: 1560px;">
    <div class="row">
      <!-- start create account -->
      <div class="card rounded-0">
      </br>
        <div class="row">
          <div class="box">
            <div class="box-body">
            <form action="" method="POST">
		          <div class="row">
                <div class="col-sm-2">
                  <form action="" method="POST">
                    <button name="button_schedule" type="submit" class="btn btn-primary btn-sm rounded-0"><i class="bx bx-refresh"></i> Add Schedule</button>
					          <button name="button_reload" type="submit" class="btn btn-success btn-sm rounded-0"><i class="bx bx-refresh"></i> Reload</button>
                  </form>
                </div>
        	      <div class="col-sm-2">
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
			          <div class="col-sm-2"></div>
		          </div>
            </form>
            </div>
          </div>
        <br/>
      
        <div class="card-body">
          <br/>
          <!-- General Form Elements -->
          <form class="row g-3" method="POST" action="">
            <div class="col-md-12">
              <div class="card rounded-0">
                <div class="card-body">
                  <!-- Table with hoverable rows -->
                  <table class="table table-sm table-hover datatable text-nowrap">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center" style="width: 10%;">Student Year</th>
                        <th scope="col" class="text-center" style="width: 20%;">Type</th>
                        <th scope="col" class="text-center" style="width: 20%;">Description</th>
                        <th scope="col" class="text-center" style="width: 20%;">Category</th>
                        <th scope="col" class="text-center" style="width: 5%;">Time Limit</th>
                        <th scope="col" class="text-center" style="width: 10%;">Exam Status</th>
                        <th scope="col" class="text-center" style="width: 10%;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (isset($_POST['button_filter'])) { ?>
                      <?php $student_year = $_POST['student_year']; ?>  
                      <?php $schedules = find_by_exam_schedule_by_student_year($student_year); ?>
                      <?php foreach($schedules as $schedule): ?>
                        <tr>
                        <td id="<?php echo $schedule['id']; ?>" scope="row" class="text-center" hidden>
                        <th data-target="name" scope="row" class="text-center" style="width: 10%;"><?php echo $schedule['student_year']; ?></th>
                        <td data-target="name" scope="row" class="text-center" style="width: 20%;"><?php echo $schedule['exam_title']; ?></td>
                        <td data-target="name" scope="row" class="text-center" style="width: 20%;"><?php echo $schedule['exam_description']; ?></td>
                        <td data-target="name" scope="row" class="text-center" style="width: 20%;"><?php echo $schedule['exam_category']; ?></td>
                        <td data-target="name" scope="row" class="text-center" style="width: 5%;"><?php echo $schedule['exam_duration']; ?></td>
                          <?php if ($schedule['exam_status'] == 'Ready') { ?>
                        <th data-target="name" scope="row" class="text-center text-success" style="width: 10%"?><?php echo $schedule['exam_status']; ?></th>
                          <?php } else { ?>
                        <th data-target="name" scope="row" class="text-center text-danger" style="width: 10%"?><?php echo $schedule['exam_status']; ?></th>
                          <?php } ?>
                          <?php if ($schedule['exam_status'] == 'Ready') { ?>
                        <td data-target="name" scope="row" class="text-center" style="width: 10%;">
                          <a href="#" type="button" class="btn btn-danger rounded-pill btn-sm w-55 text-light">Deactivate Exam</a>
                        </td>
                          <?php } else { ?>
                        <td data-target="name" scope="row" class="text-center" style="width: 10%;">
                          <a href="#" type="button" class="btn btn-success rounded-pill btn-sm w-75 text-light">Active Exam</a>
                        </td>
                          <?php } ?>
                      </tr>
                      <?php endforeach; ?>
                      <?php } else { ?>
                      <?php $schedules = find_by_exam_schedule(); ?>
                      <?php foreach($schedules as $schedule): ?>
                      <tr>
                        <td id="<?php echo $schedule['id']; ?>" scope="row" class="text-center" hidden>
                        <th data-target="name" scope="row" class="text-center" style="width: 10%;"><?php echo $schedule['student_year']; ?></th>
                        <td data-target="name" scope="row" class="text-center" style="width: 20%;"><?php echo $schedule['exam_title']; ?></td>
                        <td data-target="name" scope="row" class="text-center" style="width: 20%;"><?php echo $schedule['exam_description']; ?></td>
                        <td data-target="name" scope="row" class="text-center" style="width: 20%;"><?php echo $schedule['exam_category']; ?></td>
                        <td data-target="name" scope="row" class="text-center" style="width: 10%;"><?php echo $schedule['exam_duration']; ?></td>
                          <?php if ($schedule['exam_status'] == 'Ready') { ?>
                        <th data-target="name" scope="row" class="text-center text-success" style="width: 10%"?><?php echo $schedule['exam_status']; ?></th>
                          <?php } else { ?>
                        <th data-target="name" scope="row" class="text-center text-danger" style="width: 10%"?><?php echo $schedule['exam_status']; ?></th>
                          <?php } ?>
                          <?php if ($schedule['exam_status'] == 'Ready') { ?>
                        <td data-target="name" scope="row" class="text-center" style="width: 10%;">
                          <a href="#" type="button" class="btn btn-danger rounded-pill btn-sm w-55 text-light">Deactivate Exam</a>
                        </td>
                          <?php } else { ?>
                        <td data-target="name" scope="row" class="text-center" style="width: 10%;">
                          <a href="#" type="button" class="btn btn-success rounded-pill btn-sm w-75 text-light">Active Exam</a>
                        </td>
                          <?php } ?>
                      </tr>
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
