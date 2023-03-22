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
   $sql = "SELECT s.id, s.name, s.course, s.student_year, s.gender, s.age, s.birth_date, s.present_address, s.email_address, a.password AS studentInfo,";
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
   $sql .=" `u`.`user_level` AS user_level, `u`.`image` AS image, `u`.`status` AS status,";
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
   $sql ="SELECT `s`.`name` AS name, `s`.`course` AS course, `s`.`student_year` AS student_year,";
   $sql .=" `s`.`gender` AS gender, `s`.`age` AS age, `s`.`birth_date` AS birth_date,";
   $sql .=" `s`.`present_address` AS present_address, `u`.`email_address` AS email_address,";
   $sql .=" `u`.`password` AS password, `u`.`user_level` AS user_level,";
   $sql .=" `u`.`image` AS image, `u`.`status` AS status, `u`.`is_logged_in` AS is_logged_in";
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

 function insertStudentAccount($full_name, $email_address, $course,
     $year, $gender, $age, $birth_date, $present_address) {
     global $db;

       $sql = "INSERT INTO `student_info`(`name`,`email_address`,`course`
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

 function updateUsertAccount($full_name, $email_address, $file_path_name) {
   global $db;
   $sql = "UPDATE `user_account` SET
   `name` ='{$full_name}',
   `image` ='{$file_path_name}' WHERE `email_address`='{$email_address}'";
   $result = $db->query($sql);
   return ($result && $db->affected_rows() === 1 ? true : false);
 }

 function updateStudentInfo($full_name, $email_address, $course,
     $year, $gender, $age, $birth_date, $present_address) {
     global $db;

     $sql = "UPDATE `student_info` SET
      `name`='{$full_name}',
      `email_address`='{$email_address}',
      `course` ='{$course}',
      `student_year` ='{$year}',
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

 function find_chat_user($key) {
   global $db;
   $email_address = $db->escape($key);
   $sql = "SELECT * FROM `user_account` WHERE `email_address` ='{$email_address}'";
   $result = $db->query($sql);
   if ($db->num_rows($result)) {
     $user = $db->fetch_assoc($result);
     return $user;
   }
   return false;
 }

 function find_all_user($id) {
   global $db;

   $sql ="SELECT * FROM `user_account` WHERE ";
   $sql .="`id` ='{$id}'";
   return find_by_sql($sql);
 }

 function find_conversation($id) {
   global $db;

   $sql ="SELECT * FROM `conversation_logs` WHERE ";
   $sql .="`user_1` ='{$id}' OR `user_2` = '{$id}' ";
   $sql .="ORDER BY `conversation_id` DESC";
   return find_by_sql($sql);
 }

 function last_chat($id_1, $id_2) {
   global $db;

   $sql = "SELECT * FROM `chat_logs` WHERE ";
   $sql .="(from_id = '{$id_1}' AND to_id ='{$id_2}') OR ";
   $sql .="(to_id ='{$id_1}' AND from_id ='{$id_2}') ORDER BY ";
   $sql .="`chat_id` DESC LIMIT 1";
   $result = $db->query($sql);
   if ($db->num_rows($result)) {
     $chat = $db->fetch_assoc($result);
     return $chat['message'];
   } else {
     $chat = '';
     return $chat;
   }
 }

 function get_chats($id_1, $id_2) {
   global $db;

   $sql ="SELECT * FROM `chat_logs` WHERE ";
   $sql .="(from_id = '{$id_1}' AND to_id ='{$id_2}') OR ";
   $sql .="(to_id ='{$id_1}' AND from_id = '{$id_2}') ORDER BY ";
   $sql .="`chat_id` ASC";
   return find_by_sql($sql);
 }

 function chat_opened($id_1, $chats) {
   global $db;
   foreach ($chats as $key) {
     if ($key['opened'] == 0) {
       $opened = 1;
       $chat_id = $key['chat_id'];
       $sql = "UPDATE `chat_logs` SET =`opened` ='{$opened}' ";
       $sql .="WHERE `from_id` ='{$id_1}' ";
       $sql .="AND `chat_id` = '{$chat_id}'";
       $db->query($sql);
     }
   }
 }

 function update_chat_by_id($opened, $chat_id) {
   global $db;

   $sql = "UPDATE `chat_logs` SET =`opened` ='{$opened}' ";
   $sql .="WHERE `chat_id` = '{$chat_id}'";
   $db->query($sql);
 }

 function search_chat($key) {
   global $db;

   $sql ="SELECT * FROM `user_account` WHERE ";
   $sql .="`email_address` LIKE '{$key}' OR ";
   $sql .="`name` LIKE '{$key}'";
   return find_by_sql($sql);
 }

 function check_chat_by_id($id_1, $id_2) {
   global $db;

   $sql = "SELECT * FROM `chat_logs` WHERE `to_id` = '{$id_1}'
    AND `from_id` ='{$id_2}' ORDER BY `chat_id` ASC";
   return find_by_sql($sql);
 }

 function last_seen_query($id) {
   global $db;
   $sql = "UPDATE `user_account` SET `last_seen` = NOW() ";
   $sql .="WHERE `id` = '{$id}'";
   $db->query($sql);
 }

 function check_conversation($from_id, $to_id) {
   global $db;

   $sql = "SELECT * FROM `conversation_logs` WHERE ";
   $sql .="(user_1 ='{$from_id}' AND user_2 ='{$to_id}') OR ";
   $sql .="(user_2 ='{$from_id}' AND user_2 ='{$to_id}')";
   $result = $db->query($sql);
   if ($db->num_rows($result)) {
     $convo = $db->fetch_assoc($result);
     return $convo;
   }
   return false;
 }

 function insert_chat_user($from_id, $to_id, $message) {
   global $db;

   $sql = "INSERT INTO `chat_logs` (`from_id`, `to_id`, `message`)";
   $sql .=" VALUES ";
   $sql .="(
     '{$from_id}',
     '{$to_id}',
     '{$messaage}'
     )";
   $result = $db->query($sql);
   if ($result) {
     return true;
   } else {
     return false;
   }
 }

 function insert_conversation_user($from_id, $to_id) {
   global $db;

   $sql = "INSERT INTO `conversation_logs` (`user_1`, `user_2`)";
   $sql .=" VALUES ";
   $sql .="(
     '{$from_id}',
     '{$to_id}'
     )";
   $db->query($sql);
 }

?>
