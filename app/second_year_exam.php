<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php if(isset($_POST["button_view_records"])) redirect('./view_eqis_records', false); ?>
<?php include('../start_menu_bar.php'); ?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>SECOND YEAR EXAMINATION PAGE</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Bar-on Emotional Qoutient Inventory : Short
            <p class="small fst-italic">By Reuven Bar-on, Ph.D.</p>
          </li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
          <div class="card-body">
            <h5 class="card-title">REMINDER ON UPLOADING THE FILE</h5>
            <p class="small fst-italic">
              1. Upload IMAGE file only.<br/>
              2. Selected image could be uploaded once on below Attachment File buttons.
            </p>
            <hr/>
            <!-- Floating Labels Form -->
              <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                <div class="col-md-5">
                  <div class="col-md-8 col-lg-9">
                    <label for="ic_image_file_path">
                      <p class="small fst-italic">(Attached Page1) - Intrapersonal Scale</p>
                    </label>
                    <input id="ic_image_file_path" type="file" name="image_path[]" class="form-control btn btn-primary rounded-pill btn-sm" multiple></input>
                  </div>
                  <br/>
                  <div class="col-md-8 col-lg-9">
                    <label for="ic_image_file_path">
                      <p class="small fst-italic">(Attached Page2) - Interpersonal Scale</p>
                    </label>
                    <input id="ic_image_file_path" type="file" name="image_path[]" class="form-control btn btn-primary rounded-pill btn-sm" multiple></input>
                  </div>
                  <br/>
                  <div class="col-md-8 col-lg-9">
                    <label for="ic_image_file_path">
                      <p class="small fst-italic">(Attached Page3) - Stress Management Scale</p>
                    </label>
                    <input id="ic_image_file_path" type="file" name="image_path[]" class="form-control btn btn-primary rounded-pill btn-sm" multiple></input>
                  </div>
                  <br/>
                  <div class="col-md-8 col-lg-9">
                    <label for="ic_image_file_path">
                      <p class="small fst-italic">(Attached Page4) - Adaptibility Scale</p>
                    </label>
                    <input id="ic_image_file_path" type="file" name="image_path[]" class="form-control btn btn-primary rounded-pill btn-sm" multiple></input>
                  </div>
                  <br/>
                  <div class="col-md-8 col-lg-9">
                    <label for="ic_image_file_path">
                      <p class="small fst-italic">(Attached Page5) - General Mood Scale</p>
                    </label>
                    <input id="ic_image_file_path" type="file" name="image_path[]" class="form-control btn btn-primary rounded-pill btn-sm" multiple></input>
                  </div>
                  <br/>
                  <div class="col-md-8 col-lg-9">
                    <label for="ic_image_file_path">
                      <p class="small fst-italic">(Attached Page6) - Total EQ</p>
                    </label>
                    <input id="ic_image_file_path" type="file" name="image_path[]" class="form-control btn btn-primary rounded-pill btn-sm" multiple></input>
                  </div>
                  <br/>
                  <div class="col-md-8 col-lg-9">
                    <label for="ic_image_file_path">
                      <p class="small fst-italic">(Attached Page7) - Positive Impression Scale</p>
                    </label>
                    <input id="ic_image_file_path" type="file" name="image_path[]" class="form-control btn btn-primary rounded-pill btn-sm" multiple></input>
                  </div>
                  <br/>

                <div class="text-left">
                  <button type="submit" class="btn btn-primary">Upload</button>
                  <button name="button_view_records" type="submit" class="btn btn-success">View Test Records</button>
                </div>
              </form><!-- End floating Labels Form -->

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
