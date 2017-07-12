<!-- Modal -->
<div class="modal fade" id="modal<?php echo $modal; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Select School Year to Review</h4>
      </div>
      <div class="modal-body">
			<div class="list-group">
				<?php foreach($system->grade_list() as $row){ ?>
				<a href="page.php?page=students_by_section&sy=<?php echo $sy; ?>&grade_id=<?php echo $row['grade_id']; ?>&section_id=all" class="list-group-item"><i class="fa fa-folder"></i> <?php echo $row['grade']; ?></a>
				<?php } ?>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>

