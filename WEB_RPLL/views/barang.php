<?php
include "models/m_barang.php";
$brg = new Barang($connection);

if (@$_GET['act'] == '') {
?>
    <link rel="stylesheet" href="assets/css/deskripsi.css">
    <div class="row product-lists">
        <?php
        $no = 1;
        $tampil = $brg->tampil();
        while ($data = $tampil->fetch_object()) {
        ?>
            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <img src="loginseller/home/belajar/assets/img/barang/<?php echo $data->gbr_brg; ?>">
                    </div>
                    <h3><?php echo $data->nama_brg; ?></h3>
                    <h4 class="product-price"><span><?php echo $data->harga_brg; ?>$</span> </h4>
                    <button type="button" class="collapsible">Deskripsi</button>
                    <div class="content" style="text-align: justify; padding: 0px 10px 0px 10px;  display: none;overflow: hidden;">
                        <p><?php echo $data->stok_brg; ?></p>
                    </div>

                    <a class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }
    </script>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script type="text/javascript">
        $(document).on("click", "#edit_brg", function() {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var harga = $(this).data('harga');
            var stok = $(this).data('stok');
            var gambarbrg = $(this).data('gbr');

            $("#modal-edit #id_brg").val(id);
            $("#modal-edit #nm_brg").val(nama);
            $("#modal-edit #hrg_brg").val(harga);
            $("#modal-edit #stok_brg").val(stok);
            $("#modal-edit #pict").attr("src", "assets/img/barang/" + gambarbrg);
        })

        $(document).ready(function(e) {
            $("#form").on("submit", (function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'models/proses_edit_barang.php',
                    type: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(msg) {
                        $('.table').html(msg);
                    }
                });
            }));
        })
    </script>


    </div>
    </div>
    </div>

<?php
} else if (@$_GET['act'] == 'del') {
    $gbr_awal = $brg->tampil($_GET['id'])->fetch_object()->gbr_brg;
    unlink("assets/img/barang/" . $gbr_awal);


    $brg->hapus($_GET['id']);
    header("location: ?page=barang");
}
