<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php if (isset($_POST['button_view'])) {
  redirect('./view_exam_schedule', false);
} ?>
<?php 
if (isset($_POST['button_schedule'])) {
  create_exam_schedule(
    "student_year",
    "semester",
    "school_year",
    "exam_title",
    "exam_description",
    "exam_category",
    "expired_at",
    "exam_duration",
    "result_date",
    "exam_status"
  );
}

?>
<?php include('../start_menu_bar.php'); ?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Manage Schedule Exam</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Create an exam schedule</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">
          <div class="card rounded-0">
          <div class="card-body">
            <h5 class="card-title">
              Manage Exam Schedule and Send Notification
            </h5>
            <hr/>
            <?php $academic_settings = get_academic_settings(); ?>
            <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
               <?php echo display_message($msg); ?>
               <div class="col-lg-6">

                 <label for="inputNumber" class="col-sm-5 col-form-label">Student Year</label>
                 <div class="col-sm-10">
                   <select id="student_year" name="student_year"  class="form-select rounded-0">
                     <option selected>Select student year</option>
                     <?php 
                        global $db;
                        $sql = "SELECT distinct(student_year) FROM exam_created";
                        $result = $db->query($sql);
                        if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                            echo '<option value="' .$row['student_year']. '">' .$row['student_year']. '</option>';
                          }
                        } else {
                          echo '<option value="">No created exam yet. Please create exam first!</option>';
                        }
                     ?>
                   </select>
                 </div>

                 <label for="inputNumber" class="col-sm-5 col-form-label">Exam Type</label>
                 <div class="col-sm-10">
                   <select id="exam_title" name="exam_title" class="form-select rounded-0">
                     <option selected>Select exam type</option>
                   </select>
                 </div>

                 <label for="inputNumber" class="col-sm-5 col-form-label">Exam Description</label>
                 <div class="col-sm-10">
                   <select id="exam_description" name="exam_description" class="form-select rounded-0">
                     <option selected>Select exam description</option>
                   </select>
                 </div>

                 <label id="exam_category_label" for="inputNumber" class="col-sm-5 col-form-label">Exam Category</label>
                 <div class="col-sm-10">
                   <select id="exam_category" name="exam_category" class="form-select rounded-0">
                     <option selected>Select exam category</option>
                   </select>
                 </div>

                 <label for="inputNumber" class="col-sm-5 col-form-label" hidden>Created At</label>
                 <div class="col-sm-10">
                   <input id="created_at" type="text" class="form-control rounded-0 text-danger" value="<?php echo date('d/m/Y'); ?>" hidden>
                 </div>

                 <label for="inputNumber" class="col-sm-5 col-form-label" hidden>Expired At</label>
                 <div class="col-sm-10">
                   <input name="expired_at" type="date" class="form-control text-danger rounded-0" hidden>
                 </div>

               </div>
               <div class="col-lg-6">
                 <label for="inputNumber" class="col-sm-5 col-form-label">Exam Duration</label>
                 <div class="col-sm-10">
                   <select name="exam_duration" id="course" class="form-select rounded-0">
                     <option selected>Select exam duration</option>
                     <option value="1">1 minute</option>
                     <option value="5">5 minutes</option>
                     <option value="8">8 minutes</option>
                     <option value="9">9 minutes</option>
                     <option value="10">10 minutes</option>
                     <option value="12">12 minutes</option>
                     <option value="20">20 minutes</option>
                     <option value="30">30 minutes </option>
                     <option value="40">40 minutes</option>
                   </select>
                 </div>

                 <label for="inputNumber" class="col-sm-5 col-form-label" hidden>Date of Exam Result</label>
                 <div class="col-sm-10">
                   <input name="result_date" type="date" class="form-control text-success rounded-0" hidden>
                 </div>
          
                <label for="inputNumber" class="col-sm-5 col-form-label">Semester</label>
                 <div class="col-sm-10">
                   <input name="semester" type="text" class="form-control text-success rounded-0" value="<?php echo $academic_settings['semester']; ?>" readonly>
                 </div>

                <label for="inputNumber" class="col-sm-5 col-form-label">School Year</label>
                 <div class="col-sm-10">
                   <input name="school_year" type="text" class="form-control text-danger rounded-0" value="<?php echo $academic_settings['school_year']; ?>" readonly>
                 </div>

                 <label for="inputNumber" class="col-sm-5 col-form-label">Exam Status</label>
                 <div class="col-sm-10">
                   <select name="exam_status" id="course" class="form-select rounded-0">
                     <option selected>Select exam status</option>
                     <option value="Ready">READY</option>
                     <option value="Not Ready">NOT READY</option>
                   </select>
                 </div>

                 <br/>
                 <div class="text-center">
                   <button type="submit" name="button_schedule" class="btn btn-danger rounded-0">Schedule</button>
                   <button type="submit" name="button_view" class="btn btn-success rounded-0">View Schedule</button>
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
  $(document).ready(function() {
    $('#student_year').on('change', function() {
      var studentYear = $(this).val();
        if (studentYear) {
          $.ajax({
            type: 'POST',
            url: './ajax/exam_sched_ajax_func.php',
            data: 'student_year='+studentYear,
            success:function(html) {
              $('#exam_title').html(html);
            }
          }); 
        } else {
              $('#exam_title').html('<option value="">Select student year first</option>');
        }
    });

    $('#exam_title').on('change', function() {
        $.ajax({
          type: 'POST',
          url: './ajax/exam_sched_desc_ajax_func.php',
          data: {
            student_year: $('#student_year').val(), 
            exam_title: $('#exam_title').val()
          }, 
          success:function(html) {
            $('#exam_description').html(html);
          }
        });
      });

    $('#exam_description').on('change', function() {
        $.ajax({
          type: 'POST',
          url: './ajax/exam_sched_category_ajax_func.php',
          data: {
            student_year: $('#student_year').val(),
            exam_title: $('#exam_title').val(), 
            exam_description: $('#exam_description').val()
          },
          success: function(html) {
            if($('#exam_description').val() == "Academic Skills Development" 
            || $('#exam_description').val() == "Study and Thinking Skills" 
            || $('#exam_description').val() == "Personal Issues" 
            || $('#exam_description').val() == "Planning for the future" 
            || $('#exam_description').val() == "Resources needs"
            || $('#exam_description').val() == "Aptitude J and C") {
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
