<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
extract($_REQUEST);
$fp=fopen("bc.txt","r");
$r=fread($fp,filesize("bc.txt"));
fclose($fp);
//echo $r;


$fn=$r.".txt";
$dd=file_get_contents("http://iotcloud.co.in/can_ids/data/".$fn);
$fp2=fopen($fn,"w");
fwrite($fp2,$dd);
fclose($fp2);
?>
<p></p>
<script>
							//Using setTimeout to execute a function after 5 seconds.
							setTimeout(function () {
							   //Redirect with JavaScript
							 window.location.href="http://iotcloud.co.in/can_ids/get_data.php?bc=<?php echo $bc; ?>&act=<?php echo $act; ?>";
							}, 10000);
							</script> 
<p></p>
<p></p>
</body>
</html>
