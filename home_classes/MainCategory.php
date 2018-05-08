<?php

require_once("Constants.php");
require_once("DBConnect.php");
require_once("Product.php");

class MainCategory
{
    private $connection;

    function __construct($connection)
    {
        $this->connection = $connection;
    }

    function selfDbConn($connection)
    {
        $this->connection = $connection;
    }

    function getCategory($withLayout = 0,$cat_id = 0)
    {
        if($withLayout == 0 && $cat_id==0)
        {
            $sql="SELECT * FROM category";
        }
        else if($withLayout != 0)
        {
            $sql="SELECT * FROM category WHERE layout != 0 ORDER BY layout";
        }
        else if($cat_id != 0)
        {
            echo "In get $cat_id";
            $sql = "SELECT * FROM `category` WHERE `id`='$cat_id'";
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

    function getCategoryWithLayout($layout)
    {
        $sql = "SELECT * FROM category WHERE layout = '$layout'";

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

        if($result)
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
        $dbConnect = new DBConnect(Constants::SERVER_NAME,
        Constants::DB_USERNAME,
        Constants::DB_PASSWORD,
        Constants::DB_NAME);

        // $cat = $this->selfDbConn($dbConnect->getInstance());

        $product = new Product($dbConnect->getInstance());
        $get = $product->getProducts($id);

        $images = array();

        if($get!=null)
        {
            while($row = $get->fetch_assoc())
            {
                $image=$row['image'];
                array_push($images, $image);
            }

            $this->connection = $dbConnect->getInstance();
            $getCatImg = $this->getCategory(0,$id);

            var_dump($getCatImg);

            if($getCatImg != null)
            {
                while($cat_row = $getCatImg->fetch_assoc())
                {
                    echo $cat_img = $cat_row['cover_image'];
                }
            }
            $sql = "DELETE FROM `category` WHERE `id`='$id'";
            $result = $this->connection->query($sql);

            if($result)
            {
                for($img=0;$img<sizeof($images);$img++)
                {
                    unlink('../../manage_products/functions/product_images/'.$images[$img]);
                }
                unlink('cover_images/'.$cat_img);
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            echo "Null";
        }
    }

    function updateCategory($id,$name,$cover_image,$tag_line,$layout = 0)
    {
        if($cover_image != "")
        {
            $sql = "UPDATE `category` SET `name`='$name',`cover_image`='$cover_image',`tag_line`='$tag_line',`layout`='$layout' WHERE `id`='$id'";
        }
        else
        {
            $sql = "UPDATE `category` SET `name`='$name',`tag_line`='$tag_line',`layout`='$layout' WHERE `id`='$id'";
        }

        $result = $this->connection->query($sql);

        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function checkLayout($layout)
    {
        $sql = "SELECT id FROM category WHERE layout='$layout'";

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

}

?>