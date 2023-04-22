<?php $exam_menus = find_exam_menu($_SESSION['key_session']['student_year'], $_SESSION['key_session']['exam_title']);  ?>
<?php foreach($exam_menus as $exam_menu): ?>
    <li>
        <a href="#" id="start_quiz" data-id="<?php echo $exam_menu['exam_category']; ?>" >
            <i class="bi bi-circle"></i><span><?php echo $exam_menu['exam_category']; ?></span>
        </a>
    </li>
<?php endforeach; ?>