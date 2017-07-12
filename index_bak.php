<?php include('header.php'); ?>
    <body class="">

	
        <div class="form-box" id="login-box">
            <!-- <div class="header">ESSI Login</div> -->
			<h3 class="center">Enrolment Statistical Information System</h3>
            <form method="post" id="login_form">
                <div class="body bg-gray">
					
	<hr class="hr">
	<div class="form-group">
	<label>Username</label>
    <div class="input-group">
      <div class="input-group-addon"><i class="fa fa-user"></i></div>
      <input type="text"  name="username" class="form-control"  placeholder="">
    </div>
	</div>
	<div class="form-group">
	<label>Password</label>
    <div class="input-group">
      <div class="input-group-addon"><i class="fa fa-key"></i></div>
      <input type="password"  name="password" class="form-control"  placeholder="">
    </div>
	</div>
     <div class="form-group">
		<label>User Type</label>
		<select class="form-control" name="user_type">
			<option></option>
			<option>Principal</option>
			<option>Registrar</option>
			<option>Guidance</option>
		</select>
    </div>      
                </div>
      <div class="footer bg_grey1">                                                               
          <button type="submit" class="btn bg-olive btn-block"><i class="fa fa-sign-in"></i> Sign me in</button>  
      </div>
            </form>
			
			
					<script>
						jQuery(document).ready(function(){
						$('#error').hide()
						$('#correct').hide()
						jQuery("#login_form").submit(function(e){
								e.preventDefault();
								var formData = jQuery(this).serialize();
								$.ajax({
									type: "POST",
									url: "login.php",
									data: formData,
									success: function(html){
									if(html=='true' )
									{
										$('#error').hide();
										$("#correct").slideDown();
										var delay = 2000;
										setTimeout(function(){	window.location = 'page.php?page=home';   }, delay);  
									}else{
									$('#error').slideDown();	
										var delay = 3000;
										setTimeout(function(){	$('#error').slideUp();  }, delay);  
									}
									}
								});
									return false;
						});
						});
						</script>
        </div>
		<?php include('script.php'); ?>
    </body>
</html>