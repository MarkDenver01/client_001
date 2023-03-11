<?php
global $session;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  extract($_POST);
  if($password !== $c_password){
    $error = 'Password does not match.';

  }else{
    $conn = false;
    // ob_start();
    $conn = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
    if ($conn->connect_error) {
      $error = 'Unable to connect to the database.';
    }

    if(!$conn){
      $error = "Given Database Credentials is incorrect";
    }else{
      // $insert_sql
      $encrypted_pasword = sha1($password);
      $name = $conn->real_escape_string($name);
      $email = $conn->real_escape_string($email);
      $last_login = date("d F Y, h:i:s A");
      $default_image = "./app/assets/img/profile.png";
      $sql_1 = "INSERT INTO `user_account` (`name`, `email_address`, `password`, `user_level`, `image`, `status`, `is_logged_in`, `last_login`)
       VALUES ('{$name}', '{$email}', '{$encrypted_pasword}','1','{$default_image}','1','1','{$last_login}')";
      $insert_1 = $conn->query($sql_1);

      $sql_2 = "INSERT INTO `user_groups` (`email_address`, `user_types`, `user_level`, `user_status`)
      VALUES('{$email}', 'Admin','1','1')";
      $insert_2 = $conn->query($sql_2);

      if(!$insert_1 && !$insert_2){
        $error = "Admin user details has failed to create. Error: ". $conn->error;
      }else{
        $conn->close();
        $update_env_vars = $__DotEnvironment->update_env_variables(['SITE_INSTALLATION_COMPLETED' => 'true']);
        $extra = $__DotEnvironment->update_env_variables(['SUPER_USER' => 'true']);
        $session->login(1); // first account that stored to the database
         // optional
        if($update_env_vars){
          echo "<script>location.href = './?step=installation_complete'</script>";
          exit;
        }
      }
      $conn->close();
    }
  }


}
?>
<div class="container-fluid py-0">
  <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 mx-auto mt-3">
    <div class="card rounded-0">
      <div class="card-header rounded-0">
        <div class="card-title"><b>Site Installation (Step 4 out of 4)</b></div>
      </div>
      <div class="card-body">
        <div class="container-fluid">
          <h4 class="text-center"><b>Creating an Admin User</b></h4>
          <hr>
          <p>Please fill all the required fields below.</p>
          <?php if(isset($error) && !empty($error)): ?>
            <div class="alert alert-danger">
              <?= $error ?>
            </div>
          <?php endif; ?>
          <form id="installation-form" action="" method="POST">
            <div class="mb-3">
              <label for="name">Name<span class="text-danger">*</span></label>
              <input type="text" class="form-control rounded-0" id="name" value="<?= isset($_POST['name']) ? $_POST['name'] : "" ?>" name="name" required="required">
            </div>
            <div class="mb-3">
              <label for="email">Email <span class="text-danger">*</span></label>
              <input type="text" class="form-control rounded-0" id="email" value="<?= isset($_POST['email']) ? $_POST['email'] : "" ?>" name="email" required="required">
            </div>
            <div class="mb-3">
              <label for="password">Password <span class="text-danger">*</span></label>
              <input type="password" class="form-control rounded-0" id="password" name="password" required>
            </div>

            <div class="mb-3">
              <label for="c_password">Confirm Password <span class="text-danger">*</span></label>
              <input type="password" class="form-control rounded-0" id="c_password" name="c_password" required>
            </div>
          </form>
        </div>
      </div>
      <div class="card-footer text-center">
        <button class="btn btn-primary w-50" type="submit" form="installation-form">Proceed</button>
      </div>
    </div>
  </div>
</div>
