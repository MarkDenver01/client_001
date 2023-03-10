<?php require_once('../lib/class.environment.php'); ?>
<?php
if($_ENV['SITE_INSTALLATION_COMPLETED'] == true){
  header('location:../app/dashboard');
  exit;
}
?>
<?php include('../header.php'); ?>
<main style="background-image:url('../app/images/background_3.jpg');" background-repeat="no-repeat” background-size="cover” >
  <div class="container" style="height:729px">

    <section class="section  register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
            <div class="card mb-3">
              <div class="card-body">
                <div align="center">
                  <br/>
                  <br/>
                  <br/>
                  <br/>
                  <br/>
                  <br/>
                  <br/>
                  <br/>
                  <br/>
                  <br/>
                  <br/>
                  <br/>
                  <br/>
                  <h1 style="font-family:georgia,garamond,serif;font-size:70px;font-style:bold;color:#df0cb1;">WEBSITE COMING SOON</h1>
                  <script class="64963bf7324a8e549646f01d580f0dbc" src="https://w.promofeatures.com/js/timer/64963bf7324a8e549646f01d580f0dbc.js?v=1677862939"></script>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- End #main -->

<?php include('../footer.php'); ?>
