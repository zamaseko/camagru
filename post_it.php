<html>
    <form action='post_it.php' method="POST" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" value="upload">
</html>
<?php

include 'config/database.php';
function sanitize($clean_it)
{
    return htmlentities($clean_it, ENT_QUOTES, 'UTF-8');
}
$clean = sanitize();
$name = $_FILE['file']['name'];
$size = $_FILE['file']['size'];
//$type = $_FILE['file']['type'];
$temp_name = $_FILE['file']['temp_name'];
$exten = array("jpeg", "jpg", "gif", "png", "mkv", "mp4", "avi");
$ex = split('.', $exten);
$name_uni = uniqid();
$path = "camagru/media/";
$e_check = in_array($path, $exten);

$dsn = "mysql:host=$server;dbname=$db";
$connect = new PDO($dsn, $user, $password);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>