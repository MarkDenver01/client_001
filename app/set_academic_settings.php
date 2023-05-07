<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php  
  if (isset($_POST['button_academic'])) {
    set_academic("semester", "school_year_start", "school_year_end"); 
  } 
?>
<?php include('../start_menu_bar.php'); ?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Set Semester and Academic Year</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Settings</a></li>
          <li class="breadcrumb-item">Semester & Academic Year</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">
          <div class="card rounded-0">
            <div class="card-body">
              <h5 class="card-title">Set Semester and Academic School Year</h5>
              <?php echo display_message($msg); ?>
              <!-- Floating Labels Form -->
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-6">
                    <label class="col-sm-3 col-form-label">Semester</label>
                      <div  class="col-sm-10">
                        <select name="semester" class="form-select rounded-0" aria-label="Default select example">
                          <option selected disabled>Select semester</option>
                          <option value="First semester">First semester</option>
                          <option value="Second semester">Second semester</option>
                          <option value="Summer">Summer</option>
                        </select>
                      </div>

                    <label class="col-sm-5 col-form-label">Academic School Year</label>
                      <div class="row mb-3">
                        <div  class="col-sm-5">
                            <input name="school_year_start" type="number" class="form-control rounded-0 text-danger" id="school_year_start" required>
                        </div>
                         -
                        <div  class="col-sm-5">
                            <input name="school_year_end" type="number" class="form-control rounded-0 text-danger" id="school_year_start" required>
                        </div>
                      </div>
                  </div>
                  <div class="text-left">
                    <button name="button_academic" type="submit" class="btn btn-primary rounded-0">Submit</button>
                  </div>
                </form><!-- End floating Labels Form -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
<?php include('../footer.php'); ?>
