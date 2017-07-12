<?php
		include('dbcon.php');
		include('class.php');
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];
		$user_type = $_POST['user_type'];
		if($user_type != 'enrol'){
			$teacher_id = $system->login($username,$password,$user_type);	
		}else{
			$teacher_id = $system->login1($username,$password,$user_type);	
		}
		
	/* 	$system->login_trail($teacher_id); */	
?>