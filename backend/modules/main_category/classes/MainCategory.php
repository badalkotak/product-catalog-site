<?php

require_once("../../../classes/Constants.php");

class MainCategory
{
    private $connection;

    function __construct($connection)
    {
        $this->connection = $connection;
    }

    function getCategory($withLayout = 0)
    {
        if($withLayout ! = 0)
        {
            $sql="SELECT * FROM category";
        }
        else
        {
            $sql="SELECT * FROM category WHERE layout != 0 ORDER BY layout";
        }

    	$result = $this->connection->query($sql);

    	if($result->num_rows > 0)
    	{
    		return $result;
    	}
    	else
    	{
    		return null;
    	}
    }

    function insertCategory($name,$cover_image,$tag_line,$layout = 0)
    {
        $sql = "INSERT INTO `category`( `name`, `cover_image`, `tag_line`, `layout`) VALUES ('$name','$cover_image','$tag_line','$layout')";

        $result = $this->connection->query($sql);

        if($result->num_rows > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function deleteCategory($id)
    {
        
    }

    function updateCategory($id,$name,$cover_image,$tag_line,$layout = 0)
    {
        $sql = "UPDATE `category` SET `name`='$name',`cover_image`='$cover_image',`tag_line`='$tag_line',`layout`='$layout' WHERE `id`='$id'";

        $result = $this->connection->query($sql);

        if($result->num_rows > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }


}

?>