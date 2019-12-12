<?php
 include "head.php";
 session_start();
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
        <a class="post" href="post_it.php?usr=$use">Post</a>   
    </div>
</div>
</body>
</html>

<?php

include 'config/database.php';

$dsn = "mysql:host=$server;dbname=$db";
$connect = new PDO($dsn, $user, $password);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
