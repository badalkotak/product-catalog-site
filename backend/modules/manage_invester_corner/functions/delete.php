<?php
require_once("../../../classes/DBConnect.php");
require_once("../../../classes/Constants.php");
require_once("../classes/InvesterCorner.php");

// error_reporting(0);
$dbConnect = new DBConnect(Constants::SERVER_NAME,
    Constants::DB_USERNAME,
    Constants::DB_PASSWORD,
    Constants::DB_NAME);

$ic = new InvesterCorner($dbConnect->getInstance());

$ic_id=$_REQUEST['delete'];

$delete=$ic->deleteIC($ic_id);

if($delete)
{
	// unlink('product_images/'.$oldImg);
	$message = "Entry is ".Constants::DELETE_SUCCESS_MSG;
	echo "<script>alert('$message');window.location.href='index.php';</script>";
}
else
{
	$message = Constants::DELETE_FAIL_MSG."Entry";
	echo "<script>alert('$message');window.location.href='index.php';</script>";	
}
?>