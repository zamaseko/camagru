<?php
session_start();
$use = $_SESSION['vkey'];
include 'config/database.php';

if ($use)
{
	$dsn = "mysql:host=$server;dbname=$db";
	$connect = new PDO($dsn, $user, $password);
	$stmt = $connect->prepare("SELECT * FROM users WHERE vkey = :vkey");
	$stmt->bindParam(':vkey', $use);
	$stmt->execute(['vkey' => $use]);
	$usr = $stmt->fetch();
	
}
else
{
	header("Location: index.php");
}
?>
<html>
	<style>	
	*{
		box-sizing: border-box;
	}
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
	a.logout{
	color: blue;
    font-size: medium;
    text-decoration: none;
    float: right;
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
	<a class="logout" href="Logout.php" type="button">Logout</a>
</div>
<div>
	<h1 class="title">camagru<h1>
	<nav class="navigation">
		<a href="gallery.php">Gallery &emsp;&emsp;&emsp;&emsp;</a>
		<a href="profile.php">Profile</a>
	</nav>
</div>

</body>

</html>



