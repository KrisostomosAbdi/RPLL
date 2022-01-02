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

    <title>Detail</title>
    <style>
        img{
            padding: 15px;
            max-height: 285px;
            width: 100%;
        }
        .content{
            margin-left: 35px;
            margin-right: 35px;
            font-family: Arial;
        }
        body, .card{
            background-color: #e7e7fc;
        }
    </style>
  </head>
  <body>
      <div class="content">
        <h2>Detail Produk</h2>
        <div class="card mb-3" style="width: 50%;">
        <div class="row g-0">
            <div class="col-md-5">
                <img src="<?php echo base_url();?>gambar/<?php echo $detail->gambar;?>" width="100%" height="100%">
            </div>
            <div class="col-md-5">
            <div class="card-body" style="width: fit-content;">
                <h5 class="card-title"><?php echo $detail->nama_barang ?></h5>
                <br/>
                <p class="card-text">Harga : <?php echo $detail->harga ?></p>
                <p class="card-text">Nama Barang : <?php echo $detail->nama_barang ?></p>
                <p class="card-text">Stok : Tersedia</p>
                <button type="button" class="btn btn-primary">Tambahkan ke Tas Belanja</button>
            </div>
            </div>
        </div>
        </div>
    <h3>Deskripsi Produk</h3>
    <?php echo $detail->nama_barang ?>
    </div>
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