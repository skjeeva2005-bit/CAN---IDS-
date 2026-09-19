<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
$uname=$_SESSION['uname'];


$q1=mysqli_query($connect,"select * from sat_files where satid='$satid' order by id desc");


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

<div class="row">	
							
							 <?php
							 while($r1=mysqli_fetch_array($q1))
							 {
							 ?>
  <div class="col-md-4 col-sm-4">
                    <div class="panel panel-primary" style="background-color:#FFFF99">
                        <div class="panel-heading">
                           <?php echo "Satellite ID: ".$r1['satid']; ?>
                        </div>
                        
                        <div class="panel-footer">
                           <?php echo "Data File: ".$r1['filename']; ?>
                        </div>
						<div class="panel-footer">
                           <?php echo "Date / Time: ".$r1['dtime']; ?>
                        </div>
						<div class="panel-footer">
                          <a href="decryption.php?fid=<?php echo $r1['id']; ?>&fname=<?php echo $r1['filename']; ?>">Download</a>
                        </div>
						
                    </div>
					<br>
                </div>
				
				<?php
		}
		?>		
		</div>
   
      
   

<!-- end abouts -->

    <!-- end contact -->

    <!--  footer -->
    
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




</body>
</html>