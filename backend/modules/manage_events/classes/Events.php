<?php

require_once("../../../classes/Constants.php");

class Events
{
    private $connection;

    function __construct($connection)
    {
        $this->connection = $connection;
    }

    function getEvents()
    {
        $sql = "SELECT * FROM events_db";     
        
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

    function insertEvent($name,$desp,$from_date,$to_date)
    {
        $sql = "INSERT INTO `events_db`(`name`, `desp`, `from_date`, `to_date`) VALUES ('$name','$desp','$from_date','$to_date')";

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

    function deleteEvent($id)
    {
        $sql = "DELETE FROM `events_db` WHERE `id`='$id'";

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

    function updateEvent($id,$name,$desp,$from_date,$to_date)
    {
        $sql = "UPDATE `events_db` SET `name`='$name',`desp`='$desp',`from_date`='$from_date',`to_date`='$to_date' WHERE `id`='$id'";

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