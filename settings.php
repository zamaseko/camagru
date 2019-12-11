<?php 
include "head.php";
$use = $_SESSION['vkey']; 

?>

<html>
<style>
	.navbar
	{
		background-color: #bab86c;
	}
	a.decor{
		text-decoration: none;
	}

</style>
<nav class="navbar">
			<p>Settings</p>
			<ul>
				<li><a href="#">Menu</a>
					<ul>
						<li><a class="decor" href="changes/cha_passwd.php">Update Password</a></li>
						<li><a class="decor" href="changes/cha_email.php">Update Email</a></li>
						<li><a class="decor" href="changes/cha_usr.php">Update Username</a></li>
					</ul>
				</li>
				<ul>
					<li><a href="notif.php">notification</a></li>
				</ul>
			</ul>
		</nav>
</nav>
</html>
