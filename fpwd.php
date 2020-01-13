<?php

include_once 'config/database.php';

try
{
    $em = $_GET['email'];
    $opwd = $_GET['pass'];
    $dsn = "mysql:host=$server;dbname=$db";
    $connect = new PDO($dsn, $user, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $connect->prepare("UPDATE users SET  pass_word =:pass_word WHERE email_address =:email_address");
    $stmt->bindParam('pass_word', md5($opwd));
    $stmt->execute(['pass_word' => $opwd , 'email_address' => $em]);
    if($usr[4] == $opwd)
    {
        
        echo 'New Password not successfully been created';
    }
    else 
    {
        header("Location: index.php");
        echo 'New password created successful';
    }
}
catch(PDOException $e)
{
    echo $e;
}

?>
