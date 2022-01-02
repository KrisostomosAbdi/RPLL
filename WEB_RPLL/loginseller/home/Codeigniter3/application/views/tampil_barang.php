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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/aeda3eb48e.js" crossorigin="anonymous"></script>
    <title>Tampil Barang</title>
    <style>
        .control{
            text-align: center;
        }
        .header{
            text-align: center;
        }
        img{
            object-fit:cover;
        }
        .table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
            background-color: #eefeff;
        }
        .content{
            margin-left: 35px;
            margin-right: 35px;
        }
    </style>
</head>
<body>
<button style="margin-left: 35px; margin-right: 35px;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">TAMBAH</button>
<center>
<div class="content">
    <table class="table table-bordered table-striped" cellpadding="5">
    <thead>
    <tr class="header">
    <th>NO</th>
    <th>GAMBAR</th>
    <th>KODE</th>
    <th>NAMA BARANG</th>
    <th>HARGA</th>
    <th colspan=2>ACTION</th>
    </tr>
    </thead>
    <tbody>
    <?php 
    $nomor=1;
    foreach($barangku as $brg): ?>
    <tr>
        <td><?php echo $nomor++;?></td>
        <td><img src="<?php echo base_url();?>gambar/<?php echo $brg['gambar'];?>" height="75"></td>
        <td><?php echo $brg['kode'];?></td>
        <td><?php echo $brg['nama_barang'];?></td>
        <td><?php echo $brg['harga'];?></td>
        <td class="control" onclick="javascript: return confirm('Yakin data dihapus?')">
            <?php echo anchor('Stokbarang/hapus/'.$brg['kode'],'<div class="btn btn-danger btn-sm">Delete</div>') ?>
        </td>
        <td class="control">
            <?php echo anchor('Stokbarang/edit/'.$brg['kode'],'<div class="btn btn-primary btn-sm">Update</div>')?>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
    </table>
</div>
</center>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo form_open_multipart('Stokbarang/simpan');?>

                    <div class="form-group">
                        <label>Kode</label>
                        <input type="text" class="form-control" name="xkdbrg" placeholder="kode barang" required="">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="xnmbrg" placeholder="nama barang" required="">
                        <label>Harga</label>
                        <input type="text" class="form-control" name="xhgbrg" placeholder="harga barang" required="">
                        <label>Gambar</label>
                        <input type="file" class="form-control"  name="gambar" placeholder="gambar" size="20" required="">
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
</body>
</html>