$email_add = filter_var($email_add, FILTER_SANITIZE_EMAIL);<html>
<head>
</head>
	<nav>
	<h2>camagru</h2>
	</nav>
<form>
	Firstname: <br><input type="text" name="fn" action="POST" ><br>
	Surname: <br><input action="POST" name="sn"><br>
	Username: <br><input action="POST" name="u"><br>
	Password:<br><input type="password" name="p1" action="POST"><br>
	Re-enter Password: <br><input type="password" name="p2" action="POST"><br>
	email address:<br><input type="text" name="e" action="POST"><br>
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
	//	$mysql = $connect->query('SELECT username, password, email_address FROM users WHERE username = :username, password = :password OR email_address = :email_address');
		$mysql = "INSERT INTO users (username, firstname, lastname, password, email_address)";
		$stmt = $connect->prepare($mysql);
		$stmt->execute(['username' => $usrname, 'firstname' => $fname, 'lastname' => $lname, 'email_address' => $email]);
		$usr = $stmt->fetch();
		$email_add = filter_var($email_add, FILTER_SANITIZE_EMAIL);
		if(!isset($_POST['username']) && !isset($passwd) && !isset($fname) && !isset($lname) && !isset($email))
		{
			if(filter_var($email_add, FILTER_SANITIZE_EMAIL))
			{
				if($_POST['password'])
				{
					if(strlen($passwd) < 9)
					{
						echo 'Password entered is too short';
					}

					else
					{
						echo 'Passwords do not match pleaes check an try again';
					}

				}
				else		
				{
					echo 'password correct';
				}
				}
			else
				echo 'Congratulations you have successfully registered, please check you email for the the verification link';
			}
	}
	echo 'You are a verified user please';
}	
catch(PDOException $e)
{
	echo 'Registration unsucessfull. Try again!!';
}
?>
