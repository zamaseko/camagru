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
            $mys = $connect->prepare("SELECT email_address, vkey FROM users WHERE email_address =:email AND vkey =:vkey");
            $mys->bindValue(':email', $email);
            $mys->bindValue(':vkey', $vkey);
            $mys->execute();
            $res = $mys->fetch(PDO::FETCH_ASSOC);
            if ($res === false)
            {
                echo "Error: Could not verify the account";
            }	
            else
            {
                $smtp = $connect->prepare("UPDATE users SET verified = '1' WHERE email_address =:email AND vkey =:vkey");
                $smtp->bindParam(':email', $email);
                $smtp->bindParam(':vkey', $vkey);
                $smtp->execute();

                $smtp1 = $connect->prepare("UPDATE users SET vkey =' ' WHERE email_address =:email");
                $smtp1->bindParam(':email', $email);
                $smtp1->execute();

                header('Location: login.php');

            }
            //$mysq = "INSERT INTO users (username, email_address) VALUE username = :username or email_address = :email_address";
            //$connect->prepare($mysq);
        // $connect->exec();
            //if($email)
            //{
            //    echo "Press the link to continue";
            //    header('Location: login.php');
            //}
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





/*$vkey = $_GET['vk'];
$usrname = $_POST['username'];
$email = trim($_POST['email_address']);
//$passwd = $_POST['pass_word'];

try
{
	$dsn = "mysql:host=$server;dbname=$db";
	$connect = new PDO($dsn, $user, $password);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $mys = "UPDATE users WHERE vkey =:vkey";
    $connect->exec($mys);	
	$mysq = "INSERT INTO users (username, email_address) VALUE username = :username or email_address = :email_address";
    $connect->prepare($mysq);
   // $connect->exec();
    if($email)
    {
        echo "Press the link to continue";
        header('Location: login.php');
    }
}
catch(PDOException $e)
{
    echo $e;
}*/
?>
