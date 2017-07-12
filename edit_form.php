<?php if($form == 'ruser'){ ?>
<form role="form" method="POST" id="form_update<?php echo $id; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" required>
    <input type="hidden" class="form-control" name="action"  value="update_r_user">
    <input type="hidden" class="form-control" name="id"  value="<?php echo $id; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>" required>
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Status</label>
    <select  class="form-control" name="status" required>
		<option><?php echo $row['status']; ?></option>
		<option>Active</option>
		<option>Inactive</option>
	</select>
  </div>
  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
</form>
<?php include('update_script1.php'); ?>
<?php } ?>

<?php if($form == 'teacher'){ ?>
  <form method="POST" id="form_update<?php echo $id; ?>"  enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Photo</label>
	<input type="file"  name="file" class="form-control"  required>
    <input type="hidden" class="form-control" name="action"  value="change_teacher_picture">
    <input type="hidden" class="form-control" name="id"  value="<?php echo $id; ?>">
  </div>
  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
</form>
<?php include('update_script2.php'); ?>
<?php } ?>

<?php if($form == 'cptle'){ ?>
<form role="form" method="POST" id="form_update<?php echo $id; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">CPTLE TLE </label>
    <input type="text" class="form-control" name="tle" value="<?php echo $row['tle'] ?>">
    <input type="hidden" class="form-control" name="action"  value="update_tle">
    <input type="hidden" class="form-control" name="id"  value="<?php echo $id; ?>">
  </div>
  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
</form>
<?php include('update_script1.php'); ?>
<?php } ?>
<?php if($form == 'clubs'){ ?>
<form role="form" method="POST" id="form_update<?php echo $id; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Club Name </label>
    <input type="text" class="form-control" name="club_name" value="<?php echo $row['club_name'] ?>">
    <input type="hidden" class="form-control" name="action"  value="update_club">
    <input type="hidden" class="form-control" name="id"  value="<?php echo $id; ?>">
  </div>
  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
</form>
<?php include('update_script1.php'); ?>
<?php } ?>
<?php if($form == 'section'){ ?>
<form role="form" method="POST" id="form_update<?php echo $id; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Section Name </label>
    <input type="text" class="form-control" name="section_name" value="<?php echo $row['section_name'] ?>">
    <input type="hidden" class="form-control" name="action"  value="update_section">
    <input type="hidden" class="form-control" name="id"  value="<?php echo $id; ?>">
  </div>
    <select type="text" class="form-control" name="grade_id" required>
			<option value="<?php echo $row['grade_id']; ?>"><?php echo $row['grade'] ?></option>
		<?php foreach($system->grade_list() as $gl_row){ ?>	
			<option value="<?php echo $gl_row['grade_id']; ?>"><?php echo $gl_row['grade']; ?></option>
		<?php } ?>	
	</select>
  <hr class="hr">	
  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
</form>
<?php include('update_script1.php'); ?>
<?php } ?>
<?php if($form == 'grade'){ ?>
<form role="form" method="POST" id="form_update<?php echo $id; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Section Name </label>
    <input type="text" class="form-control" name="grade" value="<?php echo $row['grade'] ?>">
    <input type="hidden" class="form-control" name="action"  value="update_grade">
    <input type="hidden" class="form-control" name="id"  value="<?php echo $id; ?>">
  </div>
  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
</form>
<?php include('update_script1.php'); ?>
<?php } ?>
<?php if($form == 'offenses'){ ?>
<form role="form" method="POST" id="form_update<?php echo $id; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Offenses </label>
    <input type="text" class="form-control" name="offenses" value="<?php echo $row['offenses'] ?>">
    <input type="hidden" class="form-control" name="action"  value="update_offenses">
    <input type="hidden" class="form-control" name="id"  value="<?php echo $id; ?>">
  </div>
  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
</form>
<?php include('update_script1.php'); ?>
<?php } ?>
<?php if($form == 'anecdotal'){ ?>
<form role="form" method="POST" id="form_update<?php echo $id; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Anecdotal </label>
    <input type="text" class="form-control" name="anecdotal" value="<?php echo $row['anecdotal'] ?>">
    <input type="hidden" class="form-control" name="action"  value="update_anecdotal">
    <input type="hidden" class="form-control" name="id"  value="<?php echo $id; ?>">
  </div>
  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
</form>
<?php include('update_script1.php'); ?>
<?php } ?>
<?php if($form == 'intervention'){ ?>
<form role="form" method="POST" id="form_update<?php echo $id; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Intervention </label>
    <input type="text" class="form-control" name="intervention" value="<?php echo $row['intervention'] ?>">
    <input type="hidden" class="form-control" name="action"  value="update_intervention">
    <input type="hidden" class="form-control" name="id"  value="<?php echo $id; ?>">
  </div>
  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
</form>
<?php include('update_script1.php'); ?>
<?php } ?>
<?php if($form == 'sy'){ ?>
<form role="form" method="POST" id="form_update<?php echo $id; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">School Year </label>
    <input type="text" class="form-control" name="sy" value="<?php echo $row['school_year'] ?>">
    <input type="hidden" class="form-control" name="action"  value="update_sy">
    <input type="hidden" class="form-control" name="id"  value="<?php echo $id; ?>">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Set as Current Year </label>
	<select class="form-control" name="current_year">
		<option><?php echo $row['current_year']; ?></option>
		<option>Yes</option>
		<option>No</option>
	</select>	
  </div>
  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
</form>
<?php include('update_script1.php'); ?>
<?php } ?>

	