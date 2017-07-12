<?php
include('dbcon.php');
include('class.php');
include('session.php');
$action = $_POST['action'];
if($action == 'update_student_anecdotal'){
	$system->update_student_anecdotal($_POST);
	include('anecdotal_records.php');
}
if($action == 'update_student_violation'){
	$system->update_student_violation($_POST);
	include('violation_records.php');
}
if($action == 'change_teacher_picture'){
	$system->change_teacher_picture($_POST);
	include('teacher.php');
}
if($action == 'update_user'){
	$result = $system->update_user($_POST);
	if($result == 1){
		include('user_account.php');
	}else{
		echo 'false';	
	}
}
if($action == 'update_r_user'){
	$system->update_r_user($_POST);
	include('ruser.php');
}
if($action == 'update_teacher'){
	$system->update_teacher($_POST);
	include('teacher.php');
}
if($action == 'update_tle'){
	$system->update_tle($_POST);
	include('cptle.php');
}
if($action == 'update_club'){
	$system->update_club($_POST);
	include('clubs.php');
}
if($action == 'update_grade'){
	$system->update_grade($_POST);
	include('grade.php');
}
if($action == 'update_section'){
	$system->update_section($_POST);
	include('section.php');
}
if($action == 'update_offenses'){
	$system->update_offenses($_POST);
	include('offenses.php');
}
if($action == 'update_anecdotal'){
	$system->update_anecdotal($_POST);
	include('anecdotal.php');
}
if($action == 'update_intervention'){
	$system->update_intervention($_POST);
	include('intervention.php');
}
if($action == 'update_sy'){
	$system->update_sy($_POST);
	include('sy_page.php');
}
if($action == 'update_student'){
	$system->update_student($_POST);
	include('students.php');
}
if($action == 'update_student_transaction'){
	$system->update_student($_POST);
	include('transaction.php');
}
?>