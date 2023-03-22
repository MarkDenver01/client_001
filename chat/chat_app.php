<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php include('./chat_header.php'); ?>
<?php include('./chat_side_bar.php'); ?>
<?php


  $chatWith = find_chat_user($_GET['email_address']);


  $chats = get_chats($_SESSION['key_session']['id'], $chatWith['id']);
  //chat_opened($chatWith['id'], $chats);

?>

<main id="main" class="main">
   <section class="section profile">
      <div class="row">
        <div class="col-lg-12">
           <div class="card">
             <div class="chat">
                <div class="chat-header clearfix">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                <img src="<?php echo $chatWith['image']; ?>" alt="" style="width: 50px; height:50px;">
                            </a>
                            <div class="chat-about" style="padding:10px;">
                              <h6 class="m-b-0"><?php echo $chatWith['name']; ?></h6>
                               <?php if (last_seen($key['last_seen']) == "Active") { ?>
                                 <span class="d-none d-md-block fa fa-circle online">
                                   Online
                                 </span>
                               <?php } else { ?>
                                 <span class="d-none d-md-block fa fa-circle offline">
                                   offline
                                 </span>
                               <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="chat-history" id="chatBox">
                    <ul class="m-b-0">
                      <?php foreach($chats as $chat) { ?>
                      <?php if ($chat['from_id'] == $_SESSION['key_session']['id']) { ?>
                        <li class="clearfix">
                            <div class="message-data text-right">
                                <small class="message-data-time"><?php echo $chat['created_at']; ?></small>
                            </div>
                            <div class="message other-message float-right"> <?php echo $chat['message']; ?> </div>
                        </li>
                      <?php } else { ?>
                        <li class="clearfix">
                            <div class="message-data text-right">
                                <small class="message-data-time"><?php echo $chatWith['name']; ?></small>
                                <small class="message-data-time"><?php echo $chat['created_at']; ?></small>
                                <img src="<?php echo $chatWith['image']; ?>" alt="avatar">
                            </div>
                            <div class="message other-message float-right"> <?php echo $chat['message']; ?> </div>
                        </li>
                      <?php } } ?>
                    </ul>
                </div>
                <div class="chat-message clearfix">
                    <div class="input-group mb-0">
                        <div class="input-group-prepend">
                            <button id="sendBtn" type="submit" class="input-group-text btn btn-success"><i class="fa fa-send"></i></button>
                        </div>
                        <textarea cols="3" id="message" type="text" class="form-control"></textarea>
                    </div>
                </div>
           </div>
        </div>
      </div>
   </section>

</main>

<script>
	var scrollDown = function(){
        let chatBox = document.getElementById('chatBox');
        chatBox.scrollTop = chatBox.scrollHeight;
	}

	scrollDown();

	$(document).ready(function(){

      $("#sendBtn").on('click', function(){
      	message = $("#message").val();
      	if (message == "") return;

      	$.post("./ajax/insert.php",
      		   {
      		   	message: message,
      		   	to_id: <?=$chatWith['id']?>
      		   },
      		   function(data, status){
                  $("#message").val("");
                  $("#chatBox").append(data);
                  scrollDown();
      		   });
      });

      /**
      auto update last seen
      for logged in user
      **/
      let lastSeenUpdate = function(){
      	$.get("./ajax/update_last_seen.php");
      }
      lastSeenUpdate();
      /**
      auto update last seen
      every 10 sec
      **/
      setInterval(lastSeenUpdate, 10000);



      // auto refresh / reload
      let fechData = function(){
      	$.post("./ajax/get_message.php",
      		   {
      		   	id_2: <?=$chatWith['id']?>
      		   },
      		   function(data, status){
                  $("#chatBox").append(data);
                  if (data != "") scrollDown();
      		    });
      }

      fechData();
      /**
      auto update last seen
      every 0.5 sec
      **/
      setInterval(fechData, 500);

    });
</script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.bundle.min.js"></script>
<?php include('./chat_footer.php'); ?>
