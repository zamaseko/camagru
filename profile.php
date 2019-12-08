<html>
<style>
	.navbar
	{
		background-color: #add8e6;
	}

</style>
<nav class="navbar">
			
</nav>
</html>

<?php
include 'config/database.php';

$dsn = "mysql:host=$server;dbname=$db";
$connect = new PDO($dsn, $user, $password);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
