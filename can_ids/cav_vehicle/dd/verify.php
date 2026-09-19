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
$q11=mysqli_query($connect,"select * from sat_user where uname='$uname'");
$r11=mysqli_fetch_array($q11);
$satid=$r11['satid'];
$user=$r11['user'];
$ky=$r11['user_key'];
$q12=mysqli_query($connect,"select * from sat_admin where username='$user'");
$r12=mysqli_fetch_array($q12);
$bc=$r12['bcode'];


$q4=mysqli_query($connect,"select * from sat_files where id='$fid'");
$r4=mysqli_fetch_array($q4);


$rdate=date("d-m-Y");
$ch1=mktime(date('H')+5,date('i')+30,date('s'));
$rtime=date('H:i:s',$ch1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- site metas -->
  <title><?php include("title.php"); ?></title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- fevicon -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <!-- bootstrap css -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- style css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- Responsive-->
  <link rel="stylesheet" href="css/responsive.css">  
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
  <!-- Tweaks for older IEs-->
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
  <!-- loader  -->
  <div class="loader_bg">
    <div class="loader"><img src="images/loading.gif" alt="#" /></div>
  </div>
  <!-- end loader -->
  <!-- header -->
  <header>
    <!-- header inner -->
    <div class="header-top">
      <div class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-2 col-lg-4 col-md-4 col-sm-3 col logo_section">
              <div class="full">
                <div class="center-desk">
                  <div class="logo">
                    <a href="index.html"><img src="images/logo.png" alt="#" /></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-10 col-lg-8 col-md-8 col-sm-9">
              <div class="header_information">
               <div class="menu-area">
                <div class="limit-box">
                  <nav class="main-menu ">
                    <ul class="menu-area-main">
                      <li class="active"> <a href="userhome.php">Home</a> </li>
                      <li> <a href="logout.php">Logout </a> </li>
                     </ul>
                   </nav>
                 </div>
               </div> 
               <div class="mean-last">
                       <a href="#"><img src="images/search_icon.png" alt="#" /></a> <a href="login.php">Login</a></div>              
             </div>
           </div>
         </div>
       </div>
     </div>
     <!-- end header inner -->

     <!-- end header -->
     
</div>
</header>


<!-- about  -->
<div id="about" class="about">
  <div class="container">
    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="about-box">
          <h2>Device <strong class="yellow">Verification</strong></h2>
          
		  
		  
		  
		  
		  <?php
		  if($act=="1")
		  {
		  $q1=mysqli_query($connect,"select  * from sat_user where uname='$uname'");
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
$data="User: $uname, ATM VAN:".$r4['satid']." Received Location: ".$r4['filename'];
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
$pre1=md5($data);
}



mysqli_query($connect,"update sat_admin set block_count=$bid,pre_value='$pre1' where bcode='$bc'");
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
$data="Attack Found, User: $uname, Accessed VAN: $fname";
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
$pre1=md5($data);
}


//echo "update sat_admin set block_count=$bid,pre_value='$pre1' where bcode='$bc'";
mysqli_query($connect,"update sat_admin set block_count=$bid,pre_value='$pre1' where bcode='$bc'");
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
		  <iframe src="http://localhost/van/getmac.php?user=<?php echo $uname; ?>&fname=<?php echo $fname; ?>&fid=<?php echo $fid; ?>" frameborder="0" width="10" height="10"></iframe>
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
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="about-box">
          <figure><img src="images/satc6.jpg" alt="#" /></figure>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- end abouts -->

    <!-- end contact -->

    <!--  footer -->
    <footr>
      <div class="footer ">
        <div class="container">
          <div class="row">

            <div class="col-md-12">
              <form class="news">
                <input class="newslatter" placeholder="Email" type="text" name=" Email">
                <button class="submit">Subscribe</button>
              </form>
            </div>
            <div class="col-md-12">
              <h2>Newsletter</h2>
              <span>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in  </span>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 ">
              <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 ">
                  <div class="address">
                    <h3>Contact us </h3>
                    <ul class="loca">
                      <li>
                        <a href="#"><img src="icon/loc.png" alt="#" /></a>London 145
                        <br>United Kingdom </li>
                        <li>
                          <a href="#"><img src="icon/email.png" alt="#" /></a>demo@gmail.com </li>
                          <li>
                            <a href="#"><img src="icon/call.png" alt="#" /></a>+12586954775 </li>
                          </ul>
                          <ul class="social_link">
                            <li><a href="#"><img src="icon/fb.png"></a></li>
                            <li><a href="#"><img src="icon/tw.png"></a></li>
                            <li><a href="#"><img src="icon/lin(2).png"></a></li>
                            <li><a href="#"><img src="icon/instagram.png"></a></li>
                          </ul>

                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="address">
                          <h3>Courses</h3>
                          <ul class="Menu_footer">
                            <li class="active"> <a href="#">Masters Degree</a> </li>
                            <li><a href="#">Post GraduateU</a> </li>
                            <li><a href="#">Ndergraduate</a> </li>
                            <li><a href="#">Engineering</a> </li>
                            <li><a href="#">Ph.D Degree</a> </li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="address">
                          <h3>Information</h3>
                          <ul class="Links_footer">
                            <li class="active"><a href="#">Campus Tour</a> </li>
                            <li><a href="#">Student Lifes</a> </li>
                            <li><a href="#">Cholarship</a> </li>
                            <li><a href="#"> Admission</a> </li>
                            <li><a href="#">Leadership</a> </li>
                          </ul>
                        </div>
                      </div>

                      <div class="col-lg-3 col-md-6 col-sm-6 ">
                        <div class="address">
                          <a href="index.html"> <img src="images/logo3.png" alt="logo"></a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

              </div>
              <div class="copyright">
                <div class="container">
                  <p>SatChain <a href="https://html.design/">  <?php echo $r1['current_mac']; ?></a></p>
                </div>
              </div>
            </div>
          </footr>
          <!-- end footer -->
          <!-- Javascript files-->
          <script src="js/jquery.min.js"></script>
          <script src="js/popper.min.js"></script>
          <script src="js/bootstrap.bundle.min.js"></script>
          <script src="js/jquery-3.0.0.min.js"></script>
          <script src="js/plugin.js"></script>
          <!-- sidebar -->
          <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
          <script src="js/custom.js"></script>
          <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>


          <script>
// This example adds a marker to indicate the position of Bondi Beach in Sydney,
// Australia.
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 11,
    center: {
      lat: 40.645037,
      lng: -73.880224
    },
  });

  var image = 'images/maps-and-flags.png';
  var beachMarker = new google.maps.Marker({
    position: {
      lat: 40.645037,
      lng: -73.880224
    },
    map: map,
    icon: image
  });
}
</script>
<!-- google map js -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
<!-- end google map js -->



</body>
</html>