<?php

if (isset($_SESSION['key_session']['email_address'])) {
  if (isset($_POST['id_2'])) {
    $id_1 = $_SESSION['key_session']['id'];
    $id_2 = $_POST['id_2'];
    $opened = 0;

    $chats = check_chat_by_id($id_1, $id_2);
    foreach ($chats as $key) {
      if ($key['opened'] == 0) {
        $opened = 1;
        $chat_id = $key['chat_id'];

        update_chat_by_id($opened, $chat_id);
?>
<li class="clearfix">
    <div class="message-data text-right">
        <small class="message-data-time"><?php echo $key['message']; ?></small>
    </div>
    <div class="message other-message float-right"> <?php echo $key['created_at']; ?> </div>
</li>
<?php
      }
    }

  }
}

?>
