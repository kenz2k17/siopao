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
				
 <section class="content enrol_content">
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
<script>
 	jQuery(document).ready(function(){
		jQuery("#student_id").on('change',function(e){
			e.preventDefault();
			var student_id = $("#student_id").val();
				$.ajax({
					type: "POST",
					url: "student_info1.php",
					data: {student_id: student_id},
					success: function(html){
							$("#student_info1").html(html);
					}
				});
			
				return false;
	});
	}); 
</script>

<div class="form-horizontal">
   <div class="form-group">
    <label class="col-sm-3 control-label">Students Name</label>
    <div class="col-sm-9">
	<?php 
	 $array = $system->students_list_array($sy);
	?>
		<select placeholder="Select Students" name="student_id" id="student_id" class="chosen-select form-control"  required>
		<option></option>
		<?php 
	     
		foreach($system->students_list_selection($array) as $row){ 
		?>	
		   <option value="<?php echo $row['student_id']; ?>"><?php echo $row['firstname'].' '.$row['lastname']; ?></option>
		 <?php } ?>  
		</select>		
      <input type="hidden" name="action" value="add_student_violation" class="form-control" >
    </div>
  </div>
  
  <div id="student_info">
  
  </div>
  
</div>

</div>

<div class="col-lg-6">
			<div class="form-horizontal" role="form">
					<div  id="student_info1"></div>

			

  
	
			
  
  <script>
 	jQuery(document).ready(function(){
		jQuery("#student_id").on('change',function(e){
			e.preventDefault();
			var student_id = $("#student_id").val();
				$.ajax({
					type: "POST",
					url: "student_info2.php",
					data: {student_id: student_id},
					success: function(html){
							$("#student_info2").html(html);
					}
				});
			
				return false;
	});
	}); 
</script>
  					<div  id="student_info2"></div>
	
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
							var c_grade = $("#c_grade").val(); 
							var c_section = $("#c_section").val(); 
							var formData = jQuery(this).serialize();
							$.ajax({
								type: "POST",
								url: "ajax_add.php?students=existing",
								data: formData,
								success: function(html){
										
										$('#message').modal("show");
										window.open('enrol_report.php?status=old&grade='+c_grade+'&section='+c_section, '_blank');
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