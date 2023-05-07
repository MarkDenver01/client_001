<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
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
                      <th scope="col" class="text-center" >Student Id</th>
                        <th scope="col" class="text-center" >Name</th>
                        <th scope="col" class="text-center" >Appointment Date</th>
                        <th scope="col" class="text-center" >Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sql = $db->query("SELECT * FROM counseling_appointment ORDER BY student_id DESC"); ?>
                      <?php if($sql->num_rows > 0) {?>
                      <?php while($row = $sql->fetch_assoc()) { ?>

                      <tr>
                        <th data-target="name" scope="row" class="text-center"><?php echo remove_junk($row['student_id']); ?></th>
                        <th data-target="name" scope="row" class="text-center" ><?php echo remove_junk($row['student_name']); ?></th>
                        <td class="text-center" ><?php echo remove_junk($row['appointment_date']); ?></td>
                        <td>
                          <?php $sqlCheck = $db->query("SELECT * FROM examinee WHERE counselor_notify_status ='Re-assestment' AND student_id ='" .$row['student_id']. "'"); ?>
                          <?php if ($sqlCheck->num_rows > 0)  { ?>
                            <button type="submit" class="btn text-white rounded-pill btn-sm w-100" style="background-image: linear-gradient(#AB274F, #9F2B68);" disabled>This student can now re-take the exam.  </a>
                          <?php } else { ?>
                            <a href="../includes/notify_student.php?student_id=<?php echo $row['student_id']; ?>" type="submit" class="btn text-white rounded-pill btn-sm w-100" style="background-image: linear-gradient(#AB274F, #9F2B68);"><i class="bi bi-print"></i> Re-take Assement & Notify</a>
                          <?php } ?>
                          
                        </td>
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
