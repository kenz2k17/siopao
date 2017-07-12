<?php 
	include('dbcon.php');
	include('class.php');

?>

			 <?php
			 	$grade_id = $_POST['grade_id'];
			 	foreach($system->grade_section_list($grade_id) as $row){
			 ?>
				<option value="<?php echo $row['section_id']; ?>"><?php echo $row['section_name']; ?></option>	
			 <?php } ?>
