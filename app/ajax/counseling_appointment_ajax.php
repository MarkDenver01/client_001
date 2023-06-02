<?php require_once('../../lib/class.environment.php'); ?>
<?php $db = mysqli_connect($_ENV['DB_HOST'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']); ?>
<?php 
$date_counseling = $_POST['date_counseling'];
$formatted_date = date("Y/m/d", strtotime($date_counseling));
$sql = "SELECT time_counseling FROM counseling_appointment WHERE appointment_date='$formatted_date'";
$result = $db->query($sql);

$options = [
    '8:30 - 9:30',
    '9:30 - 10:30',
    '10:30 - 11:30',
    '1:00 - 2:00',
    '2:00 - 3:00',
    '3:00 - 4:00'
];

if ($result->num_rows > 0) {
    echo '<option value="">Select Available Time</option>';

    while ($row = $result->fetch_assoc()) {
        $index = array_search($row['time_counseling'], $options);
        if ($index !== false) {
            unset($options[$index]);
        }
    }
} else {
    echo '<option value="">Select Available Time</option>';
}

foreach ($options as $option) {
    echo "<option value=\"$option\">$option</option>";
}
?>
