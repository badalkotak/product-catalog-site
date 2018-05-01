<?php

require_once("../../../classes/Constants.php");

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

        if($result->num_rows > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function deleteHome($id)
    {
    	$sql = "DELETE FROM `home_page` WHERE `id`='$id'";

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