<?php $exam_menus = find_exam_menu(
    $_SESSION['key_session']['student_year'], 
    $_SESSION['key_session']['academic_semester'],
    $_SESSION['key_session']['academic_school_year'],
    "Aptitude Verbal and Numerical"
);  
?>
<?php foreach($exam_menus as $exam_menu): ?>
    <li>
        <?php if ($exam_menu['exam_title'] == 'Aptitude Verbal and Numerical') { ?>
            <a href="#" id="start_quiz" data-id="<?php echo $exam_menu['id']; ?>" >
                <i class="bi bi-circle"></i><span><?php echo $exam_menu['exam_description']; ?></span>
            </a>
        <?php } ?>
    </li>
<?php endforeach; ?>