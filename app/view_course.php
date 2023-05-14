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
    <h1>Manage Course</h1>
  </div><!-- End Page Title -->


<section class="section" style="width: 1360px;">
    <div class="row">
      <!-- start create account -->
      <div class="card rounded-0 bg-light">
        <div class="card-body">
          <h5 class="card-title">View Course</h5>

          <!-- General Form Elements -->
          <form class="row g-3" method="POST" action="">
            <div class="col-lg-12 ">
              <div class="card rounded-0">
                <div class="card-body">
                  <!-- Table with hoverable rows -->
                  <table class="table table-sm table-hover datatable text-nowrap">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center" >Course</th>
                        <th scope="col" class="text-center" >Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $sql = $db->query("SELECT * FROM course_tbl ORDER BY id DESC"); ?>
                      <?php if($sql->num_rows > 0) {?>
                      <?php while($row = $sql->fetch_assoc()) { ?>

                      <tr>
                      <th data-target="name" scope="row" class="text-center" hidden><?php echo remove_junk($row['id']); ?></th>
                        <th data-target="name" scope="row" class="text-center"><?php echo remove_junk($row['course']); ?></th>
                        <td data-target="name" class="text-center" scope="row">
                            <a href="./add_course?id=<?php echo $row['id']; ?>" type="submit" class="btn text-white rounded-pill btn-sm w-100" style="background-image: linear-gradient(#4B6F44, #006B3C);"><i class="bi bi-print"></i> Edit</a>
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
