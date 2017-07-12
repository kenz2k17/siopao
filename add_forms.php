<?php if($form == 'ruser'){ ?>
<form role="form" method="POST" id="form_add">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" required>
    <input type="hidden" class="form-control" name="action"  value="save_r_user">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" name="username" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="text" class="form-control" name="password" required>
  </div>
  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
</form>
<?php } ?>
<?php if($form == 'cptle'){ ?>
<form role="form" method="POST" id="form_add">
  <div class="form-group">
    <label for="exampleInputEmail1">CPTLE TLE </label>
    <input type="text" class="form-control" name="tle" required>
    <input type="hidden" class="form-control" name="action"  value="save_tle">
  </div>
  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
</form>
<?php } ?>
<?php if($form == 'clubs'){ ?>
<form role="form" method="POST" id="form_add">
  <div class="form-group">
    <label for="exampleInputEmail1">Club Name </label>
    <input type="text" class="form-control" name="club_name" required>
    <input type="hidden" class="form-control" name="action"  value="save_club">
  </div>
  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
</form>
<?php } ?>
<?php if($form == 'intervention'){ ?>
<form role="form" method="POST" id="form_add">
  <div class="form-group">
    <label for="exampleInputEmail1">Intervention </label>
    <input type="text" class="form-control" name="intervention" required>
    <input type="hidden" class="form-control" name="action"  value="save_intervention">
  </div>
  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
</form>
<?php } ?>
<?php if($form == 'anecdotal'){ ?>
<form role="form" method="POST" id="form_add">
  <div class="form-group">
    <label for="exampleInputEmail1">Anecdotal </label>
    <input type="text" class="form-control" name="anecdotal" required>
    <input type="hidden" class="form-control" name="action"  value="save_anecdotal">
  </div>
  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
</form>
<?php } ?>
<?php if($form == 'offenses'){ ?>
<form role="form" method="POST" id="form_add">
  <div class="form-group">
    <label for="exampleInputEmail1">Offenses </label>
    <input type="text" class="form-control" name="offenses" required>
    <input type="hidden" class="form-control" name="action"  value="save_offenses">
  </div>
  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
</form>
<?php } ?>
<?php if($form == 'section'){ ?>
<form role="form" method="POST" id="form_add">
  <div class="form-group">
    <label for="exampleInputEmail1">Section Name </label>
    <input type="text" class="form-control" name="section_name" required>
    <input type="hidden" class="form-control" name="action"  value="save_section">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Grade </label>
    <select type="text" class="form-control" name="grade_id" required>
			<option></option>
		<?php foreach($system->grade_list() as $row){ ?>	
			<option value="<?php echo $row['grade_id']; ?>"><?php echo $row['grade']; ?></option>
		<?php } ?>	
	</select>
  </div>
  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
</form>
<?php } ?>
<?php if($form == 'grade'){ ?>
<form role="form" method="POST" id="form_add">
  <div class="form-group">
    <label for="exampleInputEmail1">Grade</label>
    <input type="text" class="form-control" name="grade" required>
    <input type="hidden" class="form-control" name="action"  value="save_grade">
  </div>
  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
</form>
<?php } ?>
<?php if($form == 'sy'){ ?>
<form role="form" method="POST" id="form_add">
  <div class="form-group">
    <label for="exampleInputEmail1">School year</label>
    <input type="text" class="form-control" name="sy" required>
    <input type="hidden" class="form-control" name="action"  value="save_sy">
  </div>
  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
</form>
<?php } ?>

<?php if($form == 'club_member'){ ?>
<form role="form" method="POST" id="form_add">
  <div class="form-group">
    <label for="exampleInputEmail1">Student </label>
	<select class="chosen-select form-control" name="student_id" required>
		<option></option>
		<?php 
			foreach($system->students_list($sy) as $row){
		?>
			<option value="<?php echo $row['student_id']; ?>"><?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname']; ?></option>
		<?php } ?>
	</select>
    <input type="hidden" class="form-control" name="club_id"  value="<?php echo $id; ?>">
    <input type="hidden" class="form-control" name="sy"  value="<?php echo $sy; ?>">
    <input type="hidden" class="form-control" name="action"  value="add_club_member">
  </div>
  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
</form>
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
<?php } ?>
				<script>
					jQuery(document).ready(function(){
						jQuery("#form_add").submit(function(e){
							e.preventDefault();
							var formData = jQuery(this).serialize();
							$.ajax({
								type: "POST",
								<?php if($form == 'club_member'){ ?>
									url: "ajax_add.php?sy=<?php echo $sy; ?>&id=<?php echo $id; ?>",
								<?php }else if($form == 'section'){ ?>
									url: "ajax_add.php?grade_id=<?php echo $grade_id; ?>",
								<?php }else{ ?>
									url: "ajax_add.php",
								<?php }  ?>
								data: formData,
								success: function(html){
										$('.main_con').html(html);
								}
							});
								return false;
					});
										
					});
				</script>