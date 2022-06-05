<?php
include "models/m_barang.php";
$brg = new Barang($connection);

if (@$_GET['act'] == '') {
?>
    <link href="https://fontawesome.com/v4.7.0/icons/">

    <link rel="stylesheet" href="assets/css/deskripsi.css">
    <link rel="stylesheet" href="assets/css/css_product.css">
    <link rel="stylesheet" href="assets/css/rating.css">
    <!--Menu-->
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 text-center">
            <?php
            $no = 1;
            $tampil = $brg->tampil();
            while ($data = $tampil->fetch_object()) {
            ?>
                <div class="col mb-4">
                    <a class="cardlink">
                        <div class="card">
                            <img src="loginseller/home/belajar/assets/img/barang/<?php echo $data->gbr_brg; ?>" class="img-card card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $data->nama_brg; ?></h5>
                                <h4 class="product-price"><span><?php echo $data->harga_brg; ?>$</span> </h4>
                                <div class="star">
                                    <h4 class="small">Rating <?php echo $data->rating; ?><i class="fas fa-star"></i></h4>
                                </div>
                                <a class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                <br>
                                <a class="cart-btn2 collapsible">Deskripsi</a>
                                <div class="content" style="text-align: justify; padding: 0px 10px 0px 10px; ">
                                    <p><?php echo $data->stok_brg; ?></p>

                                    Write your review
                                    <form action="shop.php">
                                        <p><textarea cols="35" rows="5" placeholder="Write Your Review Here"></textarea></p>
                                        <button class="btn btn-dark" id="submit" type="SUBMIT" href="shop.php" value="SUBMIT">SUBMIT</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;
        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
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
