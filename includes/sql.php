<?php
 function table_exist($table) {
   global $db;
   $tableExist = $db->query('SHOW TABLES FROM ' .DB_NAME. ' LIKE "'.$db->escape($table). '"');
    if($tableExist) {
      if ($db->num_rows($tableExist) > 0) {
        return true;
      } else {
        return false;
      }
    }
 }

 function find_by_sql($sql) {
   global $db;
   $result = $db->query($sql);
   $result_set = $db->while_loop($result);
   return $result_set;
 }

 function find_all_data($table) {
   global $db;
   $sql = "SELECT * FROM " .$db->escape($table). " ORDER BY `id` DESC";
   return find_by_sql($sql);
 }

 function find_by_student() {
   global $db;
   $sql = "SELECT s.id, s.name, s.course, s.student_year, s.semester, s.school_year, s.gender, s.age, s.birth_date, s.present_address, s.email_address, a.password AS studentInfo,";
   $sql .= " a.user_level, a.image, a.status, a.is_logged_in AS studentAccount FROM ";
   $sql .= " student_info s LEFT JOIN user_account a ";
   $sql .= " ON s.email_address = a.email_address ORDER BY s.id DESC";
   return find_by_sql($sql);
 }

 function find_by_guidance() {
   global $db;
   $sql = "SELECT g.id, g.name, g.gender, g.age, g.birth_date, g.present_address, g.email_address, a.password AS guidanceInfo,";
   $sql .= " a.user_level, a.image, a.status, a.is_logged_in AS guidanceAccount FROM ";
   $sql .= " guidance_info g LEFT JOIN user_account a ";
   $sql .= " ON g.email_address = a.email_address ORDER BY g.id DESC";
   return find_by_sql($sql);
 }

 function delete_by_id($table, $id) {
   global $db;
   if(table_exist($table)) {
     $sql = "DELETE FROM ".$db->escape($table);
     $sql .= " WHERE id=" .$db->escape($id);
     $sql .= " LIMIT 1";
     $db->query($sql);
     return ($db->affected_rows() === 1) ? true : false;
   }
 }

 function delete_by_email($table, $email_address) {
   global $db;
   if(table_exist($table)) {
     $sql = "DELETE FROM ".$db->escape($table);
     $sql .= " WHERE email_address='" .$db->escape($email_address). "' LIMIT 1";
     $db->query($sql);
     return ($db->affected_rows() === 1) ? true : false;
   }
 }

 function count_by_id($table) {
   global $db;
   if(table_exist($table)) {
     $sql = "SELECT count(id) as total FROM ".$db->escape($table);
     $result = $db->query($sql);
      return ($db->fetch_assoc($result));
   }
 }

 function find_group_level($level) {
   global $db;
   $sql = "SELECT `user_level` FROM `user_groups` WHERE `user_level` = '{$db->escape($level)}' LIMIT 1";
   $result = $db->query($sql);
   return ($db->num_rows($result) === 0 ? true : false);
 }

 function find_group_name($user_level) {
   global $db;
   $sql = "SELECT `user_types` FROM `user_groups` WHERE `user_types` = '{$db->escape($user_level)}' LIMIT 1";
   $result  = $db->query($sql);
   return ($db->num_rows($result) === 0 ? true : false);
 }

 function current_user() {
   static $current_user;
   global $db;
   if (!$current_user) {
        if (isset($_SESSION['key_session']['email_address'])) {
           $email_address = $_SESSION['key_session']['email_address'];
           $current_user = find_by_email('user_account', $email_address);
        }
   }
   return $current_user;
 }

 function current_user_account($table, $field) {
   global $db;
   $table = $db->escape($table);
   $field = $db->escape($field);
   $sql = sprintf("SELECT * FROM `{$table}` WHERE `email_address` =
     '%s' LIMIT 1", $field);
   $result = $db->query($sql);
   if ($db->num_rows($result)) {
     $user = $db->fetch_assoc($result);
     return $user;
   }
   return false;
 }

 function find_guidance_login($email_address) {
   global $db;
   $email_address = $db->escape($email_address);
   $sql = "SELECT `g`.`name` AS name, `g`.`gender` AS gender, `g`.`age` AS age,";
   $sql .=" `g`.`birth_date` AS birth_date, `g`.`present_address` AS present_address,";
   $sql .=" `u`.`email_address` AS email_address, `u`.`password` as password,";
   $sql .=" `u`.`user_level` AS user_level,`u`.`image` AS image,`u`.`status` AS status,";
   $sql .=" `u`.`is_logged_in` AS is_logged_in";
   $sql .= " FROM `guidance_info` `g` LEFT JOIN `user_account` `u`";
   $sql .= " ON `g`.`email_address` = `u`.`email_address`";
   $sql .= " WHERE `u`.`email_address` = '{$email_address}' LIMIT 1";
   $result = $db->query($sql);
   if ($db->num_rows($result)) {
     $user = $db->fetch_assoc($result);
     return $user;
   }
   return false;
 }

 function login_attempts_query($time, $email_address) {
   global $db;
   $sql = "SELECT COUNT(*) AS `total_count` FROM `login_logs` WHERE";
   $sql .=" `login_attempts` > '{$time}' AND";
   $sql .=" `email_address` ='{$email_address}'";
   $result = $db->query($sql);
   if ($db->num_rows($result)) {
     $check_login_row = $db->fetch_assoc($result);
     $total_count = $check_login_row['total_count'];
     return $total_count;
   }
   return false;
 }

 function delete_login_attempts_query($email_address) {
   global $db;
   $sql ="DELETE FROM `login_logs`";
   $sql .=" WHERE `email_address` ='{$email_address}'";
   $db->query($sql);
   return ($db->affected_rows() === 1) ? true : false;
 }

 function insert_login_attempts_query($attempts, $email_address) {
   global $db;
   $sql ="INSERT INTO `login_logs` (`login_attempts`,`email_address`)";
   $sql .=" VALUES ";
   $sql .="(
     '{$attempts}',
     '{$email_address}'
     )";
    $db->query($sql);
 }

 function find_student_login($email_address) {
   global $db;
   $email_address = $db->escape($email_address);
   $sql ="SELECT `s`.`id` AS id, `s`.`name` AS name, `s`.`course` AS course, `s`.`semester` AS semester, `s`.`school_year` AS school_year, `s`.`student_year` AS student_year,";
   $sql .=" `s`.`gender` AS gender, `s`.`age` AS age, `s`.`birth_date` AS birth_date,";
   $sql .=" `s`.`present_address` AS present_address, `u`.`email_address` AS email_address,";
   $sql .=" `u`.`password` AS password, `u`.`user_level` AS user_level, `u`.`image` AS image,";
   $sql .=" `u`.`status` AS status, `u`.`is_logged_in` AS is_logged_in";
   $sql .=" FROM `student_info` `s` LEFT JOIN `user_account` `u`";
   $sql .=" ON `s`.`email_address` = `u`.`email_address`";
   $sql .=" WHERE `u`.`email_address` ='{$email_address}' LIMIT 1";
   $result = $db->query($sql);
   if ($db->num_rows($result)) {
     $user = $db->fetch_assoc($result);
     return $user;
   }
   return false;
 }

 function find_by_email($table, $email_address) {
   global $db;
   if(table_exist($table)) {
     $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE `email_address`='{$db->escape($email_address)} LIMIT 1'");
     if ($result = $db->fetch_assoc($sql)) {
       return $result;
     } else {
       return null;
     }
   }
 }

 function find_by_field($table, $field, $value) {
   global $db;
   if (table_exist($table)) {
     $sql = $db->query("SELECT * FROm {$db->escape($table)} WHERE {$db->escape($field)} = '{$value}' LIMIT 1");
     if ($result = $db->fetch_assoc($sql)) {
       return $result;
     } else {
       return null;
     }
   }
 }

 function insertOneTimePassword($email_address, $otp) {
   global $db;
   $current_date = date('Y-m-d H:i:s');
   $sql = "INSERT INTO `authentication`(
   `email_address`,`one_time_password`, `expired`, `created`)";
   $sql .= " VALUES ";
   $sql .= "(
     '{$email_address}',
     '{$otp}',
     '0',
     '{$current_date}'
   )";
   $db->query($sql);
 }

 function update_otp_verification($email_address, $is_otp_status) {
   global $db;
   $sql = "UPDATE `user_account` SET
   `is_otp_verified` ='{$is_otp_status}' WHERE `email_address`='{$email_address}'";
   $result = $db->query($sql);
   return ($result && $db->affected_rows() === 1 ? true : false);
 }

 function update_auth_verification($email_address, $otp) {
   global $db;
   $sql = "UPDATE `authentication` SET
   `expired` = '1' WHERE `email_address` = '{$email_address}'
   AND `one_time_password` ='{$otp}'";
   $result = $db->query($sql);
   return ($result && $db->affected_rows() === 1 ? true : false);
 }

 function insertUserAccount($full_name, $email_address, $password, $level, $file_path_name) {
   global $db;
   $sql = "INSERT INTO `user_account`(
     `name`,`email_address`,`password`,`user_level`,`image`,`status`)";
   $sql .= " VALUES ";
   $sql .= "(
     '{$full_name}',
     '{$email_address}',
     '{$password}',
     '{$level}',
     '{$file_path_name}',
     '0')";
   $db->query($sql);
 }

 function display_announcement() {
   global $db;
   $current_date = date("Y-m-d H:i:s", strtotime('12 day'));
  //  $sql = sprintf("SELECT * FROM `announcement_logs` WHERE `date_posted` <
  //  '%s' GROUP BY `from` ORDER BY `id` DESC", $current_date);
   $sql = sprintf("SELECT * FROM `announcement_logs` WHERE `date_posted` <
   '%s' ORDER BY `id` DESC", $current_date);
   return find_by_sql($sql);
 }

 function insert_post_announcements($title, $body_message, $attached_file, $from) {
   global $db;
   $current_date = date('Y-m-d H:i:s');
   $sql = "INSERT INTO `announcement_logs` (
     `title`,
     `body_message`,
     `attached_file_path`,
     `date_posted`,
     `from`
   )";
   $sql .=" VALUES ";
   $sql .="(
     '{$title}',
     '{$body_message}',
     '{$attached_file}',
     '{$current_date}',
     '{$from}'
     )";
    $db->query($sql);
 }

 function delete_announcement_after_a_days() {
   global $db;

   $date_expired = date("Y-m-d H:i:s", strtotime('-15 day'));
   $sql = "DELETE FROM `announcement_logs` WHERE `date_posted` < '{$date_expired}'";
   $db->query($sql);
 }

 function insertStudentAccount($full_name, $email_address, $course,
     $year, $semester, $school_year, $gender, $age, $birth_date, $present_address) {
     global $db;

       $sql = "INSERT INTO `student_info`(`name`,`email_address`,`course`
         ,`student_year`, `semester`,`school_year`,`gender`,`age`
         ,`birth_date`,`present_address`)";
       $sql .= " VALUES ";
       $sql .= "(
         '{$full_name}',
         '{$email_address}',
         '{$course}',
         '{$year}',
         '{$semester}',
         '{$school_year}',
         '{$gender}',
         '{$age}',
         '{$birth_date}',
         '{$present_address}'
         )";
         $db->query($sql);
 }

 function insertGuidanceAccount($full_name, $email_address, $gender, $age, $birth_date, $present_address) {
     global $db;

       $sql = "INSERT INTO `guidance_info`(`name`,`email_address`,`gender`,`age`
         ,`birth_date`,`present_address`)";
       $sql .= " VALUES ";
       $sql .= "(
         '{$full_name}',
         '{$email_address}',
         '{$gender}',
         '{$age}',
         '{$birth_date}',
         '{$present_address}'
         )";
         $db->query($sql);
 }

 function authentication($email_address, $password) {
   global $db;
   $email_address = $db->escape($email_address);
   $password = $db->escape($password);
   $sql = sprintf("SELECT * FROM `user_account` WHERE `email_address` =
     '%s' LIMIT 1", $email_address);
   $result = $db->query($sql);
   if ($db->num_rows($result)) {
     $command = $db->fetch_assoc($result);
     $password_post = sha1($password);
     if ($password_post == $command['password']) {
       return $command;
     }
   }
   return false;
 }

 function find_current_user_by_otp($email_address, $password) {
   global $db;
   $email_address = $db->escape($email_address);
   $password = $db->escape($password);
   $sql = sprintf("SELECT * FROM `user_account` WHERE `email_address` =
     '%s' AND `is_otp_verified` = '0' LIMIT 1", $email_address);
   $result = $db->query($sql);
   if ($db->num_rows($result)) {
     $command = $db->fetch_assoc($result);
     if ($password == $command['password']) {
       return $command;
     }
   }
   return false;
 }

 function find_by_otp_login($email_address = '', $oneTimePassword = '') {
   global $db;
   $email_address = $db->escape($email_address);
   $oneTimePassword = $db->escape($oneTimePassword);
   $sql ="SELECT `u`.`email_address` AS email_address, `u`.`user_level` AS user_level,
   `u`.`is_otp_verified` AS is_otp_verified, `u`.`is_logged_in` AS is_logged_in,
   `a`.`one_time_password` AS one_time_password,
   `a`.`expired` AS expired, `a`.`created` AS created
   FROM `user_account` `u` LEFT JOIN `authentication` `a`
   ON `u`.`email_address` = `a`.`email_address`
   WHERE `a`.`email_address` = '{$email_address}'
   AND `a`.`expired`='0' AND `u`.`is_logged_in` ='0'";
   $result = $db->query($sql);
   if ($db->num_rows($result)) {
     $user = $db->fetch_assoc($result);
     return $user;
   }
   return false;
 }

 function is_otp_expired($email_address = '', $oneTimePassword = '') {
   global $db;
   $email_address = $db->escape($email_address);
   $oneTimePassword = $db->escape($oneTimePassword);
   $sql = "SELECT * FROM `authentication` WHERE `email_address` ='{$email_address}'";
   $sql .=" AND `one_time_password` ='{$oneTimePassword}'";
   $sql .=" AND `expired` ='0' AND NOW() <= DATE_ADD(created, INTERVAL 24 HOUR)";
   $result = $db->query($sql);
   $count = $db->num_rows($result);
   if (!empty($count)) {
     return true;
   }
   return false;
 }

 function updateUsertAccount($full_name, $email_address) {
   global $db;
   $sql = "UPDATE `user_account` SET
   `name` ='{$full_name}' WHERE `email_address`='{$email_address}'";
   $result = $db->query($sql);
   return ($result && $db->affected_rows() === 1 ? true : false);
 }

 function updateStudentInfo($full_name, $email_address, $course,
     $year, $semester, $school_year, $gender, $age, $birth_date, $present_address) {
     global $db;

     $sql = "UPDATE `student_info` SET
      `name`='{$full_name}',
      `email_address`='{$email_address}',
      `course` ='{$course}',
      `student_year` ='{$year}',
      `semester` = '{$semester}',
      `school_year` = '{$school_year}',
      `gender` ='{$gender}',
      `age` ='{$age}',
      `birth_date` ='{$birth_date}',
      `present_address` ='{$present_address}' WHERE `email_address` ='{$email_address}'";
      $result = $db->query($sql);
      return ($result && $db->affected_rows() === 1 ? true : false);
 }

 function updateGuidanceInfo($full_name, $email_address, $gender,
    $age, $birth_date, $present_address) {
      global $db;

      $sql = "UPDATE `guidance_info` SET
      `name`='{$full_name}',
      `email_address` ='{$email_address}',
      `gender` ='{$gender}',
      `age` ='{$age}',
      `birth_date` ='{$birth_date}',
      `present_address` ='{$present_address}' WHERE `email_address` ='{$email_address}'";
      $result = $db->query($sql);
      return ($result && $db->affected_rows() === 1 ? true : false);
  }

 function update_last_login($email_address) {
   global $db;
   $date = make_date();
   $sql = "UPDATE `user_account` SET `last_login` = '{$date}' WHERE `email_address` = '{$email_address}' LIMIT 1";
   $result = $db->query($sql);
   return ($result && $db->affected_rows() === 1 ? true : false);
 }

 function update_last_login_status($email_address, $is_logged_in) {
   global $db;
   $sql = "UPDATE `user_account` SET `is_logged_in` ='{$is_logged_in}' WHERE `email_address` ='{$email_address}' LIMIT 1";
   $result = $db->query($sql);
   return ($result && $db->affected_rows() === 1 ? true : false);
 }

 function change_password_by_query($email_address, $change_password) {
   global $db;
   $encrypt = sha1($change_password);
   $sql ="UPDATE `user_account` SET `password` ='{$encrypt}',";
   $sql .=" `status` ='1'";
   $sql .=" WHERE `email_address` ='{$email_address}' LIMIT 1";
   $result = $db->query($sql);
   return ($result && $db->affected_rows() === 1 ? true : false);
 }

 function insert_new_exam(array $data) {
  global $db;
  $sql ="INSERT INTO exam_created(student_year, semester, school_year, exam_title, exam_description, exam_category, image_exam_path, created_at, exam_status, updated_answer) ";
  $sql .="VALUES ('" .$data['student_year'];
  $sql .="','" .$data['semester'];
  $sql .="','" .$data['school_year'];
  $sql .="','" .$data['exam_title'];
  $sql .="','" .$data['exam_description'];
  $sql .="','" .$data['exam_category'];
  $sql .="','" .$data['image_exam_path'];
  $sql .="','" .$data['created_at'];
  $sql .="','" .$data['exam_status'];
  $sql .="','0')";
  $result = $db->query($sql);
  if ($result) {
    return true;
  } else {
    return false;
  }
 }

 function update_created_exam($id, $status) {
  global $db;
  $sql = "UPDATE exam_created set exam_status ='" .$status. "' WHERE id ='" .$id. "'";
  $result = $db->query($sql);
  return ($result && $db->affected_rows() === 1 ? true : false);
 }

 function update_exam_schedule($id, $status) {
  global $db;
  $sql = "UPDATE exam_schedule set exam_status ='" .$status. "' WHERE id ='" .$id. "'";
  $result = $db->query($sql);
  return ($result && $db->affected_rows() === 1 ? true : false);
 }

 function insert_exam_schedule(array $data) {
  global $db;
  $sql = "INSERT INTO exam_schedule(student_year, semester, school_year, exam_title, exam_description, exam_category, created_on, expired_on, exam_duration, result_date_and_time, `exam_status`) ";
  $sql .="VALUES('" .$data['student_year'];
  $sql .="','" .$data['semester'];
  $sql .="','" .$data['school_year'];
  $sql .="','" .$data['exam_title'];
  $sql .="','" .$data['exam_description'];
  $sql .="','" .$data['exam_category'];
  $sql .="','" .$data['created_at'];
  $sql .="','" .$data['expired_at'];
  $sql .="','" .$data['exam_duration'];
  $sql .="','" .$data['result_date'];
  $sql .="','" .$data['exam_status']. "')";
  $result = $db->query($sql);
  if ($result) {
    return true;
  } else {
    return false;
  }
 }

 function find_all_user($id) {
   global $db;

  $sql ="SELECT * FROM `user_account` WHERE ";
  $sql .="`id` ='{$id}'";
  return find_by_sql($sql);
}

 function find_by_exam_created() {
  global $db;
  $sql = "SELECT * FROM exam_created ORDER BY id DESC";
  return find_by_sql($sql);
}

function find_by_exam_created_by_id($id) {
  global $db;
  $sql = "SELECT * FROM exam_created WHERE id ='" .$id. "'";
  $result = $db->query($sql);
  if ($db->num_rows($result)) {
    $data = $db->fetch_assoc($result);
    return $data;
  }
  return $data = [];
}

function find_by_exam_created_by_student_year($student_year, $exam_title, $exam_description) {
  global $db;
  if (!empty($student_year) && empty($exam_title) && empty($exam_description)) {
    $sql = "SELECT * FROM exam_created WHERE student_year ='" .$student_year. "'";
  } elseif (!empty($student_year) && !empty($exam_title) && empty($exam_description)) {
    $sql = "SELECT * FROM exam_created WHERE student_year ='" .$student_year. "' AND exam_title ='" .$exam_title. "'";
  } elseif (!empty($student_year) && !empty($exam_title) && !empty($exam_description)) {
    $sql = "SELECT * FROM exam_created WHERE student_year ='" .$student_year. "' AND exam_title ='" .$exam_title. "' AND exam_description ='" .$exam_description. "'";
  }
  
  return find_by_sql($sql);
}

function find_by_exam_schedule_by_student_year($student_year, $exam_title, $exam_descriptio) {
  global $db;
  if (!empty($student_year) && empty($exam_title) && empty($exam_description)) {
    $sql = "SELECT * FROM exam_schedule WHERE student_year ='" .$student_year. "'";
  } elseif (!empty($student_year) && !empty($exam_title) && empty($exam_description)) {
    $sql = "SELECT * FROM exam_schedule WHERE student_year ='" .$student_year. "' AND exam_title ='" .$exam_title. "'";
  } elseif (!empty($student_year) && !empty($exam_title) && !empty($exam_description)) {
    $sql = "SELECT * FROM exam_schedule WHERE student_year ='" .$student_year. "' AND exam_title ='" .$exam_title. "' AND exam_description ='" .$exam_description. "'";
  }
  return find_by_sql($sql);
}

// TODO
function fetch_exam_created($student_year, $semester, $school_year, $exam_title, $exam_description, $exam_category, $id) {
  global $db;
  $sql = "SELECT `c`.`image_exam_path` AS image_exam_path";
  $sql .= " FROM `exam_created` `c` LEFT JOIN `exam_schedule` `s`";
  $sql .= " ON `c`.`student_year` = `s`.`student_year`";
  $sql .= " WHERE `c`.`student_year` = '{$student_year}'";
  $sql .= " AND `s`.`semester` ='{$semester}'";
  $sql .= " AND `s`.`school_year` ='{$school_year}'";
  $sql .= " AND `s`.`exam_title` ='{$exam_title}'";
  $sql .= " AND `s`.`exam_description` ='{$exam_description}'";
  $sql .= " AND `s`.`exam_category` ='{$exam_category}'";
  $sql .= " AND `c`.`id` = '{$id}' LIMIT 1";
  return find_by_sql($sql);
}

function get_exam_count_query($student_year, $semester) {
  global $db;
  if ($semester == 'First semester') {
    $sql = "SELECT COUNT(*) AS `total_count` FROM `exam_created` WHERE";
    $sql .=" `student_year` ='{$student_year}' AND";
    $sql .=" `exam_title` ='Student Success Kit' AND";
    $sql .=" `exam_status` ='1'";
  } else {
    $sql = "SELECT COUNT(*) AS `total_count` FROM `exam_created` WHERE";
    $sql .=" `student_year` ='{$student_year}' AND ";
    $sql .=" `exam_title` ='OASIS 3' AND ";
    $sql .=" `exam_status` ='1'";
  }

  $result = $db->query($sql);
  if ($db->num_rows($result)) {
    $fetch = $db->fetch_assoc($result);
    $total_count = $fetch['total_count'];
    return $total_count;
  }
  return false;
}

function find_by_available_exam($student_year, $semester, $school_year) {
  global $db;
  $sql ="SELECT * FROM exam_schedule WHERE student_year = '" .$student_year. "' AND semester ='" .$semester. "' AND school_year ='" .$school_year. "'";
  $result = $db->query($sql);
  if ($db->num_rows($result)) {
    $student = $db->fetch_assoc($result);
    return $student;
  }
  return false;
}

function start_exam_by_query($student_year, $id) {
  global $db;
  if ($id == 'Reading' || 
      $id == 'Writing' || 
      $id == 'Speaking Skills' || 
      $id == 'Listening Skills' || 
      $id == 'Learning Styles' || 
      $id == 'Memory' || 
      $id == 'Study Skills' || 
      $id == 'Creative and Critical Thinking Skills' || 
      $id == 'Motivation' || 
      $id == 'Self-Esteem' || 
      $id == 'Personal relationships' || 
      $id == 'Conflict Resolution' || 
      $id == 'Health' || 
      $id == 'Time Management' || 
      $id == 'Money Management' || 
      $id == 'Personal Purpose' || 
      $id == 'Career Planning' || 
      $id == 'Support Resources') {
    $sql = "SELECT * FROM exam_schedule WHERE student_year ='" .$student_year. "' AND id ='" .$id. "'";
  } else {
    $sql = "SELECT * FROM exam_schedule WHERE student_year ='" .$student_year. "' AND id ='" .$id. "'";
  }
  
  $result = $db->query($sql);
  if ($db->num_rows($result)) {
    $exams = $db->fetch_assoc($result);
    return $exams;
  }
  return $exams = [];
}

function get_exam_query($student_year, $id) {
  global $db;
  if ($id == 'Reading' || 
  $id == 'Writing' || 
  $id == 'Speaking Skills' || 
  $id == 'Listening Skills' || 
  $id == 'Learning Styles' || 
  $id == 'Memory' || 
  $id == 'Study Skills' || 
  $id == 'Creative and Critical Thinking Skills' || 
  $id == 'Motivation' || 
  $id == 'Self-Esteem' || 
  $id == 'Personal relationships' || 
  $id == 'Conflict Resolution' || 
  $id == 'Health' || 
  $id == 'Time Management' || 
  $id == 'Money Management' || 
  $id == 'Personal Purpose' || 
  $id == 'Career Planning' || 
  $id == 'Support Resources') {
    $sql = "SELECT * FROM exam_schedule WHERE student_year ='" .$student_year. "' AND id ='" .$id. "'";
  } else {
    $sql = "SELECT * FROM exam_schedule WHERE student_year ='" .$student_year. "' AND id ='" .$id. "'";
  }
  $result = $db->query($sql);
  if ($db->num_rows($result)) {
    $student = $db->fetch_assoc($result);
    return $student;
  }
  return $student = [];
}

function find_by_correct_answer_query($table) {
  global $db;
  $sql = "SELECT * FROM '{$table}' ORDER BY id DESC";
  return find_by_sql($sql);
}

function find_by_exam_schedule() {
  global $db;
  $sql = "SELECT * FROM exam_schedule ORDER BY id DESC";
  return find_by_sql($sql);
}

function delete_exam_created($id) {
  global $db;
  $sql = "DELETE FROM exam_created";
  $sql .= " WHERE id='" .$id. "'";
  $db->query($sql);
  return ($db->affected_rows() === 1) ? true : false;
}

function delete_exam_schedule($id) {
  global $db;
  $sql = "DELETE FROM exam_schedule";
  $sql .= " WHERE id='" .$id. "'";
  $db->query($sql);
  return ($db->affected_rows() === 1) ? true : false;
}

function find_all_student($student_year) {
  global $db;
  $student_year = $db->escape($student_year);
  $sql ="SELECT * FROM student_info WHERE student_year='" .$student_year. "'";
  $result = $db->query($sql);
  if ($db->num_rows($result)) {
    $user = $db->fetch_assoc($result);
    return $user;
  }
  return $user=[];
}

function check_exam_ids($table, $value) {
  global $db;
  if (table_exist($table)) {
    $sql = $db->query("SELECT * FROm {$db->escape($table)} WHERE 'id' = '{$value}' LIMIT 1");
    if ($result = $db->fetch_assoc($sql)) {
      return true;
    } else {
      return false;
    }
  }
}

function find_exam_menu($student_year, $semester, $school_year, $exam_title) {
  global $db;
  $sql = "SELECT * FROM exam_schedule WHERE student_year ='" .$student_year. 
  "' AND semester ='" .$semester. 
  "' AND school_year ='" .$school_year.
  "' AND exam_title ='" .$exam_title.
  "' AND exam_status ='Ready'";
  return find_by_sql($sql);
}

// function insert_examinee(array $data) {
//   global $db;
//   $sql ="INSERT INTO examinee(`name`, email_address, gender, course, semester, school_year, student_year) ";
//   $sql .="VALUES('" .$data['name'];
//   $sql .="','" .$data['email_address'];
//   $sql .="','" .$data['gender'];
//   $sql .="','" .$data['course'];
//   $sql .="','" .$data['semester'];
//   $sql .="','" .$data['school_year'];
//   $sql .="','" .$data['student_year']. "')";
//   $result = $db->query($sql);
// }



function insert_academic_settings(array $data) {
  global $db;
  $sql ="INSERT INTO academic_settings(semester, school_year) ";
  $sql .="VALUES('" .$data['semester']. "','" .$data['school_year']. "')";
  $db->query($sql);
}

function update_academic_settings(array $data) {
  global $db;
  $sql = "UPDATE academic_settings SET semester='" .$data['semester']. "', school_year ='" .$data['school_year']. "' WHERE id ='1'";
  $db->query($sql);
}

function check_academic() {
  global $db;
  $id = '1';
  $sql = $db->query("SELECT * FROM academic_settings WHERE id='{$id}' LIMIT 1");
  if ($result = $db->fetch_assoc($sql)) {
    return true;
  } else {
    return false;
  }
}

function get_academic_settings() {
  global $db;
  $id = '1';
  $sql = "SELECT * FROM academic_settings WHERE id='{$id}' LIMIT 1";
  $result = $db->query($sql);
  if ($db->num_rows($result)) {
    $academic = $db->fetch_assoc($result);
    return $academic;
  }
  return false;
}

function check_examinee_answer($email_address) {
  global $db;
  $sql = $db->query("SELECT * FROM examinee_answer WHERE email_address ='{$email_address}'");
  if ($result = $db->fetch_assoc($sql)) {
    return true;
  } else {
    return false;
  }
}

function check_create_exam($exam_title, $exam_description, $exam_category) {
  global $db;
  $sql = $db->query("SELECT * FROM exam_created WHERE exam_title ='{$exam_title}' 
  AND exam_description ='{$exam_description}' 
  AND exam_category='{$exam_category}'");
  if ($result =$db->fetch_assoc($sql)) {
    return true;
  } else {
    return false;
  }
}

function check_exam_schedule($exam_title, $exam_description, $exam_category) {
  global $db;
  $sql = $db->query("SELECT * FROM exam_schedule WHERE exam_title ='{$exam_title}' 
  AND exam_description ='{$exam_description}' 
  AND exam_category = '{$exam_category}'");
  if ($result = $db->fetch_assoc($sql)) {
    return true;
  } else {
    return false;
  }
}

function find_correct_answer_by_table($table) {
  global $db;
  if (table_exist($table)) {
    $sql = "SELECT * FROM  ".$db->escape($table);
    return find_by_sql($sql);
  }
}

function find_examinee_complete($student_id, $semester, $school_year) {
  global $db;
  $sql = "SELECT * FROM examinee WHERE student_id ='" .$student_id. 
  "' AND semester ='" .$semester. 
  "' AND school_year ='" .$school_year.
  "' AND exam_result_status ='Done'";
  $result = $db->query($sql);
  if ($db->num_rows($result)) {
    $examinee = $db->fetch_assoc($result);
    return $examinee;
  }
  return $examinee=[];
}

function count_notification($student_id) {
  global $db;
  $sql = "SELECT COUNT(*) AS total_count FROM notify_student WHERE student_id='$student_id' AND notify_status='unread'";

  $result = $db->query($sql);
  if ($db->num_rows($result)) {
    $check = $db->fetch_assoc($result);
    $total_count = $check['total_count'];
    return $total_count;
  }
  return false;
}

function count_notification_by_admin() {
  global $db;
  $sql = "SELECT COUNT(*) AS total_count FROM notify_student WHERE notify_status='unread' ORDER BY id DESC";
  $result = $db->query($sql);
  if ($db->num_rows($result)) {
    $check = $db->fetch_assoc($result);
    $total_count = $check['total_count'];
    return $total_count;
  }
  return false;
}

?>
