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
                text-align: center;
				display: inline-block;
            }
.caption_text{
	font-weight: bold;
	padding: 6px;
	font-size: 16px;
    font-style: oblique;
}
.image{
    display: inline-block;
    
}
</style>
<body>
<div class="i_want_center">
    <div>
	<a class="settings" href="settings.php">Settings</a> <br>
    </div>
<div class="inrow">
    <img src="http://icons.iconarchive.com/icons/cornmanthe3rd/plex/512/System-webcam-icon.png" style="width:10%" height="55">
    <a class="webcam" href="camera.php">Camera</a>
   
    <img src="https://icon-library.net/images/posting-icon/posting-icon-15.jpg" style="width:10%" height="55" >
    <a class="post" href="post_it.php">Post</a>   
</div>
</div>
    <br/>        
    <?php
        include 'config/database.php';
        try{
            $dsn = "mysql:host=$server;dbname=$db";
            $connect = new PDO($dsn, $user, $password);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $connect->prepare("SELECT u.vkey, u.username, m.o_vkey, m.media_path, m.media_id, m.caption, m.media_date FROM users u, media m WHERE u.vkey = m.o_vkey ORDER BY media_date DESC");
            $stmt->execute();
            if ($stmt === false)
            {
                echo 'No Posts Yet';
            }else{
                foreach ($stmt as $row) {
                    $image_id = $row['media_id'];
                    echo "<img src='".$row['media_path']."' width='250px' height='250px' class='image'></br>";                      
                    echo    "<div class='overlay'>";
                    echo        "<div class='caption_text'>".$row['caption']."</div>";
                    echo        "<button><a class='btn profile_buttons blue' style='width: 100%' href='delete.php?remove=delete&id=$row[media_id]'>Delete</a></button><br>";
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
   
</body>
</html>

