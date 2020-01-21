<?php
include 'config/database.php';
//$usrname = "";
//$passwd = "";
if (isset($_POST['login']))
{
	$usrname = filter_var($_POST['username'], FILTER_SANITIZE_STRING); //($_POST['username']);
	$passwd =md5($_POST['pass_word']);
	try
	{
		$dsn = "mysql:host=$server;dbname=$db";
		$connect = new PDO($dsn, $user, $password);
		$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if (!empty($usrname) && !empty($passwd))	
		{
			if(isset($usrname) && isset($passwd))
			{
				$mys= "SELECT * FROM users WHERE username = :username";
				$stmt = $connect->prepare($mys);
				$stmt->bindValue(':username', $usrname);
				$stmt->execute(['username' => $usrname]);
				$usr = $stmt->fetch();
				if($usrname == $usr[1] && $passwd == $usr[4] && $usr[6] == 1)
				{
					session_start();
					$_SESSION['vkey'] = $usr[7];
					header("Location: head.php");	
				}
				else 
				{
					echo 'Username and password combination do not match';
				}
			}
			else
			{
				echo 'User may not be verified';
			}
		}
		else
		{
			echo 'Please fill in the fields';
		}
	}
	catch(PDOException $e)
	{
		echo $e;
	}
}
?>

<html>
<head>
        <title>Camagru-login page</title>
        <link rel="stylesheet" href="style.css">
</head>
<style>
div a{
	text-decoration: none;
}
</style>
<body>
        <div class="box">
                <form action="index.php"  method="POST">
                <div>
                        <h2 class="app-name">camagru<h2>
                        <input type="text"  method="POST" name="username" placeholder="username"> <br>
                        <input type="password" name="pass_word" placeholder="password" > <br>
                        <input type="submit" name="login" value="Login">
                </div>
                <div>
                        <a href="signup.php" type="button" >Sign Up</a><br><br>
                        <a href="forgotpwd.php" type="button">Forgot Password?</a><br>
						<a href="gallery2.php" type="button"> Gallery</a>
				</div>
                </form>
        </div>
		
</body>

</html>

