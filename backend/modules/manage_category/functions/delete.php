<?php
require_once("../../../classes/DBConnect.php");
require_once("../../../classes/Constants.php");
require_once("../classes/MainCategory.php");

$dbConnect = new DBConnect(Constants::SERVER_NAME,
    Constants::DB_USERNAME,
    Constants::DB_PASSWORD,
    Constants::DB_NAME);

$category = new MainCategory($dbConnect->getInstance());

$cat_id=$_REQUEST['delete'];

$delete = $category->deleteCategory($cat_id);

if($delete)
{
	unlink('cover_images/'.$oldImg);
	$message = "Category is ".Constants::DELETE_SUCCESS_MSG;
	echo "<script>alert('$message');window.location.href='index.php';</script>";
}
else
{
	$message = Constants::DELETE_FAIL_MSG."Category";
	echo "<script>alert('$message');window.location.href='index.php';</script>";	
}
?>