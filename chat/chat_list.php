<?php
  $users = find_chat_user($_SESSION['key_session']['email_address']);
  $conversations = get_user_chat_conversation($users['id']);
?>
<div id="plist" class="people-list">
  <div class="input-group">
    <input id="searchText" type="text" class="form-control" placeholder="Search..." style="width:200px;">
    <button "searchBtn" type="submit" class="form-control btn btn-success" style="width:10px;" ><i class="fa fa-search"></i> </button>
  </div>
</div>
 <ul class="list-unstyled chat-list mt-2 mb-0 sidebar-nav" id="chatList">
   <?php foreach($conversations as $key) { ?>
   <li class="nav-item">
       <a class="nav-link nav-profile d-flex align-items-center pe-0" href="chat_app.php?email_address=<?php echo $key['email_address']; ?>">
       <img style="width: 42px; height: 42px;" src="<?php echo $key['image']; ?>" alt="" class="rounded-circle">
       <span style="padding:10px;" class="d-none d-md-block"><?php echo $key['name']; ?></span>
       <p class="text-center">
         <?php if (last_seen($key['last_seen']) == "Active") { ?>
           <span class="d-none d-md-block fa fa-circle online">
             Online
           </span>
         <?php } else { ?>
           <span class="d-none d-md-block fa fa-circle offline">
             offline
           </span>
         <?php } ?>
       </p>
     </a><!-- End Profile Iamge Icon -->
   </li>
   <?php } ?>
 </ul>

 <script>
	$(document).ready(function(){

      // Search
       $("#searchText").on("input", function(){
       	 var searchText = $(this).val();
         if(searchText == "") return;
         $.post('./ajax/search.php',
         	     {
         	     	key: searchText
         	     },
         	   function(data, status){
                  $("#chatList").html(data);
         	   });
       });

       // Search using the button
       $("#searchBtn").on("click", function(){
       	 var searchText = $("#searchText").val();
         if(searchText == "") return;
         $.post('./ajax/search.php',
         	     {
         	     	key: searchText
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
      	$.get("./ajax/update_last_seen.php");
      }
      lastSeenUpdate();
      /**
      auto update last seen
      every 10 sec
      **/
      setInterval(lastSeenUpdate, 10000);

    });
</script>
