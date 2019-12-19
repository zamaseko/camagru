<?php
session_start();
$use = $_SESSION['vkey'];
$media = $_POST['media_path'];
include 'config/database.php';

if (isset($use))
{
   
    // if((isset($_POST['commentMedia'])) && ($_POST['imageID'] == $image_id))
    // {
                      
        $dsn = "mysql:host=$server;dbname=$db";
        $connect = new PDO($dsn, $user, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO `likes`(`like_media`, `like_user`) VALUES ('".$media."', '".$use."') ";
        $usr = $connect->exec($sql);
         if($usr[8] == 1)
         {
             echo "recieve email";
         }
        else
        {
               echo  'failed to add a post';
        }
                
//     else if(!(isset($_POST['commentMedia'])))
//    echo "working <br>";
    //  else
    //  echo "does not work <br>";                
        }                       
// //$id = $_POST['media_id'];
// $use =$_SESSIONS['vkey'];
// $action = $_POST['action'];
// if ($action == 'like')
// {
//     $dsn = "mysql:host=$server;dbname=$db";
//     $connect = new PDO($dsn, $user, $password);
//     $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $sql = "INSERT INTO `likes`(`comment_owner`, `image_id`, `comment`) VALUES ('".$User."', '".$image_id."', '".$comt."') ";
//     $usr = $connect->exec($sql);
//     if($usr==0)
//     {
//         $sql=$connect->prepare("INSERT INTO likes (like_id, like_user) VALUES(?, ?)");
//         $sql->execute(['like_user' => $user]);
//         $sql=$connect->prepare("UPDATE media SET med_like = '1' WHERE med_like=?");
//         $sql->execute([$id]);
//     }
//     else
//     {
//         echo "voetsek";
//     }
// }
?>
