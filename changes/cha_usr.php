<html>
	<form action="cha_usr.php" method="POST"><br>
		Enter Current email:<br><input type="email" name="u_e" required><br><br>
		Desired New Username:<br><input type="text" name="uname" required><br><br>
		<input type="submit" name= "email_address" value="submit"><br><br>
	<form>
</html>


<?php

include_once '../config/database.php';


$eml = $_POST['u_e'];
$usrn = $_POST['uname'];

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
    		//$stmt = $connect->prepare('SELECT username, email_address FROM users WHERE username =:username AND email_address = :email_address');
            $stmt->bindValue(':email_address', $eml);
          // $stmt->bindValue('username', $usrname);
           $stmt->execute(['email_address' => $eml]);
           //  $stmt->execute(['username' => $us])
    		$usr = $stmt->fetch();
            if($eml)
		    {
                if ($usr[1] != $usrn)
                {
                    $email_cont = "Camagru change username";
      		    	$head = "From noreply@camagruteam.co.za" . "\r\n";
	        		$head .= 'MIME-Version: 1.0' . "\r\n";
	    	    	$head .= 'Content-type:text/html charset=iso-8859-1<br><br>';
                    $content = "Hey $fname $lname. <br> We have noticed that you requested to change you username <br>
                       $usrname <br><br>
		    			In order to change your username please click the link below <br><br>
	    				<a href='http://localhost:8080/camagru/changes/update_username.php?action=change_u&email=$eml&usr=$usrn'>Change username</a> <br><br>
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
