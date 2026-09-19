<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];
if($uname=="")
{
$uname=$user1;
}
include("block_chain.php");
$q11=mysqli_query($connect,"select * from cav_user where uname='$uname'");
$r11=mysqli_fetch_array($q11);
$satid=$r11['satid'];
$user=$r11['user'];
$ky=$r11['user_key'];
$q12=mysqli_query($connect,"select * from cav_admin where username='$user'");
$r12=mysqli_fetch_array($q12);
$bc=$r12['bcode'];


$q4=mysqli_query($connect,"select * from cav_files where id='$fid'");
$r4=mysqli_fetch_array($q4);


$rdate=date("d-m-Y");
$ch1=mktime(date('H')+5,date('i')+30,date('s'));
$rtime=date('H:i:s',$ch1);
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title><?php include("title.php"); ?></title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,600,700&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.html">
            <span>
            <?php include("title1.php"); ?>
            </span>
          </a>

          <div class="navbar-collapse" id="">
            <div class="user_option">
              <?php include("link5.php"); ?>
            </div>
            <div class="custom_menu-btn">
              <button onClick="openNav()">
                <span class="s-1"> </span>
                <span class="s-2"> </span>
                <span class="s-3"> </span>
              </button>
            </div>
            <div id="myNav" class="overlay">
              <div class="overlay-content">
                
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- contact section -->

 
				<p></p>
				<p></p>
				<section class="best_section">
    <div class="container">
      <div class="book_now">
        <div class="detail-box">
		
		<h2>CAV Device Verification</h2>
          
        </div>
        <div class="btn-box">
         
        </div>
      </div>
    </div>
  </section>
  
    <section class="rent_section layout_padding">
    <div class="container">
      <div class="rent_container">
	  
	  <div class="row">
	  	<div class="col-md-2">
		</div>
		
		<div class="col-md-8">
        <div class="box">
          <div class="img-box">
         
		 <?php
		  if($act=="1")
		  {
		  $q1=mysqli_query($connect,"select  * from cav_user where uname='$uname'");
		  $r1=mysqli_fetch_array($q1);
				if($r1['mac_address']==$r1['current_mac'])
				{
				$_SESSION['uname']=$usr;
				
				
				 include("decrypt.php");
/*	   $fp=fopen("kkk.txt","r");
$k=fread($fp,filesize("kkk.txt"));
fclose($fp);
	  $crypt = "encrypted/$fname";
	$decrypt = "decrypted/$fname";
	DecryptFile($crypt,$decrypt,$k);*/
				////////////
$data="User: $uname, CAV Vehicle:".$r4['satid']." Received Location: ".$r4['filename'];
$dtime=$rdate.", ".$rtime;

$qq4=mysqli_query($connect,"select * from cav_admin where bcode='$bc'");
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
$pre1=md5($data);
}



mysqli_query($connect,"update cav_admin set block_count=$bid,pre_value='$pre1' where bcode='$bc'");
addBlock($bc,$bid,$pre,$data,$dtime);
				?>
				<p style="color:#00CC33">Decripted Success..</p>
				
				<h3>Location: <?php echo $r4['filename']; ?></h3>
				<!-- <p><a href="download.php?file1=<?php //echo $fname; ?>&folder1=upload">Download Now</a></p>-->
				<script>
				//Using setTimeout to execute a function after 5 seconds.
				//setTimeout(function () {
				   //Redirect with JavaScript
				 //window.location.href="decryption.php?fname=<?php echo $fname; ?>&user=<?php echo $uname; ?>";
				//}, 5000);
				</script> 
				<?php
				}
				else
				{
				
				////////////
$data="Attack Found, User: $uname, Accessed Vehicle: $fname";
$dtime=$rdate.", ".$rtime;

$qq4=mysqli_query($connect,"select * from cav_admin where bcode='$bc'");
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
$pre1=md5($data);
}


//echo "update sat_admin set block_count=$bid,pre_value='$pre1' where bcode='$bc'";
mysqli_query($connect,"update cav_admin set block_count=$bid,pre_value='$pre1' where bcode='$bc'");
addBlock($bc,$bid,$pre,$data,$dtime);
				?>
				<embed src="images/a3.mp3" autostart="true" width="100" height="100"></embed>
				<p style="color:#FF0000">You are accessing unauthorized Device!!</p>
				<script>
				//Using setTimeout to execute a function after 5 seconds.
				//setTimeout(function () {
				   //Redirect with JavaScript
				 //window.location.href="index.php";
				//}, 7000);
				</script> 
				<?php
				}
		  }
		  else
		  {
		  ?>
		  <p style="color:#FF3300">Verifying............   </p>
		  <iframe src="http://localhost/can/getmac.php?user=<?php echo $uname; ?>&fname=<?php echo $fname; ?>&fid=<?php echo $fid; ?>" frameborder="0" width="10" height="10"></iframe>
		  <script>
			//Using setTimeout to execute a function after 5 seconds.
			setTimeout(function () {
			   //Redirect with JavaScript
			 window.location.href="verify.php?act=1&user=<?php echo $uname; ?>&fname=<?php echo $fname; ?>&fid=<?php echo $fid; ?>";
			}, 5000);
			</script> 
		  <?php
		  }
		  
		  ?>
		 
		 
          </div>
          <div class="price">
           
          </div>
        </div>
		</div>
		
		
	</div>
      
     
    </div>
  </section>


  <!-- end contact section -->

  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <p>
      <?php include("title1.php"); ?>
      <a href="https://html.design/"></a>
    </p>
  </footer>
  <!-- footer section -->

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>

</body>

</html>