<?php 
session_start();
include "head.php";
?>
<html>
<form action="comments.php" method="POST">Comment<br>
<textarea name=comt rows="5" cols="60" ></textarea><br>
<input type="submit" value="comment">

</form>
</html>
<?php


$comt = $_POST['comt'];
try
{
	if(!empty($comt))
	{
		if (isset($comt))
		{
			$dsn = ("mysql:$server;dbname=$db");
			$connect = new PDO($dsn, $user, $password);
			$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ATTR_EXCEPTION);
			$stmt = $connect->prepare("INSERT INTO comments WHERE id, image_idcomment_owner = :comment_owner");
			$stmt->bindValue(':comments', $comt);
			$stmt->execute();
			// $stmt1 = $connect->prepare("SELECT * FROM user WHERE username = :username");
			// $stmt1->execute();
			// $usr = $stmt1->fetch();
			if($usr[8] == 1)
			{
				echo 'im alive';
				die();
			}
			else 
			{
				echo ' ';
			}
		}
		else{
		 echo 'hello';
		}
	}
}
catch(PDOException $e)
{
	echo $e;
}

?>