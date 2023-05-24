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

    <section class="section profile" style="width: 1860px;">
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

        <div class="col-sm-5">
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

        <div class="col-sm-7">
          <div class="card rounded-0">
            <div class="card-body">
              <br/>
              <div class="text-center"><h4>Answer Sheet (
                <?php 
                  if ($student['exam_title'] == 'Student Success Kit') {
                    $main_exam_id = $student['exam_category'];
                    echo $student['exam_category']; 
                  } elseif ($student['exam_title'] == 'OASIS 3') {
                    $main_exam_id = $student['exam_description'];
                    echo $student['exam_description'];
                  } elseif ($student['exam_title'] == 'Aptitude J and C') {
                    $main_exam_id = $student['exam_category'];
                    echo $student['exam_category']; 
                  } else {
                    $main_exam_id = $student['exam_description'];
                    echo $student['exam_description'];
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
                )
              <input type="hidden" id="main_exam_id" name="exam_temp_title" value="<?php echo $main_exam_id; ?>">
              <input type="hidden" id="main_exam_desc" name="main_exam_desc" value="<?php echo $student['exam_description']; ?>">
              <input type="hidden" id="main_exam_title" name="main_exam_title" value="<?php echo $student['exam_title']; ?>">
              </h4></div>
              <hr/>
                <form action="POST" id="submitAnswerFrm">
                  <input type="hidden" name="main_category" id="main_category" value="<?php echo $student['exam_description']; ?>">
                  <input type="hidden" name="main_exam" value="<?php echo $main_exam; ?>">
                  <input type="hidden" name="exam_id" id="exam_id" value="<?php echo $exam_id; ?>">
                  <input type="hidden" name="examAction" id="examAction" >

                  <div class="row mb-3">
                    <div class="col-lg-12">
                      
                      <?php if($student['exam_title'] == 'Student Success Kit') { ?>

                        <table class="table table-hover text-nowrap " id="tableList">
                        <tbody>
                          <?php $sql = $db->query("SELECT * FROM $main_exam"); ?>
                          <?php if($sql->num_rows > 0) { ?>
                          <?php $i = 1; ?>
                          <?php while($row = $sql->fetch_assoc()) { ?>
                            <tr>
                              <td>
                                <p><b>Answer No. <?php echo $i++; ?></b></p>
                                <div class="row">
                                  <input type="hidden" name="answer[<?php echo ($i - 1); ?>][item_correct]" value="<?php echo $row['correct_items']; ?>">
                                  <div class="btn-group">                                   
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_5">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_5" value="5"> 5</input>
                                    </label>    
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_4">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_4" value="4"> 4</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_3">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_3" value="3"> 3</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_2">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_2" value="2"> 2</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_1">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_1" value="1"> 1</input>
                                    </label>
                                  </div>
                                </div>
                              </td>
                            </tr>

                          <?php } ?>
                          <?php } else { ?>
                          <?php  echo "Answer sheet not available."; ?>
                          <?php } ?> 
                        </tbody>
                      </table>
                      
                      <?php } elseif ($student['exam_title'] == 'OASIS 3') { ?>


                        <?php if ($main_exam_id == 'Vocabulary') { ?>


                          <table class="table table-hover text-nowrap " id="tableList">
                            <tbody>
                              <?php $sql = $db->query("SELECT * FROM $main_exam"); ?>
                              <?php if($sql->num_rows > 0) { ?>
                              <?php $i = 1; ?>
                              <?php while($row = $sql->fetch_assoc()) { ?>
                              <tr>
                                <td>
                                <p><b>Answer No. <?php echo $i++; ?></b></p>
                                <div class="row">
                                  <input type="hidden" name="answer[<?php echo ($i - 1); ?>][item_correct]" value="<?php echo $row['correct_items']; ?>">
                                  <div class="btn-group">                                   
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_5">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_5" value="a-b"> a-b</input>
                                    </label>    
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_4">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_4" value="a-c"> a-c</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_3">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_3" value="a-d"> a-d</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_2">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_2" value="b-c"> b-c</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_1">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_1" value="b-d"> b-d</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_0">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_1" value="c-d"> c-d</input>
                                    </label>
                                  </div>
                                </div>
                                </td>
                              </tr>
                              <?php } ?>
                              <?php } else { ?>
                              <?php  echo "Answer sheet not available."; ?>
                              <?php } ?> 
                            </tbody>
                          </table>


                        <?php } elseif ($main_exam_id == 'Computation') { ?>

                          
                          <table class="table table-hover text-nowrap " id="tableList">
                            <tbody>
                              <?php $sql = $db->query("SELECT * FROM $main_exam"); ?>
                              <?php if($sql->num_rows > 0) { ?>
                              <?php $i = 1; ?>
                              <?php while($row = $sql->fetch_assoc()) { ?>
                              <tr>
                                <td>
                                <p><b>Answer No. <?php echo $i++; ?></b></p>
                                <div class="row">
                                  <input type="hidden" name="answer[<?php echo ($i - 1); ?>][item_correct]" value="<?php echo $row['correct_items']; ?>">
                                  <div class="btn-group">                                   
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_5">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_5" value="a"> a</input>
                                    </label>    
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_4">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_4" value="b"> b</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_3">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_3" value="c"> c</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_2">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_2" value="d"> d</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_1">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_1" value="e"> e</input>
                                    </label>
                                  </div>
                                </div>
                                </td>
                              </tr>
                              <?php } ?>
                              <?php } else { ?>
                              <?php  echo "Answer sheet not available."; ?>
                              <?php } ?> 
                            </tbody>
                          </table>
                        
                        <?php } elseif ($main_exam_id == 'Spatial') { ?>

                          <table class="table table-hover text-nowrap " id="tableList">
                            <tbody>
                              <?php $sql = $db->query("SELECT * FROM `$main_exam`"); ?>
                              <?php if($sql->num_rows > 0) { ?>
                              <?php $i = 1; ?>
                              <?php while($row = $sql->fetch_assoc()) { ?>
                              <tr>
                                <td>
                                <p><b>Answer No. <?php echo $i++; ?></b></p>
                                <div class="row">
                                  <input type="hidden" name="answer[<?php echo ($i - 1); ?>][item_correct]" value="<?php echo $row['correct_items']; ?>">
                                  <div class="btn-group">                                   
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_5">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_5" value="a"> a</input>
                                    </label>    
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_4">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_4" value="b"> b</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_3">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_3" value="c"> c</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_2">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_2" value="d"> d</input>
                                    </label>
                                  </div>
                                </div>
                                </td>
                              </tr>
                              <?php } ?>
                              <?php } else { ?>
                              <?php  echo "Answer sheet not available."; ?>
                              <?php } ?> 
                            </tbody>
                          </table>

                        <?php } elseif ($main_exam_id == 'Word Comparison') { ?>

                          <table class="table table-hover text-nowrap " id="tableList">
                            <tbody>
                              <?php $sql = $db->query("SELECT * FROM $main_exam"); ?>
                              <?php if($sql->num_rows > 0) { ?>
                              <?php $i = 1; ?>
                              <?php while($row = $sql->fetch_assoc()) { ?>
                              <tr>
                                <td>
                                <p><b>Answer No. <?php echo $i++; ?></b></p>
                                <div class="row">
                                  <input type="hidden" name="answer[<?php echo ($i - 1); ?>][item_correct]" value="<?php echo $row['correct_items']; ?>">
                                  <div class="btn-group">                                   
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_5">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_5" value="s"> s</input>
                                    </label>    
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_4">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_4" value="d"> d</input>
                                    </label>
                                  </div>
                                </div>
                                </td>
                              </tr>
                              <?php } ?>
                              <?php } else { ?>
                              <?php  echo "Answer sheet not available."; ?>
                              <?php } ?> 
                            </tbody>
                          </table>

                        <?php } ?>


                      <?php } elseif ($student['exam_title'] == 'BarOn EQ-i:S') { ?>
                        <div class="row">
                          <div class="col-sm-12">
                            <table class="table table-hover text-nowrap text-center" id="tableList">
                              <thead>
                                <tr>
                                  <td>Item no</td>
                                  <td></td>
                                  <td>A</td>
                                  <td>B</td>
                                  <td>C</td>
                                  <td>D</td>
                                  <td>E</td>
                                  <td>F</td>
                                  <td>G</td>
                                  <td></td>
                                  <td>Item no</td>
                                </tr>
                              </thead>
                              <tbody>
                                <tr> <!-- #1 -->
                                  <th><div class="text-danger">27</div></th>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <td><input id="txt_a_27" name="txt_a_27" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(▢)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td><input id="txt_e_1" name="txt_e_1" type="text" class="form-control rounded-0" style="width: 50px; height:35px;"><div class="text-danger">(△)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">1</div></th>
                                </tr>
                                <tr> <!-- #2 -->
                                  <th><div class="text-danger">28</div></th>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <td>---</td>
                                  <td><input id="txt_b_2" name="txt_b_2" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(△)</div></td>
                                  <td><input id="txt_c_28" name="txt_c_28" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(▢)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">2</div></th>
                                </tr>
                                <tr> <!-- #3 -->
                                  <th><div class="text-danger">29</div></th>
                                  <td>5&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;</td>
                                  <td><input id="txt_a_3" name="txt_a_3" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(△)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td><input id="txt_d_29" name="txt_d_29" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(▢)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>5&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">3</div></th>
                                </tr>
                                <tr> <!-- #4 -->
                                  <th><div class="text-danger">30</div></th>
                                  <td>5&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td><input id="txt_c_4" name="txt_c_4" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(△)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td><input id="txt_g_30" name="txt_g_30" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(▢)</div></td>
                                  <td>5&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">4</div></th>
                                </tr>
                                <tr> <!-- #5 -->
                                  <th><div class="text-danger">31</div></th>
                                  <td>5&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td><input id="txt_d_5" name="txt_d_5" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(△)</div></td>
                                  <td><input id="txt_e_31" name="txt_e_31" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(▢)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">5</div></th>
                                </tr>
                                <tr> <!-- #6 -->
                                <th><div class="text-danger">32</div></th>
                                  <td>5&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;</td>
                                  <td>---</td>
                                  <td><input id="txt_b_32" name="txt_b_32" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(▢)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td><input id="txt_g_6" name="txt_g_6" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(△)</div></td>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">6</div></th>
                                </tr>
                                <tr> <!-- #7 -->
                                  <th><div class="text-danger">33</div></th>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <td><input id="txt_a_33" name="txt_a_33" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(▢)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td><input id="txt_e_7" name="txt_e_7" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(△)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">7</div></th>
                                </tr>
                                <tr> <!-- #8 -->
                                  <th><div class="text-danger">34</div></th>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <td>---</td>
                                  <td><input id="txt_b_8" name="txt_b_8" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(△)</div></td>
                                  <td><input id="txt_c_34" name="txt_c_34" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(▢)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>5&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">8</div></th>
                                </tr>
                                <tr> <!-- #9 -->
                                  <td>&nbsp;&nbsp;&nbsp;</td>
                                  <td>&nbsp;&nbsp;&nbsp;</td>
                                  <td><input id="txt_a_9" name="txt_a_9" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(△)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>5&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">9</div></th>
                                </tr>
                                <tr> <!-- #10 -->
                                <th><div class="text-danger">35</div></th>
                                  <td>5&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td><input id="txt_c_10" name="txt_c_10" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(△)</div></td>
                                  <td><input id="txt_d_35" name="txt_d_35" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(▢)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>5&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">10</div></th>
                                </tr>
                                <tr> <!-- #11 -->
                                <th><div class="text-danger">36</div></th>
                                  <td>5&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td><input id="txt_g_36" name="txt_g_36" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(▢)</div></td>
                                </tr>
                                <tr> <!-- #12 -->
                                <th><div class="text-danger">37</div></th>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td><input id="txt_d_11" name="txt_d_11" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(△)</div></td>
                                  <td><input id="txt_e_37" name="txt_e_37" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(▢)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">11</div></th>
                                </tr>
                                <tr> <!-- #13 -->
                                <th><div class="text-danger">38</div></th>
                                  <td>5&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;</td>
                                  <td>---</td>
                                  <td><input id="txt_b_38" name="txt_b_38" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(▢)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td><input id="txt_g_12" name="txt_g_12" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(△)</div></td>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">12</div></th>
                                </tr>
                                <tr> <!-- #14 -->
                                <th><div class="text-danger">39</div></th>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <td><input id="txt_a_39" name="txt_a_39" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(▢)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td><input id="txt_e_13" name="txt_e_13" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(△)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">13</div></th>
                                </tr>
                                <tr> <!-- #15 -->
                                <th><div class="text-danger">40</div></th>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <td>---</td>
                                  <td><input id="txt_b_14" name="txt_b_14" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(△)</div></td>
                                  <td><input id="txt_c_40" name="txt_c_40" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(▢)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">14</div></th>
                                </tr>
                                <tr> <!-- #16 -->
                                  <td>&nbsp;&nbsp;&nbsp;</td>
                                  <td>&nbsp;&nbsp;&nbsp;</td>
                                  <td><input id="txt_a_15" name="txt_a_15" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(△)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>5&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">15</div></th>
                                </tr>
                                <tr> <!-- #17 -->
                                <th><div class="text-danger">41</div></th>
                                  <td>5&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td><input id="txt_c_16" name="txt_c_16" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(△)</div></td>
                                  <td><input id="txt_d_41" name="txt_d_41" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(▢)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>5&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">16</div></th>
                                </tr>
                                <tr> <!-- #18 -->
                                <th><div class="text-danger">42</div></th>
                                  <td>5&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td><input id="txt_d_17" name="txt_d_17" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(△)</div></td>
                                  <td><input id="txt_e_42" name="txt_e_42" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(▢)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">17</div></th>
                                </tr>
                                <tr> <!-- #19 -->
                                <th><div class="text-danger">43</div></th>     
                                  <td>5&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;</td>
                                  <td>---</td>
                                  <td><input id="txt_b_43" name="txt_b_43" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(▢)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td><input id="txt_g_18" name="txt_g_18" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(△)</div></td>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">18</div></th>
                                </tr>
                                <tr> <!-- #20 -->
                                <th><div class="text-danger">44</div></th>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <td><input id="txt_a_44" name="txt_a_44" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(▢)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td><input id="txt_e_19" name="txt_e_19" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(△)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">19</div></th>
                                </tr>
                                <tr> <!-- #21 -->
                                <th><div class="text-danger">45</div></th>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <td>---</td>
                                  <td><input id="txt_b_20" name="txt_b_20" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(△)</div></td>
                                  <td><input id="txt_c_45" name="txt_c_45" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(▢)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">20</div></th>
                                </tr>
                                <tr> <!-- #22 -->
                                <th><div class="text-danger">46</div></th>
                                  <td>5&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;</td>
                                  <td><input id="txt_a_21" name="txt_a_21" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(△)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td><input id="txt_e_46" name="txt_e_46" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(▢)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>5&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">21</div></th>
                                </tr>
                                <tr> <!-- #23 -->
                                <th><div class="text-danger">47</div></th>
                                  <td>5&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;</td>
                                  <td>---</td>
                                  <td><input id="txt_b_47" name="txt_b_47" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(▢)</div></td>
                                  <td><input id="txt_c_22" name="txt_c_22" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(△)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>5&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">22</div></th>
                                </tr>
                                <tr> <!-- #24 -->
                                <th><div class="text-danger">48</div></th>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <td><input id="txt_a_48" name="txt_a_48" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(▢)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td><input id="txt_d_23" name="txt_d_23" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(△)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">23</div></th>
                                </tr>
                                <tr> <!-- #25 -->
                                <th><div class="text-danger">49</div></th>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td><input id="txt_e_49" name="txt_e_49" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(▢)</div></td>
                                  <td>---</td>
                                  <td><input id="txt_g_24" name="txt_g_24" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(△)</div></td>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">24</div></th>
                                </tr>
                                <tr> <!-- #26 -->
                                <th><div class="text-danger">50</div></th>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <td><input id="txt_a_50" name="txt_a_50" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(▢)</div></td>
                                  <td><input id="txt_b_25" name="txt_b_25" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(△)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>1&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;5&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">25</div></th>
                                  </tr>
                                <tr> <!-- #27 -->
                                <th><div class="text-danger">51</div></th>
                                  <td>5&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;</td>
                                  <td>---</td>
                                  <td><input id="txt_b_51" name="txt_b_51" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(▢)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td><input id="txt_e_26" name="txt_e_26" type="text" class="form-control rounded-0" style="width: 50px; height:35px"><div class="text-danger">(△)</div></td>
                                  <td>---</td>
                                  <td>---</td>
                                  <td>5&nbsp;&nbsp;&nbsp;4&nbsp;&nbsp;&nbsp;3&nbsp;&nbsp;&nbsp;2&nbsp;&nbsp;&nbsp;1&nbsp;&nbsp;</td>
                                  <th><div class="text-danger">26</div></th>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        
                      <?php } elseif ($student['exam_title'] == 'The Keirsey Temperament Sorter') { ?>

                        <table class="table table-hover text-nowrap " id="tableList">
                            <tbody>
                              <?php $sql = $db->query("SELECT * FROM $main_exam"); ?>
                              <?php if($sql->num_rows > 0) { ?>
                              <?php $i = 1; ?>
                              <?php while($row = $sql->fetch_assoc()) { ?>
                              <tr>
                                <td>
                                <p><b>Answer No. <?php echo $i++; ?></b></p>
                                <div class="row">
                                  <input type="hidden" name="answer[<?php echo ($i - 1); ?>][item_correct]" value="<?php echo $row['correct_items']; ?>">
                                  <div class="btn-group">                                   
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_5">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_5" value="a"> a</input>
                                    </label>    
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_4">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_4" value="b"> b</input>
                                    </label>
                                  </div>
                                </div>
                                </td>
                              </tr>
                              <?php } ?>
                              <?php } else { ?>
                              <?php  echo "Answer sheet not available."; ?>
                              <?php } ?> 
                            </tbody>
                          </table>

                      <?php } elseif ($student['exam_title'] == 'ESA') { ?>


                        <table class="table table-hover text-nowrap " id="tableList">
                            <tbody>
                              <?php $sql = $db->query("SELECT * FROM $main_exam"); ?>
                              <?php if($sql->num_rows > 0) { ?>
                              <?php $i = 1; ?>
                              <?php while($row = $sql->fetch_assoc()) { ?>
                              <tr>
                                <td>
                                <p><b>Answer No. <?php echo $i++; ?></b></p>
                                <div class="row">
                                  <input type="hidden" name="answer[<?php echo ($i - 1); ?>][item_correct]" value="<?php echo $row['correct_items']; ?>">
                                  <div class="btn-group">                                   
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_5">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_5" value="1"> 1</input>
                                    </label>    
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_4">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_4" value="2"> 2</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_3">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_3" value="3"> 3</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_2">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_2" value="4"> 4</input>
                                    </label>
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_1">
                                      <input type="radio" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_1" value="5"> 5</input>
                                    </label>
                                  </div>
                                </div>
                                </td>
                              </tr>
                              <?php } ?>
                              <?php } else { ?>
                              <?php  echo "Answer sheet not available."; ?>
                              <?php } ?> 
                            </tbody>
                          </table>

                        
                      <?php } elseif ($student['exam_title'] == 'Aptitude Verbal and Numerical') { ?>

                        <table class="table table-hover text-nowrap " id="tableList">
                            <tbody>
                              <?php $sql = $db->query("SELECT * FROM $main_exam"); ?>
                              <?php if($sql->num_rows > 0) { ?>
                              <?php $i = 1; ?>
                              <?php while($row = $sql->fetch_assoc()) { ?>
                              <tr>
                                <td>
                                <p><b>Answer No. <?php echo $i++; ?></b></p>
                                <div class="row">
                                  <input type="hidden" name="answer[<?php echo ($i - 1); ?>][item_correct]" value="<?php echo $row['correct_items']; ?>">
                                  <div class="btn-group">                                   
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_5">
                                      <input type="text" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_5" > </input>
                                    </label>    
                                  </div>
                                </div>
                                </td>
                              </tr>
                              <?php } ?>
                              <?php } else { ?>
                              <?php  echo "Answer sheet not available."; ?>
                              <?php } ?> 
                            </tbody>
                          </table>
                        
                      <?php } elseif ($main_exam_id == 'Test No 1') { ?>

                        <table class="table table-hover text-nowrap " id="tableList">
                            <tbody>
                              <?php $sql = $db->query("SELECT * FROM $main_exam"); ?>
                              <?php if($sql->num_rows > 0) { ?>
                              <?php $i = 1; ?>
                              <?php while($row = $sql->fetch_assoc()) { ?>
                              <tr>
                                <td>
                                <p><b>Answer No. <?php echo $i++; ?></b></p>
                                <div class="row">
                                  <input type="hidden" name="answer[<?php echo ($i - 1); ?>][item_correct]" value="<?php echo $row['correct_items']; ?>">
                                  <div class="btn-group">                                   
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_5">
                                      <input type="text" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_5" > </input>
                                    </label>    
                                  </div>
                                </div>
                                </td>
                              </tr>
                              <?php } ?>
                              <?php } else { ?>
                              <?php  echo "Answer sheet not available."; ?>
                              <?php } ?> 
                            </tbody>
                          </table>
                        
                     <?php } elseif ($main_exam_id == 'Test No 2') { ?>

                        <table class="table table-hover text-nowrap " id="tableList">
                            <tbody>
                              <?php $sql = $db->query("SELECT * FROM $main_exam"); ?>
                              <?php if($sql->num_rows > 0) { ?>
                              <?php $i = 1; ?>
                              <?php while($row = $sql->fetch_assoc()) { ?>
                              <tr>
                                <td>
                                <p><b>Answer No. <?php echo $i++; ?></b></p>
                                <div class="row">
                                  <input type="hidden" name="answer[<?php echo ($i - 1); ?>][item_correct]" value="<?php echo $row['correct_items']; ?>">
                                  <div class="btn-group">                                   
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_5">
                                      <input type="text" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_5" > </input>
                                    </label>    
                                  </div>
                                </div>
                                </td>
                              </tr>
                              <?php } ?>
                              <?php } else { ?>
                              <?php  echo "Answer sheet not available."; ?>
                              <?php } ?> 
                            </tbody>
                          </table>
                        
                     <?php } elseif ($main_exam_id == 'Test No 3') { ?>

                      <table class="table table-hover text-nowrap " id="tableList">
                            <tbody>
                              <?php $sql = $db->query("SELECT * FROM $main_exam"); ?>
                              <?php if($sql->num_rows > 0) { ?>
                              <?php $i = 1; ?>
                              <?php while($row = $sql->fetch_assoc()) { ?>
                              <tr>
                                <td>
                                <p><b>Answer No. <?php echo $i++; ?></b></p>
                                <div class="row">
                                  <input type="hidden" name="answer[<?php echo ($i - 1); ?>][item_correct]" value="<?php echo $row['correct_items']; ?>">
                                  <div class="btn-group">                                   
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_5">
                                      <input type="text" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_5" > </input>
                                    </label>    
                                  </div>
                                </div>
                                </td>
                              </tr>
                              <?php } ?>
                              <?php } else { ?>
                              <?php  echo "Answer sheet not available."; ?>
                              <?php } ?> 
                            </tbody>
                          </table>

                     <?php } elseif ($main_exam_id == 'Test No 4') { ?>
                      

                          <table class="table table-hover text-nowrap " id="tableList">
                            <tbody>
                              <?php $sql = $db->query("SELECT * FROM $main_exam"); ?>
                              <?php if($sql->num_rows > 0) { ?>
                              <?php $i = 1; ?>
                              <?php while($row = $sql->fetch_assoc()) { ?>
                              <tr>
                                <td>
                                <p><b>Answer No. <?php echo $i++; ?></b></p>
                                <div class="row">
                                  <input type="hidden" name="answer[<?php echo ($i - 1); ?>][item_correct]" value="<?php echo $row['correct_items']; ?>">
                                  <div class="btn-group">                                   
                                    <label class="btn btn-light" for="exampleRadios<?php echo ($i-1); ?>_5">
                                      <input type="text" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_5" > </input>
                                    </label>    
                                  </div>
                                </div>
                                </td>
                              </tr>
                              <?php } ?>
                              <?php } else { ?>
                              <?php  echo "Answer sheet not available."; ?>
                              <?php } ?> 
                            </tbody>
                          </table>

                     <?php }  ?>
                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                     <div class="text-center">
                        <button id="submitAnswerFrmBtn" name="submit" type="submit" class="btn btn-success btn-lg rounded-0 w-100">Submit</button>      
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
