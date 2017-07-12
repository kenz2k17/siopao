<?php 
	$row = $system->current_sy(); 
	$school_year = $row['school_year'];
	$sy = $row['school_year'];
?>
<?php 
$grade_id = 'all';
$status = $_GET['status'];
?>               
			   <section class="content-header">
                    <h1>
                    	<?php if($status == 'new'){ ?>
							New Student List
						<?php }else if($status == 'existing'){ ?>	
							Old Student List
						<?php }else if($status == 'transfer'){ ?>
							Transferee Student List
						<?php } ?>	
                        <small>in School Year <?php echo $sy; ?></small>
                    </h1>
                </section>
				
  <section class="content">
	<div class="row">
	<div class="col-lg-12">
	<?php /*  include('students_menu.php'); */ ?>
	<?php /* include('profile_modal.php'); */ ?>	
	<a href="page.php?page=home" class="btn btn-success"> <i class="fa fa-arrow-left"></i> back </a>	
	<hr class="hr">
				<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Students List</h3>
				</div>
				<div class="panel-body">
						<table class="table table-bordered table-condensed" id="data_table">
							<thead>
								<tr>
									<th class="" width="10%">ID Number</th>
									<th>Full Name</th>
									<th>Address</th>
									<th class="col-lg-1">Gender</th>
									<th class="col-lg-1">Age</th>
									<th class="col-lg-2">Grade</th>
									<th class="col-lg-2">Section</th>
									<th width="15%">Action</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								if($grade_id == 'all'){
									$query = $system->students_list_with_status($sy,$status);
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
									<td><?php echo $row['firstname']; ?> <?php echo $row['middlename']; ?> <?php echo $row['lastname']; ?></td>
									<td><?php echo $row['address']; ?></td>
									<td><?php echo $row['gender']; ?></td>
									<td class="center"><?php echo $row['age']; ?></td>
									<td><?php echo $row['grade']; ?></td>
									<td><?php echo $row['section_name']; ?></td>
									<td class="center">
										<a href="#student_info<?php echo $id; ?>" data-toggle="modal" class="btn btn-success">View Info <i class="fa fa-arrow-right"></i> </a></td> 
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
            $("#data_table").dataTable();
        });
    </script>