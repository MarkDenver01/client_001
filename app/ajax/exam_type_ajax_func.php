<?php require_once('../../lib/class.environment.php'); ?>
<?php $db = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']); ?>
<?php 
    $student_year = $_POST['student_year'];
    $sql = "SELECT distinct(exam_title) FROM assign_exam_record WHERE student_year='" .$student_year. "'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        echo '<option value="">Select Exam type</option>';
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' .$row['exam_title']. '">' .$row['exam_title']. '</option>';
        }
    } else {
        echo '<option value="">Exam type not available</option>';
    }
?>
