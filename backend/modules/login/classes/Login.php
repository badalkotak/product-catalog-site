<?php

require_once("../../../classes/Constants.php");

class Login
{
	private $connection;

    function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function checkLogin($email,$passwd)
    {
    	$sql="SELECT passwd FROM users WHERE email='$email'";
    	$result = $this->connection->query($sql);

    	if($result->num_rows > 0)
    	{
    		while($row=$result->fetch_assoc())
    		{
    			$pass=$row['passwd'];
    		}

    		if($passwd===$pass)
    		{
                session_start();
                $_SESSION['email']=$email;
    			return true;
    		}
    		else
    		{
    			return false;
    		}
    	}

    	else
    	{
    		return false;
    	}
    }

    // public function createSession($email)
    // {
    // 	session_start();
    // 	$_SESSION['email']=$email;
    // }
}
?>
