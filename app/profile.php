<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>

<?php include('../start_menu_bar.php'); ?>

<main id="main" class="main">
  <div class="pagetitle">
  <h1>My Profile</h1>
  </div><!-- End Page Title -->


<section class="section" style="width: 1560px;">
        <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
        <!-- start create account -->
        <div class="card rounded-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <br/>
                        <?php
                            $user_check_level = $_SESSION['key_session']['user_level'];
                            if ($user_check_level == '2') {
                            ?>
                                <div class="border border-success text-center rounded-0 bg-light">
                                    <label for="age" class="col-md-4 col-lg-3 col-form-label">Name</label>
                                    <div class="col-md-8 col-lg-12">
                                        <input name="semester" type="text" class="form-control rounded-0" value="<?php echo $_SESSION['key_session']['name']; ?>" readonly>
                                    </div>
                                    <br/>
                                    <label for="age" class="col-md-4 col-lg-3 col-form-label">Email address</label>
                                    <div class="col-md-8 col-lg-12">
                                        <input name="semester" type="text" class="form-control rounded-0" value="<?php echo $_SESSION['key_session']['email_address']; ?>" readonly>
                                    </div>
                                </div>
                            <?php
                             } elseif ($user_check_level == '3') {
                            ?>
                                <div class="border border-danger text-center rounded-0 bg-light">
                                    <label for="age" class="col-md-4 col-lg-3 col-form-label">Name</label>
                                    <div class="col-md-8 col-lg-12">
                                        <input name="semester" type="text" style="background-image: linear-gradient(#d9534f, #AB274F);" class="form-control rounded-0 border-0 text-white text-center" value="<?php echo $_SESSION['key_session']['name']; ?>" readonly>
                                    </div>
                                 
                                    <label for="age" class="col-md-4 col-lg-3 col-form-label">Email address</label>
                                    <div class="col-md-8 col-lg-12">
                                        <input name="semester" type="text" style="background-image: linear-gradient(#d9534f, #AB274F);" class="form-control rounded-0 border-0 text-white text-center" value="<?php echo $_SESSION['key_session']['email_address']; ?>" readonly>
                                    </div>
                                  
                                    <label for="age" class="col-md-4 col-lg-3 col-form-label">Student year</label>
                                    <div class="col-md-8 col-lg-12">
                                        <input name="semester" type="text" style="background-image: linear-gradient(#d9534f, #AB274F);" class="form-control rounded-0 border-0 text-white text-center" value="<?php echo $_SESSION['key_session']['student_year']; ?>" readonly>
                                    </div>
                                 
                                    <label for="age" class="col-md-4 col-lg-3 col-form-label">School year</label>
                                    <div class="col-md-8 col-lg-12">
                                        <input name="semester" type="text" style="background-image: linear-gradient(#d9534f, #AB274F);" class="form-control rounded-0 border-0 text-white text-center" value="<?php echo $_SESSION['key_session']['school_year']; ?>" readonly>
                                    </div>
                               
                                    <label for="age" class="col-md-4 col-lg-3 col-form-label">Semester</label>
                                    <div class="col-md-8 col-lg-12">
                                        <input name="semester" type="text" style="background-image: linear-gradient(#d9534f, #AB274F);" class="form-control rounded-0 border-0 text-white text-center" value="<?php echo $_SESSION['key_session']['semester']; ?>" readonly>
                                    </div>
                                    
                                    <label for="age" class="col-md-4 col-lg-3 col-form-label">Course</label>
                                    <div class="col-md-8 col-lg-12">
                                        <input name="semester" type="text" style="background-image: linear-gradient(#d9534f, #AB274F);" class="form-control rounded-0 border-0 text-white text-center" value="<?php echo $_SESSION['key_session']['course']; ?>" readonly>
                                    </div>
                                    
                                    <label for="age" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                                    <div class="col-md-8 col-lg-12">
                                        <input name="semester" type="text" style="background-image: linear-gradient(#d9534f, #AB274F);" class="form-control rounded-0 border-0 text-white text-center" value="<?php echo $_SESSION['key_session']['gender']; ?>" readonly>
                                    </div>
                                    
                                    <label for="age" class="col-md-4 col-lg-3 col-form-label">Age</label>
                                    <div class="col-md-8 col-lg-12">
                                        <input name="semester" type="text" style="background-image: linear-gradient(#d9534f, #AB274F);" class="form-control rounded-0 border-0 text-white text-center" value="<?php echo $_SESSION['key_session']['age']; ?>" readonly>
                                    </div>
                                 
                                    <label for="age" class="col-md-4 col-lg-3 col-form-label">Birthday</label>
                                    <div class="col-md-8 col-lg-12">
                                        <input name="semester" type="text" style="background-image: linear-gradient(#d9534f, #AB274F);" class="form-control rounded-0 border-0 text-white text-center" value="<?php echo $_SESSION['key_session']['birth_date']; ?>" readonly>
                                    </div>
                               
                                    <label for="age" class="col-md-4 col-lg-3 col-form-label">Present Address</label>
                                    <div class="col-md-8 col-lg-12">
                                        <input name="semester" type="text" style="background-image: linear-gradient(#d9534f, #AB274F);" class="form-control rounded-0 border-0 text-white text-center" value="<?php echo $_SESSION['key_session']['present_address']; ?>" readonly>
                                    </div>
                                </div>
                            <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- end create account -->
        </div>
        <div class="col-lg-3"></div>
    
    </div>
</section>
<?php include('../footer.php'); ?>
