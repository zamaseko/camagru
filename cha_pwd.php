<html>
	<head>
	<title>Password Change</title>
	</head>
	<form action="cha_pwd.php" method="POST"> <br>
	Enter Email Address: <br><input type="text/email" name="ea" required> <br>
	Enter Desired Password:<br><input type="" name="p1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
    Re-enter Desired: <br><input type="password" name="p2" required><br>
    <input type="submit" value="Submit">

	</form>
</html>

<?php
try
{
	$email = trim($_GET['ea']);
	$cpwd = trim($_POST['p1']);
	$cpwd2 = trim($_POST['p2']);
	if(!empty($cpwd))
	{
		echo 'hello';
		die();
		if(isset($cpwd) && isset($cpwd2))
		{
			if($cpwd == $cpwd2)
			{
				header("Location:updatepwd.php?email=$email&p=$cpwd");
			}
		}
		else 
			echo 'fill in the desired fields';
	}
	else 
	{
		echo 'Fill in desired fields';
	}
}
catch(PDOException $e)
{
	echo $e;
}
?>
