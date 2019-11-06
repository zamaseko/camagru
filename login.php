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
			<input type="login.php"  action="POST" name="name" placeholder="username or email"> <br>
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

<?php

$host = 'localhost';
$user = 'root';
$db = 'camagru_db';
$password = 'zandilem';
$username = $_POST['username'];
$passwd = $_POST['password'];

$dsn = 'mysql:host=' $host . ';db='. $db;
$connect = new pdo($dsn, $user, $password);
$stmt = $connect->query(SELECT * FROM 'users');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (!empty($username) && isset($passwd)
{

}
?>
