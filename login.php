
<?php
include 'config/database.php';

$usrname = $_POST['username'];
$passwd = $_POST['password'];
try
{
	$dsn = "mysql:host=$host;dbname=$db";
	$connect = new pdo($dsn, $user, $password);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//	if (empty($usrname) && empty($passwd))
	//	{
		
		if (isset($usrname) && isset($passwd))
		{
			
			$mysql = $connect->query('SELECT * FROM users WHERE username = :username & :password OR passwd = :password');
			$stmt = $connect->prepare($mysql);
			$stmt->execute(['username' => $usrname]);
			$usr = $stmt->fetch(PDO::FETCH_ASSOC);
			if($usrname == $usr[1])
			{
				if(!$passwd == $usr[4])
				{
					echo 'User is connected successfully';
				}
				if ($usr[6] == 0)
					echo 'You are not a verified user. Please press the sign up and folloe the instructions given';
				else if ($usr[6] == 1)
					echo 'Welcome to Camagru. You have activated your account successfully';
			}
			else 
				echo 'congratulations'; 
	//	}
	}
}
catch(PDOException $e)
{
	echo 'Your Username or Password is incorrect, please try entering them again';
}
?>

<html>
<head>
	<meta http-equiv="refresh" content="30">
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
