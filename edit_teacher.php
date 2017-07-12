<?php 
	$teacher_id = $_GET['id'];
	$sy = $_GET['sy'];
	$grade_id = $_GET['grade_id'];
	$row = $system->selected_teacher($teacher_id);
?>		
<script>
	jQuery(document).ready(function(){
		$('#messsage').modal('hide'); 
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();
		$('body').removeAttr('style');
	});	 
</script>	
		<section class="content-header">
                    <h1>
						<i class="fa fa-edit"></i> Edit Teacher Info
                    </h1>
                </section>
				
 <section class="content enrol_content">
  <form method="POST" id="form_add">
	<div class="row">
		
		<div class="col-lg-12"><a href="page.php?page=teacher&sy<?php echo $sy; ?>&grade_id=<?php echo $row['grade_id']; ?>" class="btn btn-success"><i class="fa fa-arrow-left"></i> Back </a></div>
		<div class="col-lg-2"></div>
		<div class="col-lg-6">
<script>
 	jQuery(document).ready(function(){
		jQuery("#student_id").on('change',function(e){
			e.preventDefault();
			var student_id = $("#student_id").val();
				$.ajax({
					type: "POST",
					url: "student_info.php",
					data: {student_id: student_id},
					success: function(html){
							$("#student_info").html(html);
					}
				});
			
				return false;
	});
	}); 
</script>
<div class="form-horizontal">
      <input type="hidden" name="action" value="update_teacher" class="form-control" >
      <input type="hidden" id="teacher_id" name="teacher_id" value="<?php echo $row['teacher_id']; ?>" class="form-control" >
   
   <div class="form-group">
    <label class="col-sm-3 control-label">Firstname</label>
    <div class="col-sm-9">
		<input type="text" value="<?php echo $row['firstname']; ?>" name="firstname" class="form-control"  required>		
    </div>
  </div> 
  
   <div class="form-group">
    <label class="col-sm-3 control-label">Lastname</label>
    <div class="col-sm-9">
		<input type="text" value="<?php echo $row['lastname']; ?>" name="lastname" class="form-control"  required>		
    </div>
  </div> 
  
  <div class="form-group">
    <label class="col-sm-3 control-label">Middlename</label>
    <div class="col-sm-9">
		<input type="text" value="<?php echo $row['middlename']; ?>" name="middlename" class="form-control"  required>		
    </div>
  </div> 
  
  <div class="form-group">
    <label class="col-sm-3 control-label">Address</label>
    <div class="col-sm-9">
		<textarea rows="4"  name="address" class="form-control"  required><?php echo $row['address']; ?></textarea>	
    </div>
  </div> 
   
   <div class="form-group">
    <label class="col-sm-3 control-label">Gender</label>
    <div class="col-sm-9">
		<select name="gender" class="form-control"  required>
		<option><?php echo $row['gender']; ?></option>
		<option>Male</option>
		<option>Female</option>
		</select>		
    </div>
  </div> 
  
	  

  
      <div class="form-group">
    <label class="col-sm-3 control-label">Contact No</label>
    <div class="col-sm-9">
		<input type="text" pattern="[0-9]{11}" maxlength="11" value="<?php echo $row['contact_no']; ?>" name="contact_no" class="form-control"  required>		
    </div>
  </div> 
  
   <div class="form-group">
    <label class="col-sm-3 control-label">Email</label>
    <div class="col-sm-9">
		<input type="email" value="<?php echo $row['emailadd']; ?>" name="emailadd" class="form-control"  required>		
    </div>
  </div> 
  
  
     <div class="form-group">
    <label class="col-sm-3 control-label">Grade</label>
    <div class="col-sm-9">
		<select placeholder="Select Students" name="grade_id" id="grade_id"  class=" form-control"  required>
		<option value="<?php echo $row['grade_id']; ?>"><?php echo $row['grade']; ?></option>
		<?php foreach($system->grade_list() as $gl_row){ ?>	
		   <option value="<?php echo $gl_row['grade_id']; ?>"><?php echo $gl_row['grade']; ?></option>
		 <?php } ?>  
		</select>		
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-sm-3 control-label">Section</label>
    <div class="col-sm-9">
		<select placeholder="Select Students" id="grade_info" name="section_id"  class="form-control"  required>
			<option value="<?php echo $row['section_id']; ?>"><?php echo $row['section_name']; ?></option>
			
		</select>		
    </div>
  </div>
  

  
  <div class="form-group">
    <label class="col-sm-3 control-label"></label>
    <div class="col-sm-9">
		<button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Save</button>	
    </div>
  </div>

  
    <script>
 	jQuery(document).ready(function(){
		jQuery("#grade_id").on('change',function(e){
			e.preventDefault();
			var grade_id = $("#grade_id").val();
			var teacher_id = $("#teacher_id").val();
				$.ajax({
					type: "POST",
					url: "grade_info_teacher.php",
					data: {grade_id: grade_id,teacher_id:teacher_id},
					success: function(html){
							$("#grade_info").html(html);
					}
				});
			
				return false;
	});
	}); 
</script>
  
  <script>
 	jQuery(document).ready(function(){	
 		$("#grade_id option:nth-child(1)").attr("selected", true); 	
		$("#grade_id option:nth-child(1)").change();
	});  
</script>
</div>

</div>

<div class="col-lg-6">

	

	</div>

</div>
</form>
</section>
<?php
$message = 'Data Successfully Updated';
 include('message_modal.php');
 ?>
				<script>
					jQuery(document).ready(function(){
						jQuery("#form_add").submit(function(e){
							e.preventDefault();
							var formData = jQuery(this).serialize();
							$.ajax({
								type: "POST",
								url: "ajax_update.php?students=existing",
								data: formData,
								success: function(html){
										$('#message').modal("show");
										var delay = 2000;
										setTimeout(function(){	$('.main_con').html(html);  }, delay);  
										
								}
							});
								return false;
					});
										
					});
				</script>
