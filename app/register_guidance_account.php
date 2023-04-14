<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php

    // button back
    onClickButton("button_back", "./view_guidance_account");
    // upload image & save account info
    if (isset($_POST["button_save"])) {
      addGuidanceAccount("full_name",
        "email_address",
        "gender",
        "age",
        "birth_date",
        "present_address"
      );
    }
?>
<?php include('../start_menu_bar.php'); ?>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Profiling</a></li>
          <li class="breadcrumb-item">View Guidance Information</li>
          <li class="breadcrumb-item active">Register Guidance Account</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <form method="POST" action="" enctype="multipart/form-data">
        <div class="col-xl-12">

          <div class="card rounded-0">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <h5>Add Guidance Account</h5>
                  <?php echo display_message($msg); ?>
                </li>
              </ul>
                <br/>
                <div class="tab-content pt-2" id="profile-edit">
                  <br/>
                  <!-- Profile Edit Form -->
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-5">
                        <input name="full_name" type="text" class="form-control rounded-0" id="fullName">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="email_address" class="col-md-4 col-lg-3 col-form-label">Email address</label>
                      <div class="col-md-8 col-lg-5">
                        <input name="email_address" type="email" class="form-control rounded-0" id="email_address">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="gender" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                      <div class="col-md-4 col-lg-2">
                        <select name="gender" id="inputState" class="form-select rounded-0">
                          <option selected>Select Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="age" class="col-md-4 col-lg-3 col-form-label">Age</label>
                      <div class="col-md-8 col-lg-1">
                        <input name="age" type="number" class="form-control rounded-0" id="age">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="birth_date" class="col-md-4 col-lg-3 col-form-label">Birth date</label>
                      <div class="col-md-8 col-lg-3">
                        <input name="birth_date" type="date" class="form-control rounded-0" id="birth_date">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="present_address" class="col-md-4 col-lg-3 col-form-label">Present Address</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="present_address" class="form-control rounded-0" id="present_address" style="height: 100px"></textarea>
                      </div>
                    </div>


                    <div class="text-center">
                      <button type="submit" name="button_save" class="btn btn-primary w-25 rounded-0">Save Changes</button>
                      <button type="submit" name="button_back" class="btn btn-danger w-25 rounded-0">Back</button>
                    </div>
                  </form><!-- End Profile Edit Form -->
                </div>
              </div><!-- End Bordered Tabs -->
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <script>
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#ic_image_file').attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]);
          }
      }

      $("#ic_image_file_path").change(function(){
          readURL(this);
      });
  </script>
<?php include('../footer.php'); ?>
