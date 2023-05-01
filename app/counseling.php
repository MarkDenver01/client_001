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
  <h1>Apply schedule for Counseling</h1>
  </div><!-- End Page Title -->


<section class="section" style="width: 1360px;">
        <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
        <!-- start create account -->
        <div class="card rounded-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pt-4 pb-2">
                  <?php global $session; ?>
                  <?php $session->message('d', '(ON-GOING)The page is not yet working. Please wait until it fix.'); ?>
                  <?php echo display_message($msg); ?>
                </div>

                <form action="" method="POST" class="row g-3 needs-validation" novalidate>

                  <div class="col-3"></div>
                  <div class="col-6">
                    <label for="yourNewPassword" class="form-label">Date of Counseling</label>
                    <div class="input-group has-validation">
                      <input class="form-control new_password rounded-0" type="date" name="new_password" id="yourNewPassword" required>
                    </div>
                  </div>
                  <div class="col-3"></div>

                  

                  <div class="col-3">
                    
                  </div>
                  <div class="col-6">
                    <button name="button_change" class="btn btn-primary w-100 rounded-0" type="submit">Apply</button>
                  </div>
                  <div class="col-3">
                  </div>
                </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end create account -->
        </div>
        <div class="col-lg-3"></div>
    
    </div>
</section>
<?php include('../footer.php'); ?>
