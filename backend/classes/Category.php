<?php

require_once("Constants.php");
// require_once("../../manage_products/classes/Product.php");

class Category
{
    private $connection;

    function __construct($connection)
    {
        $this->connection = $connection;
    }

    function getSubCategories($main_cat_id)
    {
    	if($main_cat_id == 0)
    	{
    		//Select All
    		$sql = "SELECT sc.id AS scId,sc.category_name AS scName,mc.category_name AS mcName,sc.cover_image AS image, sc.category_desp AS desp FROM sub_category AS sc, main_category AS mc WHERE sc.main_category_id = mc.id ORDER BY(sc.main_category_id)";
    	}
    	else
    	{
    		$sql = "SELECT * FROM sub_category WHERE main_category_id = '$main_cat_id'";
       	}

       	$result = $this->connection->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return null;
        }
    }

    function getMainCategory()
    {
        $sql="SELECT * FROM main_category";

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