<form action="" method="POST" enctype="multipart/form-data">
Add/Change Photo<input type="file" name="image" required style="width:180px">
<input type="text" name="adm_no" value="<?php echo $row['adm_no'];?>" hidden>
<input type="submit" value="Click to Update" name="phupd" style="height:30px;width:100px">
</form>
<?php
$a="index.png";
$b="index.png";
$aexten = pathinfo($a, PATHINFO_EXTENSION);
$bexten = pathinfo($b, PATHINFO_EXTENSION);
	if(strcmp($aexten,"jpg") || strcmp($aexten,"jpeg"))
		$aimg=imagecreatefromjpeg($a);
	else if(strcmp($aexten,"png"))
		$aimg=imagecreatefrompng($a);
	if(strcmp($bexten,"jpg") || strcmp($bexten,"jpeg"))
		$bimg=imagecreatefromjpeg($b);
	else if(strcmp($bexten,"png"))
		$bimg=imagecreatefrompng($b);
list($awidth,$aheight)= getimagesize($a);
list($bwidth,$bheight)= getimagesize($b);
$anew=imagecreatetruecolor(8,8);
$bnew=imagecreatetruecolor(8,8);
imagecopyresampled($anew,$aimg,0,0,0,0,8,8,$awidth,$aheight);	
imagecopyresampled($bnew,$bimg,0,0,0,0,8,8,$bwidth,$bheight);	
$ashades=array();
$bshades=array();
$s=0;
for($i=0;$i<8;$i++)
{
	for($j=0;$j<8;$j++)
	{
		$sh=imagecolorat($anew,$i,$j);
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
if($ashades==$bshades)
	echo "same";
else
	echo "different";

?>