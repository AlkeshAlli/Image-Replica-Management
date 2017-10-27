<?php
	$con=mysql_connect("localhost","root","")or die("Connection to server failed");
	$db=mysql_select_db("alkgram",$con) or die("Connection to db failed");
?>