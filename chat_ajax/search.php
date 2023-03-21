<?php
  # check if the user is logged in
  if (isset($_SESSION['key_session']['email_address'])) {
    # check if the key is submitted
    if (isset($_POST['key'])) {
      # creating simple search algorthm

      $key = $_POST['key'];

      $users = search_chat($key);
      foreach ($users as $user) {
        if ($user['id'] == $_SESSION['key_session']['id']) continue;
?>
<a class="nav-link " href="../app/chat?user=<?= $user['email_address'] ?>">
  <li class="person" data-chat="person1">
    <div class="user">
      <img src="<?= $user['image'] ?>" alt="">
      <span class="status busy"></span>
    </div>
    <p class="name-time">
      <span class="name"><?= $user['name'] ?></span>
      <span class="time">15/02/2019</span>
    </p>
  </li>
</a>
<?php } } else {?>
  <li class="person" data-chat="person1">
    <div class="alert alert-info text-center">
      <i class="fa fa-user-times d-block fs-big"></i>

      The user "<?=htmlspecialchars($_POST['key'])?>"
         is  not found.
    </div>
  </li>
<?php } } ?>
