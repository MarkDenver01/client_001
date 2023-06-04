<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php IS_HIGHER_LEVEL(); ?>
<?php onClickButton("button_create", "./register_student_account"); ?>
<?php include('../start_menu_bar.php'); ?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Login History </h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Login</a></li>
        <li class="breadcrumb-item active">History</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


<section class="section" style="width: 1760px;">
    <div class="row">
      <!-- start create account -->
      <div class="card rounded-0 bg-light">
        <div class="card-body" id="print_content">
          <h5 class="card-title">View Login History</h5>

          <!-- General Form Elements -->
          <form class="row g-3" method="POST" action="">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-2">
                    <label for="birth_date" class="col-md-12 col-lg-12 col-form-label">Date From</label>
                     <div class="col-md-8 col-lg-12">
                        <input name="date_from" type="date" class="form-control rounded-0" id="birth_date">
                      </div>
                </div>
                <div class="col-lg-2">
                    <label for="birth_date" class="col-md-12 col-lg-12 col-form-label">Date To</label>
                     <div class="col-md-8 col-lg-12">
                        <input name="date_to" type="date" class="form-control rounded-0" id="birth_date">
                      </div>
                </div>
              </div>
              <div class="col-lg-8"></div>
              <br/>
              <div class="col-lg-4">
                <button name="button_filter" type="submit" class="btn btn-secondary text-white rounded-pill btn-sm w-100"><i class="bi bi-search"></i> </button>
              </div>
              <div class="col-lg-8"></div>
            </div>
            <br/>
            <div class="col-lg-12 ">
              <div class="card rounded-0">
                <div class="card-body">
                  <!-- Table with hoverable rows -->
                  <table class="table table-sm table-hover datatable text-nowrap">
                    <thead>
                      <tr>
                      <th scope="col" class="text-center"  hidden>Account Id</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Email address</th>
                        <th scope="col" class="text-center">User Level</th>
                        <th scope="col" class="text-center">User Status</th>
                        <th scope="col" class="text-center">Last Login</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                          if (isset($_POST['button_filter'])) {
                            $date_from = $_POST['date_from'];
                            $date_to = $_POST['date_to'];

                            $date_from_format = date('Y-m-d H:m:s', strtotime($date_from));
                            $date_to_format = date('Y-m-d H:m:s', strtotime($date_to));

                            $login_logs = filter_login_logs_by_date(
                              $date_from_format,
                              $date_to_format
                            );

                      foreach ($login_logs as $login_log) { ?>
                      <tr>
                        <td id="<?php echo remove_junk($filtered['id']); ?>" scope="row" class="text-center"hidden>
                        <th data-target="name" scope="row" class="text-center text-danger" hidden><?php echo $login_log['account_id']; ?></th>
                        <th data-target="name" scope="row" class="text-center text-danger"><?php echo remove_junk($login_log['name']); ?></th>
                        <td class="text-center" ><?php echo remove_junk($login_log['email_address']); ?></td>
                        <td class="text-center" ><?php echo remove_junk($login_log['user_level']); ?></td>
                        <td class="text-center" ><?php echo remove_junk($login_log['user_status']); ?></td>
                        <td class="text-center" ><?php echo remove_junk($login_log['last_login']); ?></td>
                      </tr>
                      <?php }
                       } else { ?>
                      <?php $login_logs = filter_login_logs(); ?>
                      <?php foreach($login_logs as $login_log): ?>
                      <tr>
                      <td id="<?php echo remove_junk($filtered['id']); ?>" scope="row" class="text-center"hidden>
                        <th data-target="name" scope="row" class="text-center text-danger" hidden><?php echo $login_log['account_id']; ?></th>
                        <th data-target="name" scope="row" class="text-center text-danger"><?php echo remove_junk($login_log['name']); ?></th>
                        <td class="text-center" ><?php echo remove_junk($login_log['email_address']); ?></td>
                        <td class="text-center" ><?php echo remove_junk($login_log['user_level']); ?></td>
                        <td class="text-center" ><?php echo remove_junk($login_log['user_status']); ?></td>
                        <td class="text-center" ><?php echo remove_junk($login_log['last_login']); ?></td>
                      </tr>
                      <?php endforeach; ?>
                      <?php } ?>
                    </tbody>
                  </table>
                  <input type="text" value="<?php echo $date_from_format; ?>" hidden>
                  <!-- End Table with hoverable rows -->
                  <button id="button_print" name="button_print" onClick="printContent()" class="btn btn-danger text-white rounded-pill btn-sm" style="width: 150px;"><i class="bi bi-print"></i> Print</button>
                </div>
              </div>


            </div>
          </form><!-- End floating Labels Form -->
          <!-- End General Form Elements -->

        </div>
      </div>
      <!-- end create account -->
    </div>
</section>

<script>
		function printContent() {
			var content = document.getElementById("print_content");
      var button_print = document.getElementById("button_print");
      var header = document.getElementById("header");

      header.style.visibility = 'hidden';
      button_print.style.visibility = 'hidden';
			window.print(content);
      header.style.visibility = 'visible';
      button_print.style.visibility = 'visible';
		}
	</script>
<?php include('../footer.php'); ?>
