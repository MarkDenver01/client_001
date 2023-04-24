<?php
function onClickButton($button_name, $url) {
    if (isset($_POST[$button_name])) {
      redirect($url);
  }
}

function post_announcements($title, $body_message) {
  global $session;
  $req_fields = array(
    $title,
    $body_message,
    $from
  );

  validate_fields($req_fields);

  if (empty($errors)) {

    $user_level = $_SESSION['key_session']['user_level'];
    if ($user_level == '1') {
      $user_level = 'Administrator';
    } elseif ($user_level == '2') {
      $user_level = 'Guidance';
    }

    insert_post_announcements(
      remove_junk($_POST[$title]),
      remove_junk($_POST[$body_message]),
      null,
      $user_level
    );
  } else {
    $session->message("d", $errors);
  }
  
}

function addStudentAccount($full_name,
                           $email_address,
                           $course,
                           $year,
                           $semester,
                           $school_year,
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

    $is_check = check_academic();
    if (!$is_check) {
      $session->message("d", "Please set up the semester and school year first.");
      redirect('./register_student_account', false);
      return;
    }

    $default_password = sha1("default");
    
    if (empty($errors)) {
      insertUserAccount(
        remove_junk($_POST[$full_name]),
        remove_junk($_POST[$email_address]),
        $default_password,
        3
      );

      insertStudentAccount(
        remove_junk($_POST[$full_name]),
        remove_junk($_POST[$email_address]),
        remove_junk($_POST[$course]),
        remove_junk($_POST[$year]),
        remove_junk($_POST[$semester]),
        remove_junk($_POST[$school_year]),
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
      $send = send_email(
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
      redirect('./register_student_account', false);
    }
}


function addGuidanceAccount($full_name,
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

    $default_password = sha1("default");

    if (empty($errors)) {
      insertUserAccount(
        remove_junk($_POST[$full_name]),
        remove_junk($_POST[$email_address]),
        $default_password,
        2,
        $dir);

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
    $send = send_email(
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
     redirect('./register_guidance_account', false);
  }
}

function one_time_password($email_address, $full_name, $password) {
  global $session;
  $otp = rand(100000,999999);
  $get_name = $full_name;
  $get_mail_address = $email_address;

  $req_fields = array($email_address, $full_name, $password);
  validate_fields($req_fields);

  $subject = "Login OTP";
  $content = 'Hi '.$full_name;
  $content .= '<br/>';
  $content .= '<br/>';
  $content .= 'Please use the generated OTP to log in your account.';
  $content .= '<br/>';
  $content .= '---------------------------------------';
  $content .= '<br/>';
  $content .= 'OTP: '.$otp;
  $content .= '<br/>';
  $content .= '---------------------------------------';
  $content .= '<br/>';
  $content .= '<br/>';
  $content .= 'Thank you.';

  // send mail account created
  $send = send_email(
    $email_address,
    $full_name,
    $subject,
    $content
  );

  if(empty($errors)) {
    if ($send) {

      // stored data to array list
      $arr = array(
        'email_address' => $email_address,
        'password' => $password,
        'is_logged_in' => '0'
      );

      // log in session
      $session->login_session($arr);

      insertOneTimePassword($email_address, $otp);
      redirect('../app/send_otp', false);
    } else {
      $session->message("d", "Something wrong with sending an OTP to your email.");
    }
  } else {
    $session->message("d", $errors);
  }
}

function switch_user_level($email_address, $user_level) {
  global $session;
  // update log in time
  update_last_login($email_address);
  // update log in status
  update_last_login_status($email_address, '1');
  // update otp verification
  update_otp_verification($email_address, '1');
  switch ($user_level) {
    case '2':
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
        // redirecting to main page
        redirect('dashboard', false);
        break;
    case '3':
        // find info from student
        $student = find_student_login($email_address);
        // find available exam
        $exam = find_by_available_exam($student['student_year']);
        // set academic settings
        $academic_settings = get_academic_settings();
        // create session with email address
        // pass the info that filtered by email to array list
        $arr = array(
          'name' => $student['name'],
          'course' => $student['course'],
          'semester' => $student['semester'],
          'school_year' => $student['school_year'],
          'student_year' => $student['student_year'],
          'gender' => $student['gender'],
          'age' => $student['age'],
          'birth_date' => $student['birth_date'],
          'present_address' => $student['present_address'],
          'email_address' => $student['email_address'],
          'user_level' => $student['user_level'],
          'status' => $student['status'],
          'is_logged_in' => $student['is_logged_in'],
          'exam_status' => $exam['exam_status'],
          'exam_title' => $exam['exam_title'],
          'academic_semester' => $academic_settings['semester'],
          'academic_school_year' => $academic_settings['school_year']
        );
        // then pass the array to session
        $session->login_session($arr);
        // redirecting to main page
        redirect('dashboard', false);
        break;
    default:
        break;
  }
}

function verify_otp_login($one_time_password) {
  global $session;
  $email_address = $_SESSION['key_session']['email_address'];
  $password = $_SESSION['key_session']['password'];
  $otp = $_POST[$one_time_password];
  $req_fields = array($email_address, $password, $otp);
  validate_fields($req_fields);
  if(empty($errors)) {
    $time = time() - 30; // get 30 secs
    $attempts = login_attempts_query($time, $email_address);
    if ($attempts == 3) {
      $session->message("w","To many failed login attempts. Please login after 30 secs.");
      redirect('send_otp', false);
    } else {
        if (is_otp_expired($email_address, $otp)) {
          $current_login = find_by_otp_login($email_address, $otp);
          if ($current_login) {
            if ($current_login['is_logged_in'] == '0') {
              $is_verified = update_auth_verification($email_address, $otp);
              if ($is_verified == '1') {
                  $is_current_user = find_current_user_by_otp($email_address, $password);
                  $check = false;
                  if ($is_current_user['user_level'] == '2' || $is_current_user['user_level'] == '3') {
                    $check = true;
                  }
                  if ($check) {
                    delete_login_attempts_query($email_address);
                    switch_user_level(
                      $email_address,
                      $is_current_user['user_level']
                    );
                  } else {
                    $session->message("d", "Invalid email or OTP");
                    redirect('send_otp', false);
                  }

              } else {
                $session->message("d", "OTP already used recently.");
                redirect('send_otp', false);
              }
            } else {
              redirect('../app/dashboard', false);
            }
          } else {
            $session->message("d", "Email address or OTP not exist.");
            redirect('send_otp', false);
          }
        } else {
          $attempts++;
          $remain_attempts =  3 - $attempts;

          if ($remain_attempts == 0) {
            $session->message("w","To many failed login attempts. Please login after 30 secs.");
            $session->attempt_login("d", $attempts);
          }  else {
            $session->message("d","Incorrect OTP.");
            $session->attempt_login("d", $attempts);
          }
          $try_time = time();
          // TODO insert_login_attempts_query($try_time, $email_address);
          redirect('send_otp', false);
      }
    }
  } else {
    $session->message("d", $errors);
    redirect('send_otp', false);
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
        if ($_ENV['SUPER_USER'] == true && $is_check_user['user_level'] == '1') {
          // create session with email address
          // pass the info that filtered by email to array list
          $arr = array(
            'id' => $is_check_user['id'],
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
        } else {
          one_time_password(
            $is_check_user['email_address'],
            $is_check_user['name'],
            $is_check_user['password']
          );
        }
      } elseif($is_check_user['status'] === '0') {

        $arr = array(
          'email_address' => $is_check_user['email_address'],
          'is_logged_in' => $is_check_user['is_logged_in']
        );
        // then pass the array to session
        $session->login_session($arr);
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

function change_password($new_password, $confirm_password) {
    global $session;
    $new_password = remove_junk($_POST[$new_password]);
    $confirm_password = remove_junk($_POST[$confirm_password]);
    if (empty($errors)) {
      if ($new_password == $confirm_password) {
        if ($new_password == "default" || $confirm_password == "default") {
          $session->message('w', 'Please change your default password.');
          redirect('change_password', false);
        } else {
          change_password_by_query($_SESSION['key_session']['email_address'], $new_password);
          redirect('login', false);
        }
      } else {
        $session->message('w', 'Password does not match. Please try again');
        redirect('change_password', false);
      }
    }
}

function SET_LOGGED_IN() {
  global $session;
  if ($_ENV['SITE_INSTALLATION_COMPLETED'] == false) {
    redirect('../maintenance', true);
  } else {
    if ($session->is_user_logged_in()) {
      redirect('../app/dashboard', true);
    }
  }
}

function SET_NOT_LOGGED_IN() {
  global $session;
  if ($_ENV['SITE_INSTALLATION_COMPLETED'] == false) {
    redirect('../maintenance', true);
  } else {
    if (!$session->is_user_logged_in()) {
      redirect('../app/login', true);
    }
  }
}

function IS_STUDENT_LEVEL() {
  if (isset($_SESSION['key_session']['user_level'])) {
    $user_level = $_SESSION['key_session']['user_level'];
    if ($user_level != '3') {
      redirect('./dashboard', false);
    }
  }
}

function IS_GUIDANCE_LEVEL() {
  if (isset($_SESSION['key_session']['user_level'])) {
    $user_level = $_SESSION['key_session']['user_level'];
    if ($user_level != '2') {
      redirect('./dashboard', false);
    }
  }
}

function IS_ADMIN_LEVEL() {
  if (isset($_SESSION['key_session']['user_level'])) {
    $user_level = $_SESSION['key_session']['user_level'];
    if ($user_level != '1') {
      redirect('./dashboard', false);
    }
  }
}

function CHECK_EXAM_AVAILABILITY() {
  if(isset($_SESSION['key_session']['exam_status']) && $_SESSION['key_session']['exam_status'] == 'Not Ready') {
    redirect('./dashboard', false);
  }
}

function update_guidance_account(
  $full_name,
  $email_address,
  $gender,
  $age,
  $birth_date,
  $present_address
) {
  $is_user_account = updateUsertAccount(
    remove_junk($_POST[$full_name]),
    remove_junk($_POST[$email_address])
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
  $full_name,
  $email_address,
  $course,
  $year,
  $semester,
  $school_year,
  $gender,
  $age,
  $birth_date,
  $present_address
) {
  $is_student_account = updateUsertAccount(
    remove_junk($_POST[$full_name]),
    remove_junk($_POST[$email_address])
  );

  $is_user_account = updateStudentInfo(
    remove_junk($_POST[$full_name]),
    remove_junk($_POST[$email_address]),
    remove_junk($_POST[$course]),
    remove_junk($_POST[$year]),
    remove_junk($_POST[$semester]),
    remove_junk($_POST[$school_year]),
    remove_junk($_POST[$gender]),
    remove_junk($_POST[$age]),
    remove_junk($_POST[$birth_date]),
    remove_junk($_POST[$present_address])
  );

  redirect('../app/view_student_account', false);
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

function create_exam($student_year, $semester, $school_year, $title, $description, $category, $image_file_path, $image_dir, $redirect_page) {
  global $session;
  $student_year = $_POST[$student_year];
  $semester = $_POST[$semester];
  $school_year = $_POST[$school_year];
  $title = $_POST[$title];
  $description = $_POST[$description];
  $category = $_POST[$category];
  $created_at = date('Y-m-d h:i:s A');

  $img_file = $_FILES[$image_file_path]['name'];
  $tmp_dir = $_FILES[$image_file_path]['tmp_name'];
  $img_size = $_FILES[$image_file_path]['size'];

  if (empty($img_file)) {
    $session->message('w', 'Please select the image file.');
    redirect($redirect_page, false);
  } else {
    $upload_dir = $image_dir;
    $img_ext = strtolower(pathinfo($img_file, PATHINFO_EXTENSION));
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');

    $generate_file_name = 'EXAM_'.$student_year.'_'.rand(1000,1000000).".".$img_ext;
    if (in_array($img_ext, $valid_extensions)) {
      if ($img_size < 5000000) {
        if (move_uploaded_file($tmp_dir, $upload_dir.$generate_file_name)) {
          $dir = $upload_dir.$generate_file_name;
          if (empty($errors)) {

            if ($category == 'Select exam category' || empty($category)) {
              $category = 'N/A';
            }

            $is_check = check_academic();

            if ($is_check) {
              $data = array(
                'student_year' => $student_year,
                'semester' => $semester,
                'school_year' => $school_year,
                'exam_title' => $title,
                'exam_description' => $description,
                'exam_category' => $category,
                'image_exam_path' => $dir,
                'created_at' => $created_at,
                'exam_status' => '1'
              );
              // insert data
              insert_new_exam($data);
              $session->message('s', 'Exam has been uploaded');
              redirect($redirect_page, false);
            } else {
              $session->message('w', 'Please set up the semester and school year first.');
              redirect($redirect_page, false);
            }  
          } else {
            $session->message('d', $errors);
            redirect($redirect_page, false);
          }
        } else {
          $session->message('w', 'Cannot upload the image. Please try again.');
          redirect($redirect_page, false);
        }
      } else {
        $session->message('w', 'Please reduce the image size atleast 5Mib');
        redirect($redirect_page, false);
      }
    }
  }
}

# TODO : add validation for schedule of exam
function create_exam_schedule($student_year, $semester, $school_year, $exam_title, $exam_description, $exam_category, $expired_at, $exam_duration, $result_date, $exam_status) {
  global $db;
  global $session;
  $student_year = $_POST[$student_year];
  $semester = $_POST[$semester];
  $school_year = $_POST[$school_year];
  $exam_title = $_POST[$exam_title];
  $exam_description = $_POST[$exam_description];
  $exam_category = $_POST[$exam_category];
  $created_at =  date('d/m/Y');
  $expired_at = $_POST[$expired_at];
  $exam_duration = $_POST[$exam_duration];
  $result_date = $_POST[$result_date];
  $exam_status  = $_POST[$exam_status];

  if ($exam_title == 'OASIS 3' || 
  $exam_title == 'BarOn EQ-i:S' || 
  $exam_title == 'The Keirsey Temperament Sorter' || 
  $exam_title == 'Aptitude J and C' || 
  $exam_title == 'ESA' || 
  $exam_title == 'Aptitude Verbal and Numerical') {
    $exam_category = "N/A";
  }

  $data = array(
    'student_year' => $student_year,
    'semester' => $semester,
    'school_year' => $school_year,
    'exam_title' => $exam_title,
    'exam_description' => $exam_description,
    'exam_category' => $exam_category,
    'created_at' => $_GET[$created_at],
    'expired_at' => $expired_at,
    'exam_duration' => $exam_duration,
    'result_date' => $result_date,
    'exam_status' => $exam_status
  );

  $user_level = $_SESSION['key_session']['user_level'];
  if ($user_level == '1') {
    $user_level = 'Administrator';
  } elseif ($user_level == '2') {
    $user_level = 'Guidance';
  }

  $is_check = check_academic();
  if (!$is_check) {
    $session->message('w', 'Please set the semester and school year first.');
    redirect('./exam_schedule', false);
    return;
  }

  $result = find_all_student($student_year);
  if ($result['email_address'] == '') {
    $session->message('w', 'There is/are no registered students. Please add the student information first.');
    redirect('./exam_schedule', false);
  } else {
    $success = insert_exam_schedule($data);
      if ($success) {
        insert_post_announcements(
          "Schedule of Exam - " .$student_year, 
          "Exam title: " .$exam_title. "<br/>Exam will be closed at: " .$expired_at,
          null, 
          $user_level
        );

      $subject = "Exam Schedule has been posted";
      $content = 'Hi Students';
      $content .= '<br/>';
      $content .= '<br/>';
      $content .= 'This email has remind you that the schedule of exam has been posted in the website.';
      $content .= '<br/>';
      $content .= '---------------------------------------';
      $content .= '<br/>';
      $content .= 'Year level:' .$student_year;
      $content .= '<br/>';
      $content .= 'Exam Type:' .$exam_title;
      $content .= '<br/>';
      $content .= 'Exam started at: ' .$created_at;
      $content .= '<br/>';
      $content .= 'Exam will be ended at: ' .$expired_at;
      $content .= '<br/>';
      $content .= '---------------------------------------';
      $content .= '<br/>';
      $content .= '<br/>';
      $content .= 'Thank you.';

       // send mail account created
      $send = send_email(
        $result['email_address'],
        $result['name'],
        $subject,
        $content
      );

      if ($send) {
        $session->message('s', 'Exam has been posted');
        redirect('./exam_schedule', false);
      } else {
        $session->message('d', 'The posted exam not send to the students ');
        redirect('./exam_schedule', false);
      }

    } else {
      $session->message('d', 'Exam schedule set up has been failed');
      redirect('./exam_schedule', false);
    }
  }
}

function set_academic($semester, $start_school_year, $end_school_year) {
    global $session;
    $semester = $_POST[$semester];
    $school_year = $_POST[$start_school_year]. "-" .$_POST[$end_school_year];

    $data = array(
      "semester" => $semester,
      "school_year" => $school_year
    );

    $is_check = check_academic();
    if ($is_check) {
      update_academic_settings($data);
    } else {
      insert_academic_settings($data);
    }
    $session->message('s', 'Semester and school year has been set.');
    redirect('./set_academic_settings', false);
}
?>
