<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) {
    header("location: index.php");
    exit();
}
$session_id=$_SESSION['id'];
$query = $conn->query("SELECT * from user_table where user_id = '$session_id'");
$row = $query->fetch();
$user_name = $row['name'];
 $_SESSION['user_type'];
if($_SESSION['user_type'] == 'enrol'){
	$user_type = $row['r_type'];
}else{
	$user_type = $row['user_type'];
}
?>