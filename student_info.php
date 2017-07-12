<?php 
include('dbcon.php');
include('class.php');
$student_id = $_POST['student_id'];
$row = $system->selected_student($student_id);
$id_number = $row['id_number'];
$sy_row = $system->current_sy();
$row = $system->selected_student_id_number($id_number);
$sy = $sy_row['school_year'];
$grade_id = $row['grade_id'];
$section_id = $row['section_id'];
$sg_row = $system->selected_grade($grade_id);
$sc_row = $system->selected_section($section_id);
?>
 <input type="hidden" name="action" value="enrol_existing_student" class="form-control" required>
<input type="hidden" name="id_number" value="<?php echo $row['id_number']; ?>" required>
<input type="hidden" name="firstname" value="<?php echo $row['firstname']; ?>" required>
<input type="hidden" name="middlename" value="<?php echo $row['middlename']; ?>" required>
<input type="hidden" name="lastname" value="<?php echo $row['lastname']; ?>" required>
 <input type="hidden" name="sy" value="<?php echo $sy; ?>" class="form-control" required>
<input type="hidden" name="status" value="existing" required>
<div class="form-group">
    <label class="col-sm-3 control-label">ID Number</label>
    <div class="col-sm-9">
		 <input type="text" class="form-control"  value="<?php echo $row['id_number']; ?>" required readonly>
    </div>
  </div>
<div class="form-group">
    <label class="col-sm-3 control-label">Gender</label>
    <div class="col-sm-9">
      <select class="form-control" name="gender" required>
		<option><?php echo $row['gender']; ?></option>
		<option>Male</option>
		<option>Female</option>
	  </select>
    </div>
  </div>
  
    <div class="form-group">
        <label class="col-sm-3 control-label">Birthdate</label>
		  <div class="col-sm-9">
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
					<input type="text" name="birthdate" class="form-control" value="<?php  echo date("m/d/Y", strtotime($row['birthdate'])) ; ?>" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required/>
				</div>
		  </div>
   </div>
  
  <div class="form-group">
    <label class="col-sm-3 control-label">Address</label>
    <div class="col-sm-9">
      <textarea class="form-control" rows="1" name="address" required><?php echo $row['address']; ?></textarea>
    </div>
  </div>

    <div class="form-group">
    <label class="col-sm-3 control-label">Contact No</label>
    <div class="col-sm-9">
		 <input type="text" pattern="[0-9]{11}" maxlength="11"  class="form-control" name="contact_no" value="<?php echo $row['contact_no']; ?>" required>

	</div>
  </div>
  
  
   <div class="form-group">
    <label class="col-sm-3 control-label">Contact Person</label>
    <div class="col-sm-9">
		 <input type="text" class="form-control" name="contact_person" value="<?php echo $row['contact_person']; ?>" required>
    </div>
  </div>
  
    <!--  <div class="form-group">
    <label class="col-sm-3 control-label">Elementary</label>
    <div class="col-sm-9">
		
    </div>
  </div>  -->
  
		<input type="hidden" class="form-control" name="elementary" value="<?php echo $row['elementary']; ?>" required>
		
       <div class="form-group">
    <label class="col-sm-3 control-label">Current Grade</label>
    <div class="col-sm-9">
		 <input type="text" class="form-control" name="" id="c_grade" value="<?php echo $sg_row['grade']; ?>" readonly>
    </div>
  </div> 
  
   <div class="form-group">
    <label class="col-sm-3 control-label">Current Section</label>
    <div class="col-sm-9">
		 <input type="text" class="form-control" name="" id="c_section" value="<?php echo $sc_row['section_name']; ?>" readonly>
    </div>
  </div> 
	
  
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Enrol Student</button>
    </div>
  </div>