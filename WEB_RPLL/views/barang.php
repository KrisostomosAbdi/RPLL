<?php
    include "models/m_barang.php";
    $brg = new Barang($connection);

    if(@$_GET['act'] == ''){
?>

            <div class="row product-lists">
                <?php
                    $no = 1;
                    $tampil = $brg->tampil();
                    while($data = $tampil->fetch_object()){
                ?>
				<div class="col-lg-4 col-md-6 text-center berry">
					<div class="single-product-item">
						<div class="product-image">
							<a href="single-product.php" 
                            data-id="<?php echo $data->id_brg; ?>" 
                            data-nama="<?php echo $data->nama_brg; ?>" 
                            data-harga="<?php echo $data->harga_brg; ?>" 
                            data-stok="<?php echo $data->stok_brg; ?>" 
                            data-gbr="<?php echo $data->gbr_brg; ?>"><img src="loginseller/home/belajar/assets/img/barang/<?php echo $data->gbr_brg;?>"</a>
						</div>
						<h3><?php echo $data->nama_brg; ?></h3>
						<p class="product-price"><span><?php echo $data->harga_brg; ?>$</span> </p>
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
                <?php
                    }
                ?>

            </div>
            <div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						<ul>
							<li><a href="#">Prev</a></li>
							<li><a href="#">1</a></li>
							<li><a class="active" href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>
				</div>
			</div>
            
            <script src="assets/js/jquery-1.10.2.js"></script>
            <script type="text/javascript">
                $(document).on("click", "#edit_brg", function(){
                    var id = $(this).data('id');
                    var nama = $(this).data('nama');
                    var harga = $(this).data('harga');
                    var stok = $(this).data('stok');
                    var gambarbrg = $(this).data('gbr');
                    
                    $("#modal-edit #id_brg").val(id);
                    $("#modal-edit #nm_brg").val(nama);
                    $("#modal-edit #hrg_brg").val(harga);
                    $("#modal-edit #stok_brg").val(stok);
                    $("#modal-edit #pict").attr("src", "assets/img/barang/"+gambarbrg);
                })

                $(document).ready(function(e){
                    $("#form").on("submit", (function(e) {
                        e.preventDefault();
                        $.ajax({
                            url : 'models/proses_edit_barang.php',
                            type : 'POST',
                            data : new FormData(this),
                            contentType : false,
                            cache : false,
                            processData : false,
                            success : function(msg){
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
} else if(@$_GET['act'] == 'del'){
    $gbr_awal = $brg->tampil($_GET['id'])->fetch_object()->gbr_brg;
    unlink("assets/img/barang/".$gbr_awal);
    

    $brg->hapus($_GET['id']);
    header("location: ?page=barang");
}