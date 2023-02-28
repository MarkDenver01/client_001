<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php
    // button back
    onClickButton("button_back", "./view_student_account");
    // upload image & save account info
    if (isButtonReadyClick("button_save")) {
      $target_directory = "http://localhost/client_001/app/assets/img/";
      $target_file = $target_directory . basename($_FILES["image_path"]["name"]);
      $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
      $uploadOk = 1;
      // check image file is a actual image for fake image
      if (isButtonReadyClick("button_save")) {
        $check = getimagesize($_FILES["image_path"]["tmp_name"]);
      }

      if ($check) {
        $uploadOk = 1;
      } else {
        $uploadOk = 0;
      }

      // check if file is already exist
      if (file_exists($target_file)) {
        $uploadOk = 0;
      }

      if ($_FILES["image_path"]["size"] > 500000) {
        $uploadOk = 0;
      }

      if ($uploadOk === 1) {
        if (move_uploaded_file($_FILES["image_path"]["tmp_name"], $target_file)) {
          $file = $_FILES["image_path"]["name"];
          echo '<div class="alert alert-success">SAVED!! </div>';
        }
      } else {
        echo '<div class="alert alert-danger">SAVED!! </div>';
      }
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
          <li class="breadcrumb-item active">Register Student Account</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
          <form method="POST" action="" enctype="multipart/form-data">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img id="ic_image_file" src="./assets/img/profile.png" alt="Profile" class="rounded-circle" style="height: 120px; width: 200px;">
            </br>
            <input id="ic_image_file_path" type="file" name="image_path" class="form-control btn btn-primary rounded-pill btn-sm" ></input>
          </div>
        </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">
                <li class="nav-item">
                  <h5>Add Student Account</h5>
                </li>
              </ul>
                <br/>
                <div class="tab-content pt-2" id="profile-edit">

                  <!-- Profile Edit Form -->
                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="email_address" class="col-md-4 col-lg-3 col-form-label">Email address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email_address" type="email" class="form-control" id="email_address">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="password" class="col-md-4 col-lg-3 col-form-label">Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="password">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="course" class="col-md-4 col-lg-3 col-form-label">Course</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="course" type="text" class="form-control" id="course">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="year" class="col-md-4 col-lg-3 col-form-label">Year</label>
                      <div class="col-md-4 col-lg-4">
                        <select id="inputState" class="form-select">
                          <option selected>1st Year</option>
                          <option value="1st Year">1st Year</option>
                          <option value="2nd Year">2nd Year</option>
                          <option value="3rd Year">3rd Year</option>
                          <option value="4th Year">4th Year</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="gender" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                      <div class="col-md-4 col-lg-2">
                        <select id="inputState" class="form-select">
                          <option selected>Male</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                        </select>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="age" class="col-md-4 col-lg-3 col-form-label">Age</label>
                      <div class="col-md-8 col-lg-2">
                        <input name="age" type="number" class="form-control" id="age">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="birth_date" class="col-md-4 col-lg-3 col-form-label">Birth date</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="birth_date" type="date" class="form-control" id="birth_date">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="present_address" class="col-md-4 col-lg-3 col-form-label">Present Address</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="present_address" class="form-control" id="present_address" style="height: 100px"></textarea>
                      </div>
                    </div>


                    <div class="text-center">
                      <button type="submit" name="button_save" class="btn btn-primary w-25">Save Changes</button>
                      <button type="submit" name="button_back" class="btn btn-danger w-25">Back</button>
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
