<?php

require_once("Constants.php");
require_once("DBConnect.php");
$dbConnect = new DBConnect(Constants::SERVER_NAME,
    Constants::DB_USERNAME,
    Constants::DB_PASSWORD,
    Constants::DB_NAME);

class Product
{
    private $connection;

    function __construct($connection)
    {
        $this->connection = $connection;
    }

    function getProducts($category_id)
    {
        if($category_id == 0)
        {
            $sql="SELECT * FROM `products` ORDER BY date_added DESC";
        }
        else
        {
            $sql = "SELECT * FROM `products` WHERE `cat_id` = '$category_id' ORDER BY date_added DESC";
        }

       	$result = $this->connection->query($sql);
        if ($result) {
            return $result;
        } else {
            return null;
        }
    }

    function insertProducts($name,$category_id,$product_image,$desp,$today)
    {
        $sql= "INSERT INTO `products`(`name`, `cat_id`, `image`, `desp`, `date_added`) VALUES ('$name', '$category_id', '$product_image', '$desp', '$today')";

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

    // DOUBTFUL
    function deleteProduct($id)
    {
        $sql = "SELECT * FROM products";

        $result = $this->connection->query($sql);
        while($row = $result->fetch_assoc())
        {
            $image = $row['image'];
            $name = $row['name'];
            $desp = $row['desp'];
            $category = $row['cat_id'];
        }

        $delete = "DELETE FROM products WHERE id = '$id'";
        $delete_result = $this->connection->query($delete);

        $image_path = "product_images/$image";
        if($delete)
        {
            unlink($image_path);
            return true;
        }
        else
        {
            return false;
        }
    }

    function getDetails($product_id,$normal=0)
    {
        if($normal!=0)
        {
            $sql = "SELECT cat.name as cat_name, p.name as product_name, p.image as product_image, p.desp as product_desp, p.date_added as product_date_added FROM category as cat, products as p WHERE p.id = $product_id AND cat.id = p.cat_id";
        }
        else
        {
            $sql = "SELECT * FROM products WHERE id='$product_id'";
        }

        $result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }

    function updateProduct($name,$desp,$product_image,$cat_id,$id)
    {
        $getOldImg = "SELECT image FROM products WHERE id='$id'";

        $result = $this->connection->query($getOldImg);
        while($row = $result->fetch_assoc())
        {
            $oldImg = $row['image'];
        }

        if($product_image == "")
        {
            $sql = "UPDATE `products` SET `name`='$name',`cat_id`='$cat_id',`desp`='$desp' WHERE `id`='$id'";

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
        else
        {
            $sql = "UPDATE `products` SET `name`='$name',`cat_id`='$cat_id',`image`='$product_image',`desp`='$desp' WHERE `id`='$id'";
            $result = $this->connection->query($sql);
            if($result)
            {
                unlink('product_images/'.$oldImg);
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    // function addExtraProductImage($image,$product_id)
    // {
    //     $sql = "INSERT INTO `extra_product_images`(`image`, `product_id`) VALUES ('$image','$product_id')";

    //     $result = $this->connection->query($sql);
    //     if($result)
    //     {
    //         return true;
    //     }
    //     else
    //     {
    //         return false;
    //     }
    // }

    // function getExtraProductImage($product_id)
    // {
    //     $sql = "SELECT * FROM `extra_product_images` WHERE product_id='$product_id'";

    //     $result = $this->connection->query($sql);
    //     if ($result->num_rows > 0) {
    //         return $result;
    //     } else {
    //         return null;
    //     }
    // }

    // function getExtraImagesCount($product_id)
    // {
    //     $sql = "SELECT COUNT(id) FROM extra_product_images WHERE product_id='$product_id'";

    //     $result = $this->connection->query($sql);
    //     if ($result->num_rows > 0) {
    //         return $result;
    //     } else {
    //         return null;
    //     }
    // }

    // function deleteExtraProductImage($image_id,$image_name)
    // {
    //     $url = "product_images/$image_name";
    //     if(unlink($url))
    //     {
    //         $sql = "DELETE FROM `extra_product_images` WHERE `id`='$image_id'";

    //         $delete_result = $this->connection->query($sql);

    //         if($delete_result)
    //         {
    //             return true;
    //         }
    //         else
    //         {
    //             return false;
    //         }
    //     }
    //     else
    //     {
    //         return false;
    //     }
    // }
}

?>