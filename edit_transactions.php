<?php 

	$row = $system->current_sy();
	$sy = $row['school_year'];
	$id = $_GET['id'];
	$grade_id = $_GET['grade_id'];
	$row = $system->selected_student($id);
	$teacher_id = $row['teacher_id'];
	$t_row = $system->selected_teacher($teacher_id);
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
						Edit Student Information
                        <small>School Year <?php echo $sy; ?></small>
                    </h1>
                </section>
				
 <section class="content">
 <form method="POST" id="form_add">
	<div class="row">
		<div class="col-lg-12">
			<a href="page.php?page=transaction&sy=<?php echo $sy; ?>&grade_id=<?php echo $_GET['grade_id']; ?>" class="btn btn-success"><i class="fa fa-arrow-left"></i> Back</a>
			<hr class="hr">
		</div>
		<div class="col-lg-6">
<div class="form-horizontal" role="form">
  <div class="form-group">
    <label class="col-sm-3 control-label">ID Number</label>
    <div class="col-sm-9">
      <input type="text" name="id_number" value="<?php echo $row['id_number']; ?>" class="form-control" readonly>
      <input type="hidden" name="action" value="update_student_transaction" class="form-control">
      <input type="hidden" name="status" value="new" class="form-control">
      <input type="hidden" name="sy" value="<?php echo $sy; ?>" class="form-control">
      <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control">
    </div>
  </div>
 
 

 
  <div class="form-group">
    <label class="col-sm-3 control-label">First Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" value="<?php echo $row['firstname']; ?>" name="firstname" required>
    </div>
  </div>

   <div class="form-group">
    <label class="col-sm-3 control-label">Last Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" value="<?php echo $row['lastname']; ?>" name="lastname" required>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-sm-3 control-label">Middle Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" value="<?php echo $row['middlename']; ?>" name="middlename" required>
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
					<input type="text" name="birthdate" value="<?php  echo date("m/d/Y", strtotime($row['birthdate'])) ; ?>" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask required/>
				</div>
		  </div>
   </div>
  
  <div class="form-group">
    <label class="col-sm-3 control-label">Address</label>
    <div class="col-sm-9">
      <textarea class="form-control" name="address" rows="3" required><?php echo $row['address']; ?></textarea>
    </div>
  </div>

    <div class="form-group">
    <label class="col-sm-3 control-label">Contact No</label>
    <div class="col-sm-9">
		 <input type="text" pattern="[0-9]{11}" maxlength="11"  name="contact_no" value="<?php echo $row['contact_no']; ?>" class="form-control" required>
    </div>
  </div>
  
   <div class="form-group">
    <label class="col-sm-3 control-label">Contact Person</label>
    <div class="col-sm-9">
		 <input type="text" class="form-control" value="<?php echo $row['contact_person']; ?>" name="contact_person" required>
    </div>
  </div>
  
    
  
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Save Student Record</button>
    </div>
  </div>
</div>

</div>

<div class="col-lg-6">

			<div class="form-horizontal" role="form">
				<!-- <img src="img/no_image.jpg" class="student_photo">
				<hr class="hr">
				<a href="class="> -->
	<!-- <div class="form-group">
    <label class="col-sm-3 control-label">Adviser</label>
    <div class="col-sm-9">
      <select class="form-control chosen-select" id="teacher_id" name="teacher_id">
	  <?php
		$st_row = $system->selected_teacher($row['teacher_id']);
	  ?>
		<option value="<?php echo $row['teacher_id']; ?>"><?php echo $st_row['firstname'].' '.$st_row['lastname']; ?></option>
		<?php foreach($system->teacher_list() as $tl_row){ ?>
			<option value="<?php echo $tl_row['teacher_id']; ?>"><?php echo $tl_row['firstname'].' '.$tl_row['lastname']; ?></option>
		<?php } ?>
	  </select>
    </div>
  </div>	 -->	
	
	
	   <div class="form-group">
    <label class="col-sm-3 control-label">Grade</label>
    <div class="col-sm-9">
		<select  name="grade_id"  id="grade_id" class=" form-control"  required>
		   <option value="<?php echo $row['grade_id']; ?>"><?php echo $row['grade']; ?></option>
		</select>		
    </div>
  </div>
  
<div class="form-group">
    <label class="col-sm-3 control-label">Adviser</label>
    <div class="col-sm-9">
      <select class="form-control chosen-select" id="teacher_id" name="teacher_id" required>
			<option value="<?php echo $t_row['teacher_id']; ?>"><?php echo $t_row['firstname'].' '.$t_row['lastname']; ?></option>
		<?php foreach($system->filder_teacher_list($row['grade_id']) as $ftl_row){ ?>
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
		 <input type="text" class="form-control" name="student_ave" value="<?php echo $row['student_ave']; ?>" required>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-sm-3 control-label">Status</label>
    <div class="col-sm-9">
      <select class="form-control" name="student_status" required>
			<option><?php echo $row['student_status']; ?></option>
			<option>Active</option>
			<option>Stop</option>
	  </select>
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
								url: "ajax_update.php?sy=<?php echo $sy; ?>&grade_id=<?php echo $grade_id; ?>",
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
<script>
 	jQuery(document).ready(function(){	
 		$("#teacher_id option:nth-child(1)").attr("selected", true); 	
		$("#teacher_id option:nth-child(1)").change();
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