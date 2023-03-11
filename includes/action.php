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
    global $session;
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
        $session->message("d", "Sorry, we cannot allow to upload the image due to over sizing.");
      }
    }

    // check if file already exists
    if(file_exists($target_file)) {
      $update_status = 0;
      $session->message("d", "Sorry, but the image is already exist in the storage.");
    }

    // check file size
    if ($_FILES[$file_path_name]["size"] > 500000) {
      $upload_status = 0;
        $session->message("d", "Sorry, but the image file size is over 5mb");
    } else {
      if (find_by_field("user_account","email_address", remove_junk($_POST[$email_address]))
      || find_by_field("student_info","email_address", remove_junk($_POST[$email_address]))) {
        $session->message("d", "Account is already existing.");
      } else {
        if (move_uploaded_file($_FILES[$file_path_name]["tmp_name"], $target_file)) {
          $file = $_FILES[$file_path_name]["name"];
          $default_password = sha1("default");
          if (empty($errors)) {

              insertUserAccount(
                remove_junk($_POST[$full_name]),
                remove_junk($_POST[$email_address]),
                $default_password,
                3,
                $file
              );

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

              $get_name = remove_junk($_POST[$full_name]);
              $get_mail_address = remove_junk($_POST[$email_address]);

              $subject = "Your account has been created";
              $content = 'Hi '.$get_name;
              $content .= '<br/>';
              $content .= 'Welcome to CESLICAM Portal!';
              $content .= '<br/>';
              $content .= '<br/>';
              $content .= 'Your account has been created. Please change your default password for your security.';
              $content .= '<br/>';
              $content .= '---------------------------------------';
              $content .= '<br/>';
              $content .= 'Email address: '.$get_mail_address;
              $content .= '<br/>';
              $content .= 'Password: <b>default</b>';
              $content .= '<br/>';
              $content .= '---------------------------------------';
              $content .= '<br/>';
              $content .= '<br/>';
              $content .= 'Thank you.';

              // send mail account created
              $send = send_email_account_created(
                $get_mail_address,
                $get_name,
                $subject,
                $content
              );

              if ($send) {
                redirect('./view_student_account', false);
              } else {
                $session->message("d", "Error occured during sending an email.");
              }
          } else {
            $session->message("d", $errors);
          }
        }
      }
    }
}


