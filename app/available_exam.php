<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php include('../start_menu_bar.php'); ?>
<script type="text/javascript" >
   function preventBack(){window.history.forward();}
    setTimeout("preventBack()", 0);
    window.onunload=function(){null};
</script>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Guidance Online Examination</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html"><?php echo $_SESSION['key_session']['name']; ?></a></li>
          <li class="breadcrumb-item"><?php echo $_SESSION['key_session']['student_year']; ?></li>
          <li class="breadcrumb-item active"><?php echo $_SESSION['key_session']['course']; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">

        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <?php $selExamTimeLimit = "5"; ?>
              <h1 class="text-center">
                <form name="cd">
                  <input type="hidden" name="" id="timeExamLimit" value="<?php echo $selExamTimeLimit; ?>">
                          <h5 class="card-title">Remaining Time : </h5>
                          <input class="btn btn-outline-info btn-lg"  name="disp" type="text" class="clock" id="txt" value="00:00" size="5" readonly="true" disabled/>
                </form>
              </h1>
            </div>
          </div><!-- End Heading Badges -->
        </div>


        <!-- left -->
        <div class="col-sm-5">
          <div class="card">
            <div class="card-body">
            </div>
          </div>
        </div>

        <!-- center -->
        <div class="col-sm-7">
          <div class="card">
            <div class="card-body">
                <img id="ic_image_file" src="../uploads/exam/first_year/sample_1.png" class="d-block w-100">
            </div>
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->
<?php include('../footer.php'); ?>
