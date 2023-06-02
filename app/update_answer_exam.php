<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php IS_HIGHER_LEVEL(); ?>
<?php $id = $_GET['id']; ?>
<?php $category = $_GET['category']; ?>
<?php $created = find_by_exam_created_by_id($id); ?>
<?php 
    global $db; 
    global $session;
?>
<?php
if (isset($_POST["button_update"])) {
    $sql_update = $db->query("UPDATE exam_created SET updated_answer ='1' WHERE id ='$id'");
    if ($sql_update) {
        if ($created['exam_category'] == 'Reading') { 
            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO reading(correct_items) VALUES('$value')");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
                
                redirect('./view_exam', false);
            }
        } elseif ($created['exam_category'] == 'Writing') {
            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO writing(correct_items) VALUES('$value')");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
               
                redirect('./view_exam', false);
            }
        } elseif ($created['exam_category'] == 'Speaking Skills') {
            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO speaking_skills(correct_items) VALUES('$value')");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
                
                redirect('./view_exam', false);
            }
        } elseif ($created['exam_category'] == 'Listening Skills') {
            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO listening_skills(correct_items) VALUES('$value')");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
           
                redirect('./view_exam', false);
            }
        } elseif ($created['exam_category'] == 'Learning Styles') {
            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO learning_styles(correct_items) VALUES('$value')");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
 
                redirect('./view_exam', false);
            }
        } elseif ($created['exam_category'] == 'Memory') {
            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO memory(correct_items) VALUES('$value')");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
      
                redirect('./view_exam', false);
            }
        } elseif ($created['exam_category'] == 'Study Skills') {
            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO study_skills(correct_items) VALUES('$value')");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
           
                redirect('./view_exam', false);
            }
        } elseif ($created['exam_category'] == 'Creative and Critical Thinking Skills') {
            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO creative_and_thinking(correct_items) VALUES('$value')");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
            
                redirect('./view_exam', false);
            }
        } elseif ($created['exam_category'] == 'Motivation') {
            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO motivation(correct_items) VALUES('$value')");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
                redirect('./view_exam', false);
            }
        } elseif ($created['exam_category'] == 'Self-Esteem') {
            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO self_esteem(correct_items) VALUES('$value')");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
                redirect('./view_exam', false);
            }
        } elseif ($created['exam_category'] == 'Personal Relationships') {
            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO personal_relationship(correct_items) VALUES('$value')");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
                redirect('./view_exam', false);
            }
        } elseif ($created['exam_category'] == 'Conflict Resolution') {

            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO conflict_resolutions(correct_items) VALUES('$value')");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
                redirect('./view_exam', false);
            }

        } elseif ($created['exam_category'] == 'Health') {

            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO health(correct_items) VALUES('$value')");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
                redirect('./view_exam', false);
            }

        } elseif ($created['exam_category'] == 'Time Management') {

            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO time_management(correct_items) VALUES('$value')");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
                redirect('./view_exam', false);
            }

        } elseif ($created['exam_category'] == 'Money Management') {

            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO money_management(correct_items) VALUES('$value')");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
                redirect('./view_exam', false);
            }

        } elseif ($created['exam_category'] == 'Personal Purpose') {

            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO personal_purpose(correct_items) VALUES('$value')");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
                redirect('./view_exam', false);
            }

        } elseif ($created['exam_category'] == 'Career Planning') {

            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO career_planning(correct_items) VALUES('$value')");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
                redirect('./view_exam', false);
            }

        } elseif ($created['exam_category'] == 'Support Resources') {

            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO support_resources(correct_items) VALUES('$value')");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
                redirect('./view_exam', false);
            }
        } elseif ($created['exam_description'] == 'Vocabulary') {

            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO vocabulary(correct_items) VALUES('$value')");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
                redirect('./view_exam', false);
            }

        } elseif ($created['exam_description'] == 'Computation') {

            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO computation(correct_items) VALUES('$value')");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
                redirect('./view_exam', false);
            }

        } elseif ($created['exam_description'] == 'Spatial') {

            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO `spatial`(correct_items) VALUES('$value')");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
                redirect('./view_exam', false);
            }
           
        } elseif ($created['exam_description'] == 'Word Comparison') {

            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO work_comparison(correct_items) VALUES('$value')");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
                redirect('./view_exam', false);
            }

           
        } elseif ($created['exam_description'] == 'Making marks Part 1') {

            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO marking_marks_pt_1(correct_items) VALUES('$value')");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
                redirect('./view_exam', false);
            }

        } elseif ($created['exam_description'] == 'Making marks Part 2') {

          foreach ($_REQUEST['answer'] as $key => $value) {
              $value = $value['items'];
              $sql = $db->query("INSERT INTO marking_marks_pt_2(correct_items) VALUES('$value')");
          }
          if ($sql) {
              redirect('./view_exam', false);
          } else {
              redirect('./view_exam', false);
          }

      } elseif ($created['exam_description'] == 'BarOn EQ-i:S') {

            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO baron_eq(correct_items) VALUES('$value')");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
                redirect('./view_exam', false);
            }

        } elseif ($created['exam_description'] == 'The Keirsey Temerament Sorter') {

            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO keirsey_temerament_sorter(correct_items) VALUES('$value')");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
                redirect('./view_exam', false);
            }

        } elseif ($created['exam_description'] == 'Aptitude J and C') {

            if ($created['exam_category'] == 'Test No 1') {
                foreach ($_REQUEST['answer'] as $key => $value) {
                    $value = $value['items_1'];
                    $sql1 = $db->query("INSERT INTO aptitude_j_and_c_1(correct_items) VALUES('$value')");
                }

                if ($sql1) {
                    redirect('./view_exam', false);
                } else {
                    redirect('./view_exam', false);
                }
            } elseif ($created['exam_category'] == 'Test No 2') {
                foreach ($_REQUEST['answer'] as $key => $value) {
                    $value = $value['items_2'];
                    $sql2 = $db->query("INSERT INTO aptitude_j_and_c_2(correct_items) VALUES('$value')");
                }

                if ($sql2) {
                    redirect('./view_exam', false);
                } else {
                    redirect('./view_exam', false);
                }
            } elseif ($created['exam_category'] == 'Test No 3') {
                foreach ($_REQUEST['answer'] as $key => $value) {
                    $value = $value['items_3'];
                    $sql3 = $db->query("INSERT INTO aptitude_j_and_c_3(correct_items) VALUES('$value')");
                }

                if ($sql3) {
                    redirect('./view_exam', false);
                } else {
                    redirect('./view_exam', false);
                }
    
            } elseif ($created['exam_category'] == 'Test No 4') {
                foreach ($_REQUEST['answer'] as $key => $value) {
                    $value = $value['items_4'];
                    $sql4 = $db->query("INSERT INTO aptitude_j_and_c_4(correct_items) VALUES('$value')");
                }

                if ($sql4) {
                    redirect('./view_exam', false);
                } else {
                    redirect('./view_exam', false);
                }
            }

        } elseif ($created['exam_description'] == 'ESA') {

            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO esa(correct_items) VALUES('$value')");
            }

            if ($sql) {
                redirect('./view_exam', false);
            } else {
                redirect('./view_exam', false);
            }

        } elseif ($created['exam_description'] == 'Aptitude Verbal and Numerical') {

            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("INSERT INTO aptitude_verbal_and_numerical(correct_items) VALUES('$value')");
            }

            if ($sql) {
                redirect('./view_exam', false);
            } else {
                redirect('./view_exam', false);
            }
        }
    }
}
?>
<?php include('../start_menu_bar.php'); ?>

<main id="main" class="main">
    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#"><?php echo $created['exam_title']; ?></a></li>
          <li class="breadcrumb-item"><?php echo $created['exam_description']; ?></li>
          <li class="breadcrumb-item active"><?php echo $created['exam_category']; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
        <form method="POST">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card rounded-0">
                        <div class="card-body pt-3">
                            <?php echo display_message($msg); ?>
                            <ul class="nav nav-tabs nav-tabs-bordered">
                                <li class="nav-item">
                                    <h5>Update Exam Answer</h5>
                                </li>
                            </ul>
                            <br/>
                            <div class="tab-content pt-2" id="profile-edit">

                            <?php if ($created['student_year'] == 'First Year' && $created['exam_title'] == 'Student Success Kit') { ?>
                            <div class="row">
                                <div class="col-xl-6">

                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Item no. 1</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[s_item_no_1][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>
  
                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Item no. 2</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[s_item_no_2][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>
                  
                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Item no. 3</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[s_item_no_3][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>
                  
                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Item no. 4</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[s_item_no_4][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>
  
                            </div>
                            <div class="col-xl-6">
  
                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Item no. 5</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[s_item_no_5][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>
  
                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Item no. 6</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[s_item_no_6][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>
                  
                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Item no. 7</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[s_item_no_7][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>
                  
                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Item no. 8</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[s_item_no_8][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>
  
                                </div>
                            </div>
                            <?php } elseif ($created['student_year'] == 'First Year' && $created['exam_title'] == 'OASIS 3' && $created['exam_description'] == 'Vocabulary') { ?>
                            <div class="row">
                                <div class="col-xl-3">
                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[v_item_no_1][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>
                    
                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[v_item_no_2][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[v_item_no_3][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[v_item_no_4][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[v_item_no_5][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[v_item_no_6][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[v_item_no_7][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 8</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[v_item_no_8][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 9</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[v_item_no_9][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 10</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[v_item_no_10][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>
                  
                            </div>
                            <div class="col-xl-3">

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 11</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[v_item_no_11][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>
                    
                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 12</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[v_item_no_12][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 13</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[v_item_no_13][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 14</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[v_item_no_14][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 15</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[v_item_no_15][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 16</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[v_item_no_16][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 17</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[v_item_no_17][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 18</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[v_item_no_18][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 19</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[v_item_no_19][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 20</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[v_item_no_20][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>               
                  
                            </div>
                            <div class="col-xl-3">

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 21</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[v_item_no_21][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>
                    
                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 22</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[v_item_no_22][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 23</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[v_item_no_23][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 24</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[v_item_no_24][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 25</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[v_item_no_25][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 26</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[v_item_no_26][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 27</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[v_item_no_27][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 28</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[v_item_no_28][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 29</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[v_item_no_29][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 30</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[v_item_no_30][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                            </div>
                            <div class="col-xl-3">

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 31</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[v_item_no_31][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>
                    
                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 32</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[v_item_no_32][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 33</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[v_item_no_33][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 34</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[v_item_no_34][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 35</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[v_item_no_35][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 36</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[v_item_no_36][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 37</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[v_item_no_37][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 38</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[v_item_no_38][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 39</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[v_item_no_39][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 40</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[v_item_no_40][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                </div>
                            </div>
                            <?php } elseif ($created['student_year'] == 'First Year' && $created['exam_title'] == 'OASIS 3' && $created['exam_description'] == 'Computation') { ?>
                            <div class="row">
                                <div class="col-xl-4">
                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_1][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>
                    
                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_2][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_3][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_4][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_5][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="answer[c_item_no_6][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                    </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_7][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 8</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_8][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 9</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_9][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 10</label>
                                <div class="col-md-8 col-lg-9">
                                     <input name="answer[c_item_no_10][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>
                  
                            </div>
                            <div class="col-xl-4">

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 11</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_11][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>
                    
                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 12</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_12][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 13</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_13][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 14</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_14][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 15</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_15][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 16</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_16][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 17</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_17][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 18</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_18][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 19</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_19][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 20</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_20][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>               
                  
                            </div>
                            <div class="col-xl-4">

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 21</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_21][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>
                    
                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 22</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_22][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 23</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_23][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 24</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_24][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 25</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_25][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 26</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_26][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 27</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_27][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 28</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_28][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 29</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_29][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 30</label>
                                <div class="col-md-8 col-lg-9">
                                    <input name="answer[c_item_no_30][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                                </div>

                                </div>                
                            </div>
                            <?php } elseif ($created['student_year'] == 'First Year' && $created['exam_title'] == 'OASIS 3' && $created['exam_description'] == 'Spatial') { ?>
                    <div class="row">
                    <div class="col-xl-6">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[sp_item_no_1][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[sp_item_no_2][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[sp_item_no_3][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[sp_item_no_4][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[sp_item_no_5][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[sp_item_no_6][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[sp_item_no_7][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 8</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[sp_item_no_8][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 9</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[sp_item_no_9][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 10</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[sp_item_no_10][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                  </div>
                  <div class="col-xl-6">

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 11</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[sp_item_no_11][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 12</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[sp_item_no_12][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 13</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[sp_item_no_13][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 14</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[sp_item_no_14][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 15</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[sp_item_no_15][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 16</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[sp_item_no_16][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 17</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[sp_item_no_17][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 18</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[sp_item_no_18][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 19</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[sp_item_no_19][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 20</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[sp_item_no_20][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>               
                  
                  </div>                  
                  </div>
                <?php } elseif ($created['student_year'] == 'First Year' && $created['exam_title'] == 'OASIS 3' && $created['exam_description'] == 'Word Comparison') { ?>
                <div class="row">
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_1][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_2][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_3][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_4][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_5][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_6][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_7][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 8</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_8][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 9</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_9][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 10</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_10][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 11</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_11][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 12</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_12][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 13</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_13][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 14</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_14][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 15</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_15][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 16</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_16][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 17</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_17][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 18</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_18][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 19</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_19][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 20</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_20][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-2">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 21</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_21][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 22</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_22][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 23</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_23][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 24</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_24][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 25</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_25][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 26</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_26][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 27</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_27][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 28</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_28][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 29</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_29][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 30</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_30][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 31</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_31][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 32</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_32][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 33</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_33][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 34</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_34][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 35</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_35][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 36</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_36][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 37</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_37][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 38</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_38][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 39</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_39][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 40</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_40][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-2">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 41</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_41][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 42</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_42][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 43</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_43][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 44</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_44][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 45</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_45][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 46</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_46][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 47</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_47][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 48</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_48][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 49</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_49][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 50</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_50][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 51</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_51][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 52</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_52][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 53</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_53][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 54</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_54][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 55</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_55][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 56</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_56][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 57</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_57][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 58</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_58][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 59</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_59][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 60</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_60][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-2">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 61</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_61][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 62</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_62][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 63</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_63][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 64</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_64][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 65</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_65][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 66</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_66][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 67</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_67][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 68</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_68][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 69</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_69][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 70</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_70][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 71</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_71][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 72</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_72][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 73</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_73][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 74</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_74][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 75</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_75][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 76</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_76][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 77</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_77][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 78</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_78][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 79</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_79][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 80</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_80][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 81</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_81][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 82</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_82][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 83</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_83][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 84</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_84][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 85</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_85][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 86</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_86][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 87</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_87][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 88</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_88][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 89</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_89][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 90</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_90][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 91</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_91][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 92</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_92][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 93</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_93][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 94</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_94][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 95</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_95][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 96</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_96][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 97</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_97][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 98</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_98][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 99</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_99][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 100</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[w_item_no_100][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                  </div>                 
                </div>
                <?php } elseif ($created['student_year'] == 'First Year' && $created['exam_title'] == 'OASIS 3' && $created['exam_description'] == 'Making marks Part 1') { ?>
                  <div class="row">
                    <div class="col-xl-6">
                      <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="answer[m_item_no_1][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                        </div>
                    </div>
                    <div class="col-xl-6"></div>
                  </div>
                <?php } elseif ($created['student_year'] == 'First Year' && $created['exam_title'] == 'OASIS 3' && $created['exam_description'] == 'Making marks Part 2') { ?>
                  <div class="row">
                    <div class="col-xl-6">
                      <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="answer[m_item_no_2][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                        </div>
                    </div>
                    <div class="col-xl-6"></div>
                  </div>
                <?php } elseif ($created['student_year'] == 'Second Year' && $created['exam_title'] == 'BarOn EQ-i:S') { ?>

                <div class="row">
                  <div class="col-xl-4">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_1][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_2][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_3][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_4][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_5][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_6][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_7][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 8</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_8][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 9</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_9][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 10</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_10][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 11</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_11][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 12</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_12][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 13</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_13][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 14</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_14][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 15</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_15][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 16</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_16][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 17</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_17][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 18</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_18][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 19</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_19][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 20</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_20][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-4">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 21</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_21][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 22</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_22][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 23</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_23][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 24</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_24][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 25</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_25][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 26</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_26][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 27</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_27][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 28</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_28][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 29</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_29][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 30</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_30][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 31</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_31][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 32</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_32][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 33</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_33][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 34</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_34][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 35</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_35][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 36</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_36][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 37</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_37][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 38</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_38][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 39</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_39][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 40</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_40][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-4">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 41</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_41][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 42</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_42][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 43</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_43][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 44</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_44][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 45</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_45][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 46</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_46][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 47</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_47][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 48</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_48][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 49</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_49][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 50</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_50][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 51</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[b_item_no_51][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                  </div>                 
                </div>
                <?php } elseif ($created['student_year'] == 'Third Year' && $created['exam_title'] == 'The Keirsey Temperament Sorter') { ?>
                <div class="row">
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_1][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_2][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_3][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_4][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_5][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_6][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_7][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 8</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_8][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 9</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_9][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 10</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_10][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 11</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_11][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 12</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_12][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 13</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_13][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 14</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_14][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 15</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_15][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 16</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_16][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 17</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_17][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 18</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_18][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 19</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_19][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 20</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_20][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 21</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_21][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 22</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_22][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 23</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_23][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 24</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_24][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 25</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_25][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 26</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_26][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 27</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_27][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 28</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_28][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 29</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_29][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 30</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_30][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 31</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_31][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 32</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_32][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 33</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_33][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 34</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_34][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 35</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_35][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 36</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_36][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 37</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_37][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 38</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_38][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 39</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_39][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 40</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_40][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 41</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_41][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 42</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_42][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 43</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_43][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 44</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_44][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 45</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_45][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 46</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_46][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 47</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_47][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 48</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_48][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 49</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_49][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 50</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_50][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 51</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_51][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 52</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_52][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 53</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_53][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 54</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_54][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 55</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_55][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 56</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_56][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 57</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_57][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 58</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_58][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 59</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_59][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 60</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_60][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 61</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_61][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 62</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_62][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 63</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_63][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 64</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_64][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 65</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_65][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 66</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_66][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 67</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_67][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 68</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_68][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 69</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_69][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 70</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[k_item_no_70][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                  </div>   
                </div>                  
                <?php } elseif ($created['student_year'] == 'Fourth Year' && $created['exam_title'] == 'Aptitude J and C') { ?>
                <?php if ($created['exam_category'] == 'Test No 1') { ?>
                    <div class="row">
                    <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_1_item_no_1][items_1]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_1_item_no_2][items_1]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_1_item_no_3][items_1]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_1_item_no_4][items_1]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_1_item_no_5][items_1]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_1_item_no_6][items_1]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                  </div>   
                    </div>
                <?php } elseif ($created['exam_category'] == 'Test No 2') { ?>
                    <div class="row">
                    <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_2_item_no_1][items_2]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_2_item_no_2][items_2]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_2_item_no_3][items_2]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_2_item_no_4][items_2]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_2_item_no_5][items_2]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_2_item_no_6][items_2]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_2_item_no_7][items_2]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                  </div>   
                    </div>
                <?php } elseif ($created['exam_category'] == 'Test No 3') { ?>
                    <div class="row">
                    <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_3_item_no_1][items_3]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_3_item_no_2][items_3]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_3_item_no_3][items_3]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_3_item_no_4][items_3]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_3_item_no_5][items_3]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_3_item_no_6][items_3]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_3_item_no_7][items_3]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                  </div> 
                    </div>  
                <?php } elseif ($created['exam_category'] == 'Test No 4') { ?>
                    <div class="row">
                    <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_4_item_no_1][items_4]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_4_item_no_2][items_4]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_4_item_no_3][items_4]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_4_item_no_4][items_4]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_4_item_no_5][items_4]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[ajc_4_item_no_6][items_4]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                  </div>   
                    </div>
                <?php } ?>
                <?php } elseif ($created['student_year'] == 'Fourth Year' && $created['exam_title'] == 'ESA') { ?>
                <div class="row">
                  <div class="col-xl-4">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_1][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_2][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_3][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_4][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_5][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_6][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_7][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 8</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_8][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 9</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_9][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 10</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_10][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                  </div>
                  <div class="col-xl-4">

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 11</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_11][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 12</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_12][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 13</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_13][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 14</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_14][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 15</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_15][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 16</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_16][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 17</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_17][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 18</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_18][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 19</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_19][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 20</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_20][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>               
                  
                  </div>
                  <div class="col-xl-4">

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 21</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_21][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 22</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_22][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 23</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_23][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 24</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_24][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 25</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_25][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 26</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_26][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 27</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_27][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 28</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_28][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 29</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_29][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 30</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_30][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 31</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_31][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 32</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[e_item_no_32][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                  </div>   
                </div>
                <?php } elseif ($created['student_year'] == 'Fourth Year' && $created['exam_title'] == 'Aptitude Verbal and Numerical')  { ?>
                    <div class="row">
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 1</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_1][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 2</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_2][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 3</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_3][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 4</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_4][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 5</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_5][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 6</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_6][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 7</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_7][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 8</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_8][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 9</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_9][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 10</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_10][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 11</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_11][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 12</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_12][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 13</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_13][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 14</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_14][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 15</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_15][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 16</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_16][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 17</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_17][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 18</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_18][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 19</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_19][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 20</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_20][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-2">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 21</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_21][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 22</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_22][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 23</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_23][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 24</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_24][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 25</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_25][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 26</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_26][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 27</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_27][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 28</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_28][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 29</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_29][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 30</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_30][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 31</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_31][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 32</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_32][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 33</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_33][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 34</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_34][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 35</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_35][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 36</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_36][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 37</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_37][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 38</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_38][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 39</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_39][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 40</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_40][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-2">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 41</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_41][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 42</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_42][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 43</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_43][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 44</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_44][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 45</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_45][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 46</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_46][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 47</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_47][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 48</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_48][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 49</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_49][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 50</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_50][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 51</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_51][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 52</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_52][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 53</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_53][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 54</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_54][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 55</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_55][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 56</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_56][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 57</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_57][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 58</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_58][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 59</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_59][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 60</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_60][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-2">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 61</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_61][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 62</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_62][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 63</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_63][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 64</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_64][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 65</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_65][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 66</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_66][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 67</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_67][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 68</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_68][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 69</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_69][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 70</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_70][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 71</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_71][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 72</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_72][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 73</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_73][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 74</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_74][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 75</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_75][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 76</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_76][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 77</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_77][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 78</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_78][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 79</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_79][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 80</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_80][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                  
                  </div>   
                  <div class="col-xl-3">
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 81</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_81][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                    
                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 82</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_82][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 83</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_83][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>

                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. 84</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="answer[av_item_no_84][items]" type="text" class="form-control rounded-0" id="fullName" value="" >
                      </div>
                </div>
                  </div>    

                <?php } ?>                  

                                <div class="text-center">
                                    <br/>
                                    <input type="submit" name="button_update" class="btn btn-primary rounded-pill" value="Update Answer"></input>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

  </main><!-- End #main -->
<?php include('../footer.php'); ?>
