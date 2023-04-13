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
    <h1>Student Records</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">View Exam result</a></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


<section class="section">
    <div class="row">
      <!-- start create account -->
      <div class="card">
        <div class="card-body">
          <br/>
          <!-- General Form Elements -->
          <form class="row g-3" method="POST" action="">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <!-- Table with hoverable rows -->
                  <table class="table table-sm table-hover datatable">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center" style="width: 20%;">Name</th>
                        <th scope="col" class="text-center" style="width: 10%;">Student Year</th>
                        <th scope="col" class="text-center" style="width: 20%;">Course</th>
                        <th scope="col" class="text-center" style="width: 10%;">Exam Type</th>
                        <th scope="col" class="text-center" style="width: 10%;">Grades</th>
                        <th scope="col" class="text-center" style="width: 30%;">Counseling Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="text-success">
                        <th scope="row" class="text-center" style="width: 20%;">Juan Dela Cruz</th>
                        <td scope="row" class="text-center" style="width: 10%;">First Year</td>
                        <td scope="row" class="text-center" style="width: 20%;">BSIT</td>
                        <td scope="row" class="text-center" style="width: 10%;">Student Success Kit</td>
                        <td scope="row" class="text-center" style="width: 10%;">30%</td>
                        <td scope="row" class="text-center" style="width: 30%;">
                          Monitoring
                        </td>
                      </tr>
                      <tr class="text-success">
                        <th scope="row" class="text-center" style="width: 20%;">Albero de Guzman</th>
                        <td scope="row" class="text-center" style="width: 10%;">First Year</td>
                        <td scope="row" class="text-center" style="width: 20%;">BSIT</td>
                        <td scope="row" class="text-center" style="width: 10%;">Student Success Kit</td>
                        <td scope="row" class="text-center" style="width: 10%;">40%</td>
                        <td scope="row" class="text-center" style="width: 30%;">
                          Monitoring
                        </td>
                      </tr>
                      <tr class="text-danger">
                        <th scope="row" class="text-center" style="width: 20%;">Pedro Dela Cruz</th>
                        <td scope="row" class="text-center" style="width: 10%;">First Year</td>
                        <td scope="row" class="text-center" style="width: 20%;">BSIT</td>
                        <td scope="row" class="text-center" style="width: 10%;">Student Success Kit</td>
                        <td scope="row" class="text-center" style="width: 10%;">20%</td>
                        <td scope="row" class="text-center" style="width: 30%;">
                          <button type="button" name="button_counseling" class="btn btn-warning btn-sm rounded-pill w-10" ><span>Counseling</button>
                        </td>
                      </tr>
                      <tr class="text-info">
                        <th scope="row" class="text-center" style="width: 20%;">Andress Montalban</th>
                        <td scope="row" class="text-center" style="width: 10%;">First Year</td>
                        <td scope="row" class="text-center" style="width: 20%;">BSIT</td>
                        <td scope="row" class="text-center" style="width: 10%;">Student Success Kit</td>
                        <td scope="row" class="text-center" style="width: 10%;"><h3>-</h3></td>
                        <td scope="row" class="text-center" style="width: 30%;">
                          <button type="button" name="button_counseling" class="btn btn-secondary btn-sm rounded-pill w-10" ><span>Upload Exam Result</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- End Table with hoverable rows -->
                </div>
              </div>
            </div>

            <div class="text-left">
              <button type="submit" name="button_back" class="btn btn-secondary w-25">Print</button>
            </div>
          </form><!-- End floating Labels Form -->
          <!-- End General Form Elements -->

        </div>
      </div>
      <!-- end create account -->
    </div>
</section>
<?php include('../footer.php'); ?>
