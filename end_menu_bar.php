<?php $announcements = display_announcement(); ?>
<div class="col-lg-4">
  <?php  if ($_SESSION['key_session']['user_level'] == '1' || $_SESSION['key_session']['user_level'] == '2') { ?>
    <button id="button_print" name="button_print" onClick="printContent()" class="btn text-white rounded-pill btn-lg w-100" style="background-image: linear-gradient(#3B7A57, #4B6F44);"><i class="bi bi-print"></i> Generate Report</button>
    <br/><br/>
  <?php } ?>
  <div class="card rounded-0" id="announcement">
            <div class="card-body pb-0">
              <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

              <div class="news">
                <?php foreach ($announcements as $key) { ?>
                <?php
                  $new_format_date = date('M d, Y H:m:i A', strtotime($key['date_posted']));
                ?>
                <hr/>
                <div class="post-item clearfix">
                  <img src="../app/assets/img/announcement_profile.png" alt="">
                  <h4><a href="../app/view_announcement.php?id=<?php echo $key['id']; ?>" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable<?php echo $key['id']; ?>"><?php echo $key['title']; ?></a></h4>
                  <span class="badge border-dark border-1 text-success">&nbsp;&nbsp;<?php echo $new_format_date; ?></span>
                  <p><?php echo $key['body_message']; ?></p>
                </div>
                <?php include('../app/view_announcement.php'); ?>
                <?php } ?>

              </div><!-- End sidebar recent posts-->

            </div>
          </div><!-- End News & Updates -->
</div><!-- End Right side columns -->

</div>
</section>

</main>
