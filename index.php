<?php include('header.php'); ?>
    <body class="login">
	<h2 class = "center" style = "color:white;">Dona Montserrat Lopez Memorial High School</h2>
	<h3 class = "center" style = "color:white;">Enrolement Management System</h3>
        <div class="form-box" id="login-box">

            <form method="post" id="login_form">
                <div class="body bg-gray">
					

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
			
			<option value="enrol">Enrolling Officer</option>
			<option value="registrar">Registrar</option>
		</select>
    </div>      
                </div>
                <div class="footer bg_grey1">                                                               
                    <button type="submit" class="btn bg-olive btn-block button-login"><i class="fa fa-sign-in"></i> Log in</button>  
               	<div class="alert alert-success" id="correct"> Successfully Log in!</div>
				<div class="alert alert-danger" id="error"> Error Log in </div>
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
									}else if(html=='true1'){
										$('#error').hide();
										$("#correct").slideDown();
										var delay = 2000;
										setTimeout(function(){	window.location = 'page.php?page=enrol_new&students=new';   }, delay);  
									}
									else{
									$('#error').slideDown();	
										var delay = 2000;
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