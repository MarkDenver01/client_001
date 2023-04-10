<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php 
 if (!empty($_FILES['files'])) {
    $student_year = $_POST['student_year'];
    $n = 0;
    $s = 0;
    $msg_flag = 0;
    $prepare_names = array();
    foreach ($_FILES['files']['name'] as $key) {
        $info_ext = getimagesize($_FILES['files']['tmp_name'][$n]);
        $s++;
        $file_name = str_replace(" ", "", trim($_FILES['files']['name'][$n]));
        $files = explode(".", $file_name);
        $file_ext = substr($_FILES['files']['name'][$n], strrpos($_FILES['files']['name'][$n], '.'));

        if ($info_ext['mime'] == 'image/gif' || $info_ext['mime'] == 'image/jpeg' || $info_ext['mime'] == 'image/png') {
            $src_path = '../uploads/exam/';
            $file_name = $s.rand(0, 999).time().$file_ext;
            $path = trim($src_path.$file_name);
            if (move_uploaded_file($_FILES['files']['tmp_name'][$n], $path)) {
                $prepare_names[] .= $file_name;
                $msg_flag = 1;
            } else {
                $msg_flag = 2;
            }
        } else {
            $msg_flag = 3;
        }
        $n++;
    }
    if ($msg_flag == 1) {
        echo '{Images uploaded successfully!}';
        if (!empty($prepare_names)) {
            foreach ($prepare_names as $name) {
                echo $name;
                echo $student_year;
                // $data = array(
                //     'student_year' => 'First year',
                //     'image_exam_path' => $name,
                // );
                // insert_exam_image($data);
            }
        }
    } elseif ($msg_flag == 2) {
        echo '{File not move to the destination}';
    } elseif ($msg_flag == 3) {
        echo '{File extension not valid}';
    }
}
?>