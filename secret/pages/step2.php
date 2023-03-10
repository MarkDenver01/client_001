<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $update_env_vars = $__DotEnvironment->update_env_variables($_POST);
  if($update_env_vars){
    echo "<script>location.href = './?step=3'</script>";
    exit;
  }
}
?>
<div class="container-fluid py-0">
  <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 mx-auto mt-3">
    <div class="card rounded-0">
      <div class="card-header rounded-0">
        <div class="card-title"><b>Site Installation (Step 2 out of 4)</b></div>
      </div>
      <div class="card-body">
        <div class="container-fluid">
          <h4 class="text-center"><b>Site Information</b></h4>
          <hr>
          <p>Please fill all the required fields below.</p>
          <form id="installation-form" action="" method="POST">
            <div class="mb-3">
              <label for="SITE_PORTAL">Site Portal <span class="text-danger">*</span></label>
              <input type="text" class="form-control rounded-0" id="SITE_PORTAL" name="SITE_PORTAL" required="required">
            </div>

            <div class="mb-3">
              <label for="SITE_TITLE">Site Title <span class="text-danger">*</span></label>
              <input type="text" class="form-control rounded-0" id="SITE_TITLE" name="SITE_TITLE" required="required">
            </div>

            <div class="mb-3">
              <label for="SITE_VERSION">Site Version <span class="text-danger">*</span></label>
              <input type="text" class="form-control rounded-0" id="SITE_VERSION" name="SITE_VERSION" required="required">
            </div>

            <div class="mb-3">
              <label for="SITE_URL">Site URL <span class="text-danger">*</span></label>
              <input type="text" class="form-control rounded-0" id="SITE_URL" name="SITE_URL" required="required">
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
