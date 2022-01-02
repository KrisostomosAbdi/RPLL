<!doctype html>
<html lang="en">
<!--Nama : Krisostomos Abdixta Winarto 
NIM : A11.2019.11695
Kelompok : A11.4402-->
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Card View</title>
    <style>
      .header{
        margin-top: -1px;
        background-color: #00afff;
        padding-top: 10px;
        padding-bottom: 15px;
        color: black;
      }
      .headerimg{
        float: left;
        margin-left: 30px;
        margin-top: 15px;
      }
      body{
        background-color:  #ccf2f4;
      }
      /* Page Content */
      .content {
        padding:20px;
      }
      .jumbotext{
        font-size: 30px;
        margin-top: 10px;
      }
    </style>
  </head>
  <body>
  <div class="header">
  <img class="headerimg" src="<?php echo $this->config->item('base_url'); ?>/logo/icon.jpg" width="101" height="101">
  <center>
  <p class="jumbotext">UJIAN AKHIR SEMESTER GENAP TA 2020/2021</p>
  <p class="jumbotext">Menjual Segala Jenis Barang Kelontong</p>
  </center>
  </div>
    <!--Menu-->
    <div class="container">
      <div class="row">
          <?php foreach($barangku as $brg): ?>
            <div class="col-md-4 mt-4">
             <div class="card">
               <div class="card-body">
                <img src="<?php echo base_url();?>gambar/<?php echo $brg['gambar'];?>" height="210px" class="card-img-top">
                <center>
                <h5 class="card-title"><?php echo $brg['nama_barang'];?></h5>
                <p>Rp <?php echo number_format($brg['harga'],2,",",".");?></p> 
                <?php echo anchor('Control2/view2/'.$brg['kode'],'<div class="btn btn-outline-primary">Detail</div>') ?>
                </center>
                </div>
              </div>
            </div>
            <?php endforeach;?>
      </div>
    </div>
    <footer class="page-footer font-small blue">

    <div style="background-color: #2b77ba; color: white; margin: 20px 118px 20px 118px;" class="footer-copyright text-center py-3">
      Dibuat Oleh: A11.2019.11695 - Krisostomos Abdixta Winarto
    </div>

    </footer>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>