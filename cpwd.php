
<html>
<form action="cpwd.php" method="POST">
E-mail Address:<br> <input type="text" name="email" size="20" /><br />
New Password: <br> <input type="password" name="password" size="20" /><br>
Confirm Password: <br> <input type="password" name="cpwd" size="20" /><br>
<input type="hidden" name="did" value="submit"><br>
<input type="submit" name="reset" value="submit">
</form>
</html>

<?php
include 'config/database.php';
if (isset($_GET['']))
{
	if(isset($_GET['email']))
	{
		$email= $_GET['email'];
		try
		{
			$dsn = "mysql;host=$server;dbname=$db";
			$connect = new PDO($dsn, $user, $password);
			if(isset($_POST['reset']))
			{
				//$email = $_POST['email_address'];
				$passwd = $_POST['pass_word'];
				$passwd2 = $_POST['conpwd'];
				$phash = $_POST["did"];
				$reset = md5($passwd);
				if($reset == $phash)
				{
					if($passwd == $passwd2)
					{
						//$passwd = $passwd;
						$mys = 'UPDATE users SET pass_word = :pass_word WHERE email_address = :email_address';
						$stmt = $connect->prepare($mys);
						$stmt->bindParam(':pass_word', $passwd);
						$stmt->bindParam(':email_address', $email);
						{
							echo 'The password has been successfully changed';
						}
					}
					else
					{
						echo "The passwords dont match";
					}
				}
				else 
				{
					echo "password reset was not successful";
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e;	
		}
	}
}
?>
