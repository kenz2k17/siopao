<script>
	jQuery(document).ready(function(){
		$('#messsage').modal('hide'); 
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();
		$('body').removeAttr('style');
	});	 
</script>
<?php 
$sy = $_GET['sy'];
$grade_id = $_GET['grade_id'];
?>               
			   <section class="content-header">
                    <h1>
						Student Anecdotal Records
                        <small>in School Year <?php echo $sy; ?></small>
                    </h1>
                </section>
				
  <section class="content">
	<div class="row">
	<div class="col-lg-12">
	<?php 
		include('anecdotal_menu.php');
	?>
	<hr class="hr">
				<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Student Anecdotal List</h3>
				</div>
				<div class="panel-body">
						<table class="table table-bordered table-condensed" id="data_table">
							<thead>
								<tr>
									<th class="" width="10%">ID Number</th>
									<th class="col-lg-2">Full Name</th>
									<th class="col-lg-2">Anecdotal</th>
									<th class="col-lg-2">Remarks</th>
									<?php if($user_type == 'Guidance'){ ?>
									<th class="col-lg-1">Action</th>
									<?php } ?>
								</tr>
							</thead>
							<tbody>
							<?php 
								if($grade_id == 'all'){
									$query = $system->student_anecdotal_list($sy);
								}else{
									$query = $system->student_anecdotal_list_by_grade($sy,$grade_id);
								}
								foreach($query as $row){
								$id = $row['student_anecdotal_id'];
							?>
								<tr class="del<?php echo $id ?>">
									<td class="center"><?php echo $row['id_number']; ?></td>
									<td><?php echo $row['firstname']; ?> <?php echo $row['middlename']; ?> <?php echo $row['lastname']; ?></td>
									<td><?php echo $row['anecdotal']; ?></td>
									<td><?php echo $row['remarks']; ?></td>
									<?php if($user_type == 'Guidance'){ ?>
									<td class="center">
											<a href="page.php?page=edit_anecdotal&sy=<?php echo $_GET['sy']; ?>&grade_id=<?php echo $_GET['grade_id']; ?>&id=<?php echo $id; ?>"  class="btn btn-warning btn-block"> <i class="fa fa-edit"></i> Edit   </a>
										<!-- 
										<a href="#delete<?php echo $id; ?>" data-toggle="modal"><i class="fa fa-trash"></i> Delete</a> -->
									</td>
									<?php } ?>
								</tr>
								<?php include('delete_modal.php'); ?>
								<script>
									$(document).ready( function() {
										$('.delete_btn<?php echo $id; ?>').click( function() {
											var id = $(this).attr("id");
												$.ajax({
													type: "POST",
													url: "ajax_delete.php<?php echo '?id='.$id.'&action=delete_student_anecdotal'.'&sy='.$sy.'&grade_id='.$grade_id; ?>",
													data: ({id: id}),
													cache: false,
													success: function(html){
														$(".del"+id).fadeOut('fast'); 
														$(".main_con").html(html); 
													} 
												}); 
												return false;
										});				
									});
								</script>
							<?php } ?>	
							</tbody>
						</table>
				</div>
				</div>

	</div>
	</div>
  </section>	 	
  
  
    <script type="text/javascript">
        $(function() {
            $("#data_table").dataTable();
        });
    </script>