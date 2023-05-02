<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php header("Refresh: 30"); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php global $db; ?>
<?php include('../start_menu_bar.php'); ?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Student Counseling Records</h1>
  </div><!-- End Page Title -->


<section class="section" style="width: 1360px;">
    <div class="row">
      <!-- start create account -->
      <div class="card rounded-0 bg-light">
        <div class="card-body">
          <h5 class="card-title">View Student Counseling Records</h5>

          <!-- General Form Elements -->
          <form class="row g-3" method="POST" action="">
            <div class="col-lg-12 ">
              <div class="card rounded-0">
                <div class="card-body">
                  <!-- Table with hoverable rows -->
                  <table class="table table-sm table-hover datatable text-nowrap">
                    <thead>
                      <tr>
                      <th scope="col" class="text-center" style="width: 20%;">Student Id</th>
                        <th scope="col" class="text-center" style="width: 50%;">Name</th>
                        <th scope="col" class="text-center" style="width: 30%;">Appointment Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sql = $db->query("SELECT * FROM counseling_appointment"); ?>
                      <?php if($sql->num_rows > 0) {?>
                      <?php while($row = $sql->fetch_assoc()) { ?>

                        <tr>
                        <th data-target="name" scope="row" class="text-center" style="width: 20%;"><?php echo remove_junk($row['student_id']); ?></th>
                        <th data-target="name" scope="row" class="text-center" style="width: 50%;"><?php echo remove_junk($row['student_name']); ?></th>
                        <td class="text-center" style="width: 30%;"><?php echo remove_junk($row['appointment_date']); ?></td>
                      </tr>

                      <?php } ?>
                      <?php } ?>
                     
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
