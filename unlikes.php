<?php
include "config/database.php";
//$id = $_POST['media_id'];
$use =$_SESSIONS['vkey'];
//$action = $_POST['action'];
if(isset($use))
{
    echo 'hello';
}
if ($action=='unlike')
{
    
    $sql = $connect->prepare("SELECT * FROM likes WHERE like_user = :like_user");
    $sql->execute([$id,$use]);
    $usr =$connect->rowCount();
 if ($usr != 0)
{
    $sql= $connect->prepare("DELETE FROM likes WHERE like_id=? AND like_user=?");
    $sql->execute([$id,$use]);
    $sql=$connect->prepare("UPDATE media SET med_like = -1 WHERE like_id=?");
    $sql->execute([$id]);
 }
}
?>