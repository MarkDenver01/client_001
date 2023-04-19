<div class="modal fade" id="modalDialogScrollable<?php echo $key['id']; ?>" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><?php echo $key['title']; ?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <?php echo $key['body_message']; ?>
          <br/><br/><br/><br/>
          <span class="badge bg-secondary"><?php echo $new_format_date; ?> | Posted by <?php echo $key['from']; ?></span>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div><!-- End Modal Dialog Scrollable-->
