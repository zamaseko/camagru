<html>
<head>
</head>
	<nav>
	<h2>camagru</h2>
	</nav>
<form action="signup.php" method="POST">
	Firstname: <br><input type="text" name="fn" ><br>
	lastname: <br><input type="text" name="sn"><br>
	Username: <br><input type="text" name="u"><br>
	email address:<br><input type="text" name="e" ><br>
	Password:<br><input type="password" name="p1" ><br>
	Re-enter Password: <br><input type="password" name="p2" ><br>
	<input type="submit" value="Register" >
</form>
</html>

<?php
include "./config/database.php";
$server = 'localhost';
$user = 'root';
$db = 'camagru_db';
$password = 'zandilem';
$usrname = $_POST['u'];
$passwd = $_POST['p1'];
$passwd2 = $_POST['p2'];
$fname = $_POST['fn'];
$lname = $_POST['sn'];
$email = $_POST['e'];
try
{
	// $dsn = "mysql:host=$server;dbname=$db";
	// $connect = new pdo($dsn, $user, $password);
	// $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if (!empty($usrname) && !empty($passwd) && !empty($passwd2) && !empty($email) && !empty($fname) && !empty($lname))
	{
		if(isset($usrname) && isset($passwd) && isset($passwd2) && isset($email) && isset($fname) && isset($lname))
		{
			$mys= $connect->query("SELECT username, email_address FROM users WHERE username=:username OR email_address=:email-address");
			//$my = $connect->prepare('SELECT username, firstname, lastname, pass_word, email_address FROM users WHERE username = :username or email_address = :email_address');
			$stmt = $connect->prepare($mys);
			$stmt->execute(['username' => $usrname, 'firstname' => $fname, 'lastname' => $lname, 'pass_word' => $passwd, 'email_address' => $email]);
			$usr = $stmt->fetch();
			{
				if($usr[1] != $usrname && $usr[5] != $email)
				{
					if(filter_var(trim($email), FILTER_VALIDATE_EMAIL))
					{
						if($passwd == $passwd2
						{
							if(!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $passwd))
							{
								echo 'Your password should at least have 1 uppercase, 1 symbol and 1 number';
							}
							//if(strlen($passwd) < 8)
							//{
						//		echo 'The password is too short';
						//	}
						}
						else
						{
							$pass = $usrname . $email;
							$phash = md5($pass);
							$email_cont = "Regitration for Camagru";
							$head = "From noreply@camagruteam.co.za" . "\r\n";
							$head .= 'MIME-Version: 1.0' . "\r\n";
							$head .= 'Content-type:text/html; 
							charset=iso-8859-1' . "\r\n";
							$content = "Welcome $fname $lname. <br> You have successfully signed up for Camagru. <br>
							as a new member is simple to login. Just use $usrname and $passwd to login. <br>
							The follwing email is to verify you as a member.Please click the link and follow to verify and
							activate your account. <br>
							Please check if this is you <br><br>
							Username: $usrname <br><br>
							If this is your chosen username please click the link below: <br>
							<a href='http://localhost:8080/camagru/register.php?q=$phash'>Click me </a><br><br>
							From: The Camagru team";
					
<<<<<<< HEAD
							// $mysq = $connect->query('INSERT INTO users (username, firstname, lastname, pass_word, email_address) VALUES (?, ?, ?, ?, ?)');
							// $stmt = $connect->prepare($mysq);
							var_dump("we are here");

							try {
								$signup = $connect->prepare("INSERT INTO users(username, firstname, lastname, pass_word, email_address)VALUES (:username, :firstname, :lastname, :pass_word, :email_address)");
								$signup->bindParam(':username', $usrname);
								$signup->bindParam(':firstname', $fname);
								$signup->bindParam(':lastname', $lname);
								$signup->bindParam(':pass_word', $passwd);
								$signup->bindParam(':email_address', $email);
								$signup->execute();
							} catch (Exception $e) {
								echo $e->getMessage();
							}
							if ($signup) {
								if (mail($email, $email_cont, $content, $head))
								{
									echo 'Verification email successfully received';
								}
								else 
								{
									echo 'There was an error, the email was not properly sent';
								}
							} else {
								echo 'There was an error saving user to the database';
=======
							$connect = new PDO($dsn, $user, $password );
							$mysql = "INSERT INTO `users`(`id`, `username`, `firstname`, `lastname`, `password`, `email_address`, `verified`) VALUES ([?], [?], [?],[?], [?], [?], [?])";
							$stmt = $connect->prepare($mysql);
							$stmt->execute([$usrname, $fname,$lname, $passwd, $email_address]);
							if (mail($email_add, $email_cont, $content, $head))
							{
								echo 'Verification email successfully received';
							} 
							else 
							{
								echo 'There was an error, the email was not properly sent';
>>>>>>> 35fc562b240289c64b40dc70568a68fdcbfd8d06
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
<<<<<<< HEAD
?>
=======
$connect = null;
>>>>>>> 35fc562b240289c64b40dc70568a68fdcbfd8d06
