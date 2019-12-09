<?php
include '/config/database.php';
$use = $_GET['usr'];

if ($use)
{
	//include '/config/database.php';
	$dsn = "mysql:host=$server;dbname=$db";
	$connect = new PDO($dsn, $user, $password);
	$mys = $connect->prepare("SELECT * FROM users WHERE username = :username");
	//$stmt = $connect->prepare($mys);
	$stmt->bindParam(':username', $use);
	$stmt->execute(['username' => $use]);
	$usr = $stmt->fetch();
}

?>
<html>
	<style>	
	body
	{
		background-color:lightsalmon;
	}

	.navigation{
		background-color: white;	
	}
	.navigation a{
		text-decoration: none;
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
		<a href="index.php">Home &emsp;&emsp;&emsp;</a>
		<a href="explore.php">Explore &emsp;&emsp;&emsp;</a>
		<a href="search.php">Search &emsp;&emsp;&emsp;</a>
		<a href="profile.php">Profile</a>
	</nav>
</div>
</body>
</html>



