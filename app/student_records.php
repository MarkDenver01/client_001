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
    <h1>Student Counseling</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Student Records</a></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


<section class="section" style="width: 1560px;">
    <div class="row">
      <!-- start create account -->
      <div class="card rounded-0">
        <div class="card-body">
          <br/>
          <!-- General Form Elements -->
          <form class="row g-3" method="POST" action="">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <!-- Table with hoverable rows -->
                  <table class="table table-sm table-hover datatable text-nowrap">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center" style="width: 30%;">Name</th>
                        <th scope="col" class="text-center" style="width: 20%;">Student Year</th>
                        <th scope="col" class="text-center" style="width: 20%;">Course</th>
                        <th scope="col" class="text-center" style="width: 20%;">Exam Type</th>
                        <th scope="col" class="text-center" style="width: 10%;">Counseling Status</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php       
                      $sql = "SELECT * FROM examinee GROUP BY student_id ORDER BY examinee_id";
                      $result = $db->query($sql);
                      if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          $name = $row['name'];
                          $student_year = $row['student_year'];
                          $course = $row['course'];
                          $exam_title = $row['exam_title'];
                          $counseling_status = $row['counselor_notify_status'];
                    ?>
                      <tr class="text-success">
                        <th scope="row" class="text-center" style="width: 30%;"><?php echo $name; ?></th>
                        <td scope="row" class="text-center" style="width: 20%;"><?php echo $student_year; ?></td>
                        <td scope="row" class="text-center" style="width: 20%;"><?php echo $course; ?></td>
                        <td scope="row" class="text-center" style="width: 20%;"><?php echo $exam_title; ?></td>
                        <td scope="row" class="text-center" style="width: 10%;">
                        <?php if ($counseling_status == "Counseling") { ?>
                          <a href="#" name="button_update" type="button" class="btn btn-success rounded-0  btn-sm w-100 "> Counseling</button>
                        <?php } ?>
                        </td>
                      </tr>
                    <?php
                        }
                      } 
                    ?>
                                            </tr>
                    </tbody>
                  </table>
                  <!-- End Table with hoverable rows -->
                </div>
              </div>
            </div>
          </form><!-- End floating Labels Form -->
          <!-- End General Form Elements -->

        </div>
      </div>
      <!-- end create account -->
    </div>
</section>
<?php include('../footer.php'); ?>
