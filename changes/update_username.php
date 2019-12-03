<?php

include_once '../config/database.php';

try
{
    $get = $_GET['action'];

    if (isset($get) == 'change_u')
    {
        if(isset($_POST['email'])) //&& isset($_POST['usr']))
	    {
            $em = $_GET['email'];
		    $nus = $_GET['usr'];
			$dsn = "mysql:host=$server;dbname=$db";
			$connect = new PDO($dsn, $user, $password);
			//$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $connect->prepare("SELECT email_address FROM users  WHERE  email_address =:email_address");
			//$stmt->bindValue(':username', $us);
            //  $stmt->bindValue(':email_address',$em);
            $stmt->execute(['username' => $nus, 'email_address' => $em]);
		//	$stmt->execute(['username' => $usrname, 'email_address' => $email]);
            $usr = $stmt->fetch(PDO::FETCH_ASSOC);
            if()
				$stmt = $connect->prepare("UPDATE users SET username = :username WHERE email_address =:email_address");
                $stmt->bindParam(':email_address', $em);
                $stmt->bindParam(':username', $nus);
                $stmt->execute();
			}
		}
	}
	else
	{
		echo 'Could not identify the email address that was given';
    }
}
catch(PDOException $e)
		{
			echo $e;
		}
?>