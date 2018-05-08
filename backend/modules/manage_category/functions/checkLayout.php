<?php
require_once("../../../classes/DBConnect.php");
require_once("../../../classes/Constants.php");
require_once("../classes/MainCategory.php");

$dbConnect = new DBConnect(Constants::SERVER_NAME,
    Constants::DB_USERNAME,
    Constants::DB_PASSWORD,
    Constants::DB_NAME);

$category = new MainCategory($dbConnect->getInstance());

$cat_id=$_REQUEST['id'];

$getCurrLayout = $category->getCategory(0,$cat_id);

while($row=$getCurrLayout->fetch_assoc())
{
	$currLayout=$row['layout'];
}

$layout=$_REQUEST['layout'];

if($currLayout == $layout)
{
	$arr['status']=false;
}
else
{
	$check = $category->checkLayout($layout);

	if($check)
	{
		$arr['status']=true;
	}
	else
	{
		$arr['status']=false;
	}
}

header('Content-Type: application/json');
echo json_encode($arr);
?>