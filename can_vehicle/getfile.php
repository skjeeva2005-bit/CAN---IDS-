<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);

$dir=opendir("upload");
while($read=readdir($dir))
{
	if($read!="." && $read!="..")
	{
	$ff[]=$read;
	}
}
print_r($ff);
$val=@implode("|",$ff);
	$fp=fopen("files.txt","w");
	fwrite($fp,$val);
	fclose($fp);
?>