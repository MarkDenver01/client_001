<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php if(isset($_POST["button_view_records"])) redirect('./view_keiser_exam', false); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php include('../start_menu_bar.php'); ?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>THIRD YEAR EXAMINATION PAGE</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">The Keirsey Temperament Sorter
            <p class="small fst-italic">REPRINTED FROM 'PLEASE UNDERSTAND ME' | David Keirsey, Marilyn Bates</p>
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
              2. Selected image could be uploaded once on below Attachment File button.
            </p>
            <hr/>
            <!-- Floating Labels Form -->
              <form class="row g-3" action="" method="POST" enctype="multipart/form-data">

                <div class="col-md-5">
                  <div class="col-md-8 col-lg-9">
                    <label for="ic_image_file_path">
                      <p class="small fst-italic">(Attached Page1) - The Keirsey Temperament Sorter</p>
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
