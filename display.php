<?php
include_once("config.php");
session_start();
ob_start();
if(!isset($_SESSION['u1']) && !isset($_SESSION['p1']))
	header('Location: index.php');
$q=$_SESSION['u1'];

$r=mysql_query("SELECT * FROM $q");
while($ro=mysql_fetch_array($r)){
	$x=$ro['imagid'];
	$res=mysql_query("SELECT * FROM images WHERE imgid='$x'");
		while($row=mysql_fetch_array($res))
		{
			$a=$row['img'];
			$a="pics/".$a;
			echo '<center>echo "welcome   ".$q;<img src="'.$a.'" width="300" height="300"> <br><br><br>';
		}
}
?>
<a href="input.php"> <p><p>add images</a>
<a href="logout.php"> <p><p>logout</a>
<body bgcolor="#20B2AA">