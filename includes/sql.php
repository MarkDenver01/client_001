<?php require_once('includes/load.php'); ?>
<?php
 function find_all($table) {
   global $db;
   if (tableExist($table)) {
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

 function find_by_id($table, $id) {
   global $db;
   $id = (int) $id;
    if(tableExist($table)) {
      $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id='{$db->escape($id)}' LIMIT 1");
      if($result = $db->fetch_assoc($sql)) {
        return $result;
      } else {
        return null;
      }
    }
 }

 function delete_by_id($table, $id) {
   global $db;
   if(tableExist($table)) {
     $sql = "DELETE FROM ".$db->escape($table);
     $sql .= " WHERE id=" .$db->escape($id);
     $sql .= " LIMIT 1";
     $db->query($sql);
     return ($db->affected_rows() === 1) ? true : false;
   }
 }

 function count_by_id($table) {
   global $db;
   if(tableExist($table)) {
     $sql = "SELECT count(id) as total FROM ".$db->escape($table);
     $result = $db->query($sql);
      return ($db->fetch_assoc($result));
   }
 }

 function current_user() {
   static $current_user;
   global $db;
   if (!$current_user) {
        if (isset($_SESSION['email_address']))
           $email_address = intval($_SESSION['email_address']);
           $current_user = find_by_id('user_account', $email_address);
        endif;
   }
   return $current_user;
 }

 function find_group_level($level) {
   global $db;
   $sql = "SELECT `user_level` FROM `user_groups` WHERE `user_level` = '{$db->escape($level)}' LIMIT 1";
   $result = $db->query($sql);
   return ($db->num_rows($result) === 0 ? true : false);
 }

 function page_require_level($require_level) {
   global $session;
   $current_user = current_user();
 }

?>
