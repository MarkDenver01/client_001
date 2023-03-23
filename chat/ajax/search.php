<?php
  if (isset($_SESSION['key_session']['email_address'])) {
    if (isset($_POST['key'])) {
      $key = "%{$_POST['key']}%";
      $users = search_user_chat($_POST['key']);
      foreach($users as $user) {
        if ($user['id'] == $_SESSION['key_session']['id']) continue;
?>
<li class="nav-item">
    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="chat_app.php?email_address=<?php echo $user['email_address']; ?>">
    <img style="width: 42px; height: 42px;" src="<?php echo $user['image']; ?>" alt="" class="rounded-circle">
    <span style="padding:10px;" class="d-none d-md-block"><?php echo $user['name']; ?></span>
    <p class="text-center">
      <?php if (last_seen($user['last_seen']) == "Active") { ?>
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
<?php } } else { ?>
<div class="alert alert-info text-center">
  <i class="fa fa-user-times d-block fs-big"></i>
  The user "<?php htmlspecialchars($_POST['key']); ?>" is not found.
</div>
<?php } }?>
