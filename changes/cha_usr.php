<html>
<head>
	<link rel="stylesheet" href="../style.css"> 
</head>
	<form action="cha_usr.php" method="POST"><br>
		Enter Current email:<br><input type="email" name="u_e" required><br><br>
		Enter Current Username:<br><input type="text" name="c_u" required><br><br>
		Desired New Username:<br><input type="text" name="uname" required><br><br>
		<input type="submit" name= "email_address" value="submit"><br><br>
	<form>
</html>


<?php

include_once '../config/database.php';


$eml = $_POST['u_e'];
$usrn = $_POST['uname'];
$c_us = $_POST['c_u'];

try
{
    $dsn = "mysql:host=$server;dbname=$db";
    $connect = new PDO($dsn, $user, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(!empty($eml) && !empty($usrn))
    {
        if(isset($eml) && isset($usrn))
        {
		    $stmt = $connect->prepare('SELECT * FROM users WHERE email_address = :email_address');
            $stmt->bindValue(':email_address', $eml);
            $stmt->execute(['email_address' => $eml]);
    		$usr = $stmt->fetch();
            if($eml)
		    {
                if ($usr[1] != $usrn)
                {
                    $email_cont = "Camagru change username";
      		    	$head = "From noreply@camagruteam.co.za" . "\r\n";
	        		$head .= 'MIME-Version: 1.0' . "\r\n";
	    	    	$head .= 'Content-type:text/html charset=iso-8859-1<br><br>';
                    $content = "Hey $c_us. <br> We have noticed that you requested to change your username from $c_us to $usrn<br>
                        <br><br>
		    			If this is true please click the link below <br><br>
	    				<a href='http://localhost:8080/camagru/changes/update_username.php?email=$eml&usr=$usrn'>Change username</a> <br><br>
                        From: The Camagru team";
                        				
			        if(mail($eml, $email_cont, $content, $head))
		        	{
    			    	echo 'Username change request sent to your email address.';
	    		    }
		    	    else
			        {
				        echo 'No user with this email was found';
    			    }
                }
                else 
                {
                    echo 'eish';
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
}
catch(PDOExpectation $e)
{
    echo $e;
}
?>
