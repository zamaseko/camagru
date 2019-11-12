<?php

include 'database.php';

$connect = new pdo($dsn, $user, $password);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try
{ 
	$sql =  CREATE TABLE `camagru_db`.`users` 
			(`id` INT NOT NULL AUTO_INCREMENT , 
		 	 `username` VARCHAR(20) NOT NULL , 
		  	`firstname` VARCHAR(20) NOT NULL , 
		  	`lastname` VARCHAR(20) NOT NULL , 
		  	`email_address` VARCHAR(100) NOT NULL , 
		  	`password` INT(20) NOT NULL , 
		  	`verified` INT NOT NULL DEFAULT '0',
		 	 PRIMARY KEY (`id`)) ENGINE = InnoDB; 

	$sql .= CREATE TABLE `camagru_db`.`media` 
			(`media_id` INT(11) NOT NULL AUTO_INCREMENT , 
		  	`media` BLOB NOT NULL , 
		  	`media_date` TIMESTAMP NOT NULL , 
		  	`media_name` TEXT NOT NULL , 
		  	`media_size` VARCHAR(255) NOT NULL ,
		 	 PRIMARY KEY (`media_id `)) ENGINE = InnoDB;  

	$sql .=  CREATE TABLE `camagru_db`.`likes` 
			(`like_id` INT(11) NOT NULL AUTO_INCREMENT ,
		  	`like_media` INT(11) NOT NULL , 
		  	`like` INT(11) NOT NULL , 
		  	PRIMARY KEY (`like_id`)) ENGINE = InnoDB; 

	$sql .= CREATE TABLE `camagru_db`.`comment` 
			(`comment_id` INT NOT NULL AUTO_INCREMENT , 
		  	`comment_media` INT(40) NOT NULL ,
		  	`comment` TEXT NOT NULL ,
		  	PRIMARY KEY (`comment_id`)) ENGINE = InnoDB;

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
