
<html>
<style>	
body
{
	background-color:lightsalmon;
}

.navigation{
	background-color: white;
	
}
.title{
    font-style: oblique;
    font-size: 100px;
    color: black;
	text-align: center;
}
.settings{
	font-size: 15px;
	padding-right: 3px;
}
</style>
<body>
<div>
	<h1 class="title">camagru<h1>
	<nav class="navigation">
		<a href="index.php">Home</a>
		<a href="explore.php">Explore</a>
		<a href="search.php">Search</a>
		<a href="profile.php">Profile</a>
	</nav>
	<a class="settings" href="settings.php?usr=">Settings</a>
</div>
	<a href="Logout.php" type="button">Logout</a>
</body>
</html>

<?php
session_start();
?>

