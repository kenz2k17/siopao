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
	$id = $_GET['id'];
	$row = $system->selected_student_anecdotal($id);
?>
		<section class="content-header">
                    <h1>
						Update Anecdotal  for Students Form
                        <small>School Year <?php echo $sy; ?></small>
                    </h1>
                </section>
				
 <section class="content">
	<div class="row">
		<div class="col-lg-2">
					<a href="page.php?page=anecdotal_records&sy=<?php echo $_GET['sy']; ?>&grade_id=<?php echo $_GET['grade_id']; ?>" class="btn btn-success"><i class="fa fa-arrow-left"></i> back </a>
		</div>
		<div class="col-lg-7">
<form class="form-horizontal" id="form_add" role="form">
  <div class="form-group">
    <label class="col-sm-3 control-label">Students Name</label>
    <div class="col-sm-9">
		<select placeholder="Select Students" name="student_id" class="chosen-select form-control"  required>
			<option value="<?php echo $row['student_id']; ?>"><?php echo $row['firstname'].' '.$row['lastname']; ?></option>
		<?php foreach($system->student_list($sy) as $sl_row){ ?>	
		   <option value="<?php echo $sl_row['student_id']; ?>"><?php echo $sl_row['firstname'].' '.$sl_row['lastname']; ?></option>
		 <?php } ?>  
		</select>		
      <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control" >
      <input type="hidden" name="action" value="update_student_anecdotal" class="form-control" >
    </div>
  </div>

    <div class="form-group">
    <label class="col-sm-3 control-label">Anecdotal</label>
    <div class="col-sm-9">
      <select class="form-control" name="anecdotal_id" required>
		<option value="<?php echo $row['anecdotal_id']; ?>"><?php echo $row['anecdotal']; ?></option>
		<?php 
			foreach($system->anecdotal_list() as $al_row){
		?>
			<option value="<?php echo $al_row['anecdotal_id']; ?>"><?php echo $al_row['anecdotal']; ?></option>
		<?php } ?>
	  </select>
    </div>
  </div>
  
    <div class="form-group">
    <label class="col-sm-3 control-label">Remarks</label>
    <div class="col-sm-9">
      <textarea class="form-control" name="remarks" rows="10" required><?php echo $row['remarks']; ?></textarea>
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
<?php $message = 'Student Anecdotal Sucessfully Updated'; ?>
<?php include('message_modal.php'); ?>
				<script>
					jQuery(document).ready(function(){
						jQuery("#form_add").submit(function(e){
							e.preventDefault();
							var formData = jQuery(this).serialize();
							$.ajax({
								type: "POST",
								url: "ajax_update.php?sy=<?php echo $sy; ?>&grade_id=<?php echo $_GET['grade_id']; ?>",
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