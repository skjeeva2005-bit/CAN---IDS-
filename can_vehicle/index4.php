<?php
session_start();
include("dbconnect.php");
extract($_REQUEST);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php include("title.php"); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,600,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.css">

<style>
:root{
  --blue:#2563eb;
  --cyan:#06b6d4;
  --violet:#7c3aed;
  --green:#22c55e;
  --orange:#f59e0b;
  --dark:#020617;
}

/* BODY */
body{
  margin:0;
  font-family:'Poppins',sans-serif;
  background:linear-gradient(120deg,#020617,#0f172a,#1e293b);
  overflow-x:hidden;
}

/* NAVBAR */
.navbar{
  padding:15px 40px;
  background:linear-gradient(90deg,#2563eb,#7c3aed);
  box-shadow:0 8px 30px rgba(0,0,0,.4);
}
.navbar-brand span{
  font-size:22px;
  font-weight:700;
  color:#fff;
}
.navbar a{
  color:#fff;
  margin-left:20px;
  font-weight:500;
  position:relative;
}
.navbar a::after{
  content:'';
  position:absolute;
  width:0;
  height:2px;
  background:#22c55e;
  bottom:-6px;
  left:0;
  transition:.3s;
}
.navbar a:hover::after{width:100%}

/* HERO */
.hero{
  min-height:90vh;
  display:grid;
  grid-template-columns: 1.1fr 1fr;
  align-items:center;
  padding:80px;
  gap:60px;
}

/* LEFT CONTENT */
.hero-box{
  background:rgba(255,255,255,.95);
  padding:50px;
  border-radius:22px;
  box-shadow:0 30px 60px rgba(0,0,0,.35);
}

.hero-box h1{
  font-size:42px;
  font-weight:700;
  background:linear-gradient(90deg,#2563eb,#06b6d4,#7c3aed);
  -webkit-background-clip:text;
  -webkit-text-fill-color:transparent;
}

.hero-box p{
  margin-top:15px;
  font-size:16px;
  line-height:1.8;
  color:#334155;
}

/* TAGS */
.tags{
  margin:25px 0;
}
.tags span{
  display:inline-block;
  padding:6px 15px;
  margin:6px 6px 0 0;
  border-radius:20px;
  font-size:13px;
  background:linear-gradient(135deg,#2563eb,#06b6d4);
  color:#fff;
}

/* BUTTON */
.hero-box a{
  display:inline-block;
  margin-top:20px;
  padding:14px 42px;
  border-radius:30px;
  font-weight:600;
  color:#fff;
  background:linear-gradient(90deg,#f59e0b,#22c55e);
  box-shadow:0 15px 35px rgba(34,197,94,.5);
  transition:.4s;
}
.hero-box a:hover{
  transform:translateY(-4px);
  text-decoration:none;
}

/* RIGHT IMAGE */
.hero-image{
  height:100%;
  border-radius:22px;
  background:
    linear-gradient(135deg,rgba(37,99,235,.25),rgba(124,58,237,.25)),
    url("images/hero-right.png") center/cover no-repeat;
  box-shadow:0 30px 70px rgba(0,0,0,.6);
  position:relative;
}
.hero-image::after{
  content:'';
  position:absolute;
  inset:0;
  border-radius:22px;
  border:2px solid rgba(255,255,255,.15);
}

/* FEATURES */
.features{
  padding:90px 40px;
  background:#f8fafc;
}
.features h2{
  text-align:center;
  font-weight:700;
  margin-bottom:60px;
  background:linear-gradient(90deg,#2563eb,#7c3aed,#22c55e);
  -webkit-background-clip:text;
  -webkit-text-fill-color:transparent;
}

.cardx{
  height:100%;
  padding:35px;
  border-radius:18px;
  background:#fff;
  border-top:5px solid;
  border-image:linear-gradient(90deg,#2563eb,#06b6d4) 1;
  box-shadow:0 20px 40px rgba(0,0,0,.15);
  transition:.4s;
}
.cardx:hover{
  transform:translateY(-12px);
}
.cardx h5{
  color:#2563eb;
  font-weight:600;
}
.cardx p{
  font-size:14px;
  color:#475569;
}

/* FOOTER */
footer{
  padding:18px;
  text-align:center;
  background:linear-gradient(90deg,#2563eb,#7c3aed);
  color:#fff;
  font-size:14px;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="#"><span><?php include("title1.php"); ?></span></a>
  <div class="ml-auto"><?php include("link1.php"); ?></div>
</nav>

<!-- HERO -->
<section class="hero">

  <!-- LEFT -->
  <div class="hero-box">
    <h1><?php include("title.php"); ?></h1>

    <p>
      Advanced Intrusion Detection and Prevention System for Connected and Autonomous Vehicles,
      protecting GPS navigation from spoofing attacks using PCA, Random Forest, Blockchain,
      and Quantum-secure communication.
    </p>

    <div class="tags">
      <span>PCA</span>
      <span>Random Forest</span>
      <span>GPS Spoofing</span>
      <span>Blockchain</span>
      <span>Quantum Crypto</span>
    </div>

    <a href="login.php">Launch Secure Platform</a>
  </div>

  <!-- RIGHT IMAGE -->
  <div class="hero-image"></div>

</section>

<!-- FEATURES -->
<section class="features">
  <h2>Core Security Modules</h2>
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="cardx">
          <h5>GPS Spoofing Detection</h5>
          <p>Identifies abnormal satellite signal behavior using PCA-based ML models.</p>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="cardx">
          <h5>Blockchain Integrity</h5>
          <p>Ensures immutable and tamper-proof navigation data storage.</p>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="cardx">
          <h5>Quantum Secure Channel</h5>
          <p>Protects vehicle communication against future cryptographic attacks.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <?php include("title1.php"); ?> © <?php echo date("Y"); ?> | Intelligent Vehicle Cybersecurity
</footer>

<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
