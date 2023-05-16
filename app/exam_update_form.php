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
        if ($created['exam_description'] == 'Vocabulary') {

            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("UPDATE vocabulary SET correct_items ='$value' WHERE id='$key'");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
                redirect('./view_exam', false);
            }

        } elseif ($created['exam_description'] == 'Computation') {

            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("UPDATE computation SET correct_items ='$value' WHERE id='$key'");;
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
                redirect('./view_exam', false);
            }

        } elseif ($created['exam_description'] == 'Spatial') {

            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("UPDATE `spatial` SET correct_items ='$value' WHERE id='$key'");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
                redirect('./view_exam', false);
            }
           
        } elseif ($created['exam_description'] == 'Word Comparison') {

            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("UPDATE work_comparison SET correct_items ='$value' WHERE id='$key'");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
                redirect('./view_exam', false);
            }

           
        } elseif ($created['exam_description'] == 'BarOn EQ-i:S') {

            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("UPDATE baron_eq SET correct_items ='$value' WHERE id='$key'");
            }
            if ($sql) {
                redirect('./view_exam', false);
            } else {
                redirect('./view_exam', false);
            }

        } elseif ($created['exam_description'] == 'The Keirsey Temerament Sorter') {

            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("UPDATE keirsey_temerament_sorter SET correct_items ='$value' WHERE id='$key'");
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
                    $sql1 = $db->query("UPDATE aptitude_j_and_c_1 SET correct_items ='$value' WHERE id='$key'");
                }

                if ($sql1) {
                    redirect('./view_exam', false);
                } else {
                    redirect('./view_exam', false);
                }
            } elseif ($created['exam_category'] == 'Test No 2') {
                foreach ($_REQUEST['answer'] as $key => $value) {
                    $value = $value['items_2'];
                    $sql2 = $db->query("UPDATE aptitude_j_and_c_2 SET correct_items ='$value' WHERE id='$key'");
                }

                if ($sql2) {
                    redirect('./view_exam', false);
                } else {
                    redirect('./view_exam', false);
                }
            } elseif ($created['exam_category'] == 'Test No 3') {
                foreach ($_REQUEST['answer'] as $key => $value) {
                    $value = $value['items_3'];
                    $sql3 = $db->query("UPDATE aptitude_j_and_c_3 SET correct_items ='$value' WHERE id='$key'");
                }

                if ($sql3) {
                    redirect('./view_exam', false);
                } else {
                    redirect('./view_exam', false);
                }
    
            } elseif ($created['exam_category'] == 'Test No 4') {
                foreach ($_REQUEST['answer'] as $key => $value) {
                    $value = $value['items_4'];
                    $sql4 = $db->query("UPDATE aptitude_j_and_c_4 SET correct_items ='$value' WHERE id='$key'");
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
                $sql = $db->query("UPDATE esa SET correct_items ='$value' WHERE id='$key'");
            }

            if ($sql) {
                redirect('./view_exam', false);
            } else {
                redirect('./view_exam', false);
            }

        } elseif ($created['exam_description'] == 'Aptitude Verbal and Numerical') {

            foreach ($_REQUEST['answer'] as $key => $value) {
                $value = $value['items'];
                $sql = $db->query("UPDATE aptitude_verbal_and_numerical SET correct_items ='$value' WHERE id='$key'");
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
                            <div class="tab-content pt-2" id="profile-edit" >

                            <?php if ($created['student_year'] == 'First Year' && $created['exam_title'] == 'OASIS 3' && $created['exam_description'] == 'Vocabulary') { ?>
                            <div class="row">
                                <?php $sqlCheck = $db->query("SELECT * FROM vocabulary"); ?>
                                <?php if ($sqlCheck->num_rows > 0) { ?>
                                <?php $i = 1; ?>
                                <?php while($row = $sqlCheck->fetch_assoc()) { ?>
                                <?php $i++;?>
                                <?php if($i >= 1 && $i <= 11) { ?>
                                <div class="col-xl-3">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } elseif ($i >= 11 && $i <= 21) { ?>
                                <div class="col-xl-3">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } elseif ($i >= 21 && $i <= 31) { ?>
                                <div class="col-xl-3">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } elseif ($i >= 31 && $i <=41) { ?>
                                <div class="col-xl-3">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>

                              
                            </div>
                            <?php } elseif ($created['student_year'] == 'First Year' && $created['exam_title'] == 'OASIS 3' && $created['exam_description'] == 'Computation') { ?>
                            <div class="row">
                            <?php $sqlCheck = $db->query("SELECT * FROM computation"); ?>
                                <?php if ($sqlCheck->num_rows > 0) { ?>
                                <?php $i = 1; ?>
                                <?php while($row = $sqlCheck->fetch_assoc()) { ?>
                                <?php $i++;?>
                                <?php if($i >= 1 && $i <= 11) { ?>
                                <div class="col-xl-4">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } elseif ($i >= 11 && $i <= 21) { ?>
                                <div class="col-xl-4">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } elseif ($i >= 21 && $i <= 31) { ?>
                                <div class="col-xl-4">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                            </div>
                            <?php } elseif ($created['student_year'] == 'First Year' && $created['exam_title'] == 'OASIS 3' && $created['exam_description'] == 'Spatial') { ?>
                            <div class="row">
                                <?php $sqlCheck = $db->query("SELECT * FROM `spatial`"); ?>
                                <?php if ($sqlCheck->num_rows > 0) { ?>
                                <?php $i = 1; ?>
                                <?php while($row = $sqlCheck->fetch_assoc()) { ?>
                                <?php $i++;?>
                                <?php if($i >= 1 && $i <= 11) { ?>
                                <div class="col-xl-6">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } elseif ($i >= 11 && $i <= 21) { ?>
                                <div class="col-xl-6">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                            </div>
                            <?php } elseif ($created['student_year'] == 'First Year' && $created['exam_title'] == 'OASIS 3' && $created['exam_description'] == 'Word Comparison') { ?>
                            <div class="row">
                                <?php $sqlCheck = $db->query("SELECT * FROM work_comparison"); ?>
                                <?php if ($sqlCheck->num_rows > 0) { ?>
                                <?php $i = 1; ?>
                                <?php while($row = $sqlCheck->fetch_assoc()) { ?>
                                <?php $i++;?>
                                <?php if($i >= 1 && $i <= 26) { ?>
                                <div class="col-xl-3">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } elseif ($i >= 26 && $i <= 51) { ?>
                                <div class="col-xl-3">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } elseif ($i >= 51 && $i <= 76) { ?>
                                <div class="col-xl-3">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } elseif ($i >= 76 && $i <= 101) { ?>
                                <div class="col-xl-3">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                            </div>
                            <?php } elseif ($created['student_year'] == 'Second Year' && $created['exam_title'] == 'BarOn EQ-i:S') { ?>
                            <div class="row">
                            <?php $sqlCheck = $db->query("SELECT * FROM baron_eq"); ?>
                                <?php if ($sqlCheck->num_rows > 0) { ?>
                                <?php $i = 1; ?>
                                <?php while($row = $sqlCheck->fetch_assoc()) { ?>
                                <?php $i++;?>
                                <?php if($i >= 1 && $i <= 21) { ?>
                                <div class="col-xl-3">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } elseif ($i >= 21 && $i <= 41) { ?>
                                <div class="col-xl-3">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } elseif ($i >= 41 && $i <= 52) { ?>
                                <div class="col-xl-3">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                            </div>
                            <?php } elseif ($created['student_year'] == 'Third Year' && $created['exam_title'] == 'The Keirsey Temperament Sorter') { ?>
                            <div class="row">
                                <?php $sqlCheck = $db->query("SELECT * FROM keirsey_temerament_sorter"); ?>
                                <?php if ($sqlCheck->num_rows > 0) { ?>
                                <?php $i = 1; ?>
                                <?php while($row = $sqlCheck->fetch_assoc()) { ?>
                                <?php $i++;?>
                                <?php if($i >= 1 && $i <= 21) { ?>
                                <div class="col-xl-3">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } elseif ($i >= 21 && $i <= 41) { ?>
                                <div class="col-xl-3">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } elseif ($i >= 41 && $i <= 61) { ?>
                                <div class="col-xl-3">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php }elseif ($i >= 61 && $i <= 71) { ?>
                                <div class="col-xl-3">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                            </div>                  
                            <?php } elseif ($created['student_year'] == 'Fourth Year' && $created['exam_title'] == 'Aptitude J and C') { ?>
                            <?php if ($created['exam_category'] == 'Test No 1') { ?>
                                <div class="row">
                                <?php $sqlCheck = $db->query("SELECT * FROM aptitude_j_and_c_1"); ?>
                                <?php if ($sqlCheck->num_rows > 0) { ?>
                                <?php $i = 1; ?>
                                <?php while($row = $sqlCheck->fetch_assoc()) { ?>
                                <?php $i++;?>
                                <?php if($i >= 1 && $i <= 7) { ?>
                                <div class="col-xl-3"></div>
                                <div class="col-xl-9">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                                </div>   
                            <?php } elseif ($created['exam_category'] == 'Test No 2') { ?>
                            <div class="row">
                                <?php $sqlCheck = $db->query("SELECT * FROM aptitude_j_and_c_2"); ?>
                                <?php if ($sqlCheck->num_rows > 0) { ?>
                                <?php $i = 1; ?>
                                <?php while($row = $sqlCheck->fetch_assoc()) { ?>
                                <?php $i++;?>
                                <?php if($i >= 1 && $i <= 8) { ?>
                                <div class="col-xl-3"></div>
                                <div class="col-xl-9">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                            </div>   
                            <?php } elseif ($created['exam_category'] == 'Test No 3') { ?>
                            <div class="row">
                                <?php $sqlCheck = $db->query("SELECT * FROM aptitude_j_and_c_3"); ?>
                                <?php if ($sqlCheck->num_rows > 0) { ?>
                                <?php $i = 1; ?>
                                <?php while($row = $sqlCheck->fetch_assoc()) { ?>
                                <?php $i++;?>
                                <?php if($i >= 1 && $i <= 8) { ?>
                                <div class="col-xl-3"></div>
                                <div class="col-xl-9">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                            </div>  
                            <?php } elseif ($created['exam_category'] == 'Test No 4') { ?>
                            <div class="row">
                            <?php $sqlCheck = $db->query("SELECT * FROM aptitude_j_and_c_4"); ?>
                                <?php if ($sqlCheck->num_rows > 0) { ?>
                                <?php $i = 1; ?>
                                <?php while($row = $sqlCheck->fetch_assoc()) { ?>
                                <?php $i++;?>
                                <?php if($i >= 1 && $i <= 7) { ?>
                                <div class="col-xl-3"></div>
                                <div class="col-xl-9">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                            </div>
                            <?php } ?>
                            <?php } elseif ($created['student_year'] == 'Fourth Year' && $created['exam_title'] == 'ESA') { ?>
                            <div class="row">
                                <?php $sqlCheck = $db->query("SELECT * FROM esa"); ?>
                                <?php if ($sqlCheck->num_rows > 0) { ?>
                                <?php $i = 1; ?>
                                <?php while($row = $sqlCheck->fetch_assoc()) { ?>
                                <?php $i++;?>
                                <?php if($i >= 1 && $i <= 11) { ?>
                                <div class="col-xl-3">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } elseif ($i >= 1 && $i <= 21) { ?>
                                <div class="col-xl-3">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } elseif ($i >= 21 && $i <= 33) { ?>
                                <div class="col-xl-3">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                            </div>
                            <?php } elseif ($created['student_year'] == 'Fourth Year' && $created['exam_title'] == 'Aptitude Verbal and Numerical')  { ?>
                            <div class="row">
                            <?php $sqlCheck = $db->query("SELECT * FROM aptitude_verbal_and_numerical"); ?>
                                <?php if ($sqlCheck->num_rows > 0) { ?>
                                <?php $i = 1; ?>
                                <?php while($row = $sqlCheck->fetch_assoc()) { ?>
                                <?php $i++;?>
                                <?php if($i >= 1 && $i <= 21) { ?>
                                <div class="col-xl-3">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } elseif ($i >= 21 && $i <= 41) { ?>
                                <div class="col-xl-3">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } elseif ($i >= 41 && $i <= 61) { ?>
                                <div class="col-xl-3">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                </div>
                                <?php } elseif ($i >= 41 && $i <= 61) { ?>
                                <div class="col-xl-3">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                    </div>
                                <?php } elseif ($i >= 61 && $i <= 85) { ?>
                                <div class="col-xl-3">
                                    <label for="fullName" class="col-md-4 col-lg-12 col-form-label">Item no. <?php echo ($i -1) ?></label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="answer[<?php echo ($i - 1); ?>][items]" type="text" class="form-control rounded-0" id="fullName" value="<?php echo $row['correct_items']; ?>" >
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php } ?>
                                <?php } ?>
                            </div>    
                         <?php } ?>                  

                        <div class="text-center">
                                    <br/>
                                    <input type="submit" name="button_update" class="btn btn-primary rounded-0" value="Update Answer"></input>
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
