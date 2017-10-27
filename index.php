<?php
include_once("config.php");
session_start();
ob_start();
?>
<body bgcolor="#20B2AA">
<form action="login.php" method="POST">
<center><br><br><input type="text" placeholder="Username" name="user"><br><br>
<input type="password" placeholder="Passsword" name="pass"><br><br>
<input type="submit" value="Login" name="sub">&nbsp&nbsp
<input type="submit" value="Signup" name="sig"></center>
</form>
