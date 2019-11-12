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
	if (empty($usrname) && empty($passwd) && empty($passwd2) && empty($email) && empty($fname) && empty($lname))
	{
		if(isset($usrname) && isset($passwd) && isset($passwd2) && isset($email) && isset($fname) && isset($lname))
		{
		//	$mysql = $connect->query("SELECT username, email_address FROM users WHERE username=:username OR email_address=:email-address");
			$mysql = "SELECT `id`, `username`, `firstname`, `lastname`, `password`, `email_address`, `verified` FROM `users` WHERE 1";
			$stmt = $connect->prepare($mysql);
			$stmt->execute(['username' => $usrname, 'firstname' => $fname, 'lastname' => $lname, 'email_address' => $email, 'password' => $passwd]);
			$usr = $stmt->fetch();
			{
				if($usr[1] != $usrname && $usr[4] != $email)
				{
					$email_add = filter_var($email_add, FILTER_SANITIZE_EMAIL);
					if(filter_var($email_add, FILTER_SANITIZE_EMAIL))
					{
						if(preg_match($passwd2, $passwd))
						{
							if(!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $passwd))
							{
								echo 'Your password should at least have 1 uppercase, 1 symbol and 1 number';
							}
						}
						else
						{
							$pass = $usrname . $email_Add;
							$phash = md5($pass);
							$email_cont = "Regitration for Camagru";
							$head = "From noreply@camagruteam.co.za" . "\n";
							$head .= 'MIME-Version: 1.0' . "\n";
							$head .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
							$content = "Welcome $fname $lname. <br> You have successfully signed up for Camagru. <br>
							as a new member is simple to login. Just use $usrname and $passwd to login. <br>
							The follwing email is to verify you as a member.Please click the link and follow to verify and
							activate your account. <br>
							Please check if this is you <br>	
							
							Username: $usrname <br>
								If this is your chosen username please click the link below: <br>
							<a href='http://localhost:8080/camagru/register.php?'>Click me </a><br><br>
							From: The Camagru team";
					
							$mysql = "INSERT INTO `users`( `username`, `firstname`, `lastname`, `password`, `email_address`) VALUES (?, ?, ?, ?, ?, )";
							$stmt = $connect->prepare($mysql);
							$stmt->execute([$usrname, $fname,$lname, $passwd, $email_address]);
							if (mail($email_add, $email_cont, $content, $head))
							{
								echo 'Verification email successfully received';
							}
							else 
							{
								echo 'There was an error, the email was not properly sent';
							}
						}	
					}
					else 
					{
						echo 'Please add a valid email address';
					}
				}
				else
				{
					echo 'please proceed';
				}
			}
		}
		else
		{
			echo 'Fill in all relevant fields';
		}
	}
}	
catch(PDOException $e)
{
	echo 'Registration unsucessfull. Try again!!';
}
