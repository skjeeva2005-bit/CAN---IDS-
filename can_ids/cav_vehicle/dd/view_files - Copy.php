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
      <div class="col-md-12">
       
          <table width="791" border="1" align="center" class="table table-striped thead-dark table-bordered table-hover">
		  <tr>
		  <tr>
		  <td>S.No</td>
		  <td>File</td>
		  <td>Date / Time</td>
		  <td>Action</td>
		  </tr>
		  </tr>
		  <?php
		  while($r1=mysqli_fetch_array($q1))
		  {
		  $i++;
		  ?>
		  <tr>
		  <td><?php echo $i; ?></td>
		  <td><?php echo $r1['filename']; ?></td>
		  <td><?php echo $r1['dtime']; ?></td>
		  <td><a href="decryption.php?fid=<?php echo $r1['id']; ?>&fname=<?php echo $r1['filename']; ?>">Download</a></td>
		  </tr>
		  <?php
		  }
		  ?>
		  </table>
		  
        </div>
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