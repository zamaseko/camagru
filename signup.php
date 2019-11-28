  
<html>
<head>
	<title>Camagru -Sign up </title>
	<link rel="stylesheet" href="style.css">
</head>
<div class="box2">
	<h2 class="app-name">camagru</h2> 
	<form action="signup.php" method="POST">
		Firstname: <br><input type="text" name="fn" required><br>
		lastname: <br><input type="text" name="sn" required><br>
		Username: <br><input type="text" name="u" required><br>
		email address:<br><input type="email" name="e" required><br>
		Password:<br><input type="password" name="p1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
		Re-enter Password: <br><input type="password" name="p2" required><br>
		<input type="submit" value="Register" >
<!--/div-->
</form>
</html>

<?php
include "./config/database.php";
//$server = 'localhost';
//$user = 'root';
//$db = 'camagru_db';
//$password = 'zandilem';
$usrname = $_POST['u'];
$passwd = $_POST['p1'];
$passwd2 = $_POST['p2'];
$fname = $_POST['fn'];
$lname = $_POST['sn'];
$email = $_POST['e'];
try
{
	if (!empty($usrname) && !empty($passwd) && !empty($passwd2) && !empty($email) && !empty($fname) && !empty($lname))
	{
		
		if(isset($usrname) && isset($passwd) && isset($passwd2) && isset($email) && isset($fname) && isset($lname))
		{
			$dsn = "mysql:host=$server;dbname=$db";
			$connect = new PDO($dsn, $user, $password);
			$mys= $connect->query("SELECT username, email_address FROM users WHERE username=:username OR email_address=:email_address");
			$stmt = $connect->prepare($mys);
			$stmt->execute(['username' => $usrname, 'firstname' => $fname, 'lastname' => $lname, 'pass_word' => $passwd, 'email_address' => $email]);
			$usr = $stmt->fetch();
			{
				if($usr[1] != $usrname && $usr[5] != $email)
				{
					if(filter_var(trim($email), FILTER_VALIDATE_EMAIL))
					{
						$vkey = "123456789ABCDEFGHIJKLMNavkfirutbeifgnhgkwjhD";
						$vkey = str_shuffle($vkey);
						$vkey = substr($vkey,0,30);
						$pass = $usrname;
						$phash = md5($pass);
						$email_cont = "Registration for Camagru";
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
						<a href='http://localhost:8080/camagru/register.php?action=signup&email=$email&vk=$vkey'>Click me </a><br><br>
						From: The Camagru team";
			
						try {
							//$signup = $connect->prepare("INSERT INTO users(username, firstname, lastname, pass_word, email_address, vkey)VALUES (?, ?, ?, ?, ?, ?)");
							$signup = $connect->prepare("INSERT INTO users(username, firstname, lastname, pass_word , email_address, vkey)VALUES (:username, :firstname, :lastname, :pass_word, :email_address, :vkey)");
							$signup->bindParam(':username', $usrname);
							$signup->bindParam(':firstname', $fname);
							$signup->bindParam(':lastname', $lname);
							$signup->bindParam(':pass_word', $passwd);
							$signup->bindParam(':email_address', $email);
							$signup->bindParam(':vkey', $vkey);
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
						} 
						else
						{
							echo 'There was an error saving user to the database';
						}
						 //$connect = new PDO($dsn, $user, $password );
					//	try {
					//		$signup = $connect->prepare("INSERT INTO users(username, firstname, lastname, pass_word , email_address)VALUES (:username, :firstname, :lastname, :pass_word, :email_address)");
					//		$signup->bindParam(':username', $usrname);
					//		$signup->bindParam(':firstname', $fname);
					//		$signup->bindParam(':lastname', $lname);
					//		$signup->bindParam(':pass_word', $passwd);
					//		$signup->bindParam(':email_address', $email);
					//		$signup->execute();
					//	} catch (Exception $e) {
					//		echo 'Error: ' . $e->getMessage();
					//	}
	
						// $mysq = "INSERT INTO users(username, firstname, lastname, pass_word , email_address) VALUES (:username, :firstname, :lastname, :pass_word, :email_address)";
						// $stmt = $connect->prepare($mysq);
						// try {
						// 	$stmt->execute([$usrname, $fname,$lname, $passwd, $email]);
						// } catch(PDOException $e)
						// {
						// 	echo $e;
						// }
					// var_dump($connect);
					//	var_dump($stmt);
					//	die();
					//	if (mail($email, $email_cont, $content, $head))
					//	{
					//		echo 'Verification email successfully received';
					//	} 
					//	else 
					//	{
					//		echo 'There was an error, the email was not properly sent';
					//	}
				//	}
				//	else 
				//	{
				//		echo 'Please add a valid email address';
					//}
				}
				else
				{
					echo 'please proceed';
				}
			}
			else
			{
				echo 'Fill in all relevant fields';
			}
		}
	}	
}
}
catch(PDOException $e)
{
	echo $e;'Registration unsucessfull. Try again!!';
}
