<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php global $db; ?>
<?php if(isset($_POST['button_change'])) { 
  change_password_v2("new_password",
  "confirm_password",
  "image_path"); 
} ?>
<?php include('../start_menu_bar.php'); ?>

<main id="main" class="main">
  <div class="pagetitle">
  <h1>Account Settings</h1>
  </div><!-- End Page Title -->


<section class="section" style="width: 1560px;">
        <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
        <!-- start create account -->
        <div class="card rounded-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <br/>
                        <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Account Settings</h5>
                  <?php echo display_message($msg); ?>
                </div>

                <form action="" method="POST" class="row g-3" enctype="multipart/form-data">
                <?php $sql = "SELECT * FROM user_account WHERE email_address ='" .$_SESSION['key_session']['email_address']. "'";
                  $result = $db->query($sql);
                  if ($db->num_rows($result)) {
                    $image = $db->fetch_assoc($result);
                  }
                ?>
                <div class="col-12">
                  <div class="text-center">
                    <img id="ic_image_file" src="<?php echo $image['image']; ?>" alt="Profile" class="rounded-circle" style="height: 200px; width: 200px;">
                    <br/></br/>
                    <input id="ic_image_file_path" type="file" name="image_path" class="form-control btn btn-primary rounded-0 btn-sm w-50" ></input>
                  </div>
                </div>
                <hr/>
                  <div class="col-12">
                    <label for="yourNewPassword" class="form-label">New password</label>
                    <div class="input-group has-validation">
                      <input class="form-control new_password rounded-0" type="password" name="new_password" id="yourNewPassword" required>
                      <span class="input-group-text">
                        <i class="bi bi-eye-slash-fill" id="togglePassword" style="cursor: pointer"></i>
                      </span>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourConfirmPassword" class="form-label">Confirm password</label>
                    <div class="input-group has-validation">
                      <input class="form-control confirm_password rounded-0" type="password" name="confirm_password" id="yourConfirmPassword" required>
                      <span class="input-group-text">
                        <i class="bi bi-eye-slash-fill" id="toggleConfirmPassword" style="cursor: pointer"></i>
                      </span>
                    </div>
                  </div>

                  <div class="col-3">
                    
                  </div>
                  <div class="col-6">
                    <button name="button_change" class="btn btn-primary w-100 rounded-pill" type="submit">Change Password</button>
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

<script>
      function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();

              reader.onload = function (e) {
                  $('#ic_image_file').attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]);
          }
      }

      $("#ic_image_file_path").change(function(){
          readURL(this);
      });
  </script>

<?php include('../footer.php'); ?>
