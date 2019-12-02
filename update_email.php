<form action="updatepwd.php" method="POST">
    Previous Email: <br><input type ="email" required><br><br>
    <input type="submit" name= "email_address" value="Request email"><br><br>
</form>
<?php

include 'database.php';

try
{
    $email = $_POST['email_address'];

    if (!empty($email))
    {
        if(isset($email))
        {
            $dsn = "mysql:host=$server;dbname=$db";
			$connect = new PDO($dsn, $user, $password);
			$mys= $connect->query("SELECT email_address FROM users WHERE email_address=:email_address");
			$stmt = $connect->prepare($mys);
			$stmt->execute(['username' => $usrname, 'firstname' => $fname, 'lastname' => $lname, 'pass_word' => $passwd, 'email_address' => $email]);
			$usr = $stmt->fetch();
        }
    }
}
?>

