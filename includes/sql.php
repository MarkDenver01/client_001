<?php require_once('../includes/load.php'); ?>
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

 function find_by_id($table, $email_address) {
   global $db;
   debug_mode("table: " .$table. "\nemail address: " .$email_address);
    if(table_exist($table)) {
      $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE `email_address`='{$db->escape($email_address)}' LIMIT 1");
      if($result = $db->fetch_assoc($sql)) {
        return $result;
      } else {
        return null;
      }
    }
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

 function current_user() {
   static $current_user;
   global $db;
   if (!$current_user) {
        if (isset($_SESSION['email_address'])) {
           $email_address = intval($_SESSION['email_address']);
           $current_user = find_by_id('user_account', $email_address);
        }
   }
   return $current_user;
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

 function page_require_level($require_level) {
   global $session;
   $current_user = current_user();
   $login_level = find_by_group_level($current_user['user_level']);
   // if user not login
   if (!$session->isUserLoggedIn(true)) {
        $session->msg('d', 'Please login...');
        redirect('index', false);
   } elseif($login_level['user_status'] === '0') {
        $session->msg('d', 'You have logged in successfully!');
        redirect('dashboard', false);
   } elseif($current_user['user_level'] <= (int)$require_level) {
        return true;
   } else {
        $session->msg('d', 'You have no access on this page');
        redirect('dashboard', false);
   }
 }

?>
