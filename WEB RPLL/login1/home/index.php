<?php
session_start();
//cek sudah login
if ( !isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}
?>
<html lang="en">
<head>
  <!--Nama : Krisostomos Abdixta Winarto
      NIM : A11.2019.11695
      Kelompok : A11.4308  -->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
<link rel="stylesheet"  type="text/css" href="tugas.css">
<title>
  Welcome to Cheese.org
</title>
<style>
  /* Popup container - can be anything you want */
  .popup {
    position: relative;
    display: inline-block;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  /* The actual popup */
  .popup .popuptext {
    visibility: hidden;
    width: 160px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 8px 0;
    position: absolute;
    z-index: 1;
    bottom: 125%;
    left: 50%;
    margin-left: -80px;
  }

  /* Popup arrow */
  .popup .popuptext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
  }

  /* Toggle this class - hide and show the popup */
  .popup .show {
    visibility: visible;
    -webkit-animation: fadeIn 1s;
    animation: fadeIn 1s;
  }

  /* Add animation (fade in the popup) */
  @-webkit-keyframes fadeIn {
    from {opacity: 0;} 
    to {opacity: 1;}
  }

  @keyframes fadeIn {
    from {opacity: 0;}
    to {opacity:1 ;}
  }
</style>
</head>
<body>
  
<!--navbar-->
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-gradient-warning">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../../assets/img/logo.png" width="40" height="40" alt="" loading="lazy">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#"><b>HOME<span class="sr-only">(current)</b></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><b>SPONSOR</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><b>ABOUT ME</b></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><b>BLOG</b></a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item" style="text-align: center">
          <?php 
            date_default_timezone_set('Asia/Jakarta');
            echo date("h:i:sa")."<br>";
            echo date("l, d-m-Y")."<br>";
          ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../logout.php"><b>Log Out</b></a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!--jumbotron-->
<div class="intro">
  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <img class="cheese" src="../../assets/img/icon2.png" width="250pt" height="250pt"><br>
      <h1 class="display-4"> 
        <?php 
            date_default_timezone_set('Asia/Jakarta');
            $hour = date('H', time());

            if( $hour > 3 && $hour < 12) {
              echo "Good Morning";
            }
            else if($hour >= 12 && $hour <= 16) {
              echo "Good Afternoon";
            }
            else if($hour > 16 && $hour <= 23) {
              echo "Good Evening";
            }
            else {
              echo "Good Night";
            }
            echo ", ", $_SESSION['uname'];   
        ?>
      </h1>
        <div class="popup" onclick="myFunction()">
          <i class="far fa-info-circle"></i>
          <span class="popuptext" id="myPopup">Our website using Jakarta as our default timezone</span>
        </div>
    </div>
  </div>
</div>

<div class="row">
  <a href="profile.php" class="menu">
    <div style="background-color:rgba(211, 211, 211, 0.5);">
          <img class="icon" src="../../assets/img/icon2.png" sizes="100%" width="90pt" height="90pt"><br>
          <span><h5>PROFILE</h5></span>
    </div>
  </a>
  <a href="#" class="menu">
    <div style="background-color:rgba(128, 128, 128, 0.5);">
          <img class="icon1" src="../../assets/img/icon2.png" sizes="100%" width="90pt" height="90pt"><br>
          <h5>PRODUCT MANAGEMENT</h5>
      </div>
    </a>
</div>

<script>
// When the user clicks on div, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>