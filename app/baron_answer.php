<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php IS_STUDENT_LEVEL(); ?>
<?php CHECK_EXAM_AVAILABILITY(); ?>
<?php $exam_id = $_GET['id']; ?>
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
          <li class="breadcrumb-item"><a href="#"><?php echo $_SESSION['key_session']['name']; ?></a></li>
          <li class="breadcrumb-item"><?php echo $_SESSION['key_session']['student_year']; ?></li>
          <li class="breadcrumb-item active"><?php echo $_SESSION['key_session']['course']; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile" style="width: 2160px;">
      <div class="row">
        <?php 
          $student_year = $_SESSION['key_session']['student_year']; 
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

        <div class="col-sm-4">
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
                    $student['exam_category'],
                    $_GET['id']
                  );
                ?>
                <div class="col-lg-12 booking-picker" id="flow-picker">
                  <br/>
                  <table class="table table-bordered mb-5 " >
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
        <div class="col-sm-3">
          <div class="card rounded-0">
            <div class="card-body">
              <br/>
              <div class="text-center"><h4>
              <?php 
                  if ($student['exam_title'] == 'Student Success Kit') {
                    $main_exam_id = $student['exam_category'];
                   // echo $student['exam_category']; 
                  } elseif ($student['exam_title'] == 'OASIS 3') {
                  //  $main_exam_id = $student['exam_description'];
                    echo $student['exam_description'];
                  } elseif ($student['exam_title'] == 'Aptitude J and C') {
                    $main_exam_id = $student['exam_category'];
                 //   echo $student['exam_category']; 
                  } else {
                    $main_exam_id = $student['exam_description'];
                 //   echo $student['exam_description'];
                  }

                  if ($main_exam_id == 'Reading') {
                    $main_exam = 'reading';
                  } elseif ($main_exam_id == 'Writing') {
                    $main_exam = 'writing';
                  } elseif ($main_exam_id == 'Speaking Skills') {
                    $main_exam = 'speaking_skills';
                  } elseif ($main_exam_id == 'Listening Skills') {
                    $main_exam = 'listening_skills';
                  } elseif ($main_exam_id == 'Learning Styles') {
                    $main_exam = 'learning_styles';
                  } elseif ($main_exam_id == 'Memory') {
                    $main_exam = 'memory';
                  } elseif ($main_exam_id == 'Study Skills') {
                    $main_exam = 'study_skills';
                  } elseif ($main_exam_id == 'Creative and Critical Thinking Skills') {
                    $main_exam = 'creative_and_thinking';
                  } elseif ($main_exam_id == 'Motivation') {
                    $main_exam = 'motivation';
                  } elseif ($main_exam_id == 'Self-Esteem') {
                    $main_exam = 'self_esteem';
                  } elseif ($main_exam_id == 'Personal Relationships') {
                    $main_exam = 'personal_relationship';
                  } elseif ($main_exam_id == 'Conflict Resolution') {
                    $main_exam = 'conflict_resolutions';
                  } elseif ($main_exam_id == 'Health') {
                    $main_exam = 'health';
                  } elseif ($main_exam_id == 'Time Management') {
                    $main_exam = 'time_management';
                  } elseif ($main_exam_id == 'Money Management') {
                    $main_exam = 'money_management';
                  } elseif ($main_exam_id == 'Personal Purpose') {
                    $main_exam = 'personal_purpose';
                  } elseif ($main_exam_id == 'Career Planning') {
                    $main_exam = 'career_planning';
                  } elseif ($main_exam_id == 'Support Resources') {
                    $main_exam = 'support_resources';
                  } elseif ($main_exam_id == 'Vocabulary') {
                    $main_exam = 'vocabulary';
                  } elseif ($main_exam_id == 'Computation') {
                    $main_exam = 'computation';
                  } elseif ($main_exam_id == 'Spatial') {
                    $main_exam = 'spatial';
                  } elseif ($main_exam_id == 'Word Comparison') {
                    $main_exam = 'work_comparison';
                  } elseif ($main_exam_id == 'BarOn EQ-i:S') {
                    $main_exam = 'baron_eq';
                  } elseif ($main_exam_id == 'The Keirsey Temerament Sorter') {
                    $main_exam = 'keirsey_temerament_sorter';
                  }  elseif ($main_exam_id == 'ESA') {
                    $main_exam = 'esa';
                  } elseif ($main_exam_id == 'Aptitude Verbal and Numerical') {
                    $main_exam = 'aptitude_verbal_and_numerical';
                  } elseif ($main_exam_id == 'Test No 1') {
                    $main_exam = 'aptitude_j_and_c_1';
                  } elseif ($main_exam_id == 'Test No 2') {
                    $main_exam = 'aptitude_j_and_c_2';
                  } elseif ($main_exam_id == 'Test No 3') {
                    $main_exam = 'aptitude_j_and_c_3';
                  } elseif ( $main_exam_id == 'Test No 4') {
                    $main_exam = 'aptitude_j_and_c_4';
                  }
                ?>
              <input type="hidden" id="main_exam_id" name="exam_temp_title" value="<?php echo $main_exam_id; ?>">
              <input type="hidden" id="main_exam_desc" name="main_exam_desc" value="<?php echo $student['exam_description']; ?>">
              <input type="hidden" id="main_exam_title" name="main_exam_title" value="<?php echo $student['exam_title']; ?>">
              </h4></div>
                <form action="POST" id="submitAnswerFrm">
                  <input type="hidden" name="main_exam" value="<?php echo $main_exam; ?>">
                  <input type="hidden" name="exam_id" id="exam_id" value="<?php echo $exam_id; ?>">
                  <input type="hidden" name="examAction" id="examAction" >

                  <div class="row mb-3">
                    <div class="col-lg-12">
                      
                      <?php if ($student['exam_title'] == 'BarOn EQ-i:S') { ?>
                        
                        <table class="table table-hover text-nowrap " id="tableList">
                            <tbody>
                              <?php for($x = 27; $x < 52; $x++) { ?>
                              <tr>
                                <td>
                                <p><b>Answer No. <?php echo $x; ?></b></p>
                                <div class="row">
                                  <input type="hidden" name="answer[<?php echo $x; ?>][item_correct]" value="">
                                  <div class="btn-group">                                   
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_5">
                                      <input type="radio" name="answer[<?php echo $x; ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_5" value="a"> 1</input>
                                    </label>    
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_4">
                                      <input type="radio" name="answer[<?php echo $x; ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_4" value="b"> 2</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_3">
                                      <input type="radio" name="answer[<?php echo $x; ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_3" value="c"> 3</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_2">
                                      <input type="radio" name="answer[<?php echo $x; ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_2" value="d"> 4</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_1">
                                      <input type="radio" name="answer[<?php echo $x; ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_1" value="e"> 5</input>
                                    </label>
                                  </div>
                                </div>
                                </td>
                              </tr>
                              
                              <?php } ?>
                            </tbody>
                          </table>

                      <?php } ?>
                    </div>
                  </div>
            </div>  
          </div>
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-3">
        <div class="card rounded-0">
            <div class="card-body">
              <br/>
              <div class="text-center"><h4>
              <?php 
                  if ($student['exam_title'] == 'Student Success Kit') {
                    $main_exam_id = $student['exam_category'];
                   // echo $student['exam_category']; 
                  } elseif ($student['exam_title'] == 'OASIS 3') {
                  //  $main_exam_id = $student['exam_description'];
                    echo $student['exam_description'];
                  } elseif ($student['exam_title'] == 'Aptitude J and C') {
                    $main_exam_id = $student['exam_category'];
                 //   echo $student['exam_category']; 
                  } else {
                    $main_exam_id = $student['exam_description'];
                 //   echo $student['exam_description'];
                  }

                  if ($main_exam_id == 'Reading') {
                    $main_exam = 'reading';
                  } elseif ($main_exam_id == 'Writing') {
                    $main_exam = 'writing';
                  } elseif ($main_exam_id == 'Speaking Skills') {
                    $main_exam = 'speaking_skills';
                  } elseif ($main_exam_id == 'Listening Skills') {
                    $main_exam = 'listening_skills';
                  } elseif ($main_exam_id == 'Learning Styles') {
                    $main_exam = 'learning_styles';
                  } elseif ($main_exam_id == 'Memory') {
                    $main_exam = 'memory';
                  } elseif ($main_exam_id == 'Study Skills') {
                    $main_exam = 'study_skills';
                  } elseif ($main_exam_id == 'Creative and Critical Thinking Skills') {
                    $main_exam = 'creative_and_thinking';
                  } elseif ($main_exam_id == 'Motivation') {
                    $main_exam = 'motivation';
                  } elseif ($main_exam_id == 'Self-Esteem') {
                    $main_exam = 'self_esteem';
                  } elseif ($main_exam_id == 'Personal Relationships') {
                    $main_exam = 'personal_relationship';
                  } elseif ($main_exam_id == 'Conflict Resolution') {
                    $main_exam = 'conflict_resolutions';
                  } elseif ($main_exam_id == 'Health') {
                    $main_exam = 'health';
                  } elseif ($main_exam_id == 'Time Management') {
                    $main_exam = 'time_management';
                  } elseif ($main_exam_id == 'Money Management') {
                    $main_exam = 'money_management';
                  } elseif ($main_exam_id == 'Personal Purpose') {
                    $main_exam = 'personal_purpose';
                  } elseif ($main_exam_id == 'Career Planning') {
                    $main_exam = 'career_planning';
                  } elseif ($main_exam_id == 'Support Resources') {
                    $main_exam = 'support_resources';
                  } elseif ($main_exam_id == 'Vocabulary') {
                    $main_exam = 'vocabulary';
                  } elseif ($main_exam_id == 'Computation') {
                    $main_exam = 'computation';
                  } elseif ($main_exam_id == 'Spatial') {
                    $main_exam = 'spatial';
                  } elseif ($main_exam_id == 'Word Comparison') {
                    $main_exam = 'work_comparison';
                  } elseif ($main_exam_id == 'BarOn EQ-i:S') {
                    $main_exam = 'baron_eq';
                  } elseif ($main_exam_id == 'The Keirsey Temerament Sorter') {
                    $main_exam = 'keirsey_temerament_sorter';
                  }  elseif ($main_exam_id == 'ESA') {
                    $main_exam = 'esa';
                  } elseif ($main_exam_id == 'Aptitude Verbal and Numerical') {
                    $main_exam = 'aptitude_verbal_and_numerical';
                  } elseif ($main_exam_id == 'Test No 1') {
                    $main_exam = 'aptitude_j_and_c_1';
                  } elseif ($main_exam_id == 'Test No 2') {
                    $main_exam = 'aptitude_j_and_c_2';
                  } elseif ($main_exam_id == 'Test No 3') {
                    $main_exam = 'aptitude_j_and_c_3';
                  } elseif ( $main_exam_id == 'Test No 4') {
                    $main_exam = 'aptitude_j_and_c_4';
                  }
                ?>
              <input type="hidden" id="main_exam_id" name="exam_temp_title" value="<?php echo $main_exam_id; ?>">
              <input type="hidden" id="main_exam_desc" name="main_exam_desc" value="<?php echo $student['exam_description']; ?>">
              <input type="hidden" id="main_exam_title" name="main_exam_title" value="<?php echo $student['exam_title']; ?>">
              </h4></div>

                  <input type="hidden" name="main_exam" value="<?php echo $main_exam; ?>">
                  <input type="hidden" name="exam_id" id="exam_id" value="<?php echo $exam_id; ?>">
                  <input type="hidden" name="examAction" id="examAction" >

                  <div class="row mb-3">
                    <div class="col-lg-12">
                      
                      <?php if ($student['exam_title'] == 'BarOn EQ-i:S') { ?>
                        
                        <table class="table table-hover text-nowrap " id="tableList">
                            <tbody>
                              <?php $i = 1; ?>
                              <?php for($x = 0; $x < 26; $x++) { ?>
                              <tr>
                                <td>
                                <p><b>Answer No. <?php echo $i++; ?></b></p>
                                <div class="row">
                                  <input type="hidden" name="answer[<?php echo ($i - 1); ?>][item_correct]" value="<?php echo $row['correct_items']; ?>">
                                  <div class="btn-group">                                   
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_5">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_5" value="a"> 1</input>
                                    </label>    
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_4">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_4" value="b"> 2</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_3">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_3" value="c"> 3</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_2">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_2" value="d"> 4</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_1">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_1" value="e"> 5</input>
                                    </label>
                                  </div>
                                </div>
                                </td>
                              </tr>
                              
                              <?php } ?>
                            </tbody>
                          </table>

                      <?php } ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                     <div class="text-center">
                        <button id="submitAnswerFrmBtn" name="submit" type="submit" class="btn btn-success btn-lg rounded-pill w-100">Submit</button>      
                      </div>
                    </div>
                    <br/>
                    <br/>
                    <br/>
                    <div class="col-lg-12">
                      <div class="text-center">
                       <button id="resetExamFrm" name="button_start" class="btn btn-danger rounded-pill btn-lg w-100">Reset</button>     
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
  <script>
  
$(document).ready(function() {
    var $sidebar   = $("#flow-picker"), 
    $window    = $(window),
    offset     = $sidebar.offset(),
    topPadding = 15
    
    $window.scroll(function() {
      if ($window.scrollTop() > offset.top) {
        $sidebar.stop().animate({
          marginTop: $window.scrollTop() - offset.top + topPadding
        });
      } else {
        $sidebar.stop().animate({
            marginTop: 0
        });
    }
  });
});
  </script>
<?php include('../footer.php'); ?>
