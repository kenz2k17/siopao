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
						<i class="fa fa-user"></i> User Account
                    </h1>
                </section>
				
 <section class="content enrol_content">

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
<?php 
$query = $conn->query("SELECT * from user_table where user_id = '$session_id'");
$row = $query->fetch();
?>
	<form class="form-horizontal" id="form_update">
     
   <div class="form-group">
    <label class="col-sm-3 control-label">Name</label>
    <div class="col-sm-9">
		<input type="hidden" name="id" class="form-control" value="<?php echo $row['user_id']; ?>"  required>		
		<input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>"  required>		
		<input type="hidden" name="action" class="form-control" value="update_user"  required>		
    </div>
  </div> 
  
     <div class="form-group">
    <label class="col-sm-3 control-label">Username</label>
    <div class="col-sm-9">
		<input type="text" name="username" class="form-control"  value="<?php echo $row['username']; ?>" required>		
    </div>
  </div> 
  
    <div class="form-group">
    <label class="col-sm-3 control-label">Password</label>
    <div class="col-sm-9">
		<input type="password" name="password" class="form-control" value="<?php echo $row['password']; ?>"  required>		
    </div>
  </div>
  
         <div class="form-group">
    <label class="col-sm-3 control-label"></label>
    <div class="col-sm-9">
		<a  href="#confirm" data-toggle="modal" class="btn btn-success" type="submit"><i class="fa fa-save"></i> submit</a>	
    </div>
  </div>
		
<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body center">
			Enter Current password to Update user Account
			<input type="password" name="c_password" class="form-control" value="<?php echo $row['password']; ?>"  required>	
			<hr class="hr">
			<button type="submit" class="btn btn-success" type="submit"><i class="fa fa-save"></i> Save</button>
			<hr class="hr">
			<div class="alert alert-danger" id="error"><i class="fa fa-info"></i> Current Password Does not Match!</div>
      </div>
    </div>
  </div>
</div>
		
	</form>
  
  

  

  
  

  
</div>

</div>

<div class="col-lg-6">

	

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
				$('#error').hide()
				jQuery("#form_update").submit(function(e){
				e.preventDefault();
				var _this = $(e.target);
				var formData = new FormData($(this)[0]);
				$.ajax({
					type: "POST",
					url: "ajax_update.php",
					data: formData,
					success: function(html){ 
						if(html == 'false'){
							$('#error').slideDown();	
							var delay = 3000;
							setTimeout(function(){	$('#error').slideUp();  }, delay);  
						}else{
							$('#confirm').modal("hide");
							$('#message').modal("show");
							var delay = 2000;
							setTimeout(function(){	
							$('#message').modal("hide");
							$('.main_con').html(html);  }, delay);  
						}		
					},
						cache: false,
						contentType: false,
						processData: false
				});
					return false;
		});
		});
	</script>	
				
