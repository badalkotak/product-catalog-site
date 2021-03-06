<?php
require_once("../../../classes/DBConnect.php");
require_once("../../../classes/Constants.php");
require_once("../classes/Product.php");

$dbConnect = new DBConnect(Constants::SERVER_NAME,
    Constants::DB_USERNAME,
    Constants::DB_PASSWORD,
    Constants::DB_NAME);

$product = new Product($dbConnect->getInstance());

$id=$_REQUEST['delete'];

$delete = $product->deleteProduct($id);

if($delete)
{
	// unlink('product_images/'.$oldImg);
	$message = "Product is ".Constants::DELETE_SUCCESS_MSG;
	echo "<script>alert('$message');window.location.href='index.php';</script>";
}
else
{
	$message = Constants::DELETE_FAIL_MSG."Product";
	echo "<script>alert('$message');window.location.href='index.php';</script>";	
}
?>