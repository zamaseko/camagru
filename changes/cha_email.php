<?php include '../head.php' ?>
<html>
<head>
	<link rel="stylesheet" href="../style.css"> 
</head>
	<form action="cha_email.php" method="POST"><br>
		Enter Username:<br><input type="text" name="username" required><br><br>
		Enter Current email:<br><input type="email" name="pre_e" required><br><br>
		Enter New Desired Email: <br><input type="email" name="new_e"required><br><br>
		<script type='text/javascript'>alert('THE GAME');</script>
	<form>
</html>

<?php



$eml = $_POST['pre_e'];
$neml = $_POST['new_e'];
$usrn = $_POST['username'];

try
{
    $dsn = "mysql:host=$server;dbname=$db";
    $connect = new PDO($dsn, $user, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(!empty($eml) && !empty($neml) && !empty($usrn))
    {
        if(isset($eml) && isset($neml) && isset($usrn))
        {
		    $stmt = $connect->prepare('SELECT * FROM users WHERE username = :username');
    		$stmt->bindValue('username', $usrn);
            $stmt->execute(['username' => $usrn]);
           	$usr = $stmt->fetch();
            if($eml && $usrn)
		    {
                if ($usr[5] != $neml)
                {
					$email_cont = "Camagru change email address";
      		    	$head = "From noreply@camagruteam.co.za" . "\r\n";
	        		$head .= 'MIME-Version: 1.0' . "\r\n";
	    	    	$head .= 'Content-type:text/html charset=iso-8859-1<br><br>';
                    $content = "Hey $usrn. <br> We have noticed that you requested to change you email address <br>
                        <br><br>
		    			In order to change your email address please click the link below <br><br>
	    				<a href='http://localhost:8080/camagru/changes/update_email.php?email=$eml&new=$neml&usr=$usrn'>Change email address</a> <br><br>
                        From: The Camagru team";
                        				
			        if(mail($eml, $email_cont, $content, $head))
		        	{
    			    	echo 'Email address change request sent to your email address.';
	    		    }
		    	    else
			        {
				        echo 'No user with this email was found';
    			    }
                }
                else 
                {
                    echo 'The email address already exists, please enter a new one';
                }
	    	}
		    else
		    {
			    echo 'User does not exist';
	    	}
        }
    	else
	    {
		    echo 'Check if the email is correct';
        }
	}
	else
	{
		echo 'Please fill in the required fields';
	}
}
catch(PDOExpectation $e)
{
    echo $e;
}
?>
