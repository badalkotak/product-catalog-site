<?php
include("no_javascript_message.php");
// error_reporting(0);
session_start();

if(!isset($_SESSION['email']))
{
	echo "<script>alert('Please login first!');window.location.href='../../login/functions/login.php'</script>";
}
else
{
	$email=$_SESSION['email'];
	// $id=$_SESSION['id'];
	// $role_id=$_SESSION['role'];
}
?>