<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $server_smt_host = $_POST["SMTP_HOST"];
  $server_smtp_port = $_POST["SMTP_PORT"];
  $server_smtp_user_email = $_POST["SMTP_USER_MAIL"];
  $server_smtp_password = $_POST["SMTP_PASSWORD"];

  $update_en_vars = $__DotEnvironment->update_env_variables(
    [
      'SMTP_HOST' => $server_smt_host,
      'SMTP_PORT' => $server_smtp_port,
      'SMTP_USER_MAIL' => $server_smtp_user_email,
      'SMTP_PASSWORD' => secure::encrypt($server_smtp_password)
    ]
  );
  if($update_en_vars) {
    echo "<script>location.href = './?step=2'</script>";
    exit;
  }
}
?>
<div class="container-fluid py-0">
  <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 mx-auto mt-3">
    <div class="card rounded-0">
      <div class="card-header rounded-0">
        <div class="card-title"><b>Site Installation (Step 1 out of 4)</b></div>
      </div>
      <div class="card-body">
        <div class="container-fluid">
          <h4 class="text-center"><b>Setup SMTP Server</b></h4>
          <hr>
          <p>Please fill all the required fields below.</p>
          <form id="installation-form" action="" method="POST">
            <div class="mb-3">
              <label for="SMTP_HOST">SMTP Server <span class="text-danger">*</span></label>
              <input type="text" class="form-control rounded-0" id="SMTP_HOST" name="SMTP_HOST" required="required">
            </div>

            <div class="mb-3">
              <label for="SMTP_PORT">SMTP Port <span class="text-danger">*</span></label>
              <input type="number" class="form-control rounded-0" id="SMTP_PORT" name="SMTP_PORT" required="required">
            </div>

            <div class="mb-3">
              <label for="SMTP_USER_MAIL">SMTP User Mail <span class="text-danger">*</span></label>
              <input type="text" class="form-control rounded-0" id="SMTP_USER_MAIL" name="SMTP_USER_MAIL" required="required" autocomplete="off">
            </div>

            <div class="mb-3">
              <label for="SMTP_PASSWORD">SMTP Password <span class="text-danger">*</span></label>
              <input type="password" class="form-control rounded-0" id="SMTP_PASSWORD" name="SMTP_PASSWORD" required="required" autocomplete="off" encrypt>
            </div>
          </form>
        </div>
      </div>
      <div class="card-footer text-center">
        <button class="btn btn-primary w-50" type="submit" form="installation-form">Next</button>
      </div>
    </div>
  </div>
</div>
