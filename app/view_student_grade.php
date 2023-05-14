<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php global $db; ?>
<?php  
    $student_id = $_GET['student_id'];
    $school_year = $_POST['school_year']; 
    $semester = $_POST['semester'];
?>
<?php include('../start_menu_bar.php'); ?>
<script type="text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>

<main id="main" class="main">

    <div class="pagetitle">
      <h1> View Student's Grade</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Student Grade</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile" style="width: 1360px;">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="row">
        <!-- center -->
        <div class="col-sm-12">
          <div class="card rounded-0 text-center">
            <div class="card-body">
              <br/>
              <div class="text-center"><h2>View Student Grade</h2></div>
              <hr/>
              <?php 
                $sql = $db->query("SELECT * FROM monitoring_student WHERE student_id ='" .$student_id. "'");
                $row = $db->fetch_assoc($sql);
              ?>
              <label for="ic_img_exam_path">
                <div class="text-center">
                    <img  id="ic_img_exam" src="<?php echo $row['attached_grade_file']; ?>" alt="Profile" class=" border border-info" >
                </div>
              </label>
              
            </div>
            
          </div>
        </div>
      </div>
    </form>
    </section>

  </main><!-- End #main -->

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
