<?php
include_once("config.php");
session_start();
ob_start();

?>
<body bgcolor="#20B2AA">
<?php
if(isset($_POST['sub']))
{
	$u=mysql_real_escape_string(($_POST['user']));
	$p=mysql_real_escape_string(($_POST['pass']));
	$q=mysql_query("SELECT * FROM user WHERE userid='$u' AND pass='$p'");
	if(mysql_fetch_array($q))
	{
		$_SESSION['u1']=$u;
		$_SESSION['p1']=$p;
		header('Location: input.php');
	}
	else
	{
		header('Location: index.php');
	}	
}
else if(isset($_POST['sig']))
{
		header('Location: regis.php');
}
?>