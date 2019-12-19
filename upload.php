 
<?php

session_start();
include "head.php";

//require_once '/config/database';
//$user = new User();
$use = $_SESSION['vkey'];
// var_dump($_POST);
//if(!$user->isLoggedIn())
if(!isset($use))
{
    header("Location: index.php");
}
else{
// if(Input::exists())
// {
   if( $img = $_POST['hidden_id']){
   { 

        //  var_dump("hello");
        //  die();
    $imgName = uniqid('', true) .".png"; //gives a name of time format in current micro seconds
    $fileDestination = 'uploads/'.$imgName;//$imgPath = "../uploads/gallery/".$baseImgName; //path to server folder
	$imgUrl = str_replace("data:upload/png;base64,", " ", $img);
	$imgUrl = str_replace(" ", "+", $imgUrl);
    $imgDecoded = base64_decode($imgUrl); //decoded image ready to be used
    file_put_contents($fileDestination, $imgDecoded); //moved to upload folder to be inserted in database
    /* stickers should be added to the decoded webcam image and sent to the file path on server 
    before being uploaded to path
    also before being inserted into DB*/
    // DB::getInstance()->insert('images', array(
        $dsn = "mysql:host=$server;dbname=$db";
        $connect = new PDO($dsn, $user, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO `media`(`o_vkey`,`media_path`) VALUES ('".$_SESSION['vkey']."', '".$fileDestination."')";
        $stmt = $connect->prepare($sql);
        //'o_vkey' =>  Session::get('user'), //$_SESSION['user'],
        $stmt->execute(['o_vkey' => $use, 'media_path', $fileDestination]);
           
           // 'image' => $fileDestination
}
// if($_POST['hidden_id'] && $_POST['addsticker'])
// {
//     $
//     function addsticker($sticker, $imgDecoded, $) //also try use $imgName
// }
    //var_dump($img);
    //placing the stickers on the images
// }
 }
}
?>
