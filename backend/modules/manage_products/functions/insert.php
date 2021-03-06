<?php
require_once("../../../classes/DBConnect.php");
require_once("../../../classes/Constants.php");
require_once("../classes/Product.php");

// error_reporting(0);
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
$today = date("d/m/Y");

if($name == "" || $desp == "" || $cat_id == 0 || $url_file == "")
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
$fileName=generatePassword();

$targetfolder = "product_images/";
$file_type=$_FILES['file']['type'];
$target_file = $targetfolder . basename($_FILES["file"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	$newFileName = $fileName. "." . $imageFileType;
	$targetfolder = $targetfolder . $newFileName;

	if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
	{
		$insert=$product->insertProducts($name,$cat_id,$newFileName,$desp,$today);
		echo $insert;
		if($insert)
		{
			$message = "New Product is ".Constants::INSERT_SUCCESS_MSG;
			echo "<script>alert('$message');window.location.href='index.php';</script>";
		}
		else
		{
			unlink($targetfolder);
			$message = Constants::INSERT_FAIL_MSG."Product";
			echo "<script>alert('$message');window.location.href='index.php';</script>";	
		}
	}
	else
	{
		$message = "Problem in uploading Product Image";
		echo "<script>alert('$message');window.location.href='index.php';</script>";
	}
?>