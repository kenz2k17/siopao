<div class="modal fade" id="teacher_info<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-info"></i> Teacher Info</h4>
      </div>
      <div class="modal-body">
			<div class="row">
				<div class="col-lg-3 right">Name : </div><div class="col-lg-9"><?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname']; ?></div>
			</div>	
			<div class="row">
				<div class="col-lg-3 right">Gender :</div><div class="col-lg-9"><?php echo $row['gender']; ?></div>
			</div>	
			<div class="row">
				<div class="col-lg-3 right">Address :</div><div class="col-lg-9"><?php echo $row['address']; ?></div>
			</div>	
			<div class="row">
				<div class="col-lg-3 right">Contact No :</div><div class="col-lg-9"><?php echo $row['contact_no']; ?></div>
			</div>	
			<div class="row">
				<div class="col-lg-3 right">Email :</div><div class="col-lg-9"><?php echo $row['emailadd']; ?></div>
			</div>
			<div class="row">
				<div class="col-lg-3 right">Grade :</div><div class="col-lg-9"><?php echo $row['grade']; ?></div>
			</div>	
			<div class="row">
				<div class="col-lg-3 right">Section :</div><div class="col-lg-9"><?php echo $row['section_name']; ?></div>
			</div>
			
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-default " data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
       
      </div>
    </div>
  </div>
</div>