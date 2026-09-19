<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
include("encrypt.php");
include("block_chain.php");
$rdate=date("d-m-Y");
$ch1=mktime(date('H')+5,date('i')+30,date('s'));
$rtime=date('H:i:s',$ch1);

$qq=mysqli_query($connect,"select * from sat_admin where bcode='$bc'");
$rr=mysqli_fetch_array($qq);
$un=$rr['username'];
/*
$dir=opendir("upload");

while($read=readdir($dir))
{
	if($read!="." && $read!="..")
	{
	$ff[]=$read;
	}
}
*/
//print_r($ff);
$fp=fopen("kkk.txt","r");
$k=fread($fp,filesize("kkk.txt"));
fclose($fp);

/*$val=@implode("|",$ff);
	$fp=fopen("files.txt","w");
	fwrite($fp,$val);
	fclose($fp);*/
//	$n=count($ff)-1;
	
	
	
$qq2=mysqli_query($connect,"select * from sat_data where user='$un'");
while($rr2=mysqli_fetch_array($qq2))
{
$rn=rand(0,$n);
$fname=$ff[$rn];
$dd[]=$rr2['satid'].",".$fname;

$sid=$rr2['satid'];
$qq3=mysqli_query($connect,"select * from sat_data where satid='$sid'");
$rr3=mysqli_fetch_array($qq3);
$ky=$rr3['skey'];


$ro1=rand(10,12);
        $ro2=rand(78,79);
        $ro3=rand(1000,7000);
        $ro4=rand(1000,6000);
        $ro5=rand(60,120);

        $ro6=$ro3+$ro5;
        $ro7=$ro4+$ro5;
        $lat=$ro1.".".$ro6;
        $lon=$ro2.".".$ro7;
        $loc=$lat.", ".$lon;
		

$enc=sha1($loc);


//$originalfile="upload/$fname";
//$crypt="encrypted/$fname";
//Cryptfile($originalfile,$crypt,$k);

////////////
$data="VAN: $sid, Received Data: ".$loc;
$dtime=$rdate.", ".$rtime;

$qq4=mysqli_query($connect,"select * from sat_admin where bcode='$bc'");
$rr4=mysqli_fetch_array($qq4);
$bcount=$rr4['block_count'];
$bid=$bcount+1;
if($bcount>0)
{
$pre=$rr4['pre_value'];
$pre1=md5($data);
}
else
{
$pre="00000000000000000000000000000000";
$pre1=sha1($data);
}



mysqli_query($connect,"update sat_admin set block_count=$bid,pre_value='$pre1' where bcode='$bc'");
addBlock($bc,$bid,$pre,$data,$dtime);



//////////
$mq=mysqli_query($connect,"select max(id) from sat_files");
$mr=mysqli_fetch_array($mq);
$id=$mr['max(id)']+1;

echo "insert into sat_files(id,satid,filename,user,encdata) values($id,'$sid','$loc','$un','$enc')";

mysqli_query($connect,"insert into sat_files(id,satid,filename,user,encdata) values($id,'$sid','$loc','$un','$enc')");
//$qq5=mysqli_query($connect,"select * from sat_admin where bcode='$bc'");
//$rr5=mysqli_fetch_array($qq5);
//$bid=$rr5['block_count'];
//echo $bc."--".$bid."---";
//$obj=new Blockchain();

}

$fnn=$bc."_file.txt";
$val=@implode("|",$dd);
	$fp=fopen("data/".$fnn,"w");
	fwrite($fp,$val);
	fclose($fp);
	

if($act=="")
{
$act=1;
}
else
{
$act=$act+1;
}
echo $act;
if($act<11)
{
?>
<script language="javascript">
//window.location.href="http://localhost/sat/test3.php?bc=<?php echo $bc; ?>&act=<?php echo $act; ?>";
</script>

<script>
							//Using setTimeout to execute a function after 5 seconds.
							setTimeout(function () {
							   //Redirect with JavaScript
							 window.location.href="http://localhost/van/test3.php?bc=<?php echo $bc; ?>&act=<?php echo $act; ?>";
							}, 5000);
							</script> 
<?php
}
?>