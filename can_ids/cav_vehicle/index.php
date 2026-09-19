<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
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

<body>
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
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div class="slider_container">
        <div class="img-box">
		
          <img src="images/hero-img.jpg" alt="">
		  <h5>Ensuring Trustworthy Navigation in Autonomous Vehicles Using Blockchain and Machine Learning</h5>
        </div>
        <div class="detail_container">
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="detail-box">
                  <h1>
                   <?php include("title.php"); ?>
				   
                  </h1>
                  <a href="login.php">
                    Login                  </a>                </div>
              </div>
              <div class="carousel-item">
                <div class="detail-box">
                  <h1>
                   <?php include("title.php"); ?>
                  </h1>
                  <a href="login.php">
                    Login                  </a>                </div>
              </div>
              <div class="carousel-item">
                <div class="detail-box">
                  <h1>
                   <?php include("title.php"); ?>
                  </h1>
                  <a href="login.php">
                    Login                  </a>                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="sr-only">Previous</span>            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="sr-only">Next</span>            </a>          </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>
  <!-- book section -->
  <section class="book_section">
    <div class="form_container">
      <!--<form action="">
        <div class="form-row">
          <div class="col-lg-8">
            <div class="form-row">
              <div class="col-md-6">
                <label for="parkingName">Pick Up Locaion</label>
                <input type="text" class="form-control" placeholder="acb ">
              </div>
              <div class="col-md-6">
                <label for="parkingNumber">Drop Location</label>
                <input type="text" class="form-control" placeholder="acb ">
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6">
                <label for="parkingName">Pick Up Date</label>
                <input type="text" class="form-control" placeholder="07/09/2020">
              </div>
              <div class="col-md-6">
                <label for="parkingNumber">Return Date</label>
                <input type="text" class="form-control" placeholder="07/09/2020">
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="btn-container">
              <button type="submit" class="">
                Search
              </button>
            </div>
          </div>
        </div>

      </form>-->
    </div>
    <div class="img-box">
      <img src="images/book-car.png" alt="">
    </div>
  </section>

  <!-- end book section -->

  <!-- car section -->

  <!-- end car section -->

  <!-- about section -->

  <!-- end about section -->


  <!-- best section -->
  <!-- end best section -->

  <!-- rent section -->


  <!-- end rent section -->

  <!-- blog section -->

  <!-- end blog section -->

  <!-- us section -->

  <!-- end us section -->

  <!-- client section -->
  <!-- end client section -->

  <!-- contact section -->

  <!-- end contact section -->

  <!-- map section -->
  <!-- end map section -->

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