<?php require_once('../../lib/class.environment.php'); ?>
<?php $db = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']); ?>
<?php 
    $student_year = $_POST['student_year'];
    $exam_type = $_POST['exam_title'];
    $exam_description = $_POST['exam_description'];
    $sql = "SELECT distinct(exam_category) FROM exam_created WHERE student_year='" .$student_year. "' AND exam_title ='" .$_POST['exam_title']. "' AND exam_description ='" .$exam_description. "'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        echo '<option value="">Select Exam Category</option>';
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' .$row['exam_category']. '">' .$row['exam_category']. '</option>';
        }
    } else {
        echo '<option value="">Exam category not available</option>';
    }
?>
