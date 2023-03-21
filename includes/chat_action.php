<?php
  function get_user_chat_conversation($id) {
    $conversations = find_conversation($_GET[$id]);

    # creating empty array to
    # store the user conversation
    $user_data = [];

    # looping through the conversations
    foreach($conversations as $key) {
      # if conversation user_1 row equal to $id
      if ($key['user_1'] == $id) {
        $chat_user = find_all_user($key['user_2']);
      } else {
        $chat_user = fild_all_user($key['user_1']);
      }

      # pushing the data into the array
      array_push($user_data, $chat_user[0]);
    }
    return $user_data;
  }
?>
