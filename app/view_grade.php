<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php IS_HIGHER_LEVEL(); ?>
<?php 
    $student_id = $_GET['student_id']; ?>
    if (isset($_POST['button_close'])) {
        redirect('./student_records', false);
    }
?>
<?php include('../start_menu_bar.php'); ?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>View Student Grade</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Uploaded Student Grade</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
          <div class="col-xl-12">
              <div class="card rounded-0">
                <br/>
                 <?php $view = view_student_grade($student_id); ?>
                 <div class="card-body">
                    <div class="row">
                      <div class="col-lg-12 text-center">
                          <img style="height:600px; " src="<?php echo $view['attached_grade_file']; ?>" alt="Profile" class="d-block w-100 border border-info">
                        </div>
                    </div>
                    <br/>
                    <button name="button_close" type="submit" class="btn btn-secondary rounded-0 w-25">Close</button>
                </div>
              </div>
          </div>
      </div>
    </section>

  </main><!-- End #main -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

  <script>
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#ic_img_exam').attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]);
          }
      }

      $("#ic_img_exam_path").change(function(){
          readURL(this);
      });
  </script>
  
<?php include('../footer.php'); ?>
