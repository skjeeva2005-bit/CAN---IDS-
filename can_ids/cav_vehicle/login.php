<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
		$ip = $_SERVER['REMOTE_ADDR'];
//////MAC Address////////
ob_start();
//Get the ipconfig details using system commond
system('ipconfig /all');

// Capture the output into a variable
$mycom=ob_get_contents();
// Clean (erase) the output buffer
ob_clean();

$findme = "Physical";
//Search the "Physical" | Find the position of Physical text
$pmac = strpos($mycom, $findme);

// Get Physical Address
$mac=substr($mycom,($pmac+36),17);
////////////////////////////////////////////

//echo $mac;



if(isset($btn))
{

$qry=mysqli_query($connect,"select * from cav_user where uname='$uname' && pass='$pass'");
$num=mysqli_num_rows($qry);
					if($num==1)
					{
					$_SESSION['uname']=$uname;
					//$_SESSION['usr']=$uname;
					//header("location:verify.php");
					
					?>
					<script language="javascript">
					window.location.href="userhome.php";
					</script>
					<?php
					}
					else
					{
					$msg="Incorrect Username/Password!";
					}
}
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
              <?php include("link1.php"); ?>
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
                <?php include("link2.php"); ?>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
        CAV Control Center
        </h2>
      </div>
      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="form_container">
            <form name="form1" method="post">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" name="uname" placeholder="Username">
                </div>
                <div class="form-group col-md-6">
                  <input type="password" class="form-control" name="pass" placeholder="Password">
                </div>
              </div>
            
              <div class="d-flex justify-content-center">
                <button name="btn" type="submit" class="">Login</button>
              </div>
            </form>
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