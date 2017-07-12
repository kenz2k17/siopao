<?php 
include('dbcon.php');
include('class.php');
$student_id = $_POST['student_id'];
$row = $system->selected_student($student_id);
$id_number = $row['id_number'];
$row = $system->selected_student_id_number($id_number);
$grade_id = $row['grade_id'];
$section_id = $row['section_id'];
$sg_row = $system->selected_grade($grade_id);
$sq_no = $sg_row['sq_no'] + 1;
$sc_row = $system->selected_section($section_id);

?>

   <div class="form-group">
    <label class="col-sm-3 control-label">Grade</label>
    <div class="col-sm-9">
	
		<select  name="grade_id"  id="grade_id" class=" form-control"  required>
		<?php 
			if($row['student_status'] == 'Stop'){ 
				$row1 = $system->next_grade($sq_no - 1);
			}else{
				$row1 = $system->next_grade($sq_no);	
			}
			$grade_id = $row1['grade_id'];
		?>	
		   <option value="<?php echo $row1['grade_id']; ?>"><?php echo $row1['grade']; ?></option>
		</select>		
		
    </div>
  </div>
  
<div class="form-group">
    <label class="col-sm-3 control-label">Adviser</label>
    <div class="col-sm-9">
      <select class="form-control chosen-select" id="teacher_id" name="teacher_id" required>
			<option></option>
		<?php foreach($system->filder_teacher_list($grade_id) as $ftl_row){ ?>
			<option value="<?php echo $ftl_row['teacher_id']; ?>"><?php echo $ftl_row['firstname'].' '.$ftl_row['lastname']; ?></option>
		<?php } ?>
	  </select>
    </div>
  </div>
  
  
  <script>
 	jQuery(document).ready(function(){
		jQuery("#teacher_id").on('change',function(e){
			e.preventDefault();
			var teacher_id = $("#teacher_id").val();
				$.ajax({
					type: "POST",
					url: "teacher_info.php",
					data: {teacher_id: teacher_id},
					success: function(html){
							$("#teacher_info").html(html);
					}
				});
			
				return false;
	});
	}); 
</script>
  

  <div id="teacher_info"></div>


  
  
       <div class="form-group">
    <label class="col-sm-3 control-label">CPTLE</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" value="<?php echo $row['tle']; ?>" name="tle" required readonly>
    </div>
  </div>
  
       <div class="form-group">
    <label class="col-sm-3 control-label">Average</label>
    <div class="col-sm-9">
		 <input type="text" class="form-control" value="<?php echo $row['student_ave']; ?>" name="student_ave" required>
		 <input type="hidden" class="form-control" name="student_status" value="Active" required>
    </div>
  </div>	

