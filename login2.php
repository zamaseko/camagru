
<html>
<head>
        <meta http-equiv="refresh" content="30">
        <title>Camagru-login page</title>
        <link rel="stylesheet" href="style.css">
</head>
<body>
        <div class="box">
                <form action="login2.php" method="POST">
                <div>
                        <h2 class="app-name">camagru<h2>
                        <input type="login.php"  method="POST"  placeholder="username"> <br>
                        <input type="password"  placeholder="password" > <br>
                        <input type="submit" value="Login">
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
include 'config/database.php';

$usrname = trim($_POST['username']);
$passwd = trim($_POST['pass_word']);

try
{
	var_dump("hello");
	die();
	if(isset($_POST['login']))
	{

		$dsn = "mysql:host=$server;dbname=$db";
	 	$connect = new pdo($dsn, $user, $password);
	 	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 	$mys = "SELECT username, password FROM users WHERE username = :username";
	 	$stmt = $connect->prepare($mys);
	 	$stmt->bindValue(':username', $usrname);
	 	$stmt->execute(['username' => $usrname]);
	 	$usr = $stmt->fetch();
	 	if($usr === false)
		{
			echo 'The username/password combination is incorrect';
		}
		else 
		{
			$vpasswd = password_verify($passwd, $usr['password']);
			if ($vpasswd)
			{
				$_SESSION['user_id'] = $usr['id'];
//				$_SESSION['logged_in'] = time();

				header('Location: home.php');
				//exit();
			}
			else 
			{
				echo 'The username/password combination is incorrect';
			}
		}
	}
}
?>
