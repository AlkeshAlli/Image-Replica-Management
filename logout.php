<?php

include_once("config.php");
session_start();
ob_start();
if(!isset($_SESSION['u1']) && !isset($_SESSION['p1']))
	header('Location: index.php');
?>
<body bgcolor="#20B2AA">
<?php
unset($_SESSION['u1']);
unset($_SESSION['p1']);
header('Location: index.php');

?>