
<html>
<style>	
body
{
	background-color: grey;
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
</style>
<body>
<div>
	<h1 class="title">camagru<h1>
	<nav class="navigation">
		<a href="index.php">Home</a>
		<a href="explore.php">Explore</a>
		<a href="search.php">Search</a>
		<a href="profile.php>">Profile</a>
	</nav>	
</div>
	<button type="button" action="login.php">LogOut</button>
</body>
</html>

<?php
include 'database.php';

session_start();
$usr = $_SESSION['vkey'];
echo $usr;
if($usr)
{
	$connect = new PDO($dsn, $usr, $passwd);
	$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $connect->prepare();
	$stmt->execute();
	$usr = $stmt->fetc();
}
// //else
// {
// 	header('Location:login.php');
// }
?>

