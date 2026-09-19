<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
$adminname=$_SESSION['adminname'];
$rdate=date("d-m-Y");

$q11=mysqli_query($connect,"select * from cav_admin where username='$adminname'");
$r11=mysqli_fetch_array($q11);
$bc=$r11['bcode'];

$mq=mysqli_query($connect,"select max(id) from cav_data");
$mr=mysqli_fetch_array($mq);
$id=$mr['max(id)']+1;
$rv=rand(10,99);
$sat="V".$id;
//echo sha1("aaa");
if(isset($btn))
{
	$k=sha1($sat);
	$key=substr($k,0,8);

$ins=mysqli_query($connect,"insert into cav_data(id,satid,mac_address,skey,user) values($id,'$satid','$mac','$key','$adminname')");
	
	if($ins)
	{
	?>
	<script language="javascript">
	window.location.href="admin.php";
	</script>
	<?php
	}
	else
	{
	?>
	<script language="javascript">
	//window.location.href="admin.php?act=wrong";
	</script>
	<?php
	}
	
}
///
if($act=="del")
{
mysqli_query($connect,"delete from cav_data where id=$did");
?>
<script language="javascript">
window.location.href="admin.php";
</script>
<?php
}

$q22=mysqli_query($connect,"select * from cav_data where user='$adminname'");
$n22=mysqli_num_rows($q22);
if($n22>0)
{
	while($r22=mysqli_fetch_array($q22))
	{
	$dd[]=$r22['satid'];
	}
	$ss=@implode(",",$dd);
	
	$bfile=$bc.".txt";
	$fp=fopen("data/".$bfile,"w");
	fwrite($fp,$ss);
	fclose($fp);
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
              <?php include("link4.php"); ?>
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

  <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
         Vehicle Details
        </h2>
      </div>
      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="form_container">
            <form name="form1" method="post">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" name="satid" placeholder="Vehicle No.">
                </div>
				<div class="form-group col-md-6">
                  <input type="text" class="form-control" name="mac" placeholder="Unique Address">
                </div>
                
              </div>
            
              <div class="d-flex justify-content-center">
                <button name="btn" type="submit" class="">Add</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  
    
    </div>
  </section>
<p></p>
<p>&nbsp;</p>
	 <?php
				  $qry3=mysqli_query($connect,"select * from cav_data where user='$adminname'");
				  $num3=mysqli_num_rows($qry3);
				  if($num3>0)
				{
				?>
                  <table class="table table-striped thead-dark table-bordered table-hover">
                    <thead>

						
                      <tr>
						<th>S.No</th>
						<th> Vehicle ID</th>
						<th>Unique Address</th>
						<th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					$i=0;
					while($row3=mysqli_fetch_array($qry3))
					{
					$i++;
					?>
					<tr>
					 <td><?php echo $i; ?></td>
					 <td><?php echo $row3['satid']; ?></td>
					 <td><?php echo $row3['mac_address']; ?></td>
					 <td><div class="col-md-3 col-sm-4"><a href="admin.php?act=del&did=<?php echo $row3['id']; ?>" onClick="return del()">Delete</a></div></td>
					 </tr>
					  <?php
					 }
					 ?>
					
					</tbody>
                    
				</table>
				 <?php
				}
				else
				{
				//echo "<p align=center>Empty Result!</p>";
				}
				?>
				<p></p>
				<p></p>
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