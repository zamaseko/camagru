<html>
<head>
</head>
	<nav>
	<h2>camagru</h2>
	</nav>
<form>
	Firstname: <br><input type="text" name="fn" action="POST" ><br>
	Surname: <br><input action="POST" name="sn"><br>
	Username: <br><input action="POST" name="u"><br>
	email address:<br><input type="text" name="e" action="POST"><br>
	Password:<br><input type="password" name="p1" action="POST"><br>
	Re-enter Password: <br><input type="password" name="p2" action="POST"><br>
	<input type="submit" name="submit"  value="Register" >
</form>
</html>

<?php

$server = 'localhost';
$user = 'root';
$db = 'camagru_db';
$password = 'zandilem';
$usrname = $_POST['username'];
$passwd = $_POST['password'];
$passwd2 = $_POST['password'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email_address'];
try
{
	$dsn = "mysql:host=$server;dbname=$db";
	$connect = new pdo($dsn, $user, $password);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if (empty($usrname) && empty($passwd) && empty($email) && empty($firstname) && empty($lastname))
	{
	$mysql = $connect->query('SELECT username, password, email_address FROM users WHERE username = :username, password = :password OR email_address = :email_address');
		//$mysql = $connect->query('INSERT INTO users (username, firstname, lastname, email_address, password');
		$stmt = $connect->prepare($mysql);
		$stmt->execute(['username' => $usrname, 'firstname' => $fname, 'lastname' => $lname, 'email_address' => $email, 'password' => $passwd]);
		$usr = $stmt->fetch();
		$email_add = filter_var($email_add, FILTER_SANITIZE_EMAIL);
		if(!isset($_POST['username']) && !isset($passwd) && !isset($fname) && !isset($lname) && !isset($email))
		{
			if(empty($usrname))
			{
				if($usrname < 3)
				{:
					echo 'Username is too short';
				}
				else
				{
					$_SESSION['username'];
					header('login.php');
				}
			}
			if(!filter_var($email_add, FILTER_SANITIZE_EMAIL))
			{
				if(!isset($email))
				{
					echo 'Please enter a valid password';
				}
				else
				{	
					$email_add = filter_var($email_add, FILTER_SANITIZE_EMAIL);
				}
			}
			if (empty($passwd))
			{
				$passwd = $_POST['password'];
				if(!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $passwd))
				{
					echo 'Your password should at least have 1 uppercase, 1 symbol and 1 number';
				}
				else 
				{
					echo 'Your Password is Strong';
				}
			}
			if (isset($passwd))
			{
				if(preg_match($passwd2, $passwd))
				{
					echo 'Passwords Match';
				}
				else
				{
					echo 'The passwords do not match';
				}
			}
		}  
		else
	  	{
			header("Location: verif.php");
		}
	}
}

catch(PDOException $e)
{
	echo 'Registration unsucessfull. Try again!!';
}
?>
