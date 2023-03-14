<?php include_once('../includes/load.php'); ?>
<?php SET_LOGGED_IN(); ?>
<?php include('../header.php'); ?>
<?php if(isset($_POST['button_change'])) change_password(
  "new_password",
  "confirm_password"); ?>
<main style="background-image:url('./images/background_3.jpg');">
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="card mb-3">
              <div class="card-body">
                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Change your password</h5>
                  <?php echo display_message($msg); ?>
                </div>

                <form action="" method="POST" class="row g-3 needs-validation" novalidate>

                  <div class="col-12">
                    <label for="yourNewPassword" class="form-label">New password</label>
                    <div class="input-group has-validation">
                      <input class="form-control new_password" type="password" name="new_password" id="yourNewPassword" required>
                      <span class="input-group-text">
                        <i class="bi bi-eye-slash-fill" id="togglePassword" style="cursor: pointer"></i>
                      </span>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourConfirmPassword" class="form-label">Confirm password</label>
                    <div class="input-group has-validation">
                      <input class="form-control confirm_password" type="password" name="confirm_password" id="yourConfirmPassword" required>
                      <span class="input-group-text">
                        <i class="bi bi-eye-slash-fill" id="toggleConfirmPassword" style="cursor: pointer"></i>
                      </span>
                    </div>
                  </div>

                  <div class="col-6">
                    <button name="button_change" class="btn btn-primary w-100" type="submit">Change Password</button>
                  </div>
                  <div class="col-6">
                    <button class="btn btn-danger w-100" type="submit">Back</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- E    nd #main -->

<?php include('../footer.php'); ?>
