<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php global $db; ?>
<?php global $session; ?>
<?php $main_exam_type = $_GET['exam_type']; ?>
<?php $academic_settings = get_academic_settings(); ?>
<?php 
    $created_at = date('Y-m-d h:i:s A');
    if ($main_exam_type == 'student_success_kit') {
        $sqlCheck = $db->query("SELECT * FROM exam_created WHERE exam_title='Student Success Kit'");
        if ($sqlCheck->num_rows > 0) {
            // nothing
        } else {
            $sqlInsert = $db->query("INSERT INTO `exam_created` (`id`, `student_year`, `semester`, `school_year`, `exam_title`, `exam_description`, `exam_category`, `created_at`, `exam_status`, `updated_answer`) VALUES
            (1, 'First Year', '" .$academic_settings['semester']. "', '" .$academic_settings['school_year']. "', 'Student Success Kit', 'Academic Skills Development', 'Reading', '" .$created_at. "', 1, 0),
            (2, 'First Year', '" .$academic_settings['semester']. "', '" .$academic_settings['school_year']. "', 'Student Success Kit', 'Academic Skills Development', 'Writing', '" .$created_at. "', 1, 0),
            (3, 'First Year', '" .$academic_settings['semester']. "', '" .$academic_settings['school_year']. "', 'Student Success Kit', 'Academic Skills Development', 'Speaking Skills', '" .$created_at. "', 1, 0),
            (4, 'First Year', '" .$academic_settings['semester']. "', '" .$academic_settings['school_year']. "', 'Student Success Kit', 'Academic Skills Development', 'Listening Skills', '" .$created_at. "', 1, 0),
            (5, 'First Year', '" .$academic_settings['semester']. "', '" .$academic_settings['school_year']. "', 'Student Success Kit', 'Study and Thinking Skills', 'Learning Styles', '" .$created_at. "', 1, 0),
            (6, 'First Year', '" .$academic_settings['semester']. "', '" .$academic_settings['school_year']. "', 'Student Success Kit', 'Study and Thinking Skills', 'Memory', '" .$created_at. "', 1, 0),
            (7, 'First Year', '" .$academic_settings['semester']. "', '" .$academic_settings['school_year']. "', 'Student Success Kit', 'Study and Thinking Skills', 'Study Skills','" .$created_at. "', 1, 0),
            (8, 'First Year', '".$academic_settings['semester']. "', '" .$academic_settings['school_year']. "', 'Student Success Kit', 'Study and Thinking Skills', 'Creative and Thinking Skills','" .$created_at. "', 1, 0),
            (9, 'First Year', '" .$academic_settings['semester']. "', '" .$academic_settings['school_year']. "', 'Student Success Kit', 'Personal Issues', 'Motivation','" .$created_at. "', 1, 0),
            (10, 'First Year', '" .$academic_settings['semester']. "', '" .$academic_settings['school_year']. "', 'Student Success Kit', 'Personal Issues', 'Self-Esteem','" .$created_at. "', 1, 0),
            (11, 'First Year', '" .$academic_settings['semester']. "', '" .$academic_settings['school_year']. "', 'Student Success Kit', 'Personal Issues', 'Personal Relationships','" .$created_at. "', 1, 0),
            (12, 'First Year', '" .$academic_settings['semester']. "', '" .$academic_settings['school_year']. "', 'Student Success Kit', 'Personal Issues', 'Conflict Resolution', '" .$created_at. "', 1, 0),
            (13, 'First Year', '" .$academic_settings['semester']. "', '" .$academic_settings['school_year']. "', 'Student Success Kit', 'Personal Issues', 'Health','" .$created_at. "', 1, 0),
            (14, 'First Year', '" .$academic_settings['semester']. "', '" .$academic_settings['school_year']. "', 'Student Success Kit', 'Planning for the future', 'Time Management','" .$created_at. "', 1, 0),
            (15, 'First Year', '" .$academic_settings['semester']. "', '" .$academic_settings['school_year']. "', 'Student Success Kit', 'Planning for the future', 'Money Management','" .$created_at. "', 1, 0),
            (16, 'First Year', '" .$academic_settings['semester']. "', '" .$academic_settings['school_year']. "', 'Student Success Kit', 'Planning for the future', 'Personal Purpose','" .$created_at. "', 1, 0),
            (17, 'First Year', '" .$academic_settings['semester']. "', '" .$academic_settings['school_year']. "', 'Student Success Kit', 'Planning for the future', 'Career Planning','" .$created_at. "', 1, 0),
            (18, 'First Year', '" .$academic_settings['semester']. "', '" .$academic_settings['school_year']. "', 'Student Success Kit', 'Resources needs', 'Support Resources','" .$created_at. "', 1, 0);");       
        }
    }   
    
    if (isset($_POST['button_submit'])) {
        if ($main_exam_type == 'student_success_kit') {
            $i = 0;
            foreach($_FILES['uploads']['name'] as $key => $value) {
                $i++;
                $id = $i;
                $img_file = $_FILES['uploads']['name'][$key];
                $tmp_dir = $_FILES['uploads']['tmp_name'][$key];
                $img_size = $_FILES['uploads']['size'][$key];
    
                $upload_dir = "../uploads/exam/";
                $img_ext = strtolower(pathinfo($img_file, PATHINFO_EXTENSION));
                $valid_extensions = array('jpeg','jpg','png','gif');
    
                $generate_file_name = 'EXAM_'.$student_year.'_'.rand(1000,1000000).".".$img_ext;
                if (in_array($img_ext, $valid_extensions)) {
                    if (move_uploaded_file($tmp_dir, $upload_dir.$generate_file_name)) {
                        $dir = $upload_dir.$generate_file_name;
                        $updateSQL = $db->query("UPDATE exam_created SET image_exam_path='$dir' WHERE id='$id'");
                        if ($updateSQL) {
                            $session->message('s','Upload has been successful');
                        } else {
                            $session->message('d','Unexpected error occour');
                        }
                    } else {
                        $session->message('d','File could not be uploaded');
                    }
                } else {
                    $session->message('d','Only .jpg, .jpeg, and .png file formats allowed');
                }
            }
        } elseif ($main_exam_type == 'oasis_3') {
            $i = 0;
            foreach($_FILES['uploads']['name'] as $key => $value) {
                $i++;
                $id = $i;
                $img_file = $_FILES['uploads']['name'][$key];
                $tmp_dir = $_FILES['uploads']['tmp_name'][$key];
                $img_size = $_FILES['uploads']['size'][$key];
    
                $upload_dir = "../uploads/exam/";
                $img_ext = strtolower(pathinfo($img_file, PATHINFO_EXTENSION));
                $valid_extensions = array('jpeg','jpg','png','gif');
    
                $generate_file_name = 'EXAM_'.$student_year.'_'.rand(1000,1000000).".".$img_ext;
                if (in_array($img_ext, $valid_extensions)) {
                    if (move_uploaded_file($tmp_dir, $upload_dir.$generate_file_name)) {
                        $dir = $upload_dir.$generate_file_name;
                        $updateSQL = $db->query("UPDATE exam_created SET image_exam_path='$dir' WHERE id='$id'");
                        if ($updateSQL) {
                            $session->message('s','Upload has been successful');
                        } else {
                            $session->message('d','Unexpected error occour');
                        }
                    } else {
                        $session->message('d','File could not be uploaded');
                    }
                } else {
                    $session->message('d','Only .jpg, .jpeg, and .png file formats allowed');
                }
            }
        }
    }
?>
<?php include('../start_menu_bar.php'); ?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Create and Upload Exam</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Upload and Assign exam in every student year level</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
          <div class="col-xl-12">
              <div class="card rounded-0">
                 
                 <div class="card-body">
                    <h5 class="card-title">
                      Reminder: Only image allow to upload in the file attachment.
                    </h5>
                    <?php $academic_settings = get_academic_settings(); ?>
                    <!-- <p id='citation_desc' class="small fst-italic">
                      The ideas and many of the questions for the Pre-Assesment survey were dericed from "Becoming a Master Student" 7th 
                      and 8th editions [1994 and 1998] Davis Ellis, Houghton Mifflin Co., Boston, MA.
                    </p> -->
                     <!-- Floating Labels Form -->
                     <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                        <?php echo display_message($msg); ?>
                        <?php if ($main_exam_type == 'student_success_kit') { ?>
                        
                            <div class="col-lg-4">
                            <div class="text-left"><h3>Academic Skills Development</h3></div>
                                <label for="age" class="col-md-12 col-lg-3 col-form-label">Reading</label>
                                <div class="col-md-8 col-lg-12">
                                    <input id="ic_img_exam_path" type="file" name="uploads[]" class="form-control btn btn-primary rounded-0 btn-sm w-75" required>
                                </div>

                                <label for="age" class="col-md-12 col-lg-3 col-form-label">Writing</label>
                                <div class="col-md-8 col-lg-12">
                                    <input id="ic_img_exam_path" type="file" name="uploads[]" class="form-control btn btn-primary rounded-0 btn-sm w-75" required>
                                </div>

                                <label for="age" class="col-md-12 col-lg-3 col-form-label">Speaking Skills</label>
                                <div class="col-md-8 col-lg-12">
                                    <input id="ic_img_exam_path" type="file" name="uploads[]" class="form-control btn btn-primary rounded-0 btn-sm w-75" required>
                                </div>

                                <label for="age" class="col-md-12 col-lg-3 col-form-label">Listening Skills</label>
                                <div class="col-md-8 col-lg-12">
                                    <input id="ic_img_exam_path" type="file" name="uploads[]" class="form-control btn btn-primary rounded-0 btn-sm w-75" required>
                                </div>

                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            
                            <div class="text-left"><h3>Study and Thinking Skills</h3></div>
                            <label for="age" class="col-md-4 col-lg-12 col-form-label">Learning Style</label>
                                <div class="col-md-8 col-lg-12">
                                    <input id="ic_img_exam_path" type="file" name="uploads[]" class="form-control btn btn-primary rounded-0 btn-sm w-75" required>
                                </div>

                                <label for="age" class="col-md-4 col-lg-12 col-form-label">Memory</label>
                                <div class="col-md-8 col-lg-12">
                                    <input id="ic_img_exam_path" type="file" name="uploads[]" class="form-control btn btn-primary rounded-0 btn-sm w-75" required>
                                </div>

                                <label for="age" class="col-md-4 col-lg-12 col-form-label">Study Skills</label>
                                <div class="col-md-8 col-lg-12">
                                    <input id="ic_img_exam_path" type="file" name="uploads[]" class="form-control btn btn-primary rounded-0 btn-sm w-75" required>
                                </div>

                                <label for="age" class="col-md-4 col-lg-12 col-form-label">Creative and Critical Skills</label>
                                <div class="col-md-8 col-lg-12">
                                    <input id="ic_img_exam_path" type="file" name="uploads[]" class="form-control btn btn-primary rounded-0 btn-sm w-75" required>
                                </div>
                                
                        </div>
                        
                        <div class="col-lg-4">
                            <div class="text-left"><h3>Personal Issues</h3></div>
                            
                                <label for="age" class="col-md-4 col-lg-12 col-form-label">Motivation</label>
                                <div class="col-md-8 col-lg-12">
                                    <input id="ic_img_exam_path" type="file" name="uploads[]" class="form-control btn btn-primary rounded-0 btn-sm w-75" required>
                                </div>

                                <label for="age" class="col-md-4 col-lg-12 col-form-label">Self-Esteem</label>
                                <div class="col-md-8 col-lg-12">
                                    <input id="ic_img_exam_path" type="file" name="uploads[]" class="form-control btn btn-primary rounded-0 btn-sm w-75" required>
                                </div>

                                <label for="age" class="col-md-4 col-lg-12 col-form-label">Personal relationship</label>
                                <div class="col-md-8 col-lg-12">
                                    <input id="ic_img_exam_path" type="file" name="uploads[]" class="form-control btn btn-primary rounded-0 btn-sm w-75" required>
                                </div>

                                <label for="age" class="col-md-4 col-lg-12 col-form-label">Conflict Resolution</label>
                                <div class="col-md-8 col-lg-12">
                                    <input id="ic_img_exam_path" type="file" name="uploads[]" class="form-control btn btn-primary rounded-0 btn-sm w-75" required>
                                </div>

                                <label for="age" class="col-md-4 col-lg-12 col-form-label">Health</label>
                                <div class="col-md-8 col-lg-12">
                                    <input id="ic_img_exam_path" type="file" name="uploads[]" class="form-control btn btn-primary rounded-0 btn-sm w-75" required>
                                </div>
                        <br/>
                        
                                <div class="text-left"><h3>Planning for the future</h3></div>
                                <label for="age" class="col-md-4 col-lg-12 col-form-label">Time Management</label>
                                <div class="col-md-8 col-lg-12">
                                    <input id="ic_img_exam_path" type="file" name="uploads[]" class="form-control btn btn-primary rounded-0 btn-sm w-75" required>
                                </div>

                                <label for="age" class="col-md-4 col-lg-12 col-form-label">Money Management</label>
                                <div class="col-md-8 col-lg-12">
                                    <input id="ic_img_exam_path" type="file" name="uploads[]" class="form-control btn btn-primary rounded-0 btn-sm w-75" required>
                                </div>

                                <label for="age" class="col-md-4 col-lg-12 col-form-label">Personal Purpose</label>
                                <div class="col-md-8 col-lg-12">
                                    <input id="ic_img_exam_path" type="file" name="uploads[]" class="form-control btn btn-primary rounded-0 btn-sm w-75" required>
                                </div>

                                <label for="age" class="col-md-4 col-lg-12 col-form-label">Career Planning</label>
                                <div class="col-md-8 col-lg-12">
                                    <input id="ic_img_exam_path" type="file" name="uploads[]" class="form-control btn btn-primary rounded-0 btn-sm w-75" required>
                                </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="text-left"><h3>Resources needs</h3></div>
                                <label for="age" class="col-md-4 col-lg-12 col-form-label">Support Resources</label>
                                <div class="col-md-8 col-lg-12">
                                    <input id="ic_img_exam_path" type="file" name="uploads[]" class="form-control btn btn-primary rounded-0 btn-sm w-75" required>
                                </div>
                        </div>
                        <?php } else if ($main_exam_type == 'oasis_3') { ?>
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <label for="age" class="col-md-12 col-lg-3 col-form-label">Vocabulary</label>
                                <div class="col-md-8 col-lg-12">
                                    <input id="ic_img_exam_path" type="file" name="uploads[]" class="form-control btn btn-primary rounded-0 btn-sm w-75" required>
                                </div>

                            <label for="age" class="col-md-12 col-lg-3 col-form-label">Computation</label>
                                <div class="col-md-8 col-lg-12">
                                    <input id="ic_img_exam_path" type="file" name="uploads[]" class="form-control btn btn-primary rounded-0 btn-sm w-75" required>
                                </div>

                             <label for="age" class="col-md-12 col-lg-3 col-form-label">Spatial</label>
                                <div class="col-md-8 col-lg-12">
                                    <input id="ic_img_exam_path" type="file" name="uploads[]" class="form-control btn btn-primary rounded-0 btn-sm w-75" required>
                                </div>
                                
                             <label for="age" class="col-md-12 col-lg-12 col-form-label">Word Comparison</label>
                                <div class="col-md-8 col-lg-12">
                                    <input id="ic_img_exam_path" type="file" name="uploads[]" class="form-control btn btn-primary rounded-0 btn-sm w-75" required>
                                </div>
                                                                
                             <label for="age" class="col-md-12 col-lg-12 col-form-label">Marking marks part 1</label>
                                <div class="col-md-8 col-lg-12">
                                    <input id="ic_img_exam_path" type="file" name="uploads[]" class="form-control btn btn-primary rounded-0 btn-sm w-75" required>
                                </div>
                                                                
                             <label for="age" class="col-md-12 col-lg-12 col-form-label">Marking marks part 2</label>
                                <div class="col-md-8 col-lg-12">
                                    <input id="ic_img_exam_path" type="file" name="uploads[]" class="form-control btn btn-primary rounded-0 btn-sm w-75" required>
                                </div>
                        </div>
                        <div class="col-lg-4"></div>
                        <?php } ?>

                        <hr/>
                        <div class="text-center">
                            <button name="button_submit" type="submit" class="btn btn-success btn-lg rounded-0 w-50" >Upload Exam</button>
                        </div>

                    </form><!-- End floating Labels Form -->
                         
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
  <!-- <script src="../app/dropzone/dropzone.js"></script>
  <script>
    //Dropzone script
	  Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("div#studentSuccessKitExam", {
      addRemoveLinks: true,
      uploadMultiple: true,
      autoProcessQueue: false,
      parallelUploads: 50,
      maxFilesize: 30,
      maxFiles: 10,
      acceptedFiles: ".png, .jpeg, .jpg, .gif",
      paramName: "files",
      url: "../includes/action_first_year_a.php",
    });

    // add file script
    myDropzone.on("success", function(file, message) {
      $("#msg").html(message);
      //setTimeout(function() { window.location.href = "../app/create_exam_first.php"}, 800);
    });

    myDropzone.on("error", function(data) {
      $("#msg").html('<div class="alert alert-danger">There is something wrong, please try again!</div>');
    });

    myDropzone.on("complete", function(file) {
      myDropzone.removeFile(file);
    });

    $("#success_kit_button").on("click", function() {
      myDropzone.processQueue();
    });
  </script> -->
  
<?php include('../footer.php'); ?>
