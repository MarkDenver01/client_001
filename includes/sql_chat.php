 <?php
function get_chats($id_1, $id_2) {
  global $db;
  $sql = "SELECT * FROM `chat_logs` WHERE ";
  $sql .="(from_id='{$id_1}' AND to_id='{$id_2}')";
  $sql .=" OR ";
  $sql .="(to_id ='{$id_1}' AND from_id='{$id_2}')";
  $sql .= " ORDER BY `chat_id` ASC";
  $result = $db->query($sql);
  if ($db->num_rows($result)) {
    $user = $db->fetch_assoc($result);
    return $user;
  }
  $user = '';
  return $user;
}

function get_user_chat($email_address) {
  global $db;
  $sql = "SELECT * FROM `user_account` WHERE `email_address` ='{$email_address}'";
  $result = $db->query($sql);
  if ($db->num_rows($result)) {
    $user = $db->fetch_assoc($result);
    return $user;
  }
  $user = [];
  return $user;
}

function get_conversation($id) {
  global $db;
  $sql = "SELECT * FROM `conversation_logs` WHERE ";
  $sql .="`user_1` ='{$id}' OR `user_2` ='{$id}' ";
  $sql .="ORDER BY `conversation_id` DESC";
  $result = $db->query($sql);
  if ($db->num_rows($result)) {
    $conversations = $db->fetch_assoc($result);
    $user_data = [];
    foreach ($conversations as $conversation) {
      $fetch = fetch_user_conversation($id, $conversation);

      # pushing the data into the array
      array_push($user_data, $fetch[0]);
    }
    return $user_data;
  } else {
    $conversations = [];
    return $conversations;
  }
}

function fetch_user_conversation($id, $conversation) {
  global $db;
  if ($conversation['id'] == $id) {
    $sql = "SELECT * FROM `user_account` WHERE `id` ='{$conversation['user_2']}'";
  } else {
    $sql = "SELECT * FROM `user_account` WHERE `id` ='{$conversation['user_1']}'";
  }
  return find_by_sql($sql);
}

function search_user_chat($key) {
  global $db;
  $sql ="SELECT * FROM `user_account` WHERE `email_address` LIKE '{$key}'";
  $sql .=" OR ";
  $sql .="`name` LIKE '{$key}'";
  return find_by_sql($sql);
}

function update_last_seen($id) {
  global $db;
  $sql = "UPDATE user_account SET last_seen = NOW() WHERE id ='{$id}'";
  $db->query($sql);
}

function chat_opened($id_1, $chats) {
  global $db;

  foreach ($chats as $key) {
    if ($key['opened'] == 0) {
      $opened = 1;
      $chat_id = $key['chat_id'];

      $sql ="UPDATE chat_logs SET opened = '{$opened}' WHERE ";
      $sql .="from_id ='{$id_1}' AND chat_id '{$chat_id}'";
      $db->query($sql);
    }
  }
}
?>
