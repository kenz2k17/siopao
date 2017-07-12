<?php
include('dbcon.php');
include('class.php');
include('session.php');
$action = $_POST['action'];


if($action == 'add_club_member'){
	$system->add_club_member($_POST);
	include('club_member.php');
}
if($action == 'save_r_user'){
	$system->save_r_user($_POST);
	include('ruser.php');
}
if($action == 'save_tle'){
	$system->save_tle($_POST);
	include('cptle.php');
}
if($action == 'save_club'){
	$system->save_club($_POST);
	include('clubs.php');
}
if($action == 'save_grade'){
	$system->save_grade($_POST);
	include('grade.php');
}
if($action == 'save_section'){
	$system->save_section($_POST);
	include('section.php');
}
if($action == 'save_offenses'){
	$system->save_offenses($_POST);
	include('offenses.php');
}
if($action == 'save_anecdotal'){
	$system->save_anecdotal($_POST);
	include('anecdotal.php');
}
if($action == 'save_intervention'){
	$system->save_intervention($_POST);
	include('intervention.php');
}
if($action == 'save_sy'){
	$system->save_sy($_POST);
	include('sy_page.php');
}
if($action == 'enrol_student'){
	$system->enrol_student($_POST);
	include('enrol_new.php');
}
if($action == 'enrol_existing_student'){
	$system->enrol_student($_POST);
	include('enrol.php');
}
if($action == 'transfer'){
	$system->enrol_student($_POST);
	include('transfer.php');
}

if($action == 'add_student_violation'){
	$system->add_student_violation($_POST);
	include('add_violation.php');
}
if($action == 'add_student_anecdotal'){
	$system->add_student_anecdotal($_POST);
	include('add_anecdotal.php');
}
if($action == 'add_teacher'){
	$system->add_teacher($_POST);
	include('add_teacher.php');
}

?>