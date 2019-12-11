<?php
 include "head.php";
 $use = $_SESSION['vkey'];

 ?>
<html>
<style>
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

</style>
<body>
    <div>
	<a class="settings" href="settings.php?usr=$use">Settings</a> <br>
	<!--a class="logout" href="Logout.php" type="button">Logout</a-->
    </div>
    <div>
        <a class="post" href="post_it.php?usr=$use">Post</a>   
    </div>
</body>
</html>

<?php

include 'config/database.php';

$dsn = "mysql:host=$server;dbname=$db";
$connect = new PDO($dsn, $user, $password);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
