<?php
include_once("config.php");
session_start();
ob_start();

?>

<form method="POST">
<center><br><br><input type="text" placeholder="Username" name="user"><br><br>
<input type="password" placeholder="Passsword" name="pass"><br><br>	
<input type="submit" value="Signup" name="sign"></center>
</form>
<?php
	if(isset($_POST['sign']))
{
	$u=mysql_real_escape_string(($_POST['user']));
	$p=mysql_real_escape_string(($_POST['pass']));
	$q=mysql_query("INSERT INTO user(userid,pass) VALUES ('$u','$p')");
	mysql_query("CREATE TABLE $u (imagid INT(11))");
		header('Location: index.php');
}

?>
<body bgcolor="#20B2AA">