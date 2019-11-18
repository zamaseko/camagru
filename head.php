<?php

$usr = $_GET['usr'];
include 'database.php';
if($usr)
{
	$connect = new PDO($dsn, $usr, $passwd);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $connect->prepare();
	$stmt->execute();
	$usr = $stmt->fetc();
}
else
{
	header('Location:login.php');
}
?>

<html>
<style>	
body
{
	background-color: lightsalmon;
}
.h1
	{
		align: center;
		font-style: oblique;
	}

.navigation{
	background-color: blue;
}
</style>
<body>
<div>
	<h1>camagru<h1>
	<nav class="navigation">
		<a href="index.php?usr=<?php echo $usr?>">Home</a>
		<a href="explore.php?usr=<?php echo $usr?>">Explore</a>
		<a href="search.php?usr=<?php echo $usr?>">Search</a>
		<a href="profile.php?usr=<?php echo $usr?>">Profile</a>
	</nav>	
</div>
	<button type="button" action="login.php">LogOut</button>
</body>
</html>

