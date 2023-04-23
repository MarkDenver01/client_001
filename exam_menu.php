<?php $exam_menus = find_exam_menu(
    $_SESSION['key_session']['student_year'], 
    $_SESSION['key_session']['exam_title'], 
    $_SESSION['key_session']['semester'],
    $_SESSION['key_session']['school_year']
);  
?>
<?php foreach($exam_menus as $exam_menu): ?>
    <li>
        <?php if ($exam_menu['exam_title'] == 'Student Success Kit') { ?>
            <a href="#" id="start_quiz" data-id="<?php echo $exam_menu['exam_category']; ?>" >
                <i class="bi bi-circle"></i><span><?php echo $exam_menu['exam_category']; ?></span>
            </a>
        <?php } else { ?>
            <a href="#" id="start_quiz" data-id="<?php echo $exam_menu['exam_description']; ?>" >
                <i class="bi bi-circle"></i><span><?php echo $exam_menu['exam_description']; ?></span>
            </a>
        <?php } ?>

    </li>
<?php endforeach; ?>