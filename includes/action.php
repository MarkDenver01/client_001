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

function login($email_address, $password) {
  global $session;
  $req_fields = array($email_address, $password);
  validate_fields($req_fields);
  $email_address = remove_junk($_POST[$email_address]);
  $password = remove_junk($_POST[$password]);

  if(empty($errors)) {
    $is_check_user = authentication($email_address, $password);

    if ($is_check_user) {
      // create session with id
      $session->login($is_check_user['id']);
      // update signi in time
      update_last_login($is_check_user['id']);
      // redirect user to respective pages by user level
      if ($is_check_user['status'] === '1') {
        if ( $is_check_user['user_level'] === '1'
          || $is_check_user['user_level'] === '2'
          || $is_check_user['user_level'] === '3') {
          redirect('dashboard', false);
        } else {
          $session->message("d", "Sorry cannot find your account. Please contact the administrator.");
          redirect('login', false);
        }
      } else {
        redirect('change_password', false);
      }
    } else {
        $session->message("d", "Username or password is incorrect.");
        redirect('login', false);
    }
  } else {
    $session->message("d", $errors);
    redirect('login', false);
  }
}

function page_require_level($required_level) {
  global $session;
  $current_user = current_user();
  $login_level = find_group_level($current_user['user_level']);
  if (!$session->is_user_logging_in(true)) {
    $session->message('d', 'Please login...');
    redirect('index.php', false);
  } else if($login_level['user_status'] === '0') {
    $session->message('d','This level user has been band.');
    redirect('dashboard.php', false);
  } elseif ($current_user['user_level'] <= (int) $required_level) {
    return true;
  } else {
    $session->message('d', 'Sorry. You dont have permission to view the page');
    redirect('dashboard.php', false);
  }
}
?>
