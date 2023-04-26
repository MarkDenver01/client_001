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
                <form action="POST" id="submitAnswerFrm">
                  <input type="hidden" name="exam_id" id="exam_id" value="<?php echo $exam_id; ?>">
                  <input type="hidden" name="examAction" id="examAction" >

                  <div class="row mb-3">
                    <div class="col-lg-12">

                      <table class="table table-hover text-nowrap ">
                        <tbody>
                          <tr>
                            <td>
                              <p><b>Answer no. 1</b></p>
                              <div class="row">

                                  <div class="btn-group">                                   
                                    <label class="btn btn-light" for="exampleRadios1_5">
                                      <input type="radio" name="exampleRadios1" id="exampleRadios1_5" value="5"> 5</input>
                                    </label>    
                                    <label class="btn btn-light" for="exampleRadios1_4">
                                      <input type="radio" name="exampleRadios1" id="exampleRadios1_4" value="4"> 4</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios1_3">
                                      <input type="radio" name="exampleRadios1" id="exampleRadios1_3" value="3"> 3</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios1_2">
                                      <input type="radio" name="exampleRadios1" id="exampleRadios1_2" value="2"> 2</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios1_1">
                                      <input type="radio" name="exampleRadios1" id="exampleRadios1_1" value="1"> 1</input>
                                    </label>
                                  </div>

                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p><b>Answer no. 2</b></p>
                              <div class="row">

                                  <div class="btn-group">                                   
                                    <label class="btn btn-light" for="exampleRadios2_5">
                                      <input type="radio" name="exampleRadios2" id="exampleRadios2_5" value="5"> 5</input>
                                    </label>    
                                    <label class="btn btn-light" for="exampleRadios2_4">
                                      <input type="radio" name="exampleRadios2" id="exampleRadios2_4" value="4"> 4</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios2_3">
                                      <input type="radio" name="exampleRadios2" id="exampleRadios2_3" value="3"> 3</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios2_2">
                                      <input type="radio" name="exampleRadios2" id="exampleRadios2_2" value="2"> 2</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios2_1">
                                      <input type="radio" name="exampleRadios2" id="exampleRadios2_1" value="1"> 1</input>
                                    </label>
                                  </div>

                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p><b>Answer no. 3</b></p>
                              <div class="row">

                                  <div class="btn-group">                                   
                                    <label class="btn btn-light" for="exampleRadios3_5">
                                      <input type="radio" name="exampleRadios3" id="exampleRadios3_5" value="5"> 5</input>
                                    </label>    
                                    <label class="btn btn-light" for="exampleRadios3_4">
                                      <input type="radio" name="exampleRadios3" id="exampleRadios3_4" value="4"> 4</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios3_3">
                                      <input type="radio" name="exampleRadios3" id="exampleRadios3_3" value="3"> 3</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios3_2">
                                      <input type="radio" name="exampleRadios3" id="exampleRadios3_2" value="2"> 2</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios3_1">
                                      <input type="radio" name="exampleRadios3" id="exampleRadios3_1" value="1"> 1</input>
                                    </label>
                                  </div>

                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p><b>Answer no. 4</b></p>
                              <div class="row">

                                  <div class="btn-group">                                   
                                    <label class="btn btn-light" for="exampleRadios4_5">
                                      <input type="radio" name="exampleRadios4" id="exampleRadios4_5" value="5"> 5</input>
                                    </label>    
                                    <label class="btn btn-light" for="exampleRadios4_4">
                                      <input type="radio" name="exampleRadios4" id="exampleRadios4_4" value="4"> 4</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios4_3">
                                      <input type="radio" name="exampleRadios4" id="exampleRadios4_3" value="3"> 3</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios4_2">
                                      <input type="radio" name="exampleRadios4" id="exampleRadios4_2" value="2"> 2</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios4_1">
                                      <input type="radio" name="exampleRadios4" id="exampleRadios4_1" value="1"> 1</input>
                                    </label>
                                  </div>

                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p><b>Answer no. 5</b></p>
                              <div class="row">

                                  <div class="btn-group">                                   
                                    <label class="btn btn-light" for="exampleRadios5_5">
                                      <input type="radio" name="exampleRadios5" id="exampleRadios5_5" value="5"> 5</input>
                                    </label>    
                                    <label class="btn btn-light" for="exampleRadios5_4">
                                      <input type="radio" name="exampleRadios5" id="exampleRadios5_4" value="4"> 4</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios5_3">
                                      <input type="radio" name="exampleRadios5" id="exampleRadios5_3" value="3"> 3</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios5_2">
                                      <input type="radio" name="exampleRadios5" id="exampleRadios5_2" value="2"> 2</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios5_1">
                                      <input type="radio" name="exampleRadios5" id="exampleRadios5_1" value="1"> 1</input>
                                    </label>
                                  </div>

                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p><b>Answer no. 6</b></p>
                              <div class="row">

                                  <div class="btn-group">                                   
                                    <label class="btn btn-light" for="exampleRadios6_5">
                                      <input type="radio" name="exampleRadios6" id="exampleRadios6_5" value="5"> 5</input>
                                    </label>    
                                    <label class="btn btn-light" for="exampleRadios6_4">
                                      <input type="radio" name="exampleRadios6" id="exampleRadios6_4" value="4"> 4</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios6_3">
                                      <input type="radio" name="exampleRadios6" id="exampleRadios6_3" value="3"> 3</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios6_2">
                                      <input type="radio" name="exampleRadios6" id="exampleRadios6_2" value="2"> 2</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios6_1">
                                      <input type="radio" name="exampleRadios6" id="exampleRadios6_1" value="1"> 1</input>
                                    </label>
                                  </div>

                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p><b>Answer no. 7</b></p>
                              <div class="row">

                                  <div class="btn-group">                                   
                                    <label class="btn btn-light" for="exampleRadios7_5">
                                      <input type="radio" name="exampleRadios7" id="exampleRadios7_5" value="5"> 5</input>
                                    </label>    
                                    <label class="btn btn-light" for="exampleRadios7_4">
                                      <input type="radio" name="exampleRadios7" id="exampleRadios7_4" value="4"> 4</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios7_3">
                                      <input type="radio" name="exampleRadios7" id="exampleRadios7_3" value="3"> 3</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios7_2">
                                      <input type="radio" name="exampleRadios7" id="exampleRadios7_2" value="2"> 2</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios7_1">
                                      <input type="radio" name="exampleRadios7" id="exampleRadios7_1" value="1"> 1</input>
                                    </label>
                                  </div>

                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <p><b>Answer no. 8</b></p>
                              <div class="row">

                                  <div class="btn-group">                                   
                                    <label class="btn btn-light" for="exampleRadios8_5">
                                      <input type="radio" name="exampleRadios8" id="exampleRadios8_5" value="5"> 5</input>
                                    </label>    
                                    <label class="btn btn-light" for="exampleRadios8_4">
                                      <input type="radio" name="exampleRadios8" id="exampleRadios8_4" value="4"> 4</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios8_3">
                                      <input type="radio" name="exampleRadios8" id="exampleRadios8_3" value="3"> 3</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios8_2">
                                      <input type="radio" name="exampleRadios8" id="exampleRadios8_2" value="2"> 2</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios8_1">
                                      <input type="radio" name="exampleRadios8" id="exampleRadios8_1" value="1"> 1</input>
                                    </label>
                                  </div>

                              </div>
                            </td>
                          </tr>
                        </tbody>
                      </table>

                    </div>
                  </div>

                  <hr/>
                  <div class="row">
                    <div class="col-lg-12">
                     <div class="text-center">
                        <button id="submitAnswerFrmBtn" name="button_exam" type="submit" class="btn btn-success btn-lg rounded-0 w-100">Submit</button>      
                      </div>
                    </div>
                    <br/>
                    <br/>
                    <br/>
                    <div class="col-lg-12">
                      <div class="text-center">
                       <button id="resetExamFrm" name="button_start" class="btn btn-danger rounded-0 btn-lg w-100">Reset</button>     
                      </div>
                    </div>
                  </div>
                  
                </form>
            </div>  
          </div>
        </div>

      </div>
    </section>

  </main><!-- End #main -->
<?php include('../footer.php'); ?>
