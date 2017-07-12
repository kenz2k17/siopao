<?php 
	$grade_id = $_GET['grade_id'];
?>
 <script>
	jQuery(document).ready(function(){
		$('#messsage').modal('hide'); 
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();
		$('body').removeAttr('style');
	});	 
</script>	
			   <section class="content-header">
                    <h1>
						Teacher List
                        <small></small>
                    </h1>
                </section>
				
  <section class="content">
	<div class="row">
	<div class="col-lg-12">
		<?php include('teachers_menu.php'); ?>
	    <hr class="hr">
				<div class="panel panel-default">
				<!-- <div class="panel-heading">
					<h3 class="panel-title">Teacher Table</h3>
				</div> -->
				<div class="panel-body">
						<table class="table table-bordered table-condensed" id="data_table">
							<thead>
								<tr>
									<th class="col-lg-3">Full Name</th>
									<th class="col-lg-1">Gender</th>
									<th class="col-lg-3">Address</th>
									<th class="col-lg-1">Grade</th>
									<th class="col-lg-2">Section</th>
									<th width="15%">Photo</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								if($grade_id == 'all'){
									$query = $system->teacher_list();
								}else{
									$query = $system->teacher_list_by_grade($grade_id);
								}
								
								foreach($query as $row){
								
								$id = $row['teacher_id'];
							?>
								<tr>
									<td> <?php echo $row['lastname']; ?> <?php echo $row['middlename']; ?>  <?php echo $row['firstname']; ?> </td>
									<td><?php echo $row['gender']; ?></td>
									<td><?php echo $row['address']; ?></td>
									<td><?php echo $row['grade']; ?></td>
									<td><?php echo $row['section_name']; ?></td>
									<td class="center">
										<img src="uploads/<?php echo $row['photo']; ?>" width="100" height="90">
										<?php if($user_type == 'Registrar'){ ?>
											<hr class="hr">
											<a href="#change_picture_modal<?php echo $id; ?>" data-toggle="modal">Change Picture</a>
										<?php } ?>	
									</td>
									<td class="center">
										<?php if($user_type == 'Registrar'){ ?>
											<a href="page.php?page=edit_teacher&id=<?php echo $id; ?>&sy=<?php echo $sy; ?>&grade_id=<?php echo $grade_id; ?>" class="btn btn-info btn-block"><i class="fa fa-edit"></i> Edit  </a>
											<hr class="hr">
										<?php } ?>
											<a href="#teacher_info<?php echo $id; ?>" data-toggle="modal" class="btn btn-success btn-block">View Info <i class="fa fa-arrow-right"></i> </a>
									
									</td>
									<?php include('teacher_info_modal.php'); ?>
								</tr>
							<?php } ?>	
							</tbody>
						</table>
						
							<?php 
								$form = 'teacher';
								foreach($system->teacher_list() as $row){
								$id = $row['teacher_id'];
									include('change_picture_modal.php');
								}
							 ?>
				</div>
				</div>

	</div>
	</div>
  </section>	 	
  
  
     <script type="text/javascript">
        $(function() {
            $("#data_table").dataTable(
				{ "aaSorting": [[ 0, "asc" ]] }
			);
        });
    </script>