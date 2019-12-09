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

	<a class="settings" href="settings.php?usr=">Settings</a> <br>
</div>
	<a class="logout" href="Logout.php" type="button">Logout</a>
</body>
</html>

<?php
 include "head.php";
include 'config/database.php';

$dsn = "mysql:host=$server;dbname=$db";
$connect = new PDO($dsn, $user, $password);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
