<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php header("Refresh: 30"); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php onClickButton("button_create", "./register_guidance_account"); ?>
<?php include('../start_menu_bar.php'); ?>

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Guidance Information</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Profiling</a></li>
        <li class="breadcrumb-item active">View guidance information</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->


<section class="section" style="width: 1260px;">
    <div class="row">
      <!-- start create account -->
      <div class="card rounded-0 bg-light">
        <div class="card-body">
          <h5 class="card-title">View guidance & Account information</h5>

          <!-- General Form Elements -->
          <form class="row g-3" method="POST" action="">
            <div class="col-md-12">
              <div class="card rounded-0">
                <div class="card-body">
                  <!-- Table with hoverable rows -->
                  <table class="table table-sm table-hover datatable">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center" style="width: 15%;">Name</th>
                        <th scope="col" class="text-center" style="width: 5%;">Email address</th>
                        <th scope="col" class="text-center" style="width: 50px;">Age</th>
                        <th scope="col" class="text-center" style="width: 50px;">Gender</th>
                        <th scope="col" class="text-center" style="width: 15%;">Birthday</th>
                        <th scope="col" class="text-center" style="width: 15%;">Address</th>
                        <th scope="col" class="text-center" style="width: 15%;">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $guidance = find_by_guidance(); ?>
                      <?php foreach($guidance as $info): ?>
                      <tr>
                        <td id="<?php echo remove_junk($info['id']); ?>" scope="row" class="text-center" style="width: 5%;" hidden>
                        <th data-target="name" scope="row" class="text-center" style="width: 15%;"><?php echo remove_junk($info['name']); ?></th>
                        <td class="text-center" style="width: 5%;"><?php echo remove_junk($info['email_address']); ?></td>
                        <td class="text-center" style="width: 5%;"><?php echo remove_junk($info['age']); ?></td>
                        <td class="text-center" style="width: 5%;"><?php echo remove_junk($info['gender']); ?></td>
                        <td class="text-center" style="width: 10%;"><?php echo remove_junk($info['birth_date']); ?></td>
                        <td class="text-center" style="width: 10%;"><?php echo remove_junk($info['present_address']); ?></td>
                        <td class="text-center" style="width: 15%;">
                          <button type="button" name="button_edit" class="btn btn-primary rounded-pill btn-sm w-25"  data-bs-toggle="modal" data-bs-target="#ExtralargeModal<?php echo $info['id']; ?>"><span></span>Edit</button>
                          <a href="../includes/delete_account?email_address=<?php echo secure::encrypt(remove_junk($info['email_address'])); ?>" type="button" class="btn btn-danger rounded-pill btn-sm">Delete</button>
                        </td>
                      </tr>
                      <?php include('./update_guidance_account.php'); ?>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                  <!-- End Table with hoverable rows -->


                </div>
              </div>


            </div>

            <div class="text-center">
              <button type="submit" name="button_create" class="btn btn-success rounded-0 w-25" >Create new account</button>
            </div>
          </form><!-- End floating Labels Form -->
          <!-- End General Form Elements -->

        </div>
      </div>
      <!-- end create account -->
    </div>
</section>
<?php include('../footer.php'); ?>
