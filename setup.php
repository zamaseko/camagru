<?php

include 'database.php';

$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try
{ 
<<<<<<< HEAD
	$sql =  CREATE TABLE `camagru_db`.`users`
=======
	$sql =  CREATE TABLE `camagru_db`.`users` 
>>>>>>> 35fc562b240289c64b40dc70568a68fdcbfd8d06
			(`id` INT NOT NULL AUTO_INCREMENT , 
		 	 `username` VARCHAR(20) NOT NULL , 
		  	`firstname` VARCHAR(20) NOT NULL , 
		  	`lastname` VARCHAR(20) NOT NULL , 
		  	`email_address` VARCHAR(100) NOT NULL , 
		  	`password` INT(20) NOT NULL , 
		  	`verified` INT NOT NULL DEFAULT '0',
<<<<<<< HEAD
		 	 PRIMARY KEY (`id`)); ENGINE = InnoDB; 

	$sql .= CREATE TABLE `camagru_db`.`media` 
			(`media_id` INT(11) NOT NULL AUTO_INCREMENT , 
		  	`media` TEXT NOT NULL, 
=======
		 	 PRIMARY KEY (`id`)) ENGINE = InnoDB; 

	$sql .= CREATE TABLE `camagru_db`.`media` 
			(`media_id` INT(11) NOT NULL AUTO_INCREMENT , 
		  	`media` BLOB NOT NULL , 
>>>>>>> 35fc562b240289c64b40dc70568a68fdcbfd8d06
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
<<<<<<< HEAD
			PRIMARY KEY (`comment_id`)) ENGINE = InnoDB;
try
{
	$connect->exec($sql);
	echo 'The Table was created'; 
}
catch($PDOException $e)
{
	echo 'Tables were not created';
}
=======
		  	PRIMARY KEY (`comment_id`)) ENGINE = InnoDB;
>>>>>>> 35fc562b240289c64b40dc70568a68fdcbfd8d06

//exec()used because it executes an external program and returns the last line of the output
//also used because no results are returned.
$sql = " INSERT INTO user (id,  username, firstname, lastname, password, email_address, verified)";
}
catch(PDOException $e)
{
	echo 'Error!!! Table not succefully created';
}
?>
