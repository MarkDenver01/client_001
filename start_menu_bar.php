<?php require_once('../lib/class.environment.php'); ?>
<?php include_once('../includes/load.php'); ?>
<?php global $db; ?>
<?php delete_announcement_after_a_days(); ?>
<?php $email_address = $_SESSION['key_session']['email_address']; ?>
<?php $user_profile = current_user_account("user_account", $email_address); ?>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="./dashboard" class="logo d-flex align-items-center">
      <lottie-player src="./assets/json/book.json" background="transparent"  speed="1"  style="width: 60px; height: 60px;" loop autoplay></lottie-player>
      <span class="d-none d-lg-block"><?= $_ENV['SITE_PORTAL']; ?></span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">
  <?php
      $user_level = $_SESSION['key_session']['user_level'];
      if ($user_level == '3') {  ?>
      <?php $student_id = $_SESSION['key_session']['student_id']; ?>
      <?php 
        if (isset($_POST["button_update"])) {
          $sql = $db->query("UPDATE notify_student SET notify_status='read' WHERE student_id='$student_id' AND user_level='1' OR user_level='2' AND notify_status='unread'");
          if($sql) {
            redirect('https://gmail.com/', false);
          } else {
            redirect('../app/dashboard', false);
          }
        }
      ?>
    <?php $notify_count = count_notification($_SESSION['key_session']['student_id']); ?>
    <li class="nav-item dropdown">
        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-bell"></i>
          <span class="badge badge-number"  style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $notify_count; ?> Notification</span>
        </a><!-- End Notification Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
          <li class="dropdown-header">
            <form action="" method="post">
            You have <?php echo $notify_count; ?> new notifications
            <?php if($notify_count > 0) { ?>
              <button name="button_update" type="submit" class="badge rounded-pill bg-primary p-2 ms-2">View all</button>
            <?php } ?>
            </form>
          </li>
          <?php global $db; ?>
          <?php 
            $sql = "SELECT * FROM notify_student WHERE student_id='$student_id' AND notify_status='unread' AND user_level='1' OR user_level='2'";
            $result = $db->query($sql);
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) { ?>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li class="notification-item">
            <i class="bi bi-exclamation-circle text-warning"></i>
            <div>
              <h4>From Guidance Counselor | </h4><span><?php echo $row['notify_date']; ?></span>
              <p><?php echo $row['message']; ?></p>
            </div>
          </li>
          <?php
              }
            } else {
          ?>
             <li>
            <hr class="dropdown-divider">
          </li>

          <li class="notification-item">
            <i class="bi bi-exclamation-circle text-success"></i>
            <div>
              <h4>No notification is <b>unread</b></span>
            </div>
          </li>
          <?php } ?>
          
        </ul><!-- End Notification Dropdown Items -->

      </li><!-- End Notification Nav -->
  <?php } else { ?>
    <?php 
            if (isset($_POST['button_update_admin'])) {
              $sql = $db->query("UPDATE notify_student SET notify_status='read' WHERE receiver='$email_address' AND user_level='3' AND notify_status='unread'");
              if ($sql) {
                redirect('https://gmail.com/', false);
              } else {
                redirect('../app/dashboard', false);
              }
            }
      ?>
    <?php $notif_admin = count_notification_by_admin($email_address); ?>

    <li class="nav-item dropdown">
        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-bell"></i>
          <span class="badge badge-number"  style="background-image: linear-gradient(#d9534f, #AB274F);"><?php echo $notif_admin; ?> Notification</span>
        </a><!-- End Notification Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
          <li class="dropdown-header">
            <form action="" method="post">
            You have <?php echo $notif_admin; ?> new notifications
            <?php if($notif_admin > 0) { ?>
              <button name="button_update_admin" type="submit" class="badge rounded-pill bg-primary p-2 ms-2">View all</button>
            <?php } ?>
            </form>
          </li>
          <?php global $db; ?>
          <?php 
            $sql = "SELECT * FROM notify_student WHERE notify_status='unread' AND receiver='$email_address' AND user_level='3'";
            $result_notif = $db->query($sql);
            if ($result_notif->num_rows > 0) {
              while ($row = $result_notif->fetch_assoc()) { ?>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li class="notification-item">
            <i class="bi bi-exclamation-circle text-warning"></i>
            <div>
              <p>From:<br/> <?php echo $row['sender']; ?><br/>(<?php echo $row['notify_date']; ?>)</p>
              <hr/>
              <p><?php echo $row['message']; ?></p>
            </div>
          </li>
          <?php
              }
            } else {
          ?>
             <li>
            <hr class="dropdown-divider">
          </li>

          <li class="notification-item">
            <i class="bi bi-exclamation-circle text-success"></i>
            <div>
              <h4>No notification is <b>unread</b></span>
            </div>
          </li>
          <?php } ?>
          
        </ul><!-- End Notification Dropdown Items -->

      </li><!-- End Notification Nav -->
    <?php } ?>
    <li class="nav-item dropdown">


<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
  <?php $user_level = $_SESSION['key_session']['user_level']; ?>
  <?php if ($user_level == '2') { ?>
    <img src="<?php echo $user_profile['image']; ?>" alt="Profile" class="rounded-circle">
  <?php } elseif ($user_level == '3') { ?>
    <img src="<?php echo $user_profile['image']; ?>" alt="Profile" class="rounded-circle">
  <?php } else { ?>
    <img src="assets/img/profile.png" alt="Profile" class="rounded-circle">
  <?php } ?>
  
  <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['key_session']['name']; ?></span>
</a><!-- End Profile Iamge Icon -->

<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
  <li class="dropdown-header">
    <h6><?php echo $_SESSION['key_session']['name']; ?> </h6>
    <span>
      <?php
        $user_level = $_SESSION['key_session']['user_level'];
        switch ($user_level) {
          case '1':
            echo "Administrator";
            break;
          case '2':
            echo "Guidance";
            break;
          case '3':
            echo "Student";
            break;
          default:
            echo "Unknown Level";
            break;
        }
      ?>
  </span>
  </li>
  <li>
    <hr class="dropdown-divider">
  </li>

  <?php if ($_SESSION['key_session']['user_level'] == '2' || $_SESSION['key_session']['user_level'] == '3') { ?>
    <li>
      <a class='dropdown-item d-flex align-items-center' href='../app/profile'>
        <i class='bi bi-person'></i>
        <span>My Profile</span>
      </a>
    </li>
    <li>
      <hr class='dropdown-divider'>
    </li>

  <?php } ?>
 
  <li>
    <a class="dropdown-item d-flex align-items-center" href="../app/account_settings">
      <i class="bi bi-gear"></i>
      <span>Account Settings</span>
    </a>
  </li>
  <li>
    <hr class="dropdown-divider">
  </li>

  <li>
    <a class="dropdown-item d-flex align-items-center" href="../includes/logout">
      <i class="bi bi-box-arrow-right"></i>
      <span>Sign Out</span>
    </a>
  </li>

</ul><!-- End Profile Dropdown Items -->
</li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <?php
      $user_check_level = $_SESSION['key_session']['user_level'];
      switch ($user_check_level) {
        case '1':
          include_once('admin_menu.php');
          break;
        case '2':
          include_once('guidance_menu.php');
          break;
        case '3':
          include_once('student_menu.php');
          break;
        default:
          echo "Error occured.";
          break;
      }
    ?>
  </ul>
</aside><!-- End Sidebar-->
