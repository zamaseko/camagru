<?php

include 'config/database.php';


if (isset($_GET['action']) == 'signup')
{
    if (isset($_GET['email']) && isset($_GET['vk']))
    {
        $vkey = $_GET['vk'];
        $email = $_GET['email'];
        try
        {
            $dsn = "mysql:host=$server;dbname=$db";
            $connect = new PDO($dsn, $user, $password);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $mys = $connect->prepare("SELECT email_address, vkey FROM users WHERE email_address =:email_address AND vkey =:vkey");
            $mys->bindValue(':email_address', $email);
            $mys->bindValue(':vkey', $vkey);
            $mys->execute();
            $usr = $mys->fetch(PDO::FETCH_ASSOC);
            if ($usr === false)
            {
                echo "<b>Error: Could not verify the account/ email address or username is already taken</b>";
            }	
            else
            {
                
                $stmt = $connect->prepare("UPDATE users SET verified = '1' WHERE email_address =:email_address AND vkey =:vkey");
                $stmt->bindParam(':email_address', $email);
                $stmt->bindParam(':vkey', $vkey);
                $stmt->execute();
              
                $stmt1 = $connect->prepare("UPDATE users SET vkey =:vkey WHERE email_address =:email_address");
                $stmt1->bindParam(':email_address', $email);
				$stmt1->bindParam(':vkey', $vkey);
                $stmt1->execute();

                header('Location: login.php');

            }
        }
        catch(PDOException $e)
        {
            echo $e;
        }
    }
    else
    {
        echo "Could not verify your details, missing key or email address";
    }
}
?>
