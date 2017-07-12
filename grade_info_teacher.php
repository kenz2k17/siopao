<?php 
	include('dbcon.php');
	include('class.php');
	
	$grade_id = $_POST['grade_id'];
	$teacher_id = $_POST['teacher_id'];
	$row = $system->selected_teacher($teacher_id);
	$array_id = $system->teacher_with_section_array($grade_id);
?>
				<option value="<?php echo $row['section_id']; ?>"><?php echo $row['section_name']; ?></option>
	<?php foreach($system->grade_section_list_teacher($grade_id,$array_id) as $row){ ?>
				<option value="<?php echo $row['section_id']; ?>"><?php echo $row['section_name']; ?></option>	
	 <?php } ?>
