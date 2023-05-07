<?php require_once('../../lib/class.environment.php'); ?>
<?php $db = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']); ?>
<?php 
    $sql = "SELECT * FROM academic_settings";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        echo '<option value="">Select Academic Settings</option>';
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' .$row['semester']. '">' .$row['semester']. '</option>';
        }
    } else {
        echo '<option value="">Semester not set</option>';
    }
?>