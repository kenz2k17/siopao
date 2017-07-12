<div class="modal fade" id="delete<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete this Data?</h4>
      </div>
      <div class="modal-body center">
			Are you sure you want to delete this Data.?
      </div>
      <div class="modal-footer center">
        <button type="button"  class="btn btn-default " data-dismiss="modal"><i class="fa fa-times"></i> No</button>
        <button type="button" id="<?php echo $id; ?>" class="btn btn-danger delete_btn<?php echo $id; ?>"><i class="fa fa-check"></i> Yes</button>
      </div>
    </div>
  </div>
</div>