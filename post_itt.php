<?php 
session_start();
include "head.php"; 
?>

<html>
    <form action='post_itt.php' method="POST" enctype="multipart/form-data">
    <input type="file" name='file' id="post_itt.php">

	<textarea name="caption" rows="5" cols="60"></textarea><br>
	<!--	Upload a File: <input type="file" name="file"-->
        <input type="submit" name="submit" upload="post">
	</form>
</html>
<?php

//include 'config/database.php';
$use = $_SESSION['vkey'];
// function sanitize($clean_it)
// {
//     return htmlentities($clean_it, ENT_QUOTES, 'UTF-8');
// }
$error =[];
$cdir = getcwd();
//$clean = sanitize($_POST(['caption']));
$name = $_FILE['file']['name'];
$type = $_FILE['file']['type'];
$size = $_FILE['file']['size'];
$temp_name = $_FILE['file']['temp_name'];
$fext = strtolower(end(explode('.', $name)));
$exten = array("jpeg", "jpg", "gif", "png", "mkv", "mp4", "avi");
//$ex = split('.', $exten);
//$e = split('/', $type);
//$name_uni = uniqid($ex, $e);
$path = "camagru/media/";
$locate = $cdir . $path . basename($file);
$e_check = in_array($fext, $exten);
if(isset($_POST['submit']) && isset($_POST['caption']))
{

    $dsn = "mysql:host=$server;dbname=$db";
	$connect = new PDO($dsn, $user, $$connect->password);
    setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if(!$e_check)
    {
        $error[] = "file not allowed";
    }
    if($size > 2000000)
    {
        $error[] = "This file is too big";
    }
    if (empty($error))
    {
        $upload = move_uploaded_file($temp_name, $locate);
        $date = date("d-m-Y H:i:s");
        $filter = "none";
        $mys= "SELECT * FROM media WHERE o_vkey = :o_vkey";
		$stmt = $connect->prepare($mys); 
		$stmt->execute(['o_key' => $use, 'media_date' => $date, 'media_path' => $upload]);
        $usr = $stmt->fetch();
        if($upload)
        {
        
			$stmt1 = $connect->prepare("INSERT INTO media(o_key, media_date, media_path VALUES (:o_key, :media_date, :media_path");
            $stmt1->bindParam('o_key', $use);
            $signup->bindParam(':media_date', $date);
			$signup->bindParam(':media_path', $upload);
			$connect->execute();
            echo basename($file) . "Has been uploaded";
        }
        else 
        {
            echo "An error has occured";
        }
    }
    else 
    {
        echo 'voetsek';
    }
}
?>