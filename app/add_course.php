<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php IS_HIGHER_LEVEL(); ?>
<?php global $db; ?>
<?php global $session; ?>
<?php $id = $_GET['id']; ?>
<?php
   if (isset($_POST['button_submit'])) {
    if (empty($id)) {
        $sql = "INSERT INTO course_tbl(course_code, course) VALUES('" .$_POST['course_code']. "','" .$_POST['course']. "')";
        $result = $db->query($sql);
        if ($result) {
            $session->message('s', 'New course has been added');
            redirect('./add_course', false);
        } else {
            $session->message('d', 'Unexpected error occur');
            redirect('./add_course', false);
        }
    } else {
        $sql = "UPDATE course_tbl SET course_code ='" .$_POST['course_code']. "', course ='" .$_POST['course']. "' WHERE id='" .$id. "'";
        $result = $db->query($sql);
        if ($result) {
            $session->message('s', 'Course has been updated');
            redirect('./add_course', false);
        } else {
            $session->message('d', 'Unexpected error occur');
            redirect('./add_course', false);
        }
    }
  }
?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php include('../start_menu_bar.php'); ?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Course </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Manage Course</a></li>
          <li class="breadcrumb-item">Add course</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">
          <div class="card rounded-0">
          <div class="card-body">
            <?php
              $course = find_course($id);
            ?>
            <h5 class="card-title">Add and Update Course</h5>
            <?php echo display_message($msg); ?>
            <!-- Floating Labels Form -->
              <form class="row g-3" action="", method="POST" enctype="multipart/form-data">
                <div class="col-md-12">
                  <div class="form-floating">
                    <input name="course_code" type="text" class="form-control rounded-0 w-50" id="floatingName" placeholder="Course Code" value="<?php echo $course['course_code']; ?>">
                    <label for="floatingName">Course Code</label>
                  </div>
                  <br/>
                  <div class="form-floating">
                    <input name="course" type="text" class="form-control rounded-0 w-50" id="floatingName" placeholder="Course" value="<?php echo $course['course']; ?>">
                    <label for="floatingName">Course</label>
                  </div>
                </div> 
                <div class="text-left">
                  <?php  if (empty($id)) { ?>
                    <button name="button_submit" type="submit" class="btn btn-primary rounded-0">Add Course</button>
                  <?php  } else { ?>
                    <button name="button_submit" type="submit" class="btn btn-primary rounded-0">Update Course</button>
                  <?php } ?>
                  
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
