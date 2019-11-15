

<?php
session_start();
include ('config/database.php');

$usrname = $_POST['username'];
$email = trim($_POST['email_address']);
$passwd = $_POST['pass_word'];
$mysql = 'INSERT INTO `camagru_db` users (username, email_address, pass_word) VALUE ($usrname, $email, $passwd)';
try
{
    $connect->prepare();
    $connect->exec($mysql);
    if($email_address)
    {
        echo "Press the link to continue";
        header(Location: login.php);
        
    }
}
?>
