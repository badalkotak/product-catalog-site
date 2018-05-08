<?php

require_once("Constants.php");

class Home
{
    private $connection;

    function __construct($connection)
    {
        $this->connection = $connection;
    }

    function getHome()
    {
    	$sql = "SELECT * FROM `home_page`";

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

    function insertHome($cover_image,$title,$tag_line)
    {
		$sql = "INSERT INTO `home_page`(`cover_image`, `title`, `tag_line`) VALUES ('$cover_image','$title','$tag_line')";

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

    function countHome()
    {
    	$count_sql = "SELECT COUNT(id) FROM `home_page`";
    	$count_result = $this->connection->query($count_sql);

    	while($row = $count_result->fetch_assoc())
    	{
    		$count = $row['COUNT(id)'];
    	}

    	return $count;
    }

    function deleteHome($id)
    {
        $sql_img = "SELECT cover_image FROM `home_page` WHERE id='$id'";

        $result_img = $this->connection->query($sql_img);

        while($row=$result_img->fetch_assoc())
        {
            $oldImg = $row['cover_image'];
        }
    	$sql = "DELETE FROM `home_page` WHERE `id`='$id'";

    	$result = $this->connection->query($sql);

        if($result)
        {
            unlink("home_images/$oldImg");
            return true;
        }
        else
        {
            return false;
        }
    }
}

?>