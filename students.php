<?php 
$sy = $_GET['sy'];
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
						Student List
                        <small>in School Year <?php echo $sy; ?></small>
                    </h1>
                </section>
				
  <section class="content">
	<div class="row">
	<div class="col-lg-12">
	<?php include('students_menu.php'); ?>
	<?php include('profile_modal.php'); ?>		
	<hr class="hr">
				<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Students List</h3>
				</div>
				<div class="panel-body">
				<a onclick="window.open('export_student_report.php?sy=<?php echo $sy ?>&grade_id=<?php echo $grade_id; ?>')" class="btn btn-success" href="#"><i class="fa fa-file-excel-o"></i> Export to Excel </a>
					|				
				<a onclick="window.open('student_report.php?sy=<?php echo $sy ?>&grade_id=<?php echo $grade_id; ?>')" class="btn btn-info" href="#"><i class="fa fa-file-pdf-o"></i> Print</a>
				<hr class="hr">	
				<table class="table table-bordered table-condensed" id="data_table">
							<thead>
								<tr>
									<th class="">ID Number</th>
									<th>Full Name</th>
									<th class="col-lg-1">Gender</th>
									<th class="col-lg-1">Age</th>
									<th class="col-lg-3">Address</th>
									<th class="col-lg-1">Grade</th>
									<th class="" width="10%">Section</th>
									<th width="5%">Status</th>
									<th width="10%">Action</th>
								</tr>
							</thead>
							<tbody>
						<?php 
								if($grade_id == 'all'){
									$query = $system->students_list($sy);
								}else{
									$query = $system->students_list_by_grade($sy,$grade_id);
								}
								foreach($query as $row){
								$id = $row['student_id'];
								$teacher_id = $row['teacher_id'];
								$t_row = $system->selected_teacher($teacher_id);
								
								$c= date('Y');
								$y= date('Y',strtotime($row['birthdate']));
								$age =  $c-$y;
						?>
								<tr>
									<td class="center"><?php echo $row['id_number']; ?></td>
									<td><?php echo $row['lastname']; ?>  <?php echo $row['middlename']; ?> <?php echo $row['firstname']; ?> </td>
									<td><?php echo $row['gender']; ?></td>
									<td class="center"><?php echo $age; ?></td>
									<td><?php echo $row['address']; ?></td>
									<td><?php echo $row['grade']; ?></td>
									<td><?php echo $row['section_name']; ?></td>
									<td class="center">
										<?php if($row['student_status'] == 'Active'){ ?> 
											<span class="label label-success"><?php echo $row['student_status']; ?></span>
										<?php }else{ ?>
											<span class="label label-danger"><?php echo $row['student_status']; ?></span>
										<?php } ?>
								</td>
									<td class="center">
										<?php if($user_type == 'Registrar'){ ?>
											<a href="page.php?page=edit_students&sy=<?php echo $_GET['sy']; ?>&grade_id=<?php echo $_GET['grade_id']; ?>&id=<?php echo $id; ?>"  class="btn btn-warning btn-block"> <i class="fa fa-edit"></i> Edit   </a>
											<hr class="hr">
										<?php } ?>
										<a href="#student_info<?php echo $id; ?>" data-toggle="modal" class="btn btn-success btn-block">View Info <i class="fa fa-arrow-right"></i> </a>
									</td>
									<?php include('student_info_modal.php'); ?>
								</tr>
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
            $("#data_table").dataTable(
				{ "aaSorting": [[ 2, "asc" ]] }
			);
        });
    </script>