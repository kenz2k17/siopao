<?php 
	include('dbcon.php');
	include('class.php');
	$grade_id = $_POST['grade_id'];
?>


	
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

  
  
  