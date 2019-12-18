<?php
 include "head.php";
 session_start();
 if(!isset($_SESSION['vkey']))
{
	header('Location: index.php');
}
 $use = $_SESSION['vkey'];
 ?>
<html>
<style>
*{
    box-sizing: border-box;
}
	a.logout{
	color: blue;
    font-size: medium;
    text-decoration: none;
    float: right;
	}
	a.settings {
    color: blue;
    font-size: medium;
    text-decoration: none;
    float: right;
}
a.buy:hover
{
    color: #f90;
    text-decoration: underline;         
}
.inrow
			{
				display: flex;
            }
.caption_text{
	font-weight: bold;
	padding: 6px;
	font-size: 16px;
}
</style>
<body>
    <div>
	<a class="settings" href="settings.php">Settings</a> <br>
	<!--a class="logout" href="Logout.php" type="button">Logout</a-->
    </div>
<div class="inrow"> 
    <div class=camera>
        <img src="http://icons.iconarchive.com/icons/cornmanthe3rd/plex/512/System-webcam-icon.png" style="width:10%" height="55">
        <a class="webcam" href="webcam.php">Camera</a>
    </div>
    <div class="posted">
        <img src="https://icon-library.net/images/posting-icon/posting-icon-15.jpg" style="width:10%" height="55" >
        <a class="post" href="post_it.php">Post</a>   
    </div>
    <div>
    <a href="comment.php">comment</a>

    <div>
    <br/>        
    <?php
        include 'config/database.php';
        try{
            $dsn = "mysql:host=$server;dbname=$db";
            $connect = new PDO($dsn, $user, $password);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $connect->prepare("SELECT u.vkey, m.o_vkey, m.media_path, m.media_id, m.caption, m.media_date FROM users u, media m WHERE u.vkey = m.o_vkey ORDER BY media_date DESC");
            $stmt->execute();
            if ($stmt === false)
            {
                echo 'No Posts Yet';
            }else{
                foreach ($stmt as $row) {
                    echo "<img src='".$row['media_path']."' width='250px' height='250px' alt='Posts' class='image'>";
                    echo    "<div class='overlay'>";
                    echo        "<div class='caption_text'>".$row['caption']."</div>";
                    echo        "<a class='btn profile_buttons blue' style='width: 100%' href='delete.php?remove=delete&id=$row[media_id]'>Delete</a><br>";
                    echo    "</div>";
                    echo "</div>";
                    
                }
            }
            
        }catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        ?>
    </div>
</div>
        <div>
    <?php

$id='1'; //Post id - Post is "Hi everybody"
$uid='1'; //User id - User is "Subin Siby"
$sql=$dbh->prepare("SELECT * FROM fdlikes WHERE pid=? and user=?");
$sql->execute(array($pid, $uid));
if($sql->rowCount()==1){
 echo '<a href="#" class="like" id="'.$id.'" title="Unlike">Unlike</a>';
}else{ 
 echo '<a href="#" class="like" id="'.$id.'" title="Like">Like</a>';
}
?>
</body>
</html>

