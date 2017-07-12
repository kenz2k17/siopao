<?php 
$sy = $_GET['sy'];
$grade_id = $_GET['grade_id'];
?>               
			   <section class="content-header">
                    <h1>
						Archices Student List
                        <small>in School Year <?php echo $sy; ?></small>
                    </h1>
                </section>
				
  <section class="content">
	<div class="row">
	<div class="col-lg-12">
	<?php include('archives_menu.php'); ?>	
	<?php include('archives_profile_modal.php'); ?>
<hr class="hr">
				<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Students List</h3>
				</div>
				<div class="panel-body">
						<table class="table table-bordered table-condensed" id="data_table">
							<thead>
								<tr>
									<th class="">ID Number</th>
									<th>Full Name</th>
									<th class="col-lg-1">Gender</th>
									<th class="col-lg-1">Age</th>
									<th class="col-lg-3">Address</th>
									<th>Action</th>
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
								$from = new DateTime($row['birthdate']);
								$to   = new DateTime('today');
								$age  = $from->diff($to)->y;
							?>
								<tr>
									<td class="center"><?php echo $row['id_number']; ?></td>
									<td><?php echo $row['firstname']; ?> <?php echo $row['middlename']; ?> <?php echo $row['lastname']; ?></td>
									<td><?php echo $row['gender']; ?></td>
									<td class="center"><?php echo $age; ?></td>
									<td><?php echo $row['address']; ?></td>
									<td class="center"><a href="#student_info<?php echo $id; ?>" data-toggle="modal" class="btn btn-success">View Info <i class="fa fa-arrow-right"></i> </a></td>
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
				{ "aaSorting": [[ 1, "asc" ]] }
			);
        });
    </script>