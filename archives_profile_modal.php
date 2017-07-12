<!-- Modal -->
<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Select Records to Profile</h4>
      </div>
      <div class="modal-body">
			<div class="list-group">
				<a href="page.php?page=archives_profile&sy=<?php echo $sy; ?>&grade_id=<?php echo $grade_id; ?>&group_by=gender" class="list-group-item">Profile Students By Gender</a>
				<a href="page.php?page=archives_profile&sy=<?php echo $sy; ?>&grade_id=<?php echo $grade_id; ?>&group_by=age" class="list-group-item">Profile Students By Age</a>
				<a href="page.php?page=archives_profile&sy=<?php echo $sy; ?>&grade_id=<?php echo $grade_id; ?>&group_by=tle" class="list-group-item">Profile Students By CPTLE</a>
				<a href="page.php?page=archives_profile&sy=<?php echo $sy; ?>&grade_id=<?php echo $grade_id; ?>&group_by=grade_id" class="list-group-item">Profile Students By Grade</a>
				<a href="page.php?page=archives_profile&sy=<?php echo $sy; ?>&grade_id=<?php echo $grade_id; ?>&group_by=all" class="list-group-item">Profile All</a>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>