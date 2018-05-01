<?php

require_once("../../../classes/Constants.php");

class InvesterCorner
{
    private $connection;

    function __construct($connection)
    {
        $this->connection = $connection;
    }

    function getIC()
    {
    	$sql = "SELECT * FROM nvestor_corner";

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

    function insertIC($title,$date_added,$file)
    {
        $sql = "INSERT INTO `investor_corner`(`title`, `date_added`, `file`) VALUES ('$title','$date_added','$file')";

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

    function deleteIC($id)
    {
        $sql = "DELETE FROM `investor_corner` WHERE `id`='$id'";

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