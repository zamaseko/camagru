<?php 
//session_start();
include "head.php"; 
if(!isset($_SESSION['vkey']))
{
	header('Location: index.php');
}
?>

<html>
	
    <form action='post_it.php' method="POST" enctype="multipart/form-data">
	<textarea name="caption" rows="5" cols="60"></textarea><br>
		<input type="file" name="image">
        <input type="submit" value="upload" name="imageUpload">
		<script type='text/javascript'>alert('THE GAME');</script>
	</form>
</html>
<?php

include 'config/database.php';

if (isset($_POST['imageUpload']))
{

	$temp_name = $_FILES['image']['tmp_name'];
	$path = "media/";
	$file = $path . basename($_FILES['image']['name']);
	$clean = htmlentities($_POST['caption'], ENT_QUOTES, 'UTF-8');

	if (empty($file))
	{
		echo 'Please attach your image';
	}
	else{
		$imageType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
		$check = getimagesize($temp_name);
		if($check)
		{
			if($imageType != 'jpg' && $imageType != 'gif' && $imageType != 'png' && $imageType != 'jpeg')
			{
				echo 'Error: allowed image extensions - jpeg, gif, png and jpg';
			}
			else
			{
				if (move_uploaded_file($temp_name, $file))
				{
					$dsn = "mysql:host=$server;dbname=$db";
					$connect = new PDO($dsn, $user, $password);
					$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "INSERT INTO `media`(`o_vkey`,`media_path`, `caption`) VALUES ('".$_SESSION['vkey']."', '".$file."', '".$clean."')";
					$res = $connect->exec($sql);
					if($res)
					{
						header("Location: profile.php");
					}
					else{
						echo  'failed to add a post';
					}
				}
				else{
					echo  'File could not be moved';
				}
			}
		}
		else
		{
			echo 'File not an image';
		}
	}
}
?>
