<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php if(isset($_POST["button_fit_records"])) redirect('./view_fit_records', false); ?>
<?php if(isset($_POST["button_employability_records"])) redirect('./view_employability_records', false); ?>
<?php if(isset($_POST["button_view_sra"])) redirect('./view_sra_records', false); ?>
<?php include('../start_menu_bar.php'); ?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>FOURTH YEAR EXAMINATION PAGE</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Aptitude J and C | ESA | Aptitude verbal and numerical</li>
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
                 <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Aptitude J and C</button>
               </li>

               <li class="nav-item">
                 <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">ESA</button>
               </li>

               <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Aptitude Verbal and Numerical</button>
                </li>
            </ul>
            <div class="tab-content pt-2">
              <div class="tab-pane fade show active profile-overview" id="profile-overview">
              <br/>
                <p class="small fst-italic">
                  NATIONAL PERCENTILE NORMS FOR RAW SCORES FOR TWELTFTH-GRADE STUDENTS TESTED IN MARCH FOR THE FLANAGAN INDUSTRIAL TEST (FIT)
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
                      <input type="text" class="form-control" value="Fourth Year" disabled>
                   </div>

                   <label for="inputNumber" class="col-sm-5 col-form-label">Title</label>
                   <div class="col-sm-10">
                     <input type="text" class="form-control" value="Aptitude J and C" disabled>
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
                  Employability Skills Assessment
                </p>
                <hr/>

                <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                   <div class="col-md-5">
                     <div class="col-md-8 col-lg-9">
                       <label for="ic_image_file_path">
                         <p class="small fst-italic">(Attached Page1) - Empoyability Skills Assessment</p>
                       </label>
                       <input id="ic_image_file_path" type="file" name="image_path[]" class="form-control btn btn-primary rounded-pill btn-sm" multiple></input>
                     </div>
                     <br/>

                     <div class="text-left">
                       <button type="submit" class="btn btn-primary">Upload</button>
                       <button name="button_employability_records" type="submit" class="btn btn-success">View Test Records</button>
                     </div>
                  </div>
                </form>
              </div>

              <div class="tab-pane fade pt-3" id="profile-settings">
                <p class="small fst-italic">
                  SRA Verbal Form<br/>
                  Prepared by Thelma Gwinn Thurstone, Ph.D. and L. L, Thyrstone, Ph. D..<br/>
                  University of North Carolina
                </p>
                <hr/>

                <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                   <div class="col-md-5">
                     <div class="col-md-8 col-lg-9">
                       <label for="ic_image_file_path">
                         <p class="small fst-italic">(Attached Page1) - SRA Verbal Form</p>
                       </label>
                       <input id="ic_image_file_path" type="file" name="image_path[]" class="form-control btn btn-primary rounded-pill btn-sm" multiple></input>
                     </div>
                     <br/>

                     <div class="text-left">
                       <button type="submit" class="btn btn-primary">Upload</button>
                       <button name="button_view_sra" type="submit" class="btn btn-success">View Test Records</button>
                     </div>
                  </div>
                </form>
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
