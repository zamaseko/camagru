<html>
<head>
	<link rel="stylesheet" href="../style.css"> 
</head>
        <form action="cha_passwd.php" method="POST"><br>
                Enter Current email:<br><input type="email" name="u_e" required><br>
                Previous Password: <br><input type="text" name="pwd" required><br>
                New Password: <br><input type="password" name="pwd2" required><br><br>
                <input type="submit"  value="submit"><br><br>
        <form>
</html>


<?php

include_once '../config/database.php';


$eml = strip_tags($_POST['u_e']);
$pwd = md5($_POST['pwd']);
$pwd2 = md5($_POST['pwd2']);

try
{
    $dsn = "mysql:host=$server;dbname=$db";
    $connect = new PDO($dsn, $user, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(!empty($eml) && !empty($pwd) && !empty($pwd2))
    {
        if(isset($eml) && isset($pwd) && isset($pwd2))
        {
            $stmt = $connect->prepare('SELECT * FROM users WHERE email_address = :email_address');
            $stmt->bindValue(':email_address', $eml);
            $stmt->execute(['email_address' => $eml]);
            $usr = $stmt->fetch();
            if($eml && $pwd)
            {
                if ($usr[4] != $pwd2)
                {
                    $email_cont = "Camagru change password";
                        $head = "From noreply@camagruteam.co.za" . "\r\n";
                                $head .= 'MIME-Version: 1.0' . "\r\n";
                        $head .= 'Content-type:text/html charset=iso-8859-1<br><br>';
                    $content = "Hey $fname $lname. <br> We have noticed that you requested to change you password <br>
                       $usrname <br><br>
                                        In order to change your username please click the link below <br><br>
                                        <a href='http://localhost:8080/camagru/changes/update_password.php?email=$eml&upass=$pwd&pass2=$pwd2'>Change password</a> <br><br>
                        From: The Camagru team";
                        
                                if(mail($eml, $email_cont, $content, $head))
                                {
                                echo 'Password change request sent to your email address.';
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
