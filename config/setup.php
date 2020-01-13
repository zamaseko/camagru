<?php

include 'database.php';

$dsns = "mysql:host=$server";
try
{
	$connect = new PDO($dsns, $user, $password);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$mysq = "CREATE DATABASE camagru_db";
	$connect->exec($mysq);
	echo "Database successfully created<br>";

		$sql1 = "CREATE TABLE  camagru_db.users (
			id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
		 	username varchar(20) NOT NULL UNIQUE KEY  , 
		  	firstname varchar(20) NOT NULL , 
			lastname varchar(20) NOT NULL , 
			pass_word varchar(255) NOT NULL ,
		  	email_address varchar(255)  NOT NULL UNIQUE KEY, 
			verified int(1) NOT NULL DEFAULT 0,
			vkey varchar(255) NOT NULL,
			notif int(1) NOT NULL DEFAULT 1
			)";
			$connect->exec($sql1);
			echo "Users table created successfully<br>";
			
			$sql2 = "CREATE TABLE camagru_db.media (
			media_id int NOT NULL AUTO_INCREMENT PRIMARY KEY, 
			o_vkey varchar(255) NOT NULL , 
		  	media_date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP , 
		  	media_path text NOT NULL ,
			caption text NULL  
			)";  
			$connect->exec($sql2);
	echo "Media table created successfully<br>";

		$sql3 = "CREATE TABLE camagru_db.likes (
			like_id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		  	like_media int NOT NULL DEFAULT 0 , 
			like_user text NOT NULL 
				)"; 
			$connect->exec($sql3); 
			echo "Likes table created successfully<br>";
			
			$sql4 = "CREATE TABLE camagru_db.comments (
			id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
			comment_owner text NOT NULL, 
		  	image_id int NOT NULL ,
			comment text NOT NULL,
			com_date datetime DEFAULT CURRENT_TIMESTAMP
			)";
			$connect->exec($sql4);
			echo "Comments table created successfully<br>";
}
catch(PDOException $e)
{
	echo $e;'Users table not created successfully';
}


?>

