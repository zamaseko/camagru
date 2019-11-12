<?php

include 'database.php';

$connect = new pdo($dsn, $user, $password);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try
{ 
	$sql =  CREATE TABLE `camagru_db`.`users` 
		( `id` INT NOT NULL AUTO_INCREMENT , 
		  `username` VARCHAR(20) NOT NULL , 
		  `firstname` VARCHAR(20) NOT NULL , `lastname` VARCHAR(20) NOT NULL , 
		  `email_address` VARCHAR(100) NOT NULL , 
		  `password` INT(20) NOT NULL , 
		  `verified` INT NOT NULL DEFAULT '0',
		  PRIMARY KEY (`id`)) ENGINE = InnoDB; 

	$sql .= "CREATE TABLE IF NOT EXISTS 'media'(
	media_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	media BLOB NOT NULL,
	media_date DATETIME NOT NULL,
	media_name VARCHAR(40) NOT NULL,
	media_size VARCHAR(11) NOT NULL)";

	$sql .= "CREATE TABLE  IF NOT EXISTS 'likes'(
	like_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	liked_media INT(11) NOT NULL,
	like_user INT(11) NOT NULL)";

	$sql .= "CREATE TABLE  IF NOT EXISTS 'comments'(
	comment_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	comment_media VARCHAR(40) NOT NULL,
	comment TEXT NOT NULL)";
	
//exec()used because it executes an external program and returns the last line of the output
//also used because no results are returned.
$sql = " INSERT INTO user (id,  username, firstname, lastname, password, email_address, verified)";
$connect->exec($sql);
}
catch(PDOException $e)
{
	echo 'Error!!! Table not succefully created';
}
?>
