<?php 
session_start();

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
$cmt = $_POST['commentMedia'];
if (isset($use))
{
    if(!(isset($_POST['commentMedia'])))
    {
        echo "empty <br>";
    }
    else if(isset($_POST['commentMedia']))
    echo "working <br>";
    else
    echo "does not work <br>";
    exit();
    // if (isset($_POST['comt']))
    // {
        // if (isset($cmt))
        // {
            
            $dsn = "mysql:host=$server;dbname=$db";
            $connect = new PDO($dsn, $user, $password);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO `commments`(`comment_owner`, `comment`) VALUES ('".$_SESSION['vkey']."',  '".$comt."')";
            $usr = $connect->exec($sql);
            if($usr[8] == 1)
            {

                echo "recieve emaial";
            }
            else
            {
                    echo  'failed to add a post';
            }
        //}
    }
//     else
//     {
//         echo  'no comment was found';
//     }
// }

?>