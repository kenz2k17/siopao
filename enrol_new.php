<?php 
	$students = $_GET['students'];
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
                        <small class = "alert alert-success">School Year <?php echo $sy; ?></small>
                    </h1>
                </section>
				
 <section class="content">
 <form method="POST" id="form_add">
	<div class="row">
		<div class="col-lg-12">
		<ul class="nav nav-pills">			
			<?php if($students == 'new'){ ?> <li class="active"> <?php }else{ ?><li><?php } ?>
				<a href="page.php?page=enrol_new&students=new" class="">New Student</a>
			</li>
			<?php if($students == 'existing'){ ?> <li class="active"> <?php }else{ ?><li><?php } ?>
				<a href="page.php?page=enrol&students=existing" class="">Existing</a>
			<li>
			<li>
			<?php if($students == 'transfer'){ ?> <li class="active"> <?php }else{ ?><li><?php } ?>
				<a href="page.php?page=transfer&students=transfer" class="">Transferee Student</a>
			</li>
		</ul>
		<hr class="hr">
		</div>
		<div class="col-lg-6">
<div class="form-horizontal" role="form">
  <div class="form-group">
    <label class="col-sm-3 control-label">ID Number</label>
    <div class="col-sm-9">
      <input type="text" name="id_number" value="<?php echo $system->id_number(); ?>" class="form-control" readonly>
      <input type="hidden" name="action" value="enrol_student" class="form-control">
      <input type="hidden" name="status" value="new" class="form-control">
      <input type="hidden" name="sy" value="<?php echo $sy; ?>" class="form-control">
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-sm-3 control-label">First Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="firstname" required>
    </div>
  </div>

   <div class="form-group">
    <label class="col-sm-3 control-label">Last Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="lastname" required>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-sm-3 control-label">Middle Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="middlename">
    </div>
  </div>
  
  <div class="form-group">
        <label class="col-sm-3 control-label">Birthdate</label>
		  <div class="col-sm-9">
				<div class="input-group">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
					<input type="text" name="birthdate" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required/>
				</div>
		  </div>
   </div>

  <div class="form-group">
    <label class="col-sm-3 control-label">Gender</label>
    <div class="col-sm-9">
      <select class="form-control" name="gender" required>
		<option></option>
		<option>Male</option>
		<option>Female</option>
	  </select>
    </div>
  </div>
  
  
  
  <div class="form-group">
    <label class="col-sm-3 control-label">Address</label>
    <div class="col-sm-9">
      <textarea class="form-control" name="address" rows="1" required></textarea>
    </div>
  </div>

    <div class="form-group">
    <label class="col-sm-3 control-label">Contact No</label>
    <div class="col-sm-9">
		 <input type="text" name="contact_no" pattern="[0-9]{11}" maxlength="11" class="form-control" required>
    </div>
  </div>
  
   <div class="form-group">
    <label class="col-sm-3 control-label">Contact Person</label>
    <div class="col-sm-9">
		 <input type="text" class="form-control" name="contact_person" required>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-sm-3 control-label">Elementary</label>
    <div class="col-sm-9">
		 <input type="text" class="form-control" name="elementary" required>
		 <input type="hidden" class="form-control" name="student_status" value="Active" required>
    </div>
  </div>
  
    
  
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Enrol Student</button>
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
			<div class="form-horizontal" role="form">
				<!-- <img src="img/no_image.jpg" class="student_photo">
				<hr class="hr">
				<a href="class="> -->
				
				
	 <div class="form-group">
    <label class="col-sm-3 control-label">Grade</label>
    <div class="col-sm-9">
		<select  name="grade_id"  id="grade_id" class=" form-control"  required>
		<?php 
		$row = $system->first_grade_list();
		$grade_id = $row['grade_id'];
		?>	
		   <option value="<?php echo $row['grade_id']; ?>"><?php echo $row['grade']; ?></option>  
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
					url: "grade_info.php",
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
	
  <div id="teacher_info"></div>	
  
  
     <div class="form-group">
    <label class="col-sm-3 control-label">Program / Specialization</label>
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
  </div>	
  
				
				
			</div>
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
							var formData = jQuery(this).serialize();
							$.ajax({
								type: "POST",
								url: "ajax_add.php?students=new",
								data: formData,
								success: function(html){
										
										$('#message').modal("show");
										window.open('enrol_report.php?status=new', '_blank');
										var delay = 2000;
										setTimeout(function(){	$('.main_con').html(html);  }, delay);  
										
								}
							});
								return false;
					});
										
					});
				</script>
				<script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>
  
  
    
		<script type="text/javascript">
            $(function() {
                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();

    
            });
        </script>