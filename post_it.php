<?php 
session_start();
include "head.php"; 
?>

<html>
    <form action='post_it.php' method="POST" enctype="multipart/form-data">
	<textarea name="caption" rows="5" cols="60"></textarea><br>
		<input type="file" name="file">
        <input type="submit" value="upload">
	</form>
</html>
<?php

include 'config/database.php';
function sanitize($clean_it)
{
    return htmlentities($clean_it, ENT_QUOTES, 'UTF-8');
}
$clean = sanitize($_POST(['caption']));
$name = $_FILE['file']['name'];
$type = $_FILE['file']['type'];
$temp_name = $_FILE['file']['temp_name'];
$exten = array("jpeg", "jpg", "gif", "png", "mkv", "mp4", "avi");
$ex = split('.', $exten);
$e = split('/', $type);
$name_uni = uniqid($ex, $e);
$path = "camagru/media/";
$e_check = in_array($e, $exten);
if($e_check)
{
	echo 'hello';
	die();
	if (!empty($name))
	{
		if (isset($name))
		{
			$locate = $path. $name_uni;
			$date = date("d-m-Y H:i:s");
			$filter = "none";
			if (move_uploaded_file($temp_name, $locate))
			{
				$dsn = "mysql:host=$server;dbname=$db";
				$connect = new PDO($dsn, $user, $password);
				$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$mys = $connect->prepare("INSERT INTO media(o_key, media_date, media_path VALUES (:o_key, :media_date, :media_path)");
				$connect->execute();

				//header("Location: profile.php?usr=$cusr");
			}
			else
			{
				echo 'Choose file to  post';
			}
		}
		else
		{
			echo "insert the correct media";
		}
	}
}
?>
