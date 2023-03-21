<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);
?>
<?php include('../header.php'); ?>
<?php include('../includes/load.php'); ?>
<?php SET_NOT_LOGGED_IN(); ?>
<?php include('../chat_menu_bar.php'); ?>
<?php;
  $email_address = $_SESSION['key_session']['email_address'];
  $users = find_chat_user($email_address);
  $chats = get_chats($_SESSION['key_session']['id'], $users['id']);
  chat_opened($users['id'], $chats);
?>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>CESLICAM Chat System</h1>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="selected-user">
          <span>To: <span class="name">Monggi</span></span>
        </div>
        <div class="chat-container">
          <ul class="chat-box chatContainerScroll">
            <li class="chat-left">
              <div class="chat-avatar">
                <img src="https://www.bootdey.com/img/Content/avatar/avatar3.png" alt="Retail Admin">
                <div class="chat-name">Monggi</div>
              </div>
              <div class="chat-text">Hello, Denver.
                <br> Monggi ka ba?.
              </div>
              <div class="chat-hour">08:55 <span class="fa fa-check-circle"></span></div>
            </li>
            <li class="chat-right">
              <div class="chat-avatar">
                <img src="https://www.bootdey.com/img/Content/avatar/avatar5.png" alt="Retail Admin">
                <div class="chat-name">Denver</div>
              </div>
              <div class="chat-text">Tang ina ka, unggoy!!
              </div>
              <div class="chat-hour">08:56 <span class="fa fa-check-circle"></span></div>
            </li>
            <hr/>
          </ul>
          <div class="form-group mt-3 mb-0">
            <textarea class="form-control" rows="3" placeholder="Type your message here..."></textarea>
            <br/>
            <button type="button" class="btn btn-primary form-control">Send</button>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
<?php include('../footer.php'); ?>
