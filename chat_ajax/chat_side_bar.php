<?php
  if (isset($_SESSION['key_session']['email_address'])) {
      $key_search = $_SESSION['key_session']['email_address'];
      $users = find_chat_user($key_search);
      $conversations = get_user_chat_conversation($_SESSION['key_session']['id']);
?>

<aside id="sidebar" class="sidebar">
  <div class="chat-search-box">
    <div class="input-group">
      <input id="searchTxt" type="text" class="form-control" placeholder="Search" >
      <div class="input-group-btn">
        <button id="searchBtn" type="button" class="btn btn-primary"><i class="ri-search-line"></i></button>
      </div>
    </div>
  </div>
  <ul class="sidebar-nav users" id="chatList">
    <?php if(!empty($conversations)) { ?>
    <?php foreach($conversations as $key) { ?>
    <a class="nav-link " href="../app/chat?user=<?php $key['email_address']; ?>">
      <li class="person" data-chat="person1">
        <div class="user">
          <img src="<?php $key['image']; ?>" alt="">
          <span class="status busy"></span>
        </div>
        <p class="name-time">
          <span class="name"><?php $key['name']; ?></span>
          <span class="time">15/02/2019</span>
        </p>
      </li>
    </a>
    <?php } } else { ?>
    <li class="person" data-chat="person1">
      <div class="alert alert-info text-center">
        <i class="fa fa-user-times d-block fs-big"></i>
        The user "<?=htmlspecialchars($_POST['key'])?>"
           is  not found.
      </div>
    </li>
  <?php } }?>

  </ul>
</aside><!-- End Sidebar-->

<script>
	$(document).ready(function(){
      // Search
       $("#searchTxt").on("input", function(){
       	 var searchTxt = $(this).val();
         if(searchTxt == "") return;
         $.post('../chat_ajax/search.php',
         	     {
         	     	key: searchTxt
         	     },
         	   function(data, status){
                  $("#chatList").html(data);
         	   });
       });

       // Search using the button
       $("#searchBtn").on("click", function(){
       	 var searchTxt = $("#searchTxt").val();
         if(searchTxt == "") return;
         $.post('../chat_ajax/search.php',
         	     {
         	     	key: searchTxt
         	     },
         	   function(data, status){
                  $("#chatList").html(data);
         	   });
       });


      /**
      auto update last seen
      for logged in user
      **/
      let lastSeenUpdate = function(){
      	$.get("../chat_ajax/update_last_seen.php");
      }
      lastSeenUpdate();
      /**
      auto update last seen
      every 10 sec
      **/
      setInterval(lastSeenUpdate, 10000);

    });
</script>
