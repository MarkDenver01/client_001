<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php IS_HIGHER_LEVEL(); ?>
<?php global $db; ?>
<?php global $session; ?>
<?php  
    $student_id = $_GET['student_id'];
    $school_year = $_POST['school_year']; 
    $semester = $_POST['semester'];
?>
<?php 
    if (isset($_POST['button_attached'])) {
        $img_file = $_FILES['ic_img_exam_path']['name'];
        $tmp_dir = $_FILES['ic_img_exam_path']['tmp_name'];
        $img_size = $_FILES['ic_img_exam_path']['size'];

        if (empty($img_file)) { 
            redirect("./monitoring", false);
          } else {
            $upload_dir = "../uploads/grades/";
            $img_ext = strtolower(pathinfo($img_file, PATHINFO_EXTENSION));
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
        
            $generate_file_name = 'GRADE_'.rand(1000,1000000).".".$img_ext;
            if (in_array($img_ext, $valid_extensions)) {
              if ($img_size < 5000000) {
                if (move_uploaded_file($tmp_dir, $upload_dir.$generate_file_name)) {
                  $dir = $upload_dir.$generate_file_name;
                  if (empty($errors)) {
                        $sqlCheck = $db->query("SELECT * FROM monitoring_student WHERE student_id ='" .$student_id. "'");
                        if ($sqlCheck->num_rows > 0) { 
                            redirect('./view_student_probation', false);
                        } else {
                            $sqlIns = $db->query("INSERT INTO monitoring_student(student_id, attached_grade_file, school_year, semester) VALUES(
                                '$student_id',
                                '$dir',
                                '$school_year',
                                '$semester')");

                            if ($sqlIns) {
                                redirect('./view_student_probation', false);
                            }
                        }
                  } else {
                    redirect($redirect_page, false);
                  }
                } else {
                  redirect($redirect_page, false);
                }
              } else {
                redirect($redirect_page, false);
              }
            }
          }
    }
?>
<?php include('../start_menu_bar.php'); ?>
<script type="text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>

<main id="main" class="main">

    <div class="pagetitle">
      <h1> Upload Student's Grade</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Attached Image of Grade</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile" style="width: 1360px;">
    <form action="" method="post" enctype="multipart/form-data">
      <div class="row">
        <!-- center -->
        <div class="col-sm-5">
          <div class="card rounded-0">
            <div class="card-body">
              <br/>
              <div class="text-center"><h2>Upload Here</h2></div>
              <hr/>
              <div class="row">
                <div class="col-lg-12">
                    <label for="ic_img_exam_path">
                        <img  id="ic_img_exam" src="../uploads/exam/first_year_a/sample_1.png" alt="Profile" class="d-block w-100 border border-info">
                        <p class="small fst-italic text-center">(Attached Image of Exam)</p>
                        </label>
                    <input id="ic_img_exam_path" type="file" name="ic_img_exam_path" class="form-control btn btn-primary rounded-0 btn-sm w-100"></input>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-7">
          <div class="card rounded-0">
            <div class="card-body">
              <br/>
              <div class="text-center"><h2>Reminder</h2></div>
              <hr/>
                  <div class="row mb-3">
                    <div class="col-lg-12">
                        <?php $sql = $db->query("SELECT * FROM student_info WHERE id ='" .$student_id. "'"); ?>
                        <?php if ($sql->num_rows > 0) { ?>
                        <?php $row = $db->fetch_assoc($sql); ?>
                        <?php  } ?>
                        <label for="age" class="col-md-4 col-lg-3 col-form-label">Semester</label>
                            <div class="col-md-8 col-lg-12">
                              <input name="semester" type="text" class="form-control rounded-0" value="<?php echo $row['semester']; ?>" readonly>
                            </div>
                   
                          <label for="age" class="col-md-4 col-lg-3 col-form-label">School Year</label>
                            <div class="col-md-8 col-lg-12">
                              <input name="school_year" type="text" class="form-control rounded-0" value="<?php echo $row['school_year']; ?>" readonly>
                            </div>
                            <br/>
                            <hr/>
                            <div class="text-center">
                              <button name="button_attached"  type="submit" class="btn btn-primary btn-lg rounded-pill w-75">Upload Exam</button>
                            </div>
                    </div>
                  </div>          
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
