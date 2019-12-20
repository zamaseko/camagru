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
        <a class="webcam" href="camera2.php">Camera</a>
    </div>
    <div class="posted">
        <img src="https://icon-library.net/images/posting-icon/posting-icon-15.jpg" style="width:10%" height="55" >
        <a class="post" href="post_it.php">Post</a>   
    </div>
    <div>
    <div>
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
                    echo "<img src='".$row['media_path']."' width='250px' height='250px' alt='Posts' class='image'>";
                    echo "<form action='profile.php' method='POST'>Comment:<br>";
                    echo "<input type='hidden' name='imageID' value='$image_id'>";
                    echo "<textarea name='comt' rows='5' cols='60' ></textarea><br> ";
                    echo "<input type='submit' value='submit' name='commentMedia'>";
                    echo "</form>";
                     $User = $row['username'];
                     $comt = $_POST['comt'];
                     $image_id = $row['media_id'];
                    // <?php
                    $cmt = $_POST['commentMedia'];
                    if (isset($use))
                    {
                        if((isset($_POST['commentMedia'])) && ($_POST['imageID'] == $image_id))
                        {
                            
                            $dsn = "mysql:host=$server;dbname=$db";
                            $connect = new PDO($dsn, $user, $password);
                            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $sql = "INSERT INTO `comments`(`comment_owner`, `image_id`, `comment`) VALUES ('".$User."', '".$image_id."', '".$comt."') ";
                            $usr = $connect->exec($sql);
                            if($usr[8] == 1)
                            {
                                echo "recieve email";
                            }
                            else
                            {
                                    echo  'failed to add a post';
                            };
                        }
                        else if(!(isset($_POST['commentMedia'])))
                        echo "working <br>";
                        else
                        echo "does not work <br>";                
                        }                       
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
   
</body>
</html>

