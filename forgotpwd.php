<html>
<head>
	<link rel="stylesheet" href="style.css"> 
</head>
	<form action="forgotpwd.php" method="POST"><br>
		Enter Current email:<br><input type="email" name="e" required><br><br>
		<input type="submit" name= "email_address" value="submit"><br><br>
		<script type='text/javascript'>alert('THE GAME');</script>
		
	<form>
</html>


<?php

include_once 'config/database.php';

//$email = $_POST['e'];
$email = filter_var($_POST['e'], FILTER_SANITIZE_EMAIL);

try
{
	$dsn = "mysql:host=$server;dbname=$db";
	$connect = new PDO($dsn, $user, $password);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if(!empty($email))
	{	
		if(isset($email))
		{
			$stmt = $connect->prepare("SELECT * FROM users WHERE email_address = '$email'");
			$stmt->bindValue('email_address', $email);
			$stmt->execute(['email_address' => $email]);
			$usr = $stmt->fetch();
			if($email == $usr[5] && $usr[6] == 1)
			{
				$email_cont = "Camagru Forgot Password";
  				$head = "From noreply@camagruteam.co.za" . "\r\n";
				$head .= 'MIME-Version: 1.0' . "\r\n";
				$head .= 'Content-type:text/html charset=iso-8859-1<br><br>';
				$content = "Hey $fname $lname. <br> We have noticed that you have forgoten your password. <br>
						to enter a new password Please click the link below <br><br>
						<a href='http://localhost:8080/camagru/reset_pwd.php?action=reset&email=$email'>Change password</a> <br><br>
						From: The Camagru team";
				
				if(mail($email, $email_cont, $content, $head))
				{
					echo 'Password Recovery key has been sent to your email address.';
				}
				else
				{
					echo 'No user with this email was found';
				}
				
			}
			else
			{
				echo 'User does not exist';
			}
		}
		else
		{
			echo 'This email is false';
		}
	}
	
}
catch(PDOException $e)
{
	echo $e;
}
?>
