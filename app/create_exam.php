<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php 
  if (isset($_POST['button_exam'])) {
    create_exam(
      "student_year", 
      "exam_title", 
      "exam_description", 
      "exam_category",
      "ic_img_exam_path", 
      "../uploads/exam/",
      "create_exam"
    );
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
                      REMINDER ON UPLOADING THE FILE
                    </h5>
                    
                    <!-- <p id='citation_desc' class="small fst-italic">
                      The ideas and many of the questions for the Pre-Assesment survey were dericed from "Becoming a Master Student" 7th 
                      and 8th editions [1994 and 1998] Davis Ellis, Houghton Mifflin Co., Boston, MA.
                    </p> -->

                     <!-- Floating Labels Form -->
                     <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                        <?php echo display_message($msg); ?>
                        <div class="col-lg-6 text-center">
                          <label for="ic_img_exam_path">
                            <img style="height:600px; " id="ic_img_exam" src="../uploads/exam/first_year_a/sample_1.png" alt="Profile" class="d-block w-100 border border-info">
                            <p class="small fst-italic text-center">(Attached Image of Exam)</p>
                          </label>
                            <input id="ic_img_exam_path" type="file" name="ic_img_exam_path" class="form-control btn btn-primary rounded-0 btn-sm w-75"></input>
                        </div>

                        <div class="col-lg-6">
                          <label class="col-sm-5 col-form-label">Student Year Level</label>
                            <div class="col-sm-10">
                              <select id="student_year" name="student_year" class="form-select rounded-0" aria-label="Default select example">
                                <option selected>Select Year Level</option>
                                <option value="First Year">First Year</option>
                                <option value="Second Year">Second Year</option>
                                <option value="Third Year">Third Year</option>
                                <option value="Fourth Year">Fourth Year</option>
                              </select>
                            </div>

                          
                          <label class="col-sm-5 col-form-label">Exam Type</label>
                            <div class="col-sm-10">
                              <select id="exam_title" name="exam_title" class="form-select rounded-0" aria-label="Default select example">
                                <option selected>Select exam type</option>
                              </select>
                            </div>
                          

                          <label class="col-sm-5 col-form-label">Exam description</label>
                            <div class="col-sm-10">
                              <select id="exam_description" name="exam_description" class="form-select rounded-0" aria-label="Default select example">
                                <option selected>Select exam description</option>
                              </select>
                            </div>

                          <label  id="exam_category_label" class="col-sm-5 col-form-label">Exam Category</label>
                            <div  id="exam_category_div" class="col-sm-10">
                              <select id="exam_category" name="exam_category" class="form-select rounded-0" aria-label="Default select example">
                                <option id="exam_category_value" selected>Select exam category</option>
                              </select>
                            </div>
                          
                          <br/>
                            <div class="text-left">
                              <button name="button_exam" style="width: 460px;" type="submit" class="btn btn-primary btn-sm rounded-0">Upload Exam</button>
                            </div>

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
  <script>
    $(document).ready(function() {
      $('#student_year').on('change', function() {
        var studentYear = $(this).val();
        if (studentYear) {
          $.ajax({
            type: 'POST',
            url: './ajax/exam_type_ajax_func.php',
            data: 'student_year='+studentYear,
            success:function(html) {
              $('#exam_title').html(html);
              $('#exam_description').html('<option value="">Select exam type first</option>');
            }
          }); 
        } else {
              $('#exam_title').html('<option value="">Select student year first</option>');
              $('#exam_description').html('<option value="">Select exam type first</option>');
        }
      });

      $('#exam_title').on('change', function() {
        $.ajax({
          type: 'POST',
          url: './ajax/exam_desc_ajax_func.php',
          data: {student_year: $('#student_year').val(), exam_title: $('#exam_title').val()}, 
          success:function(html) {
            $('#exam_description').html(html);
          }
        });
      });

      $('#exam_description').on('change', function() {
        $.ajax({
          type: 'POST',
          url: './ajax/exam_category_ajax_func.php',
          data: {exam_description: $('#exam_description').val()},
          success: function(html) {
            if($('#exam_description').val() == "Academic Skills Development" 
            || $('#exam_description').val() == "Study and Thinking Skills" 
            || $('#exam_description').val() == "Personal Issues" 
            || $('#exam_description').val() == "Planning for the future" 
            || $('#exam_description').val() == "Resources needs") {
              $('#exam_category').html(html);
              $('#exam_category').show();
              $('#exam_category_label').show();
            } else {
              $('#exam_category').hide();
              $('#exam_category_label').hide();
            }
          } 
        })
      });

  });
  </script>
  
<?php include('../footer.php'); ?>
