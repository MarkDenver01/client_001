<?php
  if (isset($_SESSION['key_session']['email_address'])) {
    if (isset($_POST['key'])) {
      $key = "%{$_POST['key']}%";

      $users = search_chat($key);
      foreach ($users as $user) {
        if ($user['id'] == $_SESSION['id']) continue;
?>
<li class="nav-item">
  <a class="nav-link nav-profile d-flex align-items-center pe-0" href="chat_app.php?<?php $user['email_address']; ?>" data-bs-toggle="dropdown">
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
<?php } } } ?>
