<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php IS_STUDENT_LEVEL(); ?>
<?php CHECK_EXAM_AVAILABILITY(); ?>
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

    <section class="section profile" style="width: 1460px;">
      <div class="row">
      <?php 
          $student_year = $_SESSION['key_session']['student_year']; 
          $exam_id = $_GET['id'];
          $exam = start_exam_by_query($student_year, $exam_id); 
        ?>
        <?php $student = get_exam_query($_SESSION['key_session']['student_year'], $exam_id); ?>
        <div class="col-lg-12">
          <div class="card rounded-0 bg-white">
            <div class="card-body">
              <br/>
              <div class="border border-secondary text-center rounded-0 bg-light">
                <br/>
                <form name="cd">
                  <input type="hidden" name="" id="timeExamLimit" value="<?php echo $exam['exam_duration']; ?>">
                  <p class="text-uppercase text-success"> Time remaining </p>
                  <input type="text" name="disp" id="txt" class="btn btn-outline-danger rounded-pill clock" style="width: 250px;" value="00:00">
                </form>
                <br/>
                <div class="row">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4">
                    <button id="gameStart" name="button_start" class="btn btn-danger rounded-0 btn-sm w-50">RESET</button>             
                  </div>
                  <div class="col-sm-4"></div>
                </div>
                <hr/>
                <div class="row">
                  <div class="col-lg-1"></div>
                  <div class="col-lg-5">

                    <label for="yourConfirmPassword" class="form-label text-left">Student Year Level</label>
                    <div class="input-group has-validation">
                      <input class="form-control confirm_password rounded-0" type="text" name="confirm_password" id="yourConfirmPassword" value="<?php echo $student['student_year']; ?>" readonly>
                      <span class="input-group-text">
                        <i class="ri-align-top" id="toggleConfirmPassword" style="cursor: pointer"></i>
                      </span>
                    </div>
                    <br/>
                    <label for="yourConfirmPassword" class="form-label text-left">Exam Type</label>
                    <div class="input-group has-validation">
                      <input class="form-control confirm_password rounded-0" type="text" name="confirm_password" id="yourConfirmPassword" value="<?php echo $student['exam_title']; ?>" readonly>
                      <span class="input-group-text">
                        <i class="ri-align-justify" id="toggleConfirmPassword" style="cursor: pointer"></i>
                      </span>
                    </div>

                  </div>
                  <div class="col-lg-5">

                   <label for="yourConfirmPassword" class="form-label text-left">Exam Description</label>
                    <div class="input-group has-validation">
                      <input class="form-control confirm_password rounded-0" type="text" name="confirm_password" id="yourConfirmPassword" value="<?php echo $student['exam_description']; ?>" readonly>
                      <span class="input-group-text">
                        <i class="ri-sticky-note-fill" id="toggleConfirmPassword" style="cursor: pointer"></i>
                      </span>
                    </div>
                    <br/>
                    <label for="yourConfirmPassword" class="form-label text-left">Exam Category</label>
                    <div class="input-group has-validation">
                      <input class="form-control confirm_password rounded-0" type="text" name="confirm_password" id="yourConfirmPassword" value="<?php echo $student['exam_category']; ?>" readonly>
                      <span class="input-group-text">
                        <i class="ri-twitch-line" id="toggleConfirmPassword" style="cursor: pointer"></i>
                      </span>
                    </div>

                  </div>
                  <div class="col-lg-1"></div>
                </div>
                <br/>
              </div>
            </div>
          </div><!-- End Heading Badges -->
        </div>


        <!-- center -->

        <div class="col-sm-7">
          <div class="card rounded-0">
            <div class="card-body">
              <div class="row">
                <?php 
                  $result = fetch_exam_created(
                    $_SESSION['key_session']['student_year'], 
                    $_SESSION['key_session']['semester'],
                    $_SESSION['key_session']['school_year'],
                    $student['exam_title'],
                    $student['exam_description'],
                    $student['exam_category']
                  );
                ?>
                <div class="col-lg-12">
                  <br/>
                  <table class="table table-bordered mb-5">
                    <tbody>
                        <?php foreach($result as $display): ?>
                        <th scope="row" value="<?php echo $result['id']; ?>" hidden>
                        <tr>
                          <img id="ic_image_file" style="width:800px; height: 960px;" src="<?php echo $display['image_exam_path']; ?>" class="d-block w-100 border border-secondary">
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-5">
          <div class="card rounded-0">
            <div class="card-body">
                <br/>
                <div class="text-center"><h4>Answer Sheet (<?php echo $student['exam_category']; ?>)</h4></div>
                <hr/>
                <div class="row mb-3">

                  <div class="col-lg-6">
                    <label for="inputNanme4" class="form-label">1.</label>
                      <div id="file2" class="btn-group" data-toggle="buttons" >
                        <label class="btn btn-light">
                          <input type="radio" name="1_5" /> 5
                        </label>
                        <label class="btn btn-light">
                            <input type="radio" name="1_4" /> 4
                        </label>  
                        <label class="btn btn-light">
                            <input type="radio" name="1_3" /> 3
                        </label>  
                        <label class="btn btn-light">
                            <input type="radio" name="1_2" /> 2
                        </label>  
                        <label class="btn btn-light">
                            <input type="radio" name="1_1" /> 1
                        </label>  
                      </div>
                  </div>
                  <div class="col-lg-6">
                    <label for="inputNanme4" class="form-label">2.</label>
                      <div id="file2" class="btn-group" data-toggle="buttons" >
                        <label class="btn btn-light">
                          <input type="radio" name="2_5" /> 5
                        </label>
                        <label class="btn btn-light">
                            <input type="radio" name="2_4" /> 4
                        </label>  
                        <label class="btn btn-light">
                            <input type="radio" name="2_3" /> 3
                        </label>  
                        <label class="btn btn-light">
                            <input type="radio" name="2_2" /> 2
                        </label>  
                        <label class="btn btn-light">
                            <input type="radio" name="2_1" /> 1
                        </label>  
                      </div>
                  </div>

                </div>

                <hr/>
                <div class="row mb-3">

                  <div class="col-lg-6">
                    <label for="inputNanme4" class="form-label">3.</label>
                      <div id="file2" class="btn-group" data-toggle="buttons" >
                        <label class="btn btn-light">
                          <input type="radio" name="1_5" /> 5
                        </label>
                        <label class="btn btn-light">
                            <input type="radio" name="1_4" /> 4
                        </label>  
                        <label class="btn btn-light">
                            <input type="radio" name="1_3" /> 3
                        </label>  
                        <label class="btn btn-light">
                            <input type="radio" name="1_2" /> 2
                        </label>  
                        <label class="btn btn-light">
                            <input type="radio" name="1_1" /> 1
                        </label>  
                      </div>
                  </div>
                  <div class="col-lg-6">
                    <label for="inputNanme4" class="form-label">4.</label>
                      <div id="file2" class="btn-group" data-toggle="buttons" >
                        <label class="btn btn-light">
                          <input type="radio" name="2_5" /> 5
                        </label>
                        <label class="btn btn-light">
                            <input type="radio" name="2_4" /> 4
                        </label>  
                        <label class="btn btn-light">
                            <input type="radio" name="2_3" /> 3
                        </label>  
                        <label class="btn btn-light">
                            <input type="radio" name="2_2" /> 2
                        </label>  
                        <label class="btn btn-light">
                            <input type="radio" name="2_1" /> 1
                        </label>  
                      </div>
                  </div>

                </div>

                <hr/>
                <div class="row mb-3">

                  <div class="col-lg-6">
                    <label for="inputNanme4" class="form-label">5.</label>
                      <div id="file2" class="btn-group" data-toggle="buttons" >
                        <label class="btn btn-light">
                          <input type="radio" name="1_5" /> 5
                        </label>
                        <label class="btn btn-light">
                            <input type="radio" name="1_4" /> 4
                        </label>  
                        <label class="btn btn-light">
                            <input type="radio" name="1_3" /> 3
                        </label>  
                        <label class="btn btn-light">
                            <input type="radio" name="1_2" /> 2
                        </label>  
                        <label class="btn btn-light">
                            <input type="radio" name="1_1" /> 1
                        </label>  
                      </div>
                  </div>
                  <div class="col-lg-6">
                    <label for="inputNanme4" class="form-label">6.</label>
                      <div id="file2" class="btn-group" data-toggle="buttons" >
                        <label class="btn btn-light">
                          <input type="radio" name="2_5" /> 5
                        </label>
                        <label class="btn btn-light">
                            <input type="radio" name="2_4" /> 4
                        </label>  
                        <label class="btn btn-light">
                            <input type="radio" name="2_3" /> 3
                        </label>  
                        <label class="btn btn-light">
                            <input type="radio" name="2_2" /> 2
                        </label>  
                        <label class="btn btn-light">
                            <input type="radio" name="2_1" /> 1
                        </label>  
                      </div>
                  </div>

                </div>

                <hr/>
                <div class="row mb-3">

                  <div class="col-lg-6">
                    <label for="inputNanme4" class="form-label">7.</label>
                      <div id="file2" class="btn-group" data-toggle="buttons" >
                        <label class="btn btn-light">
                          <input type="radio" name="1_5" /> 5
                        </label>
                        <label class="btn btn-light">
                            <input type="radio" name="1_4" /> 4
                        </label>  
                        <label class="btn btn-light">
                            <input type="radio" name="1_3" /> 3
                        </label>  
                        <label class="btn btn-light">
                            <input type="radio" name="1_2" /> 2
                        </label>  
                        <label class="btn btn-light">
                            <input type="radio" name="1_1" /> 1
                        </label>  
                      </div>
                  </div>
                  <div class="col-lg-6">
                    <label for="inputNanme4" class="form-label">8.</label>
                      <div id="file2" class="btn-group" data-toggle="buttons" >
                        <label class="btn btn-light">
                          <input type="radio" name="2_5" /> 5
                        </label>
                        <label class="btn btn-light">
                            <input type="radio" name="2_4" /> 4
                        </label>  
                        <label class="btn btn-light">
                            <input type="radio" name="2_3" /> 3
                        </label>  
                        <label class="btn btn-light">
                            <input type="radio" name="2_2" /> 2
                        </label>  
                        <label class="btn btn-light">
                            <input type="radio" name="2_1" /> 1
                        </label>  
                      </div>
                  </div>

                </div>
                <hr/>
                <div class="text-center">
                  <button name="button_exam" type="submit" class="btn btn-primary btn-sm rounded-0 w-25">Next</button>
                </div>

            </div>  
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->

<!-- <script>
  document.getElementById("gameStart").addEventListener("click", function(){
    var timeleft = 60;

    var downloadTimer = setInterval(function function1(){
    document.getElementById("countdown").innerHTML = timeleft + 
    "&nbsp"+"seconds remaining";

    timeleft -= 1;
    if(timeleft <= 0){
        clearInterval(downloadTimer);
        document.getElementById("countdown").innerHTML = "Time is up!"
    }
    }, 1000);

    console.log(countdown);
});
</script>
<script>
        $(document).ready(function () {
            $('#records-limit').change(function () {
                $('form').submit();
            })
        });
</script> -->
<?php include('../footer.php'); ?>
