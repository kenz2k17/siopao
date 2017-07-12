<?php 
include('dbcon.php');
include('class.php');
include('session.php');
$action = $_GET['action'];
$id = $_GET['id'];

if($action == 'delete_r_user'){
	$system->delete_r_user($id);
	include('ruser.php');
}
if($action == 'delete_tle'){
	$system->delete_tle($id);
	include('cptle.php');
}
if($action == 'delete_club'){
	$system->delete_club($id);
	include('clubs.php');
}
if($action == 'delete_grade'){
	$system->delete_grade($id);
	include('grade.php');
}
if($action == 'delete_section'){
	$system->delete_section($id);
	include('section.php');
}
if($action == 'delete_offenses'){
	$system->delete_offenses($id);
	include('offenses.php');
}
if($action == 'delete_anecdotal'){
	$system->delete_anecdotal($id);
	include('anecdotal.php');
}
if($action == 'delete_intervention'){
	$system->delete_intervention($id);
	include('intervention.php');
}
if($action == 'delete_sy'){
	$system->delete_sy($id);
	include('sy_page.php');
}
if($action == 'delete_student_anecdotal'){
	$system->delete_student_anecdotal($id);
	include('anecdotal_records.php');
}
if($action == 'delete_student_violation'){
	$system->delete_student_violation($id);
	include('violation_records.php');
}

?>