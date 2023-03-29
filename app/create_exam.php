<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php if(isset($_POST["button_view_success_kit"])) redirect('./view_student_success_kit', false); ?>
<?php if(isset($_POST["button_oasis_records"])) redirect('./view_oasis_records', false); ?>
<?php include('../start_menu_bar.php'); ?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>FIRST YEAR EXAMINATION PAGE</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Student Success Kit & OASIS 3</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
          <div class="card-body">
            <h5 class="card-title">
              REMINDER ON UPLOADING THE FILE
            </h5>
            <p class="small fst-italic">
              1. Upload IMAGE file only.<br/>
              2. Selected image could be uploaded once on below Attachment File buttons.
            </p>
            <!--- Bordered tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">
              <li class="nav-item">
                 <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Student Success Kit</button>
               </li>

               <li class="nav-item">
                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">OASIS 3</button>
               </li>
            </ul>
            <div class="tab-content pt-2">
              <div class="tab-pane fade show active profile-overview" id="profile-overview">
              <br/>
                <p class="small fst-italic">
                  The ideas and many of the questions for the Pre-Assesment survey were dericed from "Becoming a Master Student",
                  7th and 8th editions [1994 and 1998] Davis Ellis, Houghton Mifflin Co., Boston, MA.
                </p>
                <hr/>

                <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                   <div class="col-lg-6">

                     <label for="ic_image_file_path">
                       <img style="height:250px" id="ic_image_file" src="./assets/img/profile.png" alt="Profile" class="d-block w-100 border border-info">
                       <p class="small fst-italic text-center">(Attached Image of Exam)</p>
                     </label>
                     <input id="ic_image_file_path" type="file" name="image_path[]" class="form-control btn btn-primary rounded-pill btn-sm w-75" multiple></input>
                     <br/>

                   </div>
                   <div class="col-lg-6">

                     <label for="inputNumber" class="col-sm-5 col-form-label">Student Year</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control" value="First Year" disabled>
                    </div>

                    <label for="inputNumber" class="col-sm-5 col-form-label">Title</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="Student Success Survey and Student Guide" disabled>
                    </div>

                    <label for="inputNumber" class="col-sm-5 col-form-label">Exam Created</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" >
                    </div>
                    <br/>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Create</button>
                      <button type="submit" name="button_view_success_kit" class="btn btn-success">View Records</button>
                    </div>

                   </div>
                </form>
              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                <p class="small fst-italic">
                  #10135A<br/>
                  Copright 2002, 1991 by PRO-ED, Inc.<br/>
                  1 2 3 4 5 06 05 04 03 02 01
                </p>
                <hr/>

                <form class="row g-3" action="" method="POST" enctype="multipart/form-data">

                   <div class="text-left">
                     <button type="submit" class="btn btn-primary">Upload</button>
                     <button type="submit" name="button_oasis_records" class="btn btn-success">View OASIS Records</button>
                   </div>

                </form>
              </div>
          </div>
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
