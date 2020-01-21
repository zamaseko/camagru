<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1"/> 
	</head>
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
	<h1 class="title">camagru<h1>
	</div>
</body>
</html>
<?php
// session_start();
// $use = $_SESSION['vkey'];
include "config/database.php";

//if ($use)
//{
	$dsn = "mysql:host=$server;dbname=$db";
	$connect = new PDO($dsn, $user, $password);
	$stmt = $connect->prepare("SELECT * FROM media");
	//$stmt->bindParam(':vkey', $use);
	$stmt->execute();
	$fetch_it = $stmt->fetchAll();
	
//}
//else
// {
// 	header("Location: index.php");
// }
?>