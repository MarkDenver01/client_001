<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>

<?php include('../start_menu_bar.php'); ?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Manage Schedule Exam</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">User Level Here (TBD)</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
          <div class="card-body">
            <h5 class="card-title">
              Manage Exam Schedule and Send Notification
            </h5>
            <hr/>
            <form class="row g-3" action="" method="POST" enctype="multipart/form-data">

               <div class="col-lg-6">

                 <label for="inputNumber" class="col-sm-5 col-form-label">Student Year</label>
                 <div class="col-sm-10">
                   <select name="course" id="course" class="form-select">
                     <option selected>Select student year</option>
                     <option value="First Year">First Year</option>
                     <option value="Second Year">Second Year</option>
                     <option value="Third Year">Third Year</option>
                     <option value="Fourth Year">Fourth Year</option>
                   </select>
                 </div>

                 <label for="inputNumber" class="col-sm-5 col-form-label">Exam Type</label>
                 <div class="col-sm-10">
                   <input type="text" class="form-control" value="Student Success Kit" disabled>
                 </div>

                 <label for="inputNumber" class="col-sm-5 col-form-label">Created At</label>
                 <div class="col-sm-10">
                   <input type="date" class="form-control" disabled>
                 </div>

                 <label for="inputNumber" class="col-sm-5 col-form-label">Expired At</label>
                 <div class="col-sm-10">
                   <input type="date" class="form-control text-danger">
                 </div>

               </div>
               <div class="col-lg-6">
                 <label for="inputNumber" class="col-sm-5 col-form-label">Exam Duration</label>
                 <div class="col-sm-10">
                   <select name="course" id="course" class="form-select">
                     <option selected>Select exam duration</option>
                     <option value="First Year">30 seconds</option>
                     <option value="First Year">1 minute</option>
                     <option value="First Year">5 minutes</option>
                     <option value="First Year">8 minutes</option>
                     <option value="First Year">9 minutes</option>
                     <option value="First Year">10 minutes</option>
                     <option value="First Year">12 minutes</option>
                     <option value="Second Year">20 minutes</option>
                     <option value="Third Year">30 minutes </option>
                     <option value="Fourth Year">40 minutes</option>
                   </select>
                 </div>

                 <label for="inputNumber" class="col-sm-5 col-form-label">Result Date</label>
                 <div class="col-sm-10">
                   <input type="date" class="form-control text-success">
                 </div>

                 <label for="inputNumber" class="col-sm-5 col-form-label">Status</label>
                 <div class="col-sm-10">
                   <select name="course" id="course" class="form-select">
                     <option selected>Select status</option>
                     <option value="First Year">Not Completed</option>
                     <option value="First Year">Completed</option>
                   </select>
                 </div>

                 <br/>
                 <div class="text-center">
                   <button type="submit" class="btn btn-danger">Schedule</button>
                   <button type="submit" name="" class="btn btn-success">View Records</button>
                 </div>

               </div>
            </form>
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
