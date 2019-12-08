<?php
$usr_s = $_GET['usr'];
$session = $_SESSION['usr'];
session_start();
session_unset($session);
session_destroy();
header("Location: login.php");
?>
