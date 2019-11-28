
<html>
<head>
       <!-- <meta http-equiv="refresh" content="30">-->
        <title>Camagru-login page</title>
        <link rel="stylesheet" href="style.css">
</head>
<body>
        <div class="box">
                <form  method="POST">
                <div>
                        <h2 class="app-name">camagru<h2>
                        <input type="login2.php"  method="POST" name="u" placeholder="username"> <br>
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

$usrname = trim($_POST['u']);
$passwd = md5(trim($_POST['pass_word']));

try
{
	
		$dsn = "mysql:host=$server;dbname=$db";
	 	$connect = new PDO($dsn, $user, $password);
	 	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 	$mys = $connect->prepare("SELECT username, pass_word FROM users WHERE username = :username AND pass_word = :pass_word");
	 	//$stmt = $connect->prepare($mys);
	 	$mys->bindValue(':username', $usrname);
		$mys->bindValue(':pass_word', $passwd);
	 	$mys->execute(['username' => $usrname, 'pass_word' => $passwd]);
	 	$usr = $mys->fetch();
	 	if($usrname == $usr[1]) // && $passwd == $usr[6]) 
		{
			var_dump($usr);
			echo "hello";
			//header("Location: head.php");
			//header('Location: http://localhost:8080/camagru/head.php?u=$usrname');
			// if ($usr[6] == $passwd)
			// {
			// 	
			// 	header('Location: head.php');
			// }
			// else 
			// {
			// 	echo 'The username/password combination is incorrect';
			// }
		}
		else
		{
			echo 'The username/password combination is incorrect';
		}
}
catch(PDOException $e)
{
	echo $e;
}
?>