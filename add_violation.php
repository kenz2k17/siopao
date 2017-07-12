<script>
	jQuery(document).ready(function(){
		$('#messsage').modal('hide'); 
		$('body').removeClass('modal-open');
		$('.modal-backdrop').remove();
		$('body').removeAttr('style');
	});	 
</script>
<?php 
	$sy = $_GET['sy'];
?>
		<section class="content-header">
                    <h1>
						Add Violations  for Students Form
                        <small>School Year <?php echo $sy; ?></small>
                    </h1>
                </section>
				
 <section class="content">
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-7">
<form class="form-horizontal" id="form_add" role="form">
  <div class="form-group">
    <label class="col-sm-3 control-label">Students Name</label>
    <div class="col-sm-9">
		<select placeholder="Select Students" name="student_id[]" class="chosen-select form-control" multiple required>
		<?php foreach($system->student_list($sy) as $row){ ?>	
		   <option value="<?php echo $row['student_id']; ?>"><?php echo $row['firstname'].' '.$row['lastname']; ?></option>
		 <?php } ?>  
		</select>		
      <input type="hidden" name="action" value="add_student_violation" class="form-control" >
    </div>
  </div>


  <div class="form-group">
    <label class="col-sm-3 control-label">Violation</label>
    <div class="col-sm-9">
      <select class="form-control" name="offenses_id" required>
		<option></option>
		<?php 
			foreach($system->offenses_list() as $row){
		?>
			<option value="<?php echo $row['offenses_id']; ?>"><?php echo $row['offenses']; ?></option>
		<?php } ?>
	  </select>
    </div>
  </div>
  
    <div class="form-group">
    <label class="col-sm-3 control-label">Intervention</label>
    <div class="col-sm-9">
      <select class="form-control" name="interventions_id" required>
		<option></option>
		<?php 
			foreach($system->intervention_list() as $row){
		?>
			<option value="<?php echo $row['interventions_id']; ?>"><?php echo $row['intervention']; ?></option>
		<?php } ?>
	  </select>
    </div>
  </div>
  
    <div class="form-group">
    <label class="col-sm-3 control-label">Remarks</label>
    <div class="col-sm-9">
      <textarea class="form-control" name="remarks" rows="10" required></textarea>
    </div>
  </div>
  
   <div class="form-group">
    <label class="col-sm-3 control-label">Reported By</label>
    <div class="col-sm-9">
      <input class="form-control" name="reported_by" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Save Student Record</button>
    </div>
  </div>
</form>
</div>
<div class="col-lg-3"></div>
</div>
</section>
<?php $message = 'Student Violations Sucessfully Saved'; ?>
<?php include('message_modal.php'); ?>
				<script>
					jQuery(document).ready(function(){
						jQuery("#form_add").submit(function(e){
							e.preventDefault();
							var formData = jQuery(this).serialize();
							$.ajax({
								type: "POST",
								url: "ajax_add.php?sy=<?php echo $sy; ?>",
								data: formData,
								success: function(html){
										$('#message').modal('show'); 
										var delay = 2000;
										setTimeout(function(){	$('.main_con').html(html); }, delay);  
										
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