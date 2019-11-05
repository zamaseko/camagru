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
			<input type="text"  name="name" placeholder="username or email" > <br>
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
$password = '';
$user = $_POST['username'];
$passwd = $_POST['password'];


?>
