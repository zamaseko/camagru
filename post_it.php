<?php 
session_start();
include "head.php"; 
?>

<html>
	
    <form action='post_it.php' method="POST" enctype="multipart/form-data">
	<textarea name="caption" rows="5" cols="60"></textarea><br>
		<input type="file" name="image">
        <input type="submit" value="upload" name="imageUpload">
	</form>
</html>
<?php

include 'config/database.php';

if (isset($_POST['imageUpload']))
{

		$temp_name = $_FILES['image']['tmp_name'];
		$path = "media/";
		$file = $path . basename($_FILES['image']['name']);
		//$date = date("d-m-Y H:i:s");
		$clean = htmlentities($_POST['caption'], ENT_QUOTES, 'UTF-8');

		if (empty($file))
		{
			echo 'Please attach your image';
		}
		else{
			$imageType = strtolower(pathinfo($file,PATHINFO_EXTENSION));
			$check = getimagesize($temp_name);
			//check if file is an image
			if($check)
			{
				if($imageType != 'jpg' && $imageType != 'gif' && $imageType != 'png' && $imageType != 'jpeg')
				{
					echo 'Error: allowed image extensions - jpeg, gif, png and jpg';
				}
				else{
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

		
		// $clean = sanitize($_POST(['caption']));
		// /*$name = $_FILE['file']['name'];
		// $type = $_FILE['file']['type'];
		// $temp_name = $_FILE['file']['temp_name'];*/
		// //$exten = array("jpeg", "jpg", "gif", "png");
		// $ex = split('.', $exten);
		// $e = split('/', $type);
		// $name_uni = uniqid($ex, $e);
		
		// $e_check = in_array($e, $exten);
		// if($e_check)
		// {
		// 	if (!empty($name))
		// 	{
		// 		if (isset($name))
		// 		{
		// 			$locate = $path. $name_uni;
		// 			$date = date("d-m-Y H:i:s");
		// 			// $filter = "none";
		// 			if (move_uploaded_file($temp_name, $locate))
		// 			{
		// 				$dsn = "mysql:host=$server;dbname=$db";
		// 				$connect = new PDO($dsn, $user, $password);
		// 				$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// 				$mys = $connect->prepare("INSERT INTO media(o_vkey, media_date, media_path VALUES (:o_vkey, :media_date, :media_path)");
		// 				$connect->execute();

		// 				header("Location: profile.php");
		// 			}
		// 			else
		// 			{
		// 				echo 'Choose file to  post';
		// 			}
		// 		}
		// 		else
		// 		{
		// 			echo "insert the correct media";
		// 		}
		// 	}
		// }
	}
?>
