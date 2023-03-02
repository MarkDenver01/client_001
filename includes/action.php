<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

function onClickButton($button_name, $url) {
    if (isset($_POST[$button_name])) {
      redirect($url);
  }
}

function addStudentAccount($button_name,
                           $file_path_name,
                           $full_name,
                           $email_address,
                           $course,
                           $year,
                           $gender,
                           $age,
                           $birth_date,
                           $present_address) {
    $req_fields = array(
      $full_name,
      $email_address,
      $course,
      $year,
      $gender,
      $age,
      $birth_date,
      $present_address
    );
    validate_fields($req_fields); // check if fields are not empty

    $target_dir = "C:\wamp64\www\client_001\uploads\users";
    $target_file = $target_dir . basename($_FILES[$file_path_name]["name"]);
    $upload_status = 1;
    $image_file_type = pathinfo($target_file, PATHINFO_EXTENSION);

    // check image file is actual image or a fake image
    if (isset($_POST[$button_name])) {
      $check = getimagesize($_FILES[$file_path_name]["tmp_name"]);
      if($check != false) {
        $upload_status = 1;
      } else {
        $upload_status = 0;
      }
    }

    // check if file already exists
    if(file_exists($target_file)) {
      $update_status = 0;
    }

    // check file size
    if ($_FILES[$file_path_name]["size"] > 500000) {
      $upload_status = 0;
    } else {
      debug_mode("isUserAccountEmailExist: " .(isUserAccountEmailExist($email_address) ? "true" : "false"));
      debug_mode("isStudentEmailExist: " .(isStudentEmailExist($email_address) ? "true" : "false"));
      if (isUserAccountEmailExist($email_address) || isStudentEmailExist($email_address)) {
        echo '<script type="text/javascript">alert("Account is already exist!");
        window.location="../app/register_student_account";</script>';
      } else {
        if (move_uploaded_file($_FILES[$file_path_name]["tmp_name"], $target_file)) {
          $file = $_FILES[$file_path_name]["name"];
          $default_password = sha1("default");
          if (empty($errors)) {
            insertUserAccount(
                remove_junk($_POST[$full_name]),
                remove_junk($_POST[$email_address]),
                $default_password,
                $file);

            insertStudentAccount(
                remove_junk($_POST[$full_name]),
                remove_junk($_POST[$email_address]),
                remove_junk($_POST[$course]),
                remove_junk($_POST[$year]),
                remove_junk($_POST[$gender]),
                remove_junk($_POST[$age]),
                remove_junk($_POST[$birth_date]),
                remove_junk($_POST[$present_address])
            );

            debug_mode("create student account: success");
            echo '<script type="text/javascript">alert("Student account has been registered!");
            window.location="../app/view_student_account";</script>';
          }
        }
      }
    }
}

function insertUserAccount($full_name, $email_address, $password, $file_path_name) {
  global $db;

  $sql = "INSERT IGNORE INTO `user_account`(
    `name`,`email_address`,`password`,`user_level`,`image`,`status`)";
  $sql .= " VALUES ";
  $sql .= "(
    '{$full_name}',
    '{$email_address}',
    '{$password}',
    '3',
    '{$file_path_name}',
    '0')";
  $db->query($sql);
}

function insertStudentAccount($full_name, $email_address, $course,
    $year, $gender, $age, $birth_date, $present_address) {
    global $db;

      $sql = "INSERT IGNORE INTO `student_info`(`name`,`email_address`,`course`
        ,`student_year`,`gender`,`age`
        ,`birth_date`,`present_address`)";
      $sql .= " VALUES ";
      $sql .= "(
        '{$full_name}',
        '{$email_address}',
        '{$course}',
        '{$year}',
        '{$gender}',
        '{$age}',
        '{$birth_date}',
        '{$present_address}'
        )";
      $db->query($sql);
}

function isUserAccountEmailExist($email_address) {
  $user_account_mail = find_by_id('user_account', $_POST[$email_address]);
  return ($user_account_mail ? true : false);
}

function isStudentEmailExist($email_address) {
  $student_info_mail = find_by_id('student_info', $_POST[$email_address]);
  return ($student_info_mail ? true : false);
}

?>
