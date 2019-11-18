<html>
	<form action="forgotpwd.php" method="POST"><br>
		Enter Current email:<br><input type="email" name="e" required><br>
		<input type="submit" name= "ForgotPassword" value="Request Reset">
	<form>
</html>

<?php
include_once 'config/database.php';

$email = $_POST['email_address'];

try
{
	if(!empty($_POST['email_address']) )
	{
		if(isset($_POST['email']))
		{
			$connect = new PDO($dsn, $user, $password);
			$connect->setAttribute(PDO::ATRR_ERRMODE, PDO::ERROMODE_EXCEPTION);
			$mys= 'SELECT email_address FROM users WHERE email_address= :email_address';
			$stmt = $connect->prepare($mys);
   			$stmt->bindValue('email_address', $email);
   			$stmt->execute(['email_address' => $email]);
	   		$usr = $stmt->fetch();
   			if($usr[6] == $email)
			{
   				$email_cont = "Camagru Forgot Password";
   				$head = "From noreply@camagruteam.co.za" . "\r\n";
    			$head .= 'MIME-Version: 1.0' . "\r\n";
   				$head .= 'Content-type:text/html; 
  		  		charset=iso-8859-1' . "\r\n";
 	  			$content = "Hey $fname $lname. <br> We have noticed that you requested to you want to change your password. <br> Please click here <a href='http://localhost:8080/cha_pwd.php?email=$email'>CHANGE</a> <br><br>
		   	 				From: The Camagru team";
				if (mail($email, $email_cont, $content, $head))
				{
					echo 'Click the change link to continue';
				}
				else 
				{
					echo 'Email not successfully sent';
				}
			}
			else
			{
				echo 'Enter you email address';
			}
		}
	}
}
catch(PDOException $e)

{
	echo $e;  //'error, fill in the missing field';
}

?>

