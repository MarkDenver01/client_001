<?php $announcements = display_announcement(); ?>
<div class="col-lg-4">
  <div class="card rounded-0">
            <div class="card-body pb-0">
              <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

              <div class="news">
                <?php foreach ($announcements as $key) { ?>
                <?php
                  $new_format_date = date('M d, Y H:m:i A', strtotime($key['date_posted']));
                ?>
                <hr/>
                <div class="post-item clearfix">
                  <img src="<?php echo $key['attached_file_path']; ?>" alt="">
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
