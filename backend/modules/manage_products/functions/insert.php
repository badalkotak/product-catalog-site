<?php
require_once("../../../classes/DBConnect.php");
require_once("../../../classes/Constants.php");
require_once("../classes/Product.php");

$dbConnect = new DBConnect(Constants::SERVER_NAME,
    Constants::DB_USERNAME,
    Constants::DB_PASSWORD,
    Constants::DB_NAME);

$product = new Product($dbConnect->getInstance());

$name = $_REQUEST['name'];
$cat = $_REQUEST['cat'];
$desp = $_REQUEST['desp'];
$file_name=$_FILES['file']['name'];
// $url_file=$_FILE['file'];
if($name=="" || $cat==0 || $desp=="")
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
		$insert=$product->insertProducts($name,$desp,$newFileName,$cat);

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