<?php 

	$row = $system->current_sy();
	$sy = $row['school_year'];
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
						Add Teacher
                        <small>School Year <?php echo $sy; ?></small>
                    </h1>
                </section>
				
 <section class="content enrol_content">
  <form method="POST" id="form_add"  enctype="multipart/form-data">
	<div class="row">

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
      <input type="hidden" name="action" value="add_teacher" class="form-control" >
   
   <div class="form-group">
    <label class="col-sm-3 control-label">Firstname</label>
    <div class="col-sm-9">
		<input type="text" name="firstname" class="form-control"  required>		
    </div>
  </div> 
  
   <div class="form-group">
    <label class="col-sm-3 control-label">Lastname</label>
    <div class="col-sm-9">
		<input type="text" name="lastname" class="form-control"  required>		
    </div>
  </div> 
  
  <div class="form-group">
    <label class="col-sm-3 control-label">Middlename</label>
    <div class="col-sm-9">
		<input type="text" name="middlename" class="form-control"  required>		
    </div>
  </div> 
  
    <div class="form-group">
    <label class="col-sm-3 control-label">Contact No</label>
    <div class="col-sm-9">
		<input type="text" pattern="[0-9]{11}" maxlength="11" name="contact_no" class="form-control"  required>		
    </div>
  </div>
   
   <div class="form-group">
    <label class="col-sm-3 control-label">Email</label>
    <div class="col-sm-9">
		<input type="text" name="emailadd" class="form-control"  required>		
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-sm-3 control-label">Address</label>
    <div class="col-sm-9">
		<textarea rows="4" name="address" class="form-control"  required></textarea>	
    </div>
  </div> 
   
   <div class="form-group">
    <label class="col-sm-3 control-label">Gender</label>
    <div class="col-sm-9">
		<select name="gender" class="form-control"  required>
		<option></option>
		<option>Male</option>
		<option>Female</option>
		</select>		
    </div>
  </div> 
  
	  
   <div class="form-group">
    <label class="col-sm-3 control-label">Grade</label>
    <div class="col-sm-9">
		<select  name="grade_id"  id="grade_id" class=" form-control"  required>
		<option></option>
		<?php foreach($system->grade_list() as $row){ ?>	
		   <option value="<?php echo $row['grade_id']; ?>"><?php echo $row['grade']; ?></option>
		 <?php } ?>  
		</select>		
    </div>
  </div>
  
  <script>
 	jQuery(document).ready(function(){
		jQuery("#grade_id").on('change',function(e){
			e.preventDefault();
			var grade_id = $("#grade_id").val();
				$.ajax({
					type: "POST",
					url: "grade_info_teacher_add.php",
					data: {grade_id: grade_id},
					success: function(html){
							$("#grade_info").html(html);
					}
				});
			
				return false;
	});
	}); 
</script>
  
     <div class="form-group">
    <label class="col-sm-3 control-label">Section</label>
    <div class="col-sm-9">
		<select placeholder="Select Students" name="section_id"  id="grade_info" class="form-control"  required>
		
		</select>		
    </div>
  </div>
  
    <div class="form-group">
    <label class="col-sm-3 control-label">File</label>
    <div class="col-sm-9">
		<input type="file"  name="file" class="form-control"  required>
    </div>
  </div> 
  
       <div class="form-group">
    <label class="col-sm-3 control-label"></label>
    <div class="col-sm-9">
		<button class="btn btn-success" type="submit"><i class="fa fa-save"></i> Save</button>	
    </div>
  </div>

  
</div>

</div>

<div class="col-lg-6">
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
	

	</div>

</div>
</form>
</section>
<?php
$message = 'Data Successfully Save';
 include('message_modal.php');
 ?>
 
 		<script>
			jQuery(document).ready(function(){
				jQuery("#form_add").submit(function(e){
				e.preventDefault();
				var _this = $(e.target);
				var formData = new FormData($(this)[0]);
				$.ajax({
					type: "POST",
					url: "ajax_add.php",
					data: formData,
					success: function(html){ 
						$('#message').modal("show");
						var delay = 2000;
						setTimeout(function(){	$('.main_con').html(html);  }, delay);  			 				
					},
						cache: false,
						contentType: false,
						processData: false
				});
					return false;
		});
		});
	</script>	
				
