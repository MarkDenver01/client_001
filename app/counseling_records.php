<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php IS_HIGHER_LEVEL(); ?>
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
                        <th scope="col" class="text-center" style="width: 20%;" >Name</th>
                        <th scope="col" class="text-center" style="width: 20%;">Appointment Date</th>
                        <th scope="col" class="text-center" style="width: 10%;">Time Counseling</th>
                        <th scope="col" class="text-center" style="width: 30%;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sql = $db->query("SELECT * FROM counseling_appointment ORDER BY id DESC"); ?>
                      <?php if($sql->num_rows > 0) {?>
                      <?php while($row = $sql->fetch_assoc()) { 
                            $get_date = $row['appointment_date'];
                            $date_appointment_formatted = date("Y/m/d",strtotime($get_date));
                      ?>

                      <tr>
                      <th data-target="name" scope="row" class="text-center"  hidden><?php echo remove_junk($row['student_id']); ?></th>
                        <th data-target="name" scope="row" class="text-center text-danger" style="width: 20%;"><?php echo remove_junk($row['student_no']); ?></th>
                        <th data-target="name" scope="row" class="text-center" style="width: 20%;"><?php echo remove_junk($row['student_name']); ?></th>
                        <td class="text-center" style="width: 20%;"><?php echo $date_appointment_formatted; ?></td>
                        <td class="text-center" style="width: 20%;"><?php echo $row['time_counseling']; ?></td>
                        <td style="width: 30%;">
                          <?php $sqlCheck = $db->query("SELECT * FROM examinee WHERE counselor_notify_status ='Re-assestment' AND student_id ='" .$row['student_id']. "'"); ?>
                          <?php if ($sqlCheck->num_rows > 0)  { ?>
                            <button type="submit" class="btn text-white rounded-pill btn-sm w-100" style="background-image: linear-gradient(#AB274F, #9F2B68);" disabled>This student can now re-take the exam.  </a>
                          <?php } else { ?>
                            <a href="../includes/notify_student.php?student_id=<?php echo $row['student_id']; ?>" type="submit" class="btn text-white rounded-pill btn-sm w-50" style="background-image: linear-gradient(#AB274F, #9F2B68);"><i class="bi bi-print"></i> Re-take & Notify</a>
                            <?php } ?>
                            <a href="../includes/reschedule_appointment.php?student_id=<?php echo $row['student_id']; ?>" type="submit" class="btn text-white rounded-pill btn-sm w-50" style="background-image: linear-gradient(#4B6F44, #7BB661);"><i class="bi bi-print"></i> Re-schedule</a>
                        </td>
                      </tr>

                      <?php } ?>
                      <?php } ?>
                     
                    </tbody>
                  </table>
                  <!-- End Table with hoverable rows -->
                  <button name="button_print" onClick="window.print()" class="btn btn-danger text-white rounded-pill btn-sm" style="width: 150px;"><i class="bi bi-print"></i> Print</button>



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
