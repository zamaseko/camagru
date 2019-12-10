<?php
 include "head.php";
 $use = $_GET['usr'];

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

    </div>
</body>
</html>

<?php

include 'config/database.php';

$dsn = "mysql:host=$server;dbname=$db";
$connect = new PDO($dsn, $user, $password);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
