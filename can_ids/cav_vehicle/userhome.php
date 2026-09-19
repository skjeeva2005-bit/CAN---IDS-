<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];
if($uname=="")
{
?>
<script language="javascript">
//window.location.href="index.php";
</script>
<?php
}

$q11=mysqli_query($connect,"select * from cav_user where uname='$uname'");
$r11=mysqli_fetch_array($q11);
$satid=$r11['satid'];
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
		
		<h2>Received From:  <strong class="yellow"> <?php echo $satid; ?></strong></h2>
		  <?php
		  $q22=mysqli_query($connect,"select * from cav_data where satid='$satid'");
$r22=mysqli_fetch_array($q22);

		  ?>
          <h3>CAV Vehicle No.: <?php echo $satid; ?></h3>
          
        </div>
        <div class="btn-box">
         
        </div>
      </div>
    </div>
  </section>
  
    <section class="rent_section layout_padding">
    <div class="container">
      <div class="rent_container">
	  
	   <?php
							 $q1=mysqli_query($connect,"select * from cav_files where satid='$satid' order by id desc");
							 while($r1=mysqli_fetch_array($q1))
							 {
							 ?>
        <div class="box">
          <div class="img-box">
		  <?php
           $a1=substr($r1['encdata'],0,10);
		   $a2=substr($r1['encdata'],10,10);
		   $a3=substr($r1['encdata'],20,10);
		   $a4=substr($r1['encdata'],30,10);
		   
		   ?>
		   <div class="row">
		   <div class="col-md-12">
		   <?php echo "Location: ".$a1." ".$a2." ".$a3." ".$a4; ?>
		   </div>
		   </div>
		   
          </div>
		   <?php echo "Date / Time: ".$r1['dtime']; ?>
          <div class="price">
            <a href="verify.php?fid=<?php echo $r1['id']; ?>&fname=<?php echo $r1['satid']; ?>">Decrypt</a>
          </div>
        </div>
        <?php
		}
		?>		
     
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