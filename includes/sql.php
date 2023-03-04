<?php
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
?>
<?php
 function find_all($table) {
   global $db;
   if (table_exist($table)) {
     return find_by_sql("SELECT * FROM ".$db->escape($table));
   }
 }

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
   return $return_set;
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
        if (isset($_SESSION['user_id'])) {
           $user_id = intval($_SESSION['user_id']);
           $current_user = find_by_id('user_account', $user_id);
        }
   }
   return $current_user;
 }

 function find_by_id($table, $id) {
   global $db;
   $id = (int)$id;
   if(table_exist($table)) {
     $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id='{$db->escape($id)} LIMIT 1'");
     if ($result = $db->fetch_assoc($sql)) {
       return $result;
     } else {
       return null;
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

 function authentication($email_address = '', $password = '') {
   global $db;
   $email_address = $db->escape($email_address);
   $password = $db->escape($password);
   $sql = sprintf("SELECT * FROM `user_account` WHERE `email_address` =
     '%s' LIMIT 1", $email_address);
   // $sql = "SELECT * FROM `user_account` WHERE `email_address` = '{$email_address}' LIMIT 1";
   $result = $db->query($sql);
   if ($db->num_rows($result)) {
     $command = $db->fetch_assoc($result);
     $password_post = sha1($password);
     if ($password_post === $command['password']) {
       return $command;
     }
   }
   return false;
 }

 function update_last_login($user_id) {
   global $db;
   $date = make_date();
   $sql = "UPDATE `user_account` SET `last_login` = '{$date}' WHERE `id` = '{$user_id}' LIMIT 1";
   $result = $db->query($sql);
   return ($result && $db->affected_rows() === 1 ? true : false);
 }

?>
