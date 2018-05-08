<?php

require_once("Constants.php");

class InvesterCorner
{
    private $connection;

    function __construct($connection)
    {
        $this->connection = $connection;
    }

    function getIC($id)
    {
        if($id==0)
    	   $sql = "SELECT * FROM investor_corner";
        else
            $sql = "SELECT * FROM investor_corner WHERE id='$id'";

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

        if($result)
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
        $sql = "SELECT file FROM investor_corner WHERE id='$id'";

        $getOldFile = $this->connection->query($sql);

        while($row=$getOldFile->fetch_assoc())
        {
            $oldFile = $row['file'];
        }

        $sql = "DELETE FROM `investor_corner` WHERE `id`='$id'";

        $result = $this->connection->query($sql);

        if($result)
        {
            unlink("files/$oldFile");
            return true;
        }
        else
        {
            return false;
        }
    }

    function updateIC($id,$title,$file)
    {
        $sql = "SELECT file FROM investor_corner WHERE id='$id'";

        $getOldFile = $this->connection->query($sql);

        while($row=$getOldFile->fetch_assoc())
        {
            $oldFile = $row['file'];
        }
        if($file=="")
        {
            $sql = "UPDATE `investor_corner` SET `title`='$title' WHERE `id`='$id'";
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
            $sql = "UPDATE `investor_corner` SET `title`='$title',`file`='$file' WHERE `id`='$id'";

            $result = $this->connection->query($sql);

            if($result)
            {
                unlink("files/$oldFile");
                return true;
            }
            else
            {
                return false;
            }
        }
    }
}

?>