<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);

$qq=mysqli_query($connect,"select * from sat_admin where utype='user'");
while($rr=mysqli_fetch_array($qq))
{
	$user=$rr['username'];
	$fn=$rr['bcode'].".txt";
	$qq2=mysqli_query($connect,"select * from sat_data where user='$user'");
	while($rr2=mysqli_fetch_array($qq2))
	{
	$dd[]=$rr2['id'].",".$rr2['satid'].",".$rr2['name'].",".$rr2['skey'];
	
	}
	$val=@implode("|",$dd);
	$fp=fopen("data/".$fn,"w");
	fwrite($fp,$val);
	fclose($fp);
}

?>
<script language="javascript">
window.location.href="http://localhost/sat/test1.php";
</script>