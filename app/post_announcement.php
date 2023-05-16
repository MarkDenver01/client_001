<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php IS_HIGHER_LEVEL(); ?>
<?php $id = $_GET['id']; ?>
<?php
  if (isset($_SESSION['key_session']['email_address'])) {
    if (isset($_POST['button_submit'])) {
      post_announcements(
        "title",
        "body_message",
        "image_path"
      );
    }
  }
?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php include('../start_menu_bar.php'); ?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Post Announcement </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Announcement</a></li>
          <li class="breadcrumb-item">Post by Guidance</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-12">
          <div class="card rounded-0">
          <div class="card-body">
            <?php
              $announcement = find_announcement($id);
            ?>
            <h5 class="card-title">Post an announcement</h5>
            <?php echo display_message($msg); ?>
            <!-- Floating Labels Form -->
              <form class="row g-3" action="", method="POST" enctype="multipart/form-data">
                <div class="col-md-12">
                  <div class="form-floating">
                    <input name="title" type="text" class="form-control rounded-0" id="floatingName" placeholder="Your title" value="<?php echo $announcement['title']; ?>">
                    <label for="floatingName">Title</label>
                  </div>
                </div>
                <div class="col-12">
                   <textarea id="summernote" name="body_message" class="form-control rounded-0" placeholder="Your announcement" id="floatingTextarea" style="height: 100px;" ><?php echo $announcement['body_message']; ?></textarea>
                </div>
                <div class="col-md-6">
                  <label for="ic_image_file_path">Attached Files</label>
                  <input id="ic_image_file_path" type="file" name="image_path" class="form-control btn btn-primary rounded-0 btn-sm" value="<?php echo $announcement['attached_file_path']; ?>"></input>
                </div>

                <div class="text-left">
                  <button name="button_submit" type="submit" class="btn btn-primary rounded-0">Submit</button>
                </div>
              </form><!-- End floating Labels Form -->

          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

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
  <script>
    $(document).ready(function() {
      $('#summernote').summernote();
    });
  </script>
<?php include('../footer.php'); ?>
