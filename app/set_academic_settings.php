<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php IS_HIGHER_LEVEL(); ?>
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
        <div class="col-xl-3"></div>
        <div class="col-xl-6">
          <br/>
          <br/>
          <br/>
          <br/>
          <br/>
          <div class="card rounded-0">
            <div class="card-body">
              <h5 class="card-title">Set Semester and Academic School Year</h5>
              <?php echo display_message($msg); ?>
              <!-- Floating Labels Form -->
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="col-lg-12">
                    <label class="col-sm-3 col-form-label">Semester</label>
                      <div  class="col-sm-6">
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
                            <select name="school_year_start" id="school_year_start" required  class="form-select rounded-0 text-danger" aria-label="Default select example">
                              <option selected disabled>Select school year</option>
                              <option value="<?php echo date("Y"); ?>"><?php echo date("Y"); ?></option>
                            </select>
                        </div>
                         -
                        <div  class="col-sm-5">
                            <input name="school_year_end" type="number" class="form-control rounded-0 text-danger" id="school_year_end">
                        </div>
                      </div>
                  </div>
                  <div class="text-left">
                    <button name="button_academic" type="submit" class="btn btn-primary rounded-pill">Submit</button>
                  </div>
                </form><!-- End floating Labels Form -->

            </div>
          </div>
        </div>
        <div class="col-xl-3"></div>
      </div>
    </section>

  </main><!-- End #main -->


  <script>
      $(document).ready(function() {
        $('#school_year_start').on('change', function() {
          var school_year_end_value = <?php echo date("Y") + 1; ?>;
          $('#school_year_end').val(school_year_end_value);
        });
      });
  </script>

<?php include('../footer.php'); ?>
