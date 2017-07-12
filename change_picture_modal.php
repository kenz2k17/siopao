<div class="modal fade" id="change_picture_modal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
		<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Change Picture</h4>
      </div> 
      <div class="modal-body">
			<?php include('edit_form.php'); ?>
      </div>
	 <div class="modal-footer ">
        <button type="button"  class="btn btn-default " data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
       
      </div>
    </div>
  </div>
</div>