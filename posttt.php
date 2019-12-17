<?php 
session_start();
include "head.php";

?>

<html>
    <form action="posttt.php" method="POST" enctype="multipart/form-data">
	<textarea name="caption" id="message" rows="5" cols="60"></textarea><br>
     <input type="file" name="photo" >
        <input type="submit" name="posted" value="post">
	</form>
    
</html>
<?php
$use = $_SESSION['vkey']; 
if (isset($use))
{
    if(!empty($_POST['posted']) )
    {

    $name = $_FILE['file']['name'];
    $temp_name = $_FILE['file']['temp_name'];
    $cap = $_POST['caption'];
    $path = "/media/" . $name;
    if( move_uploaded_file($temp_name, $path))
    {
       
        $date = date("d-m-Y H:i:s");
        $mys = 'INSERT INTO media(o_vkey, media_date, media_path VALUES (?, ?, ?)';//:o_vkey, :media_date, :media_path)';
        $stmt1 = $connect->prepare($mys);
        $connect->execute(array($cap, $name));
       header("Location: profile.php");
    }
}
}
?>

