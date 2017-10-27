<form action="" method="POST" enctype="multipart/form-data">
<center>Add  Photo <br><br>
<input type="file" name="image" required style="width:180px"><br><br>
<input type="submit" value="Click to Upload" name="up" style="height:30px;width:150px">
<a href="display.php"> <p><p>display images</a>
<a href="logout.php"> <p><p>logout</a>
</form>
<?php
include_once("config.php");
session_start();
ob_start();
if(!isset($_SESSION['u1']) && !isset($_SESSION['p1']))
	header('Location: index.php');
if(isset($_POST['up']))
{
		$x=1;
		$pic=$_FILES['image']['name'];
		$n1=rand(0000,9999);
		$n2=rand(0000,9999);
		$pic=$n1.$n2.urlencode($pic);
		$target="pics/".$pic;
		$res=mysql_query("SELECT * FROM images");
		$y=0;
		while($row=mysql_fetch_array($res))
		{
			$y++;
			$a=$row['img'];
			$a="pics/".$a;
			$b=$_FILES['image']['name']	;
			$aexten = pathinfo($a, PATHINFO_EXTENSION);/*returns the exxtention of file*/
			$bexten = pathinfo($b, PATHINFO_EXTENSION);
			if(strcmp($aexten,"jpg") || strcmp($aexten,"jpeg"))
			$aimg=imagecreatefromjpeg($a);/*returns an image identifier representing the 
											image obtained from the given filename.*/
			else if(strcmp($aexten,"png"))
				$aimg=imagecreatefrompng($a);
			if(strcmp($bexten,"jpg") || strcmp($bexten,"jpeg"))
				$bimg=imagecreatefromjpeg($b);
			else if(strcmp($bexten,"png"))
				$bimg=imagecreatefrompng($b);
			list($awidth,$aheight)= getimagesize($a);/*returns size of image*/
			list($bwidth,$bheight)= getimagesize($b);
			$anew=imagecreatetruecolor(8,8);/*create blank image of given size*/
			$bnew=imagecreatetruecolor(8,8);
			imagecopyresampled($anew,$aimg,0,0,0,0,8,8,$awidth,$aheight);/*takes part fom source image and cpoies to destination*/	
			imagecopyresampled($bnew,$bimg,0,0,0,0,8,8,$bwidth,$bheight);	
			$ashades=array();
			$bshades=array();
			$s=0;
			for($i=0;$i<8;$i++)
			{
				for($j=0;$j<8;$j++)
				{
					$sh=imagecolorat($anew,$i,$j);/*returns colors at that location*/
					$ashades[]=$sh;
				}
			}
			for($i=0;$i<8;$i++)
			{
				for($j=0;$j<8;$j++)
				{
					$sh=imagecolorat($bnew,$i,$j);
					$bshades[]=$sh;
				}
			}
			if($ashades==$bshades){
				$x=0;
				break;
			}
			else{
				$x=1;
		}
		}
		if($x==1){
		$usr=$_SESSION['u1'];
		$w=mysql_query("INSERT INTO $usr(imagid) VALUES('$y')");
		$r=mysql_query("INSERT INTO images(imgid,img) VALUES('$y','$pic')");
		move_uploaded_file($_FILES['image']['tmp_name'],$target);
		}
	}
	
?>
<body bgcolor="#20B2AA">