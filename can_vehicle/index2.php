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
  --blue:#1d4ed8;
  --cyan:#06b6d4;
  --violet:#7c3aed;
  --green:#22c55e;
  --orange:#f59e0b;
  --dark:#0f172a;
  --card:#111827;
  --text:#e5e7eb;
}

body{
  margin:0;
  font-family:'Poppins',sans-serif;
  background:radial-gradient(circle at top left,#1d4ed8,#0f172a 45%);
  color:var(--text);
}

/* ===== NAVBAR ===== */
.navbar{
  padding:15px 40px;
  background:linear-gradient(90deg,#1d4ed8,#7c3aed);
  box-shadow:0 8px 25px rgba(0,0,0,.4);
}

.navbar-brand span{
  font-size:22px;
  font-weight:700;
  color:#fff;
  letter-spacing:1px;
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
  background:var(--cyan);
  bottom:-5px;
  left:0;
  transition:.3s;
}
.navbar a:hover::after{width:100%}

/* ===== HERO ===== */
.hero{
  min-height:90vh;
  display:flex;
  align-items:center;
  padding:70px;
  position:relative;
}

.hero::before{
  content:'';
  position:absolute;
  inset:0;
  background:
    linear-gradient(120deg,rgba(6,182,212,.15),transparent 40%),
    linear-gradient(300deg,rgba(124,58,237,.15),transparent 40%);
}

.hero-box{
  max-width:720px;
  padding:45px;
  border-radius:20px;
  background:rgba(17,24,39,.75);
  backdrop-filter:blur(10px);
  border:2px solid transparent;
  background-clip:padding-box;
  box-shadow:
    0 0 0 2px rgba(124,58,237,.4),
    0 30px 60px rgba(0,0,0,.6);
}

.hero-box h1{
  font-size:42px;
  font-weight:700;
  background:linear-gradient(90deg,#22c55e,#06b6d4,#7c3aed);
  -webkit-background-clip:text;
  -webkit-text-fill-color:transparent;
}

.hero-box p{
  margin-top:15px;
  font-size:16px;
  line-height:1.8;
  color:#cbd5f5;
}

/* TAGS */
.tags{
  margin:25px 0;
}
.tags span{
  display:inline-block;
  padding:6px 15px;
  border-radius:20px;
  font-size:13px;
  margin:5px;
  background:linear-gradient(135deg,#1d4ed8,#06b6d4);
  box-shadow:0 0 15px rgba(6,182,212,.4);
}

/* BUTTON */
.hero-box a{
  display:inline-block;
  padding:14px 40px;
  border-radius:30px;
  font-weight:600;
  color:#000;
  background:linear-gradient(90deg,#f59e0b,#22c55e);
  box-shadow:0 0 25px rgba(245,158,11,.6);
  transition:.4s;
}
.hero-box a:hover{
  transform:translateY(-3px) scale(1.03);
  box-shadow:0 0 35px rgba(34,197,94,.8);
  text-decoration:none;
}

/* ===== FEATURES ===== */
.features{
  padding:90px 40px;
  background:linear-gradient(180deg,#0f172a,#020617);
}

.features h2{
  text-align:center;
  font-weight:700;
  margin-bottom:60px;
  background:linear-gradient(90deg,#06b6d4,#7c3aed,#22c55e);
  -webkit-background-clip:text;
  -webkit-text-fill-color:transparent;
}

.cardx{
  height:100%;
  padding:35px;
  border-radius:18px;
  background:var(--card);
  border-left:6px solid;
  border-image:linear-gradient(180deg,#06b6d4,#7c3aed) 1;
  box-shadow:0 20px 40px rgba(0,0,0,.5);
  transition:.4s;
}

.cardx:hover{
  transform:translateY(-12px);
  box-shadow:0 30px 60px rgba(124,58,237,.5);
}

.cardx h5{
  color:#90e0ef;
  font-weight:600;
}

.cardx p{
  font-size:14px;
  color:#cbd5f5;
}

/* ===== FOOTER ===== */
footer{
  padding:18px;
  text-align:center;
  background:linear-gradient(90deg,#1d4ed8,#7c3aed);
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
  <div class="hero-box">
    <h1><?php include("title.php"); ?></h1>

    <p>
      A next-generation Intrusion Detection and Prevention System for Connected and Autonomous Vehicles,
      protecting GPS-based navigation against spoofing attacks using PCA-driven machine learning,
      blockchain-backed integrity verification, and quantum-resilient secure communication.
    </p>

    <div class="tags">
      <span>PCA</span>
      <span>Random Forest</span>
      <span>GPS Spoofing</span>
      <span>Blockchain</span>
      <span>Quantum Crypto</span>
    </div>

    <a href="login.php">Launch Secure System</a>
  </div>
</section>

<!-- FEATURES -->
<section class="features">
  <h2>Core Security Modules</h2>
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="cardx">
          <h5>GPS Attack Detection</h5>
          <p>Machine learning–based analysis of satellite signal anomalies to identify spoofing and manipulation.</p>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="cardx">
          <h5>Blockchain Integrity</h5>
          <p>Immutable logging of navigation data ensures traceability, transparency, and tamper resistance.</p>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="cardx">
          <h5>Quantum Secure Channel</h5>
          <p>Future-proof encryption framework resilient to interception and cryptographic attacks.</p>
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
