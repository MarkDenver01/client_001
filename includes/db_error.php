<?php include('../header.php'); ?>
<main>
  <div class="container">

    <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">

      <!-- TODO: If already logged in, instead of returning to login page, it will go back to dashboard page -->
      <!-- then if not yet logged in, it will redirect to login page -->
      <lottie-player src="./assets/json/connection_error.json" background="transparent"  speed="1"  style="width: 1200px; height: 600px;" loop autoplay></lottie-player>
      <a class="btn" href="index">Back to home</a>
    </section>

  </div>
</main><!-- End #main -->
<?php include('../footer.php'); ?>
