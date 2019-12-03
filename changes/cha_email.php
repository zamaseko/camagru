<html>
	<form action="cha_email.php" method="POST"><br>
		Enter Current email:<br><input type="email" name="pre_e" required><br><br>
		Enter New Desired Eamil: <br><input type="email" name="new_e"required><br><br>
		<input type="submit" name="email_address" value="submit"><br><br>
	<form>
</html>

<?php

include_once '../config/database.php';

$pre_e = $_POST['pre_e'];
$new_e = $_POST['new_e'];

try
{
    $dsn = "mysql:host=$server;dbname=$db";
    $connect = new PDO($dsn, $user, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(!empty($pre_e) && !empty($new_e))
    {
        if(isset($pre_e) )//&& isset($new_e))
        {
			
		    $stmt = $connect->prepare('SELECT * FROM users WHERE email_address = :email_address');
    		//$stmt = $connect->prepare('SELECT username, email_address FROM users WHERE username =:username AND email_address = :email_address');
            $stmt->bindValue(':email_address', $pre_e);
          // $stmt->bindValue('username', $usrname);
           $stmt->execute(['email_address' => $pre_e]);
           //  $stmt->execute(['username' => $us])
    		$usr = $stmt->fetch();
            if($pre_e)
		    {
				
				if ($usr[5] == $pre_e)
                {
                    $email_cont = "Camagru change username";
      		    	$head = "From noreply@camagruteam.co.za" . "\r\n";
	        		$head .= 'MIME-Version: 1.0' . "\r\n";
	    	    	$head .= 'Content-type:text/html charset=iso-8859-1<br><br>';
                    $content = "Hey $fname $lname. <br> We have noticed that you requested to change you username <br>
                       $usrname <br><br>
		    			In order to change your username please click the link below <br><br>
	    				<a href='http://localhost:8080/camagru/changes/update_username.php?action=change_u&email=$pre_e&new=$new_e'>Change username</a> <br><br>
                        From: The Camagru team";
                        				
			        if(mail($pre_e, $email_cont, $content, $head))
		        	{
    			    	echo 'Email change request sent to your email address.';
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
