<?php
$usr_s = $_GET['usr'];
$session = $_SESSION['usr'];
session_start();
session_unset($session);
header("Location: index.php");
?>
