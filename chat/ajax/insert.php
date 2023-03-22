<?php
  if (isset($_SESSION['key_session']['email_address'])) {
    if (isset($_POST['message']) && isset($_POST['to_id'])) {

      $message = $_POST['message'];
      $to_id = $_POST['to_id'];
      $from_id = $_SESSION['key_session']['id'];

      $result = insert_chat_user($from_id, $to_id, $message);
      if ($result) {
        $select = check_conversation($from_id, $to_id);

        $time = date("h:i:s a");

        if ($select) {
          insert_conversation_user($from_id, $to_id);
        }
?>
<li class="clearfix">
    <div class="message-data text-right">
        <small class="message-data-time"><?php echo $message; ?></small>
    </div>
    <div class="message other-message float-right"> <?php echo $time; ?> </div>
</li>
<?php
      }
    }
  }
?>
