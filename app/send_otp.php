<?php
  ini_set('display_errors', '1');
  error_reporting(E_ALL);
?>
<?php include('../header.php'); ?>
<?php include_once('../includes/load.php'); ?>
<?php SET_LOGGED_IN(); ?>
<?php if (isset($_POST['button_submit'])) verify_otp_login("verification_code"); ?>
<main style="background-image:url('./images/background_3_1.jpg');">
  <div class="container">

    <section class="section  register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="card mb-3 rounded-0">

              <div class="card-body">

                <h5 class="card-title">OTP Verification</h5>
                <?php echo display_message($msg); ?>
                <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <p>We've e-mailed you a 6 digit code. Please check your e-mail and enter the OTP here to complete the verification</p>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> -->

                <form class="row g-3 needs-validation" action="", method="POST">

                  <div class="col-12">
                    <label for="yourOtp" class="form-label">Enter your OTP</label>
                    <div class="input-group has-validation">
                      <input class="form-control rounded-0" type="text"  name="verification_code" id="yourOtp" value="" required>
                      <span class="input-group-text">
                        <i class="bi bi-mailbox"></i>
                      </span>
                    </div>
                  </div>

                  <div class="col-4">
                    <button name ="button_submit" class="btn btn-success w-100 rounded-pill" type="submit">Submit</button>
                  </div>
                  <div class="col-8">
                    <h6><b><?php
                    if ($login_count == 0) {
                      echo '0';
                    } else {
                      echo display_log_count($login_count);
                    }
                    ?>/3
                  </b>
                  Login attempts <br/>remaining.</h6>
                  </div>

                  <div class="12">
                    <h6>Didn't receive the OPT? <a href="#" class="link-danger">Resend</a></h6>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- End #main -->

<?php include('../footer.php'); ?>
