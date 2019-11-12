<?php
require_once 'config/database.php';

$login = $_SESSION['username'];
if($login == 'yes')
{
    try
    {
	    $connect = new pdo($dsn, $user, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connect->prepare('UPDATE user SET mailNotif = ? WHERE username = ?');
        $connect->execute(array(1, $login));
        $_SESSION['notif'] = "Your Email Notifications are enabled";
        header('Location email_notif');
    }
}
if($login == 'No')
 {
    try
    {
        $connect = new pdo($dsn, $user, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connect->prepare('UPDATE user SET mailNotif = ? WHERE username = ?');
        $connect->execute(array(0, $login));
        $_SESSION['notif'] = "Your Email Notifications are disabled";
        header('Location: email_notif.php');
    }
}

catch($PDOException $e)
{
    $_SESSION['notif'] = "Error, There is something wrong";
    header("Location: email_notif.php");
}
?>
