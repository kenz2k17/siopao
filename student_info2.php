<?php 
include('dbcon.php');
include('class.php');
$student_id = $_POST['student_id'];
$row = $system->selected_student($student_id);
$id_number = $row['id_number'];




?>


<table class="table table-bordered">
	<thead>
		<th>Previous School year</th>
		<th>Grade</th>
		<th>Section</th>
	</thead>
	<tbody>
		<?php 
			foreach($system->student_full_information($id_number) as $row){
			$sy = $row['school_year'];
					
$row1 = $system->selected_student_id_number_sy($id_number,$sy);
$student_status = $row1['student_status'];

		?>
			<tr>
				<td>
				<?php echo $row['school_year']; ?>
				<?php if($student_status == 'Stop'){ ?>
					<span class="label label-danger"><?php echo $row['student_status']; ?></span>
				<?php } ?>
				
				<?php if($row['status'] == 'transfer'){ ?>
				<div class="pull-right">
					<span class="label label-warning">Transferee</span>
				</div>	
				<?php } ?>
				</td>	
				<td><?php echo $row['grade']; ?></td>	
				<td><?php echo $row['section_name']; ?></td>	
			</tr>	
		<?php } ?>	
	</tbody>
</table>


  
  
  


  
  
  

