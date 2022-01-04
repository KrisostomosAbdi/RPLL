<?php
  ob_start();
  require_once('config/koneksi.php');
  require_once('models/database.php');

  $connection = new Database($host, $user, $pass, $database);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css"> 

    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>

  </head>
  <body>

    <div id="wrapper">

      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">PRODUCT MANAGEMENT</a>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">

            <li><a href="?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>         
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shopping-cart"></i> Barang <b class="caret"></b></a>

              <ul class="dropdown-menu">               
                <li><a href="?page=barang">Data Barang</a></li>
                <li><a href="#">Grafik</a></li>
                <li><a href="#">Report</a></li>
              </ul>
              
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="../index.php"><b>BACK</b></a>
            </li>
          </ul>
        </div>
      </nav>

      <div id="page-wrapper">

        <?php
          if(@$_GET['page'] == 'dashboard'  ||  @$_GET['page'] == ''){
            include "views/dashboard.php";
          }
          else if(@$_GET['page'] == 'barang'){
            include "views/barang.php";
          }
        ?>

      </div>

    </div>


  </body>
</html>