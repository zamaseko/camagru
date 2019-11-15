<?php
include 'config/database.php';

$activate = $_SESSION['username'];
try
{
    if($activate == 1)
    {
	    $connect = new pdo($dsn, $user, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connect->prepare('UPDATE user SET emailNotif = :? WHERE username = :username');
        $connect->execute(array(1, $activate));
        $_SESSION['notif'] = "Your Email Notifications are enabled";
        header('Location email_notif');
    }

    if($activate == 0)
    {
        $connect = new pdo($dsn, $user, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connect->prepare('UPDATE user SET emailNotif = :? WHERE username = :username');
        $connect->execute(array(0, $activate));
        $_SESSION['notif'] = "Your Email Notifications are disabled";
        header('Location: email_notif.php');
    }
}
catch(PDOException $e)
{
    $_SESSION['notif'] = "Error, There is something wrong";
    header("Location: email_notif.php");
}
