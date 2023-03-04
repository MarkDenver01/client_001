<?php ob_start(); ?>
<?php include('../header.php'); ?>
<?php include_once('../includes/load.php'); ?>
<?php if($session->is_user_logging_in()) redirect('dashboard', false); ?>
<?php if (isset($_POST['button_login'])) login("email_address", "password"); ?>
<main style="background-image:url('./images/background_3.jpg');">
  <div class="container">

    <section class="section  register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">CESLICAM Login Portal</h5>
                  <p class="text-center small">Enter your account</p>
                  <?php echo display_message($msg); ?>
                </div>

                <form class="row g-3 needs-validation" method="POST" action="" novalidate>

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Email address</label>
                    <div class="input-group has-validation">
                      <input type="email" name="email_address" class="form-control" id="yourUsername" required>
                      <span class="input-group-text">
                        <i class="ri-account-circle-fill" id="toggleCurrentPassword" style="cursor: pointer"></i>
                      </span>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourConfirmPassword" class="form-label">Password</label>
                    <div class="input-group has-validation">
                      <input class="form-control confirm_password" type="password" name="password" id="yourConfirmPassword" value="secret!" required>
                      <span class="input-group-text">
                        <i class="bi bi-eye-slash-fill" id="toggleConfirmPassword" style="cursor: pointer"></i>
                      </span>
                    </div>
                  </div>

                  <div class="col-12">
                    <div style="text-align: center;">
                      <div class="g-recaptcha" data-sitekey="6LdYKV8kAAAAALtZhCV8btM-SNTqy9DBUaZnqj1h" style="display: inline-block;"></div>
                    </div>
                  </div>

                  <div class="col-12">
                    <button class="btn btn-primary w-100" name="button_login" type="submit">Login</button>
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
