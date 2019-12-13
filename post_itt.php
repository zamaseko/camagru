<?php 
session_start();
include "head.php";
$use = $_SESSION['vkey']; 
?>

<html>
    <form action='post_itt.php' method="POST" enctype="multipart/form-data">
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
$clean = sanitize($_POST(['caption']));
//$error =[];
//$cdir = getcwd();
$name = $_FILE['file']['name'];
$type = $_FILE['file']['type'];
//$size = $_FILE['file']['size'];
$temp_name = $_FILE['file']['temp_name'];
$fext = strtolower(end(explode('.', $name)));
$fex = strtolower(end(explode('.', $type)));
$exten = array('jpeg', 'jpg', 'gif', 'png', 'mkv', 'mp4', 'avi');


// echo $locate;
//$e_check = in_array($fext, $exten);
if(in_array($fex, $exten))
{
    // var_dump("hello");
    // die();
    if(isset($name))
    {    
        if (!empty($name))
        {   
            
            // $dsn = "mysql:host=$server;dbname=$db";
            // $connect = new PDO($dsn, $user, $$connect->password);
            // setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // $stmt= "SELECT * FROM media WHERE o_vkey = :o_vkey";
            // $stmt = $connect->prepare($mys); 
            // $stmt->execute(['o_vkey' => $use, 'media_date' => $date, 'media_path' => $locate]);
            // $usr = $stmt->fetch();
            // if ($name)
            // {
                $path = "media/";
                $locate = $path . basename($file);
               
                if( move_uploaded_file($temp_name, $locate))
                {
                    $date = date("d-m-Y H:i:s");
                    $dsn = "mysql:host=$server;dbname=$db";
                    $connect = new PDO($dsn, $user, $$connect->password);
                    setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $mys = 'INSERT INTO media(o_vkey, media_date, media_path VALUES (?, ?, ?)';//:o_vkey, :media_date, :media_path)';
                    $stmt1 = $connect->prepare($mys);
                    // $stmt1->bindParam('o_vkey', $use);
                    // $stmt1->bindParam(':media_date', $date);
                    // $stmt1->bindParam(':media_path', $locate);
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
?>
