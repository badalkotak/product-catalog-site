<?php
require_once("../../../classes/DBConnect.php");
require_once("../../../classes/Constants.php");
require_once("../classes/Home.php");

error_reporting(0);
$dbConnect = new DBConnect(Constants::SERVER_NAME,
    Constants::DB_USERNAME,
    Constants::DB_PASSWORD,
    Constants::DB_NAME);

$home= new Home($dbConnect->getInstance());

$count = $home->countHome();

if($count >= 3)
{
	$message = "Cannot add more than 3 cover pages for Home page";
	echo "<script>alert('$message');window.location.href='index.php';</script>";
	exit(0);
}

$con = $dbConnect->getInstance();

$title = $_REQUEST['name'];
$title = mysqli_real_escape_string($con,$title);
$file_name=$_FILES['file']['name'];
$tag_line=$_REQUEST['tag'];
$tag_line = mysqli_real_escape_string($con,$tag_line);
$url_file=$_FILE['file'];
if($name=="" || $tag_line=="" || $file_name=="")
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

$targetfolder = "home_images/";
$file_type=$_FILES['file']['type'];
$target_file = $targetfolder . basename($_FILES["file"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	$newFileName = $fileName. "." . $imageFileType;
	$targetfolder = $targetfolder . $newFileName;

	if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
	{
		$insert=$home->insertHome($newFileName,$title,$tag_line);

		if($insert)
		{
			$message = "Home Page item is ".Constants::INSERT_SUCCESS_MSG;
			echo "<script>alert('$message');window.location.href='index.php';</script>";
		}
		else
		{
			unlink($targetfolder);
			$message = Constants::INSERT_FAIL_MSG."Home Page item";
			echo "<script>alert('$message');window.location.href='index.php';</script>";	
		}
	}
	else
	{
		$message = "Problem in uploading Cover Image";
		echo "<script>alert('$message');window.location.href='index.php';</script>";
	}
?>