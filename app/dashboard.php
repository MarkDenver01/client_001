<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>

<?php include('../start_menu_bar.php'); ?>
<?php global $db; ?>
<?php global $session; ?>
<?php $developer = false; ?>
<?php 
if($developer) {
  if(isset($_POST['developer_button'])) {
    $sql1 = $db->query("TRUNCATE TABLE examinee");
    $sql2= $db->query("TRUNCATE TABLE examinee_answer_v2");
    $sql3 = $db->query("TRUNCATE TABLE examinee_attempt");
    $sql4 = $db->query("TRUNCATE TABLE counseling_appointment");
    $sql5 = $db->query("TRUNCATE TABLE exam_created");
    $session->message('s', 'DBs Truncated...');
  }
}
?>
<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-lg-12">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
      </div>
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-12">
            <div style="background-image: linear-gradient(#90caf9, #64b5f6);"class="alert alert-primary alert-dismissible fade show text-left rounded-pill text-white border-light text-center" role="alert" style="height:50px;">
              <b>SEMESTER: &nbsp;&nbsp;</b><?php echo $_SESSION['key_session']['academic_semester']; ?><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SCHOOL YEAR: &nbsp;&nbsp;</b><?php echo $_SESSION['key_session']['academic_school_year']; ?>
            </div>
          </div>
        </div>
      </div>
    
    </div>
  </div><!-- End Page Title -->

  <section class="section dashboard">
   <?php if (isset($_SESSION['key_session']['user_level']) && ($_SESSION['key_session']['user_level'] == '1' || $_SESSION['key_session']['user_level'] == '2')) { ?>
    <?php include('./a_g_dashboard.php'); ?>
   <?php } else { ?>
    <?php include('./s_dashboard.php'); ?>
   <?php } ?>
  
   <!-- Right side columns -->
  <?php include('../end_menu_bar.php'); ?>

<script>
		function printContent() {
			var content = document.getElementById("print_content");
      var button_print = document.getElementById("button_print");
      var announement = document.getElementById("announcement");
      var header = document.getElementById("header");

      header.style.visibility = 'hidden';
      button_print.style.visibility = 'hidden';
      announcement.style.visibility = 'hidden';
			window.print(content);
      header.style.visibility = 'visible';
      button_print.style.visibility = 'visible';
      announcement.style.visibility = 'visible';
		}
	</script>
<?php include('../footer.php'); ?>