function addGuidanceAccount($file_path_name,
                           $full_name,
                           $email_address,
                           $gender,
                           $age,
                           $birth_date,
                           $present_address) {
    global $session;
    $req_fields = array(
      $full_name,
      $email_address,
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
    if (isset($_POST["button_save"])) {
      $check = getimagesize($_FILES[$file_path_name]["tmp_name"]);
      if($check != false) {
        $upload_status = 1;
      } else {
        $upload_status = 0;
        $session->message("d", "Sorry, we cannot allow to upload the image due to over sizing.");
      }
    }

    // check if file already exists
    if(file_exists($target_file)) {
      $update_status = 0;
      $session->message("d", "Sorry, but the image is already exist in the storage.");
    }

    // check file size
    if ($_FILES[$file_path_name]["size"] > 500000) {
      $upload_status = 0;
        $session->message("d", "Sorry, but the image file size is over 5mb");
    } else {
      if (find_by_field("user_account","email_address", remove_junk($_POST[$email_address]))
      || find_by_field("guidance_info","email_address", remove_junk($_POST[$email_address]))) {
        $session->message("d", "Account is already existing.");
      } else {
        if (move_uploaded_file($_FILES[$file_path_name]["tmp_name"], $target_file)) {
          $file = $_FILES[$file_path_name]["name"];
          $default_password = sha1("default");
          if (empty($errors)) {
            insertUserAccount(
                remove_junk($_POST[$full_name]),
                remove_junk($_POST[$email_address]),
                $default_password,
                2,
                $file);

            insertGuidanceAccount(
                remove_junk($_POST[$full_name]),
                remove_junk($_POST[$email_address]),
                remove_junk($_POST[$gender]),
                remove_junk($_POST[$age]),
                remove_junk($_POST[$birth_date]),
                remove_junk($_POST[$present_address])
            );

            $get_name = remove_junk($_POST[$full_name]);
            $get_mail_address = remove_junk($_POST[$email_address]);

            $subject = "Your account has been created";
            $content = 'Hi '.$get_name;
            $content .= '<br/>';
            $content .= 'Welcome to CESLICAM Portal!';
            $content .= '<br/>';
            $content .= '<br/>';
            $content .= 'Your account has been created. Please change your default password for your security.';
            $content .= '<br/>';
            $content .= '---------------------------------------';
            $content .= '<br/>';
            $content .= 'Email address: '.$get_mail_address;
            $content .= '<br/>';
            $content .= 'Password: <b>default</b>';
            $content .= '<br/>';
            $content .= '---------------------------------------';
            $content .= '<br/>';
            $content .= '<br/>';
            $content .= 'Thank you.';

            // send mail account created
            $send = send_email_account_created(
              $get_mail_address,
              $get_name,
              $subject,
              $content
            );

            if ($send) {
              redirect('./view_guidance_account', false);
            } else {
              $session->message("d", "Error occured during sending an email.");
            }

          } else {
            $session->message("d", $errors);
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
      // redirect user to respective pages by user level
      if ($is_check_user['status'] === '1') {
        switch ($is_check_user['user_level']) {
          case '1': // admin
            // create session with email address
            // pass the info that filtered by email to array list
            $arr = array(
              'name' => $is_check_user['name'],
              'email_address' => $is_check_user['email_address'],
              'user_level' => $is_check_user['user_level'],
              'status' => $is_check_user['status'],
              'is_logged_in' => $is_check_user['is_logged_in']
            );
            // then pass the array to session
            $session->login_session($arr);
            // update login time
            update_last_login($email_address);
            // update login status
            update_last_login_status($email_address, '1');
            // redirect to main page
            redirect('dashboard', false);
            break;
          case '2': // guidance
            // find info from guidance
            $guidance = find_guidance_login($email_address);
            // create session with email address
            // pass the info that filtered by email to array list
            $arr = array(
              'name' => $guidance['name'],
              'email_address' => $guidance['email_address'],
              'user_level' => $guidance['user_level'],
              'status' => $guidance['status'],
              'is_logged_in' => $guidance['is_logged_in']
            );
            // then pass the array to session
            $session->login_session($arr);
            // update log in time
            update_last_login($email_address);
            // update log in status
            update_last_login_status($email_address, '1');
            // redirecting to main page
            redirect('dashboard', false);
            break;
          case '3': // student
            // find info from student
            $student = find_student_login($email_address);
            // create session with email address
            // pass the info that filtered by email to array list
            $arr = array(
              'name' => $student['name'],
              'course' => $student['course'],
              'student_year' => $student['student_year'],
              'gender' => $student['gender'],
              'age' => $student['age'],
              'birth_date' => $student['birth_date'],
              'present_address' => $student['present_address'],
              'email_address' => $student['email_address'],
              'user_level' => $student['user_level'],
              'status' => $student['status'],
              'is_logged_in' => $student['is_logged_in']
            );
            // then pass the array to session
            $session->login_session($arr);
            // update log in time
            update_last_login($email_address);
            // update log in status
            update_last_login_status($email_address, '1');
            // redirecting to main page
            redirect('dashboard', false);
            break;
          default:
            // code...
            break;
        }

      } elseif($is_check_user['status'] === '0') {
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

function change_password($email_address, $current_password,
                         $new_password, $confirm_password) {

}

function is_check_login() {
  global $session;
  if ($_ENV['SITE_INSTALLATION_COMPLETED'] == false) {
    redirect('../maintenance', true);
  } else {
    if (!$session->is_user_logged_in()) {
      redirect('../app/login', true);
    } else {
      redirect('../app/dashboard', true);
    }
  }
}

function update_guidance_account(
  $file_path_name,
  $full_name,
  $email_address,
  $gender,
  $age,
  $birth_date,
  $present_address
) {
  $is_user_account = updateUsertAccount(
    remove_junk($_POST[$full_name]),
    remove_junk($_POST[$email_address]),
    remove_junk($_POST[$file_path_name])
  );

  $is_guidance_info = updateGuidanceInfo(
    remove_junk($_POST[$full_name]),
    remove_junk($_POST[$email_address]),
    remove_junk($_POST[$gender]),
    remove_junk($_POST[$age]),
    remove_junk($_POST[$birth_date]),
    remove_junk($_POST[$present_address])
  );

  if ($is_user_account && $is_guidance_info) {
    redirect('../app/view_guidance_account', false);
  } else {
    redirect('../app/view_guidance_account', false);
  }
}

function update_student_account(
  $file_path_name,
  $full_name,
  $email_address,
  $course,
  $year,
  $gender,
  $age,
  $birth_date,
  $present_address
) {
  $is_student_account = updateUsertAccount(
    remove_junk($_POST[$full_name]),
    remove_junk($_POST[$email_address]),
    remove_junk($_POST[$file_path_name])
  );

  $is_user_account = updateStudentInfo(
    remove_junk($_POST[$full_name]),
    remove_junk($_POST[$email_address]),
    remove_junk($_POST[$course]),
    remove_junk($_POST[$year]),
    remove_junk($_POST[$gender]),
    remove_junk($_POST[$age]),
    remove_junk($_POST[$birth_date]),
    remove_junk($_POST[$present_address])
  );

  if ($is_student_account && $is_user_account) {
    redirect('../app/view_student_account', false);
  } else {
    redirect('../app/update_student_account', false);
  }
}


function user_level_checker() {
  if (empty($errors)) {
    $current_user = current_user();
    echo $current_user;
    if ($current_user['is_logged_in'] === '0') {
      redirect('login', false);
    } else {
      if ($current_user['user_level'] === '2') { // admin user level
        redirect('login', false);
      }
    }
  } else {
    redirect('login', false);
  }
}

function check_user_level() {
  $current_user = current_user();
  if ($current_user['user_level'] === NULL) {
    redirect ('login', false);
  } else {

    if ($current_user['user_level'] === '2' || $current_user['user_level'] === '3') {
        echo $current_user['user_level'];
      redirect('dashboard', false);
    } elseif ($current_user['userl_level'] === '1') {
        echo $current_user['user_level'];
    } else {
     redirect ('login', false);
    }
  }
}


?>
