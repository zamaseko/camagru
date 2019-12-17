<?php 
include "head.php";
//session_start();

$use = $_SESSION['vkey']; 
?>

<html>
    <form action="post_itt.php" method="POST" enctype="multipart/form-data">
	<textarea name="caption" rows="5" cols="60"></textarea><br>
     <!--input type="file" name='file' id="post_itt.php"-->
	Upload a File: <input type="file" name="file">
        <input type="submit" name="submit" upload="post">
	</form>
    
</html>

<?php

//include 'config/database.php';
function sanitize($clean_it)
{
   
    return htmlentities($clean_it, ENT_QUOTES, 'UTF-8');
}
if (isset($use))
{

$clean = sanitize($_POST(['caption']));
$name = $_FILE['file']['name'];
$type = $_FILE['file']['type'];
$temp_name = $_FILE['file']['temp_name'];
$fext = explode('.', $name);
$fex = explode('/', $type);
$exten = array('jpeg', 'jpg', 'gif', 'png', 'mkv', 'mp4', 'avi');
if(in_array($fext, $exten))
{
    echo "hello";
    if(isset($name))
    {    
        if (!empty($name))
        {   
            
                $path = "media/";
                $locate = $path . basename($file);
               
                if( move_uploaded_file($temp_name, $locate))
                {
                    echo "hello";
                    $date = date("d-m-Y H:i:s");
                    $mys = 'INSERT INTO media(o_vkey, media_date, media_path VALUES (:?, :?, :?)';//:o_vkey, :media_date, :media_path)';
                    $stmt1 = $connect->prepare($mys);
                    $connect->execute([$use, $locate, $date, $clean, ]);
                   header("Location: profile.php");

                }
                else 
                {
                echo "An error has occured";
                }
            }
            else{
                echo 'voetsek';
            }
        }
    //}
}
}
?>
