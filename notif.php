<?php  include "head.php" ?>

<html>
    <style>
    .notif{
        font-size: large;
    }
    </style>
    <body>
    <p class="notif"> Do you want to recieve your notifications? </p> 
        <button type=”checkbox” onclick="window.location.href='notif_on.php';" name=”affirmative” value=”yes” checked>Yes</button>
        <button type=”radio” onclick="window.location.href='notif_off.php';"name=”negative” value=”no”>No</button>
    </body>

</html>
<?php
try{

include "config/database.php";

$use = $_GET['usr'];
$dsn = "mysql:host=$server;dbname=$db";
$connect = new PDO($dsn, $user, $password);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $connect->prepare("SELECT * FROM users WHERE notif = :notif");
//$stmt->bindValue(':username', $use);
//$stmt->execute(['username' => $use]);
$usr = $mys->fetch();
$usr_n = $usr[8];
header("Location: notif.php?usr=");
    //if($use == $usr[1])
//{
//    $stmt = $connect->prepare("UPDATE users SET notif = '1' WHERE vkey =:vkey");
  //  $stmt->bindParam(':vkey', $vkey);
    //$stmt->execute();
//}
//else
//{
 //   echo 'You can still recieve notifications';
//}
}
catch(PDOException $e)
{
   echo $e;
}

?>