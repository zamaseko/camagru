<html>

	<nav>
	<h2>camagru</h2>
	</nav>
<form>
	Firstname: <br><input type="text" action="POST" ><br>
	Surname: <br><input action="POST" name="name"><br>
	Username: <br><input action="POST" name="name"><br>
	Password:<br><input type="password" action="POST"><br>
	Re-enter Password: <br><input type="password" action="POST"><br>
	email address:<br><input type="text" action="POST"><br>
	<input type="button" value="Submit" >
</form>
</html>

<?php

$server = $'localhost';
$user = 'root';
$db = 'camagru_db';
$password = 'zandilem';
$username = $_POST['username'];
$passwd = $_POST['password'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST[''];

	$dsn = "mysql:host=$server;dbname=$db";
	$connect = new pdo($dsn, $user, $password);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if (empty($username) && empty($passwd) && empty($email) && empty($firstname) && empty($lastname))
	{
		$mysql = $connect->query(INSERT INTO users);
		$stmt = $connect->prepare($mysql);
		$stmt->execute();
        $usr = $stmt->fetch();
		if(!isset($username) && !isset($passwd) && !isset($fname) && !isset($lname) && !isset($email))
		{

		}
	}
?>
