<?php
require_once("../../../classes/DBConnect.php");
require_once("../../../classes/Constants.php");
require_once("../classes/Product.php");

$dbConnect = new DBConnect(Constants::SERVER_NAME,
    Constants::DB_USERNAME,
    Constants::DB_PASSWORD,
    Constants::DB_NAME);

$product = new Product($dbConnect->getInstance());

$arr=$_REQUEST['data'];

$image_id=$arr[0];
$imageName=$arr[1];
$product_id=$arr[2];

$delete = $product->deleteExtraProductImage($image_id,$imageName);

if($delete)
{
	$message = "New Product Image is ".Constants::INSERT_SUCCESS_MSG;
	echo "<script>alert('$message');window.location.href='addExtra.php?extra=$product_id';</script>";
}
else
{
	$message = Constants::DELETE_FAIL_MSG."Product Image";
	echo "<script>alert('$message');window.location.href='addExtra.php?extra=$product_id';</script>";	
}

// $getImage = $product->getDetails($product_id);

// if($getImage != null)
// {
// 	while($row=$getImage->fetch_assoc())
// 	{
// 	}
// }
// else
// {
// 	$message = Constants::DELETE_FAIL_MSG."Product Image";
// 	// echo "<script>alert('$message');window.location.href='addExtra.php?extra=$product_id';</script>";	
// }
?>