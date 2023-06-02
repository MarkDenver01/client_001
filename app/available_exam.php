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
                        <div class="row">
                          <div class="col-lg-12">
                            <table class="table table-bordered table-hover text-nowrap text-center" id="tableList">
                              <thead>
                                <tr>
                                  <td  style="background-image: linear-gradient(#996515, #996515);" class="text-white"></td>
                                  <td  style="background-image: linear-gradient(#996515, #996515);" class="text-white">a</td>
                                  <td  style="background-image: linear-gradient(#996515, #996515);" class="text-white">b</td>
                                  <td  style="background-image: linear-gradient(#996515, #996515);" class="text-white"></td>
                                  <td  style="background-image: linear-gradient(#996515, #996515);" class="text-white">a</td>
                                  <td  style="background-image: linear-gradient(#996515, #996515);" class="text-white">b</td>
                                  <td  style="background-image: linear-gradient(#996515, #996515);" class="text-white"></td>
                                  <td  style="background-image: linear-gradient(#996515, #996515);" class="text-white">a</td>
                                  <td  style="background-image: linear-gradient(#996515, #996515);" class="text-white">b</td>
                                  <td  style="background-image: linear-gradient(#996515, #996515);" class="text-white"></td>
                                  <td  style="background-image: linear-gradient(#996515, #996515);" class="text-white">a</td>
                                  <td  style="background-image: linear-gradient(#996515, #996515);" class="text-white">b</td>
                                  <td  style="background-image: linear-gradient(#996515, #996515);" class="text-white"></td>
                                  <td  style="background-image: linear-gradient(#996515, #996515);" class="text-white">a</td>
                                  <td  style="background-image: linear-gradient(#996515, #996515);" class="text-white">b</td>
                                  <td  style="background-image: linear-gradient(#996515, #996515);" class="text-white"></td>
                                  <td  style="background-image: linear-gradient(#996515, #996515);" class="text-white">a</td>
                                  <td  style="background-image: linear-gradient(#996515, #996515);" class="text-white">b</td>
                                  <td  style="background-image: linear-gradient(#996515, #996515);" class="text-white"></td>
                                  <td  style="background-image: linear-gradient(#996515, #996515);" class="text-white">a</td>
                                  <td  style="background-image: linear-gradient(#996515, #996515);" class="text-white">b</td>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">1</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_1_a">
                                        <input type="radio" name="rbo_k_1" id="rbo_k_1_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_1_b">
                                        <input type="radio" name="rbo_k_1" id="rbo_k_1_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">2</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_2_a">
                                        <input type="radio" name="rbo_k_2" id="rbo_k_2_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_2_b">
                                        <input type="radio" name="rbo_k_2" id="rbo_k_2_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">3</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_3_a">
                                        <input type="radio" name="rbo_k_3" id="rbo_k_3_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_3_b">
                                        <input type="radio" name="rbo_k_3" id="rbo_k_3_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">4</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_4_a">
                                        <input type="radio" name="rbo_k_4" id="rbo_k_4_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_4_b">
                                        <input type="radio" name="rbo_k_4" id="rbo_k_4_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">5</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_5_a">
                                        <input type="radio" name="rbo_k_5" id="rbo_k_5_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_5_b">
                                        <input type="radio" name="rbo_k_5" id="rbo_k_5_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">6</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_6_a">
                                        <input type="radio" name="rbo_k_6" id="rbo_k_6_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_6_b">
                                        <input type="radio" name="rbo_k_6" id="rbo_k_6_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">7</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_7_a">
                                        <input type="radio" name="rbo_k_7" id="rbo_k_7_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_7_b">
                                        <input type="radio" name="rbo_k_7" id="rbo_k_7_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>

                                <tr>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">8</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_8_a">
                                        <input type="radio" name="rbo_k_8" id="rbo_k_8_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_8_b">
                                        <input type="radio" name="rbo_k_8" id="rbo_k_8_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">9</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_9_a">
                                        <input type="radio" name="rbo_k_9" id="rbo_k_9_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_9_b">
                                        <input type="radio" name="rbo_k_9" id="rbo_k_9_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">10</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_10_a">
                                        <input type="radio" name="rbo_k_10" id="rbo_k_10_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_10_b">
                                        <input type="radio" name="rbo_k_10" id="rbo_k_10_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">11</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_11_a">
                                        <input type="radio" name="rbo_k_11" id="rbo_k_11_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_11_b">
                                        <input type="radio" name="rbo_k_11" id="rbo_k_11_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">12</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_12_a">
                                        <input type="radio" name="rbo_k_12" id="rbo_k_12_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_12_b">
                                        <input type="radio" name="rbo_k_12" id="rbo_k_12_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">13</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_13_a">
                                        <input type="radio" name="rbo_k_13" id="rbo_k_13_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_13_b">
                                        <input type="radio" name="rbo_k_13" id="rbo_k_13_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">14</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_14_a">
                                        <input type="radio" name="rbo_k_14" id="rbo_k_14_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_14_b">
                                        <input type="radio" name="rbo_k_14" id="rbo_k_14_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                </tr>
 
                                <tr>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">15</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_15_a">
                                        <input type="radio" name="rbo_k_15" id="rbo_k_15_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_15_b">
                                        <input type="radio" name="rbo_k_15" id="rbo_k_15_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">16</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_16_a">
                                        <input type="radio" name="rbo_k_16" id="rbo_k_16_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_16_b">
                                        <input type="radio" name="rbo_k_16" id="rbo_k_16_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">17</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_17_a">
                                        <input type="radio" name="rbo_k_17" id="rbo_k_17_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_17_b">
                                        <input type="radio" name="rbo_k_17" id="rbo_k_17_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">18</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_18_a">
                                        <input type="radio" name="rbo_k_18" id="rbo_k_18_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_18_b">
                                        <input type="radio" name="rbo_k_18" id="rbo_k_18_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">19</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_19_a">
                                        <input type="radio" name="rbo_k_19" id="rbo_k_19_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_19_b">
                                        <input type="radio" name="rbo_k_19" id="rbo_k_19_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">20</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_20_a">
                                        <input type="radio" name="rbo_k_20" id="rbo_k_20_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_20_b">
                                        <input type="radio" name="rbo_k_20" id="rbo_k_20_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">21</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_21_a">
                                        <input type="radio" name="rbo_k_21" id="rbo_k_21_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_21_b">
                                        <input type="radio" name="rbo_k_21" id="rbo_k_21_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                </tr>

                                <tr>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">22</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_22_a">
                                        <input type="radio" name="rbo_k_22" id="rbo_k_22_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_22_b">
                                        <input type="radio" name="rbo_k_22" id="rbo_k_22_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">23</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_23_a">
                                        <input type="radio" name="rbo_k_23" id="rbo_k_23_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_23_b">
                                        <input type="radio" name="rbo_k_23" id="rbo_k_23_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">24</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_24_a">
                                        <input type="radio" name="rbo_k_24" id="rbo_k_24_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_24_b">
                                        <input type="radio" name="rbo_k_24" id="rbo_k_24_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">25</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_25_a">
                                        <input type="radio" name="rbo_k_25" id="rbo_k_25_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_25_b">
                                        <input type="radio" name="rbo_k_25" id="rbo_k_25_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">26</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_26_a">
                                        <input type="radio" name="rbo_k_26" id="rbo_k_26_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_26_b">
                                        <input type="radio" name="rbo_k_26" id="rbo_k_26_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">27</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_27_a">
                                        <input type="radio" name="rbo_k_27" id="rbo_k_27_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_27_b">
                                        <input type="radio" name="rbo_k_27" id="rbo_k_27_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">28</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_28_a">
                                        <input type="radio" name="rbo_k_28" id="rbo_k_28_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_28_b">
                                        <input type="radio" name="rbo_k_28" id="rbo_k_28_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                </tr>
                                
                                <tr>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">29</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_29_a">
                                        <input type="radio" name="rbo_k_29" id="rbo_k_29_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_29_b">
                                        <input type="radio" name="rbo_k_29" id="rbo_k_29_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th  style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">30</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_30_a">
                                        <input type="radio" name="rbo_k_30" id="rbo_k_30_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_30_b">
                                        <input type="radio" name="rbo_k_30" id="rbo_k_30_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th  style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">31</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_31_a">
                                        <input type="radio" name="rbo_k_31" id="rbo_k_31_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_31_b">
                                        <input type="radio" name="rbo_k_31" id="rbo_k_31_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">32</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_32_a">
                                        <input type="radio" name="rbo_k_32" id="rbo_k_32_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_32_b">
                                        <input type="radio" name="rbo_k_32" id="rbo_k_32_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">33</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_33_a">
                                        <input type="radio" name="rbo_k_33" id="rbo_k_33_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_33_b">
                                        <input type="radio" name="rbo_k_33" id="rbo_k_33_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">34</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_34_a">
                                        <input type="radio" name="rbo_k_34" id="rbo_k_34_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_34_b">
                                        <input type="radio" name="rbo_k_34" id="rbo_k_34_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">35</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_35_a">
                                        <input type="radio" name="rbo_k_35" id="rbo_k_35_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_35_b">
                                        <input type="radio" name="rbo_k_35" id="rbo_k_35_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                </tr>

                                <tr>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">36</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_36_a">
                                        <input type="radio" name="rbo_k_36" id="rbo_k_36_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_36_b">
                                        <input type="radio" name="rbo_k_36" id="rbo_k_36_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">37</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_37_a">
                                        <input type="radio" name="rbo_k_37" id="rbo_k_37_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_37_b">
                                        <input type="radio" name="rbo_k_37" id="rbo_k_37_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">38</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_38_a">
                                        <input type="radio" name="rbo_k_38" id="rbo_k_38_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_38_b">
                                        <input type="radio" name="rbo_k_38" id="rbo_k_38_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">39</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_39_a">
                                        <input type="radio" name="rbo_k_39" id="rbo_k_39_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_39_b">
                                        <input type="radio" name="rbo_k_39" id="rbo_k_39_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">40</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_40_a">
                                        <input type="radio" name="rbo_k_40" id="rbo_k_40_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_40_b">
                                        <input type="radio" name="rbo_k_40" id="rbo_k_40_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">41</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_41_a">
                                        <input type="radio" name="rbo_k_41" id="rbo_k_41_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_41_b">
                                        <input type="radio" name="rbo_k_41" id="rbo_k_41_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">42</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_42_a">
                                        <input type="radio" name="rbo_k_42" id="rbo_k_42_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_42_b">
                                        <input type="radio" name="rbo_k_42" id="rbo_k_42_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                </tr>
                                
                                <tr>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">43</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_43_a">
                                        <input type="radio" name="rbo_k_43" id="rbo_k_43_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_43_b">
                                        <input type="radio" name="rbo_k_43" id="rbo_k_43_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">44</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_44_a">
                                        <input type="radio" name="rbo_k_44" id="rbo_k_44_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_44_b">
                                        <input type="radio" name="rbo_k_44" id="rbo_k_44_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">45</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_45_a">
                                        <input type="radio" name="rbo_k_45" id="rbo_k_45_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_45_b">
                                        <input type="radio" name="rbo_k_45" id="rbo_k_45_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">46</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_46_a">
                                        <input type="radio" name="rbo_k_46" id="rbo_k_46_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_46_b">
                                        <input type="radio" name="rbo_k_46" id="rbo_k_46_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">47</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_47_a">
                                        <input type="radio" name="rbo_k_47" id="rbo_k_47_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_47_b">
                                        <input type="radio" name="rbo_k_47" id="rbo_k_47_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">48</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_48_a">
                                        <input type="radio" name="rbo_k_48" id="rbo_k_48_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_48_b">
                                        <input type="radio" name="rbo_k_48" id="rbo_k_48_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">49</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_49_a">
                                        <input type="radio" name="rbo_k_49" id="rbo_k_49_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_49_b">
                                        <input type="radio" name="rbo_k_49" id="rbo_k_49_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                </tr>

                                <tr>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">50</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_50_a">
                                        <input type="radio" name="rbo_k_50" id="rbo_k_50_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_50_b">
                                        <input type="radio" name="rbo_k_50" id="rbo_k_50_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">51</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_51_a">
                                        <input type="radio" name="rbo_k_51" id="rbo_k_51_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_51_b">
                                        <input type="radio" name="rbo_k_51" id="rbo_k_51_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">52</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_52_a">
                                        <input type="radio" name="rbo_k_52" id="rbo_k_52_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_52_b">
                                        <input type="radio" name="rbo_k_52" id="rbo_k_52_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">53</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_53_a">
                                        <input type="radio" name="rbo_k_53" id="rbo_k_53_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_53_b">
                                        <input type="radio" name="rbo_k_53" id="rbo_k_53_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">54</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_54_a">
                                        <input type="radio" name="rbo_k_54" id="rbo_k_54_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_54_b">
                                        <input type="radio" name="rbo_k_54" id="rbo_k_54_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">55</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_55_a">
                                        <input type="radio" name="rbo_k_55" id="rbo_k_55_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_55_b">
                                        <input type="radio" name="rbo_k_55" id="rbo_k_55_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">56</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_56_a">
                                        <input type="radio" name="rbo_k_56" id="rbo_k_56_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_56_b">
                                        <input type="radio" name="rbo_k_56" id="rbo_k_56_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                </tr>

                                <tr>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">57</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_57_a">
                                        <input type="radio" name="rbo_k_57" id="rbo_k_57_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_57_b">
                                        <input type="radio" name="rbo_k_57" id="rbo_k_57_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">58</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_58_a">
                                        <input type="radio" name="rbo_k_58" id="rbo_k_58_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_58_b">
                                        <input type="radio" name="rbo_k_58" id="rbo_k_58_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">59</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_59_a">
                                        <input type="radio" name="rbo_k_59" id="rbo_k_59_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_59_b">
                                        <input type="radio" name="rbo_k_59" id="rbo_k_59_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">60</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_60_a">
                                        <input type="radio" name="rbo_k_60" id="rbo_k_60_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_60_b">
                                        <input type="radio" name="rbo_k_60" id="rbo_k_60_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">61</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_61_a">
                                        <input type="radio" name="rbo_k_61" id="rbo_k_61_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_61_b">
                                        <input type="radio" name="rbo_k_61" id="rbo_k_61_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">62</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_62_a">
                                        <input type="radio" name="rbo_k_62" id="rbo_k_62_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_62_b">
                                        <input type="radio" name="rbo_k_62" id="rbo_k_62_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">63</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_63_a">
                                        <input type="radio" name="rbo_k_63" id="rbo_k_63_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_63_b">
                                        <input type="radio" name="rbo_k_63" id="rbo_k_63_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                </tr>

                                <tr>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">64</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_64_a">
                                        <input type="radio" name="rbo_k_64" id="rbo_k_64_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_64_b">
                                        <input type="radio" name="rbo_k_64" id="rbo_k_64_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">65</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_65_a">
                                        <input type="radio" name="rbo_k_65" id="rbo_k_65_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_65_b">
                                        <input type="radio" name="rbo_k_65" id="rbo_k_65_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">66</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_66_a">
                                        <input type="radio" name="rbo_k_66" id="rbo_k_66_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_66_b">
                                        <input type="radio" name="rbo_k_66" id="rbo_k_66_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">67</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_67_a">
                                        <input type="radio" name="rbo_k_67" id="rbo_k_67_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_67_b">
                                        <input type="radio" name="rbo_k_67" id="rbo_k_67_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">68</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_68_a">
                                        <input type="radio" name="rbo_k_68" id="rbo_k_68_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_68_b">
                                        <input type="radio" name="rbo_k_68" id="rbo_k_68_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">69</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_69_a">
                                        <input type="radio" name="rbo_k_69" id="rbo_k_69_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_69_b">
                                        <input type="radio" name="rbo_k_69" id="rbo_k_69_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                  <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white">70</th>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_70_a">
                                        <input type="radio" name="rbo_k_70" id="rbo_k_70_a" value="a"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_k_70_b">
                                        <input type="radio" name="rbo_k_70" id="rbo_k_70_b" value="b"></input>
                                      </label>    
                                    </div>
                                  </td>

                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      <?php } elseif ($student['exam_title'] == 'ESA') { ?>
                        <div class="row">
                          <div class="col-lg-12">
                            <table class="table table-hover table-bordered text-nowrap text-center" id="tableList">
                              <thead>
                                <tr>
                                  <td><h3>5</h3</td>
                                  <td><h3>Strongly Angree</h3</td>
                                </tr>
                                <tr>
                                  <td><h3>4</h3</td>
                                  <td><h3>Agree Moderately</h3</td>
                                </tr>
                                <tr>
                                  <td><h3>3</h3</td>
                                  <td><h3>Agree a little</h3</td>
                                </tr>
                                <tr>
                                  <td><h3>2</h3</td>
                                  <td><h3>Nuetral</h3</td>
                                </tr>
                                <tr>
                                  <td><h3>1</h3</td>
                                  <td><h3>Disagree</h3></td>
                                </tr>
                              </thead>
                            </table>
                          </div>
                          <div class="col-lg-12">
                            <table class="table table-hover table-bordered text-nowrap text-center" id="tableList">
                                <tr>
                                  <thead>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Skills</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Item No.</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">5</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">4</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">3</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">2</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">1</th>
                                  </thead>
                                </tr>
                                <tr>
                                  <td rowspan="1" class="text-center"><h3>Writtent Communications</h3></td>
                                  <td>1</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_1_5">
                                        <input type="radio" name="rbo_w_1" id="rbo_w_1_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_1_4">
                                        <input type="radio" name="rbo_w_1" id="rbo_w_1_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_1_3">
                                        <input type="radio" name="rbo_w_1" id="rbo_w_1_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_1_2">
                                        <input type="radio" name="rbo_w_1" id="rbo_w_1_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_1_1">
                                        <input type="radio" name="rbo_w_1" id="rbo_w_1_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td rowspan="1"></td>
                                  <td>13</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_13_5">
                                        <input type="radio" name="rbo_w_13" id="rbo_w_13_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_13_4">
                                        <input type="radio" name="rbo_w_13" id="rbo_w_13_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_13_3">
                                        <input type="radio" name="rbo_w_13" id="rbo_w_13_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_13_2">
                                        <input type="radio" name="rbo_w_13" id="rbo_w_13_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_13_1">
                                        <input type="radio" name="rbo_w_13" id="rbo_w_13_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td rowspan="1"></td>
                                  <td>21</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_21_5">
                                        <input type="radio" name="rbo_w_21" id="rbo_w_21_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_21_4">
                                        <input type="radio" name="rbo_w_21" id="rbo_w_21_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_21_3">
                                        <input type="radio" name="rbo_w_21" id="rbo_w_21_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_21_2">
                                        <input type="radio" name="rbo_w_21" id="rbo_w_21_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_21_1">
                                        <input type="radio" name="rbo_w_21" id="rbo_w_21_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td rowspan="1"></td>
                                  <td>31</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_31_5">
                                        <input type="radio" name="rbo_w_31" id="rbo_w_31_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_31_4">
                                        <input type="radio" name="rbo_w_31" id="rbo_w_31_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_31_3">
                                        <input type="radio" name="rbo_w_31" id="rbo_w_31_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_31_2">
                                        <input type="radio" name="rbo_w_31" id="rbo_w_31_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_31_1">
                                        <input type="radio" name="rbo_w_31" id="rbo_w_31_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <thead>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Skills</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Item No.</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">5</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">4</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">3</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">2</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">1</th>
                                  </thead>
                                </tr>
                                <tr>
                                  <td rowspan="1" class="text-center"><h3>Negotiating and Persuading</h3></td>
                                  <td>7</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_7_5">
                                        <input type="radio" name="rbo_w_7" id="rbo_w_7_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_7_4">
                                        <input type="radio" name="rbo_w_7" id="rbo_w_7_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_7_3">
                                        <input type="radio" name="rbo_w_7" id="rbo_w_7_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_7_2">
                                        <input type="radio" name="rbo_w_7" id="rbo_w_7_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_7_1">
                                        <input type="radio" name="rbo_w_7" id="rbo_w_7_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td rowspan="1"></td>
                                  <td>14</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_14_5">
                                        <input type="radio" name="rbo_w_14" id="rbo_w_14_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_14_4">
                                        <input type="radio" name="rbo_w_14" id="rbo_w_14_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_14_3">
                                        <input type="radio" name="rbo_w_14" id="rbo_w_14_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_14_2">
                                        <input type="radio" name="rbo_w_14" id="rbo_w_14_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_14_1">
                                        <input type="radio" name="rbo_w_14" id="rbo_w_14_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td rowspan="1"></td>
                                  <td>18</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_18_5">
                                        <input type="radio" name="rbo_w_18" id="rbo_w_18_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_18_4">
                                        <input type="radio" name="rbo_w_18" id="rbo_w_18_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_18_3">
                                        <input type="radio" name="rbo_w_18" id="rbo_w_18_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_18_2">
                                        <input type="radio" name="rbo_w_18" id="rbo_w_18_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_18_1">
                                        <input type="radio" name="rbo_w_18" id="rbo_w_18_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td rowspan="1"></td>
                                  <td>19</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_19_5">
                                        <input type="radio" name="rbo_w_19" id="rbo_w_19_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_19_4">
                                        <input type="radio" name="rbo_w_19" id="rbo_w_19_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_19_3">
                                        <input type="radio" name="rbo_w_19" id="rbo_w_19_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_19_2">
                                        <input type="radio" name="rbo_w_19" id="rbo_w_19_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_19_1">
                                        <input type="radio" name="rbo_w_19" id="rbo_w_19_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td rowspan="1"></td>
                                  <td>23</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_23_5">
                                        <input type="radio" name="rbo_w_23" id="rbo_w_23_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_23_4">
                                        <input type="radio" name="rbo_w_23" id="rbo_w_23_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_23_3">
                                        <input type="radio" name="rbo_w_23" id="rbo_w_23_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_23_2">
                                        <input type="radio" name="rbo_w_23" id="rbo_w_23_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_23_1">
                                        <input type="radio" name="rbo_w_23" id="rbo_w_23_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <thead>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Skills</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Item No.</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">5</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">4</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">3</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">2</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">1</th>
                                  </thead>
                                </tr>
                                <tr>
                                  <td rowspan="1" class="text-center"><h3>Verbal Communication</h3></td>
                                  <td>6</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_6_5">
                                        <input type="radio" name="rbo_w_6" id="rbo_w_6_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_6_4">
                                        <input type="radio" name="rbo_w_6" id="rbo_w_6_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_6_3">
                                        <input type="radio" name="rbo_w_6" id="rbo_w_6_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_6_2">
                                        <input type="radio" name="rbo_w_6" id="rbo_w_6_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_6_1">
                                        <input type="radio" name="rbo_w_6" id="rbo_w_6_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td rowspan="1"></td>
                                  <td>10</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_10_5">
                                        <input type="radio" name="rbo_w_10" id="rbo_w_10_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_10_4">
                                        <input type="radio" name="rbo_w_10" id="rbo_w_10_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_10_3">
                                        <input type="radio" name="rbo_w_10" id="rbo_w_10_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_10_2">
                                        <input type="radio" name="rbo_w_10" id="rbo_w_10_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_10_1">
                                        <input type="radio" name="rbo_w_10" id="rbo_w_10_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td rowspan="1"></td>
                                  <td>17</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_17_5">
                                        <input type="radio" name="rbo_w_17" id="rbo_w_17_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_17_4">
                                        <input type="radio" name="rbo_w_17" id="rbo_w_17_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_17_3">
                                        <input type="radio" name="rbo_w_17" id="rbo_w_17_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_17_2">
                                        <input type="radio" name="rbo_w_17" id="rbo_w_17_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_17_1">
                                        <input type="radio" name="rbo_w_17" id="rbo_w_17_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td rowspan="1"></td>
                                  <td>22</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_22_5">
                                        <input type="radio" name="rbo_w_22" id="rbo_w_22_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_22_4">
                                        <input type="radio" name="rbo_w_22" id="rbo_w_22_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_22_3">
                                        <input type="radio" name="rbo_w_22" id="rbo_w_22_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_22_2">
                                        <input type="radio" name="rbo_w_22" id="rbo_w_22_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_22_1">
                                        <input type="radio" name="rbo_w_22" id="rbo_w_22_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <thead>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Skills</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Item No.</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">5</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">4</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">3</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">2</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">1</th>
                                  </thead>
                                </tr>
                                <tr>
                                  <td rowspan="1" class="text-center"><h3>Co-operating</h3></td>
                                  <td>3</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_3_5">
                                        <input type="radio" name="rbo_w_3" id="rbo_w_3_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_3_4">
                                        <input type="radio" name="rbo_w_3" id="rbo_w_3_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_3_3">
                                        <input type="radio" name="rbo_w_3" id="rbo_w_3_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_3_2">
                                        <input type="radio" name="rbo_w_3" id="rbo_w_3_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_3_1">
                                        <input type="radio" name="rbo_w_3" id="rbo_w_3_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td rowspan="1"></td>
                                  <td>11</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_11_5">
                                        <input type="radio" name="rbo_w_11" id="rbo_w_11_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_11_4">
                                        <input type="radio" name="rbo_w_11" id="rbo_w_11_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_11_3">
                                        <input type="radio" name="rbo_w_11" id="rbo_w_11_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_11_2">
                                        <input type="radio" name="rbo_w_11" id="rbo_w_11_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_11_1">
                                        <input type="radio" name="rbo_w_11" id="rbo_w_11_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td rowspan="1"></td>
                                  <td>15</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_15_5">
                                        <input type="radio" name="rbo_w_15" id="rbo_w_15_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_15_4">
                                        <input type="radio" name="rbo_w_15" id="rbo_w_15_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_15_3">
                                        <input type="radio" name="rbo_w_15" id="rbo_w_15_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_15_2">
                                        <input type="radio" name="rbo_w_15" id="rbo_w_15_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_15_1">
                                        <input type="radio" name="rbo_w_15" id="rbo_w_15_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td rowspan="1"></td>
                                  <td>30</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_30_5">
                                        <input type="radio" name="rbo_w_30" id="rbo_w_30_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_30_4">
                                        <input type="radio" name="rbo_w_30" id="rbo_w_30_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_30_3">
                                        <input type="radio" name="rbo_w_30" id="rbo_w_30_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_30_2">
                                        <input type="radio" name="rbo_w_30" id="rbo_w_30_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_30_1">
                                        <input type="radio" name="rbo_w_30" id="rbo_w_30_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <thead>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Skills</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Item No.</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">5</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">4</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">3</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">2</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">1</th>
                                  </thead>
                                </tr>
                                <tr>
                                  <td rowspan="1" class="text-center"><h3>Investigating and Analyzing</h3></td>
                                  <td>2</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_2_5">
                                        <input type="radio" name="rbo_w_2" id="rbo_w_2_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_2_4">
                                        <input type="radio" name="rbo_w_2" id="rbo_w_2_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_2_3">
                                        <input type="radio" name="rbo_w_2" id="rbo_w_2_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_2_2">
                                        <input type="radio" name="rbo_w_2" id="rbo_w_2_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_2_1">
                                        <input type="radio" name="rbo_w_2" id="rbo_w_2_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td rowspan="1"></td>
                                  <td>5</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_5_5">
                                        <input type="radio" name="rbo_w_5" id="rbo_w_5_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_5_4">
                                        <input type="radio" name="rbo_w_5" id="rbo_w_5_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_5_3">
                                        <input type="radio" name="rbo_w_5" id="rbo_w_5_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_5_2">
                                        <input type="radio" name="rbo_w_5" id="rbo_w_5_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_5_1">
                                        <input type="radio" name="rbo_w_5" id="rbo_w_5_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td rowspan="1"></td>
                                  <td>12</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_12_5">
                                        <input type="radio" name="rbo_w_12" id="rbo_w_12_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_12_4">
                                        <input type="radio" name="rbo_w_12" id="rbo_w_12_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_12_3">
                                        <input type="radio" name="rbo_w_12" id="rbo_w_12_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_12_2">
                                        <input type="radio" name="rbo_w_12" id="rbo_w_12_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_12_1">
                                        <input type="radio" name="rbo_w_12" id="rbo_w_12_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td rowspan="1"></td>
                                  <td>29</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_29_5">
                                        <input type="radio" name="rbo_w_29" id="rbo_w_29_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_29_4">
                                        <input type="radio" name="rbo_w_29" id="rbo_w_29_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_29_3">
                                        <input type="radio" name="rbo_w_29" id="rbo_w_29_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_29_2">
                                        <input type="radio" name="rbo_w_29" id="rbo_w_29_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_29_1">
                                        <input type="radio" name="rbo_w_29" id="rbo_w_29_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <thead>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Skills</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Item No.</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">5</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">4</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">3</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">2</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">1</th>
                                  </thead>
                                </tr>
                                <tr>
                                  <td rowspan="1" class="text-center"><h3>Leadership</h3></td>
                                  <td>4</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_4_5">
                                        <input type="radio" name="rbo_w_4" id="rbo_w_4_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_4_4">
                                        <input type="radio" name="rbo_w_4" id="rbo_w_4_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_4_3">
                                        <input type="radio" name="rbo_w_4" id="rbo_w_4_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_4_2">
                                        <input type="radio" name="rbo_w_4" id="rbo_w_4_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_4_1">
                                        <input type="radio" name="rbo_w_4" id="rbo_w_4_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td rowspan="1"></td>
                                  <td>8</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_8_5">
                                        <input type="radio" name="rbo_w_8" id="rbo_w_8_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_8_4">
                                        <input type="radio" name="rbo_w_8" id="rbo_w_8_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_8_3">
                                        <input type="radio" name="rbo_w_8" id="rbo_w_8_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_8_2">
                                        <input type="radio" name="rbo_w_8" id="rbo_w_8_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_8_1">
                                        <input type="radio" name="rbo_w_8" id="rbo_w_8_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td rowspan="1"></td>
                                  <td>32</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_32_5">
                                        <input type="radio" name="rbo_w_32" id="rbo_w_32_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_32_4">
                                        <input type="radio" name="rbo_w_32" id="rbo_w_32_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_32_3">
                                        <input type="radio" name="rbo_w_32" id="rbo_w_32_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_32_2">
                                        <input type="radio" name="rbo_w_32" id="rbo_w_32_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_32_1">
                                        <input type="radio" name="rbo_w_32" id="rbo_w_32_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <thead>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Skills</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Item No.</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">5</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">4</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">3</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">2</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">1</th>
                                  </thead>
                                </tr>
                                <tr>
                                  <td rowspan="1" class="text-center"><h3>Planning and Organizing</h3></td>
                                  <td>20</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_20_5">
                                        <input type="radio" name="rbo_w_20" id="rbo_w_20_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_20_4">
                                        <input type="radio" name="rbo_w_20" id="rbo_w_20_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_20_3">
                                        <input type="radio" name="rbo_w_20" id="rbo_w_20_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_20_2">
                                        <input type="radio" name="rbo_w_20" id="rbo_w_20_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_20_1">
                                        <input type="radio" name="rbo_w_20" id="rbo_w_20_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td rowspan="1"></td>
                                  <td>24</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_24_5">
                                        <input type="radio" name="rbo_w_24" id="rbo_w_24_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_24_4">
                                        <input type="radio" name="rbo_w_24" id="rbo_w_24_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_24_3">
                                        <input type="radio" name="rbo_w_24" id="rbo_w_24_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_24_2">
                                        <input type="radio" name="rbo_w_24" id="rbo_w_24_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_24_1">
                                        <input type="radio" name="rbo_w_24" id="rbo_w_24_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td rowspan="1"></td>
                                  <td>26</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_26_5">
                                        <input type="radio" name="rbo_w_26" id="rbo_w_26_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_26_4">
                                        <input type="radio" name="rbo_w_26" id="rbo_w_26_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_26_3">
                                        <input type="radio" name="rbo_w_26" id="rbo_w_26_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_26_2">
                                        <input type="radio" name="rbo_w_26" id="rbo_w_26_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_26_1">
                                        <input type="radio" name="rbo_w_26" id="rbo_w_26_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td rowspan="1"></td>
                                  <td>27</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_27_5">
                                        <input type="radio" name="rbo_w_27" id="rbo_w_27_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_27_4">
                                        <input type="radio" name="rbo_w_27" id="rbo_w_27_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_27_3">
                                        <input type="radio" name="rbo_w_27" id="rbo_w_27_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_27_2">
                                        <input type="radio" name="rbo_w_27" id="rbo_w_27_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_27_1">
                                        <input type="radio" name="rbo_w_27" id="rbo_w_27_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <thead>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Skills</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">Item No.</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">5</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">4</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">3</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">2</th>
                                    <th style="background-image: linear-gradient(#4B3621, #4B3621);" class="text-white" colspan="1">1</th>
                                  </thead>
                                </tr>
                                <tr>
                                  <td rowspan="1" class="text-center"><h3>Numeracy</h3></td>
                                  <td>9</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_9_5">
                                        <input type="radio" name="rbo_w_9" id="rbo_w_9_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_9_4">
                                        <input type="radio" name="rbo_w_9" id="rbo_w_9_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_9_3">
                                        <input type="radio" name="rbo_w_9" id="rbo_w_9_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_9_2">
                                        <input type="radio" name="rbo_w_9" id="rbo_w_9_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_9_1">
                                        <input type="radio" name="rbo_w_9" id="rbo_w_9_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td rowspan="1"></td>
                                  <td>16</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_16_5">
                                        <input type="radio" name="rbo_w_16" id="rbo_w_16_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_16_4">
                                        <input type="radio" name="rbo_w_16" id="rbo_w_16_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_16_3">
                                        <input type="radio" name="rbo_w_16" id="rbo_w_16_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_16_2">
                                        <input type="radio" name="rbo_w_16" id="rbo_w_16_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_16_1">
                                        <input type="radio" name="rbo_w_16" id="rbo_w_16_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td rowspan="1"></td>
                                  <td>25</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_25_5">
                                        <input type="radio" name="rbo_w_25" id="rbo_w_25_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_25_4">
                                        <input type="radio" name="rbo_w_25" id="rbo_w_25_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_25_3">
                                        <input type="radio" name="rbo_w_25" id="rbo_w_25_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_25_2">
                                        <input type="radio" name="rbo_w_25" id="rbo_w_25_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_25_1">
                                        <input type="radio" name="rbo_w_25" id="rbo_w_25_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>

                                <tr>
                                  <td rowspan="1"></td>
                                  <td>28</td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_28_5">
                                        <input type="radio" name="rbo_w_28" id="rbo_w_28_5" value="5"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_28_4">
                                        <input type="radio" name="rbo_w_28" id="rbo_w_28_4" value="4"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_28_3">
                                        <input type="radio" name="rbo_w_28" id="rbo_w_28_3" value="3"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_28_2">
                                        <input type="radio" name="rbo_w_28" id="rbo_w_28_2" value="2"></input>
                                      </label>    
                                    </div>
                                  </td>
                                  <td>
                                    <div class="btn-group">                                   
                                      <label class="btn btn-light" for="rbo_w_28_1">
                                        <input type="radio" name="rbo_w_28" id="rbo_w_28_1" value="1"></input>
                                      </label>    
                                    </div>
                                  </td>
                                </tr>
                               

                            </table>
                          </div>
                        </div>
                      
                        
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
                                      <input oninput="this.value = this.value.toUpperCase()" type="text" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_5" > </input>
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
                                      <input oninput="this.value = this.value.toUpperCase()" type="text" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_5" > </input>
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
                                      <input oninput="this.value = this.value.toUpperCase()" type="text" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_5" > </input>
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
                                      <input oninput="this.value = this.value.toUpperCase()" type="text" name="answer[<?php echo ($i - 1); ?>][correct_items]" id="exampleRadios<?php echo ($i-1); ?>_5" > </input>
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
