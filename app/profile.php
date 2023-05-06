<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php $email_address = $_SESSION['key_session']['email_address']; ?>
<?php $user_profile = current_user_account("user_account", $email_address); ?>
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
                                <div class="border border-dark align-items-center text-center rounded-0 bg-light">
                                <br/>
                                <img id="ic_image_file" style="width:150px; height: 150px;" src="<?php echo $user_profile['image']; ?>" class="border border-secondary text-center">
                                    </br>
                                <br/>
                                </div>

                                <div class="border border-dark text-center rounded-0 bg-light">
                                    <label for="age" class="col-md-4 col-lg-3 col-form-label"><strong>Full name</strong></label>
                                    <div class="col-md-8 col-lg-12">
                                        <input name="semester" type="text" style="background-image: linear-gradient(#996666, #81613C);" class="form-control rounded-0 border-0 text-white text-center" value="<?php echo $_SESSION['key_session']['name']; ?>" readonly>
                                    </div>
                                 
                                    <label for="age" class="col-md-4 col-lg-3 col-form-label"><strong>Email address</strong></label>
                                    <div class="col-md-8 col-lg-12">
                                        <input name="semester" type="text" style="background-image: linear-gradient(#996666, #81613C);" class="form-control rounded-0 border-0 text-white text-center" value="<?php echo $_SESSION['key_session']['email_address']; ?>" readonly>
                                    </div>
                                </div>
                            <?php } elseif ($user_check_level == '3') { ?>
                                <div class="border border-dark align-items-center text-center rounded-0 bg-light">
                                <br/>
                                <img id="ic_image_file" style="width:150px; height: 150px;" src="<?php echo $user_profile['image']; ?>" class="border border-secondary text-center">
                                    </br>
                                <br/>
                                </div>

                                <div class="border border-dark text-center rounded-0 bg-light">
                                    <label for="age" class="col-md-4 col-lg-3 col-form-label"><strong>Full name</strong></label>
                                    <div class="col-md-8 col-lg-12">
                                        <input name="semester" type="text" style="background-image: linear-gradient(#996666, #81613C);" class="form-control rounded-0 border-0 text-white text-center" value="<?php echo $_SESSION['key_session']['name']; ?>" readonly>
                                    </div>
                                 
                                    <label for="age" class="col-md-4 col-lg-3 col-form-label"><strong>Email address</strong></label>
                                    <div class="col-md-8 col-lg-12">
                                        <input name="semester" type="text" style="background-image: linear-gradient(#996666, #81613C);" class="form-control rounded-0 border-0 text-white text-center" value="<?php echo $_SESSION['key_session']['email_address']; ?>" readonly>
                                    </div>
                                  
                                    <label for="age" class="col-md-4 col-lg-3 col-form-label"><strong>Student year</strong></label>
                                    <div class="col-md-8 col-lg-12">
                                        <input name="semester" type="text" style="background-image: linear-gradient(#996666, #81613C);" class="form-control rounded-0 border-0 text-white text-center" value="<?php echo $_SESSION['key_session']['student_year']; ?>" readonly>
                                    </div>
                                 
                                    <label for="age" class="col-md-4 col-lg-3 col-form-label"><strong>School year</strong></label>
                                    <div class="col-md-8 col-lg-12">
                                        <input name="semester" type="text" style="background-image: linear-gradient(#996666, #81613C);" class="form-control rounded-0 border-0 text-white text-center" value="<?php echo $_SESSION['key_session']['school_year']; ?>" readonly>
                                    </div>
                               
                                    <label for="age" class="col-md-4 col-lg-3 col-form-label"><strong>Semester</strong></label>
                                    <div class="col-md-8 col-lg-12">
                                        <input name="semester" type="text" style="background-image: linear-gradient(#996666, #81613C);" class="form-control rounded-0 border-0 text-white text-center" value="<?php echo $_SESSION['key_session']['semester']; ?>" readonly>
                                    </div>
                                    
                                    <label for="age" class="col-md-4 col-lg-3 col-form-label"><strong>Course</strong></label>
                                    <div class="col-md-8 col-lg-12">
                                        <input name="semester" type="text" style="background-image: linear-gradient(#996666, #81613C);" class="form-control rounded-0 border-0 text-white text-center" value="<?php echo $_SESSION['key_session']['course']; ?>" readonly>
                                    </div>
                                    
                                    <label for="age" class="col-md-4 col-lg-3 col-form-label"><strong>Gender</strong></label>
                                    <div class="col-md-8 col-lg-12">
                                        <input name="semester" type="text" style="background-image: linear-gradient(#996666, #81613C);" class="form-control rounded-0 border-0 text-white text-center" value="<?php echo $_SESSION['key_session']['gender']; ?>" readonly>
                                    </div>
                                    
                                    <label for="age" class="col-md-4 col-lg-3 col-form-label"><strong>Age</strong></label>
                                    <div class="col-md-8 col-lg-12">
                                        <input name="semester" type="text" style="background-image: linear-gradient(#996666, #81613C);" class="form-control rounded-0 border-0 text-white text-center" value="<?php echo $_SESSION['key_session']['age']; ?>" readonly>
                                    </div>
                                 
                                    <label for="age" class="col-md-4 col-lg-3 col-form-label"><strong>Birthday</strong></label>
                                    <div class="col-md-8 col-lg-12">
                                        <input name="semester" type="text" style="background-image: linear-gradient(#996666, #81613C);" class="form-control rounded-0 border-0 text-white text-center" value="<?php echo $_SESSION['key_session']['birth_date']; ?>" readonly>
                                    </div>
                               
                                    <label for="age" class="col-md-4 col-lg-3 col-form-label"><strong>Present Address</strong></label>
                                    <div class="col-md-8 col-lg-12">
                                        <input name="semester" type="text" style="background-image: linear-gradient(#996666, #81613C);" class="form-control rounded-0 border-0 text-white text-center" value="<?php echo $_SESSION['key_session']['present_address']; ?>" readonly>
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
