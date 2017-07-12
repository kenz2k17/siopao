<?php 
	include('dbcon.php');
	include('class.php');
	$row = $system->current_sy();
	$sy = $row['school_year'];
	$teacher_id = $_POST['teacher_id'];
	$row = $system->selected_teacher($teacher_id);
	$section_id = $row['section_id'];
	$grade_id = $row['grade_id'];
	
?>
<!--	<div class="form-group">
    <label class="col-sm-3 control-label">Grade</label>
    <div class="col-sm-9">
      <select class="form-control" name="grade_id" required>
			<option value="<?php echo $row['grade_id']; ?>"><?php echo $row['grade']; ?></option>
	  </select>
    </div>
  </div> -->


	<div class="form-group">
    <label class="col-sm-3 control-label"></label>
    <div class="col-sm-9">
		<span class="badge bg_red"><?php echo $system->total_teacher_student($sy,$grade_id,$section_id,$teacher_id); ?></span> No of Students 
    </div>
  </div>
	 <div class="form-group">
    <label class="col-sm-3 control-label">Section</label>
    <div class="col-sm-9">
      <select class="form-control" name="section_id" required>
			<option value="<?php echo $row['section_id']; ?>"><?php echo $row['section_name']; ?></option>
	  </select>
    </div>
  </div>
  
   <!--  <div class="form-group">
    <label class="col-sm-3 control-label">CPTLE</label>
    <div class="col-sm-9">
      <select class="form-control" name="tle" required>
			<option></option>
		<?php foreach($system->tle_list() as $row){ ?>
			<option><?php echo $row['tle']; ?></option>
		<?php } ?>
	  </select>
    </div>
  </div>
  
     <div class="form-group">
    <label class="col-sm-3 control-label">Average</label>
    <div class="col-sm-9">
		 <input type="text" class="form-control" name="student_ave" required>
    </div>
  </div> -->