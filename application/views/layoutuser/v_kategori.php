<?php 
function rupiah($angka){
	$hasil_rupiah = "Rp." . number_format($angka,0,',','.'); 
	return $hasil_rupiah;
}
?>

<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url()?>/assets/fashe/images/cloud.png);">
		<h2 class="l-text2 t-center">
			<?php echo $title?>
		</h2>
		<!-- <p class="m-text13 t-center">
			Volume 1
		</p> -->
</section>

	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			
					<!--  -->
					

					<!-- Product -->
					<div class="row">

                        <!-- Foreach here -->
                        <?php foreach($produk as $produk){?>
                            <div class="col-sm-12 col-md-6 col-lg-3 p-b-50">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                        <img src="<?php echo base_url('assets/upload/'.$produk->gambar_produk)?>" width="300" height="300">

                                        <div class="block2-overlay trans-0-4">
                                            <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                                <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                                <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                            </a>

                                            <div class="block2-btn-addcart w-size1 trans-0-4">
                                                <!-- Button -->
												<form method="post" action="<?= base_url('control_keranjang/saveToKeranjang/'.$produk->id_produk)?>">
                                                <button type="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                    Add to Cart
                                                </button>
												</form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="block2-txt p-t-20">
                                        <a data-toggle="modal" data-target="#modalDetail<?php echo $produk->id_produk?>" class="block2-name dis-block s-text3 p-b-5" style="font-weight:bold;cursor:pointer;">
                                            <?php echo $produk->nama_produk?>
                                        </a>

										<span class="block2-name dis-block s-text3 p-b-5" style="font-weight:bold;color:#c8c2bc;">
                                            Stock : <?php echo $produk->stock?>
                                        </span>

                                        <span class="block2-price m-text6 p-r-5">
                                            <?php echo rupiah($produk->harga_produk)?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                        <!-- End Foreach -->

						
					</div>

					<!-- Pagination -->
					<!-- <div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div> -->
				
		</div>
	</section>

	<?php foreach ($prd as $prd){?>
	<div style="background-color:rgba(0,0,0,0.7);" class="modal fade" id="modalDetail<?php echo $prd->id_produk?>" role="dialog">
	<div class="modal-dialog" style="max-width:100vh;">
    
	<div class="modal-content">
      	<div class="modal-content-detail">
			<div class="modal-body">
				<div class="container bgwhite p-t-35 p-b-80">
					<div class="flex-w flex-sb">
					<div class="w-size13 p-t-30 respon5">
						
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>

							<img src="<?php echo base_url('assets/upload/'.$prd->gambar_produk)?>" class="img-detail">
							</div>
						</div>

					<div class="w-size14 p-t-30 respon5">
						<h4 class="product-detail-name m-text16 p-b-13">
							
							<?php echo $prd->nama_produk?>
						</h4>

						<span class="m-text15">
							
						<?php echo rupiah($prd->harga_produk)?>
						</span>

						<p class="s-text8 p-t-10">
						Categories : <?php if($prd->kategori=="JepitRambut"){
								echo "Hairpins";
							}else{
								echo "Lain Lain";
							}?>
						</p>

						<!--  -->
						<input class="size8 m-text18 t-center num-product qty-dua" value="<?php echo $prd->stock?>" hidden>
						<form method="post" action="<?= base_url('control_keranjang/saveToKeranjang/'.$prd->id_produk)?>">
								<div class="w-size16 flex-m flex-w">
									<div class="flex-w bo5 of-hidden m-r-22 m-t-25">
										<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
											<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
										</button>
										<input class="size8 m-text18 t-center num-product qty-modal" type="number" name="quantity" value="1">
										<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2 modal-bt" onclick="tambahModal(this)">
											<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
										</button>
									</div>
								</div>
								<div class="btn-addcart-product-detail size9 trans-0-4 m-t-25 m-b-50">
										<!-- Button -->

										<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
										</form>
								</div>
							

						<!--  -->
						<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
							<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
								Description
								<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
								<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
							</h5>

							<div class="dropdown-content dis-none p-t-15 p-b-23">
								<p class="s-text8">
									<?php echo $prd->deskripsi?>
								</p>
							</div>
						</div>

					</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
    
    </div>
</div>
<?php }?>