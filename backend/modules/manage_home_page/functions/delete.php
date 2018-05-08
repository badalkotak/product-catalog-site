<?php
require_once("../../../classes/DBConnect.php");
require_once("../../../classes/Constants.php");
require_once("../classes/Home.php");

$dbConnect = new DBConnect(Constants::SERVER_NAME,
    Constants::DB_USERNAME,
    Constants::DB_PASSWORD,
    Constants::DB_NAME);

$home = new Home($dbConnect->getInstance());

$home_id=$_REQUEST['delete'];

$delete = $home->deleteHome($home_id);

if($delete)
{
	// unlink('cover_images/'.$oldImg);
	$message = "Home page item is ".Constants::DELETE_SUCCESS_MSG;
	echo "<script>alert('$message');window.location.href='index.php';</script>";
}
else
{
	$message = Constants::DELETE_FAIL_MSG."Home page item";
	echo "<script>alert('$message');window.location.href='index.php';</script>";	
}
?>