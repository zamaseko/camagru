<?php

require_once('config/database.php');

$usrname = $_POST['username'];
$email = $_POST['email_address'];
$passwd = $_POST['password'];

$mysql = 'INSERT INTO `camagru_db` users (username, email_address, password) VALUE ($usrname, $email, $passwd)';
$connect->exec($mysql);
?>
