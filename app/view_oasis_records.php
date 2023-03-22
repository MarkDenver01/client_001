<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php if(isset($_POST["button_back"])) redirect('./first_year_exam', false); ?>
<?php include('../start_menu_bar.php'); ?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>View OASIS Records</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Test Services</a></li>
        <li class="breadcrumb-item active">First Year</li>
        <li class="breadcrumb-item active">Oasis</li>
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
                        <th scope="col" class="text-center" style="width: 10%;">Exam Type</th>
                        <th scope="col" class="text-center" style="width: 15%;">File Name</th>
                        <th scope="col" class="text-center" style="width: 30%;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="row" class="text-center" style="width: 5%;" hidden>
                        <th data-target="name" scope="row" class="text-center" style="width: 10%;">Vocabulary</th>
                        <td class="text-center" style="width: 15%;">/uploads/vocabulary.png</td>

                        <td class="text-center" style="width: 10%;">
                            <div class="btn-group" role="group" aria-label="Basic example">
                              <button type="button" class="btn btn-success  w-50">View</button>
                              <button type="button" class="btn btn-primary  w-50">Edit</button>
                              <button type="button" class="btn btn-danger  w-50">Delete</button>
                            </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <!-- End Table with hoverable rows -->


                </div>
              </div>


            </div>

            <div class="text-left">
              <button type="submit" name="button_back" class="btn btn-danger w-25">Back</button>
            </div>
          </form><!-- End floating Labels Form -->
          <!-- End General Form Elements -->

        </div>
      </div>
      <!-- end create account -->
    </div>
</section>
<?php include('../footer.php'); ?>
