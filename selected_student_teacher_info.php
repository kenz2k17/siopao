<?php 
	include('dbcon.php');
	include('class.php');
	$teacher_id = $_POST['teacher_id'];
	$id = $_GET['id'];
	$row = $system->selected_student($id);
	$st_row = $system->selected_teacher($teacher_id);
?>
	<div class="form-group">
    <label class="col-sm-3 control-label">Grade</label>
    <div class="col-sm-9">
      <select class="form-control" name="grade_id" required>
			<option value="<?php echo $st_row['grade_id']; ?>"><?php echo $st_row['grade']; ?></option>
	  </select>
    </div>
  </div>
  
	 <div class="form-group">
    <label class="col-sm-3 control-label">Section</label>
    <div class="col-sm-9">
      <select class="form-control" name="section_id" required>
			<option value="<?php echo $st_row['section_id']; ?>"><?php echo $st_row['section_name']; ?></option>
	  </select>
    </div>
  </div>
  
     <div class="form-group">
    <label class="col-sm-3 control-label">CPTLE</label>
    <div class="col-sm-9">
      <select class="form-control" name="tle" required>
			<option><?php echo $row['tle']; ?></option>
		<?php foreach($system->tle_list() as $tle_row){ ?>
			<option><?php echo $tle_row['tle']; ?></option>
		<?php } ?>
	  </select>
    </div>
  </div>
  
     <div class="form-group">
    <label class="col-sm-3 control-label">Average</label>
    <div class="col-sm-9">
		 <input type="text" class="form-control" value="<?php echo $row['student_ave']; ?>" name="student_ave" required>
    </div>
  </div>