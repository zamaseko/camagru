<?php 

$use = $_SESSION['vkey'];
include "head.php"
 ?>
<html>

<form action="comment.php" method="POST">Comment:<br>
<textarea name=comt rows="5" cols="60" ></textarea><br>
<input type="submit" value="submit" name="commentMedia">

</form>
</html>

<?php
$cmt = $_POST['comt'];
if (isset($_POST['commentMedia']))
{
    if (isset($cmt))
    {
        $dsn = "mysql:host=$server;dbname=$db";
        $connect = new PDO($dsn, $user, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO `commments`(`comment_o`, `comment`) VALUES ('".$_SESSION['vkey']."',  '".$comt."')";
        $usr = $connect->exec($sql);
        if($res)
        {
            header("Location: profile.php");
        }
        else
        {
                echo  'failed to add a post';
        }
    }
}
else
{
    echo  'File could not be moved';
}

?>