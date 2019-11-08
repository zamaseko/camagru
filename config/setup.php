<?php
$server = 'localhost';
$user = 'root';
$db = 'camagru_db';
$password = 'zandilem';

$dsn = 'mysql:host=' $host . ';db='. $db;
$connect = new pdo($dsn, $user, $password);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try
{ 
	$sql = "CREATE TABLE 'users' IF IT DOES NOT EXIST";
	(id INT(11) NOT NULL UNSIGNED AUTO_INCREMENT,
	username varchar(20) NOT NULL,
	firstname varchar(20) NOT NULL,
	lastname varchar(20) NOT NULL,
	password varchar(20) NOT NULL,
	email_address varchar(100) NOT NULL,
	verified INT(4));

	$sql = "CREATE TABLE 'media' IF NOT EXIST"(
	media_id INT(11) NOT NULL AUTO_INCREMENT,
	media BLOB NOT NULL,
	media_date DATETIME NOT NULL,
	media_name varchar(40) NOT NULL,
	media_size varcha(11) NOT NULL,);

	$sql = "CREATE TABLE likes IF NOT EXIST"(
	like_id INT(11) NOT NULL AUTO_INCREMENT,
	liked_media INT(11) NOT NULL,
	like_user INT(11) NOT NULL);

	$sql = "CREATE TABLE comments IF NOT EXIST"(
	comment_id INT(11) NOT NULL AUTO_INCREMENT,
	comment_media VARCHAR(40) NOT NULL,
	comment TEXT NOT NULL,);
}
//exec()used because it executes an external program and returns the last line of the output
//also used because no results are returned.

$connect->exec($sql);
echo 'Table created successfully!!!!!'; 
catch (PDOException)
{
	echo 'Error!!! Table with ' .$sql 'not succefully created';
}
?>



CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)
