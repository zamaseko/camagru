<?php
session_start();
include "head.php";
if(!isset($_SESSION['vkey']))
{
    header("Location: index.php");
}
else{
	$use = $_SESSION['vkey'];
	$clean = "";
    $time = date("Y-m-d H:i:s");
	$upload = "uploads/";
    $img = $_POST['img'];
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $image = $upload . mktime() . ".png";
    if($success = file_put_contents($image, $data))
	{
        $sql = $sql = "INSERT INTO `media`(`o_vkey`,`media_path`, `caption`) VALUES ('".$_SESSION['vkey']."', '".$image."', '".$clean."')";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':o_vkey', $use);
        $stmt->bindParam(':media_path', $image);
        $stmt->bindParam(':caption', $clean);
        $stmt->execute();
    }
    else
	{
        echo "Error";
    }
    
}
?>
