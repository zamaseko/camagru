
<?php

$server = 'localhost';
$user = 'root';
$db = 'camagru_db';
$password = 'zandilem';
$username = $_POST['username'];
$passwd = $_POST['password'];
try
{
	$dsn = "mysql:host=$host;db=$db";
	$connect = new pdo($dsn, $user, $password);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if (!empty($username) && !empty($passwd))
	{
		if (isset($username) && isset($passwd))
		{
			$mysql = $connect->query('SELECT * FROM users WHERE username = :username & password');
			$stmt = $connect->prepare($mysql);
			$stmt->execute('[username]');
			$usr = $stmt->fetch();
			if($username == $usr[1])
			{
				if(!$passwd == $usr[4])
				{
					echo 'User is connected successfully';
					session_start();
				}
			}
		
		}
	}
}
catch(PDOException $e)
{
	echo 'Username or Password is incorrect';
}
?>

<html>
<head>
	<meta http-equiv="refresh" content="2">
	<title>Camagru-login page</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="box">
		<form>	
		<div>	
			<h2 class="app-name">camagru<h2>
			<input type="login.php"  action="POST" name="name" placeholder="username"> <br>
			<input type="text" name="password" placeholder="password" > <br>
			<input type="button" value="Login">
		</div>
		<div>
			<a href="#" type="button">Sign Up</a><br><br>
			<a href="#" type="button">Forgot Password?</a>
		</div>
		</form>
	</div>
</body>
</html>
