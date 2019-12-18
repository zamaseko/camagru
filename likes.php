<?php
$use = $_SESSION['vkey'];
include 'config/database.php';

//$id = $_POST['media_id'];
$use =$_SESSIONS['vkey'];
$action = $_POST['action'];
if ($action == 'like')
{
    $dsn = "mysql:host=$server;dbname=$db";
    $connect = new PDO($dsn, $user, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql= $connect->prepare("SELECT * FROM likes WHERE like_id = :like_id  and like_user = :like_user");
    $sql->execute([$id,$use]);
    $usr=$sql->rowCount();
    if($usr==0)
    {
        $sql=$connect->prepare("INSERT INTO likes (like_id, like_user) VALUES(?, ?)");
        $sql->execute(['like_user' => $user]);
        $sql=$connect->prepare("UPDATE media SET med_like = '1' WHERE med_like=?");
        $sql->execute([$id]);
    }
    else
    {
        echo "voetsek";
    }
}
?>
