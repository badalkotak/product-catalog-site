<?php
require_once("../../../classes/DBConnect.php");
require_once("../../../classes/Constants.php");
require_once("../classes/Product.php");

$dbConnect = new DBConnect(Constants::SERVER_NAME,
    Constants::DB_USERNAME,
    Constants::DB_PASSWORD,
    Constants::DB_NAME);

$product = new Product($dbConnect->getInstance());

$con = $dbConnect->getInstance();
$name=$_REQUEST['name'];
$name = mysqli_real_escape_string($con,$name);
$desp=$_REQUEST['desp'];
$desp = mysqli_real_escape_string($con,$desp);
$cat_id=$_REQUEST['cat'];
$url_file=$_FILE['file'];
$file_name=$_FILES['file']['name'];
$product_id=$_REQUEST['id'];

if($name=="" || $desp=="" || $cat_id==0)
{
	$message = Constants::EMPTY_PARAMETERS;
	echo "<script>alert($message);window.location.href='index.php';</script>";
}

function generatePassword($length = 4) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }
	
    return $result;
}

if($file_name != "")
{
	$fileName=generatePassword();

	$targetfolder = "product_images/";
	$file_type=$_FILES['file']['type'];
	$target_file = $targetfolder . basename($_FILES["file"]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	$newFileName = $fileName. "." . $imageFileType;
	$targetfolder = $targetfolder . $newFileName;

	// echo "In if";

	if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
	{

		$update=$product->updateProduct($name,$desp,$newFileName,$cat_id,$product_id);

		if($update)
		{
			// unlink('product_images/'.$oldImg);
			$message = "Product is ".Constants::UPDATE_SUCCESS_MSG;
			echo "<script>alert('$message');window.location.href='index.php';</script>";
		}
		else
		{
			unlink($targetfolder);
			$message = Constants::UPDATE_FAIL_MSG."Product";
			echo "<script>alert('$message');window.location.href='index.php';</script>";	
		}

	}
	else
	{
		$message = "Problem in uploading Product Image";
		echo "<script>alert('$message');window.location.href='index.php';</script>";
	}
}

else
{
	// echo "In else";
	$newFileName = "";
	$update=$product->updateProduct($name,$desp,$newFileName,$cat_id,$product_id);

	if($update)
	{
		$message = "Product is ".Constants::UPDATE_SUCCESS_MSG;
		echo "<script>alert('$message');window.location.href='index.php';</script>";
	}
	else
	{
		$message = Constants::UPDATE_FAIL_MSG."Product";
		echo "<script>alert('$message');window.location.href='index.php';</script>";	
	}
}
?>