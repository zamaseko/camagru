<?php

include 'database.php';

$connect = new PDO($dsn, $user, $password);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try
{
	
	$sql =  "CREATE TABLE IF NOT EXIST users 
			(`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
		 	`username` VARCHAR(20) NOT NULL , 
		  	`firstname` VARCHAR(20) NOT NULL , 
		  	`lastname` VARCHAR(20) NOT NULL , 
		  	`email_address` TEXT  NOT NULL , 
		  	`password` VARCHAR(20) NOT NULL , 
			`verified` INT(1) NOT NULL DEFAULT 0)"; 
			
			$connect->exec($sql);
}
catch(PDOException $e)
{
	echo "Users table not created successfully\n"; 
}
try
{
	$sql = "CREATE TABLE IF NOT EXIST media 
			(`media_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
		  	`media` TEXT NOT NULL , 
		  	`media_date` TIMESTAMP NOT NULL , 
		  	`media_name` TEXT NOT NULL , 
		  	`media_size` VARCHAR(255) NOT NULL)";  
			
			$connect->exec($sql);
}
catch(PDOException $e)
{
	echo 'Users table not created successfully'; 
}
try
{
	$sql = "CREATE TABLE IF NOT EXIST likes 
			(`like_id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		  	`like_media` INT(11) NOT NULL , 
			`like` INT(11) NOT NULL)"; 
			
			$connect->exec($sql); 
}
catch(PDOException $e)
{
	echo "Likes table not created successfully\n"; 
}
try
{		
			$sql .= "CREATE TABLE IF NOT EXIST comment 
			(`comment_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
		  	`comment_media` INT(40) NOT NULL ,
		  	`comment` TEXT NOT NULL)";
			
}
			catch(PDOException $e)
{
	echo $e;//'Users table not created successfully'; 
}
?>
