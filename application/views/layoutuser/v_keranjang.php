<?php 
function rupiah($angka){
	$hasil_rupiah = "Rp." . number_format($angka,0,',','.'); 
	return $hasil_rupiah;
}
?>
	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th></th>
							<th class="column-1">Images</th>
							<th class="column-2">Product</th>
							<th class="column-3">Price</th>
							<th class="column-4 p-l-70">Quantity</th>
							<th class="column-5">Total</th>
						</tr>
						<?php $abc = count($headcount);
						if($abc==0){?>
						<td colspan="6" style="text-align:center; background-color:silver;">There is no products yet</td>
						<?php }else{?>
                        <!-- Foreach -->
                        <?php foreach($keranjang as $keranjang){
							$data = array('id_produk' => $keranjang->id_produk);
							$produk = $this->model_produk->readDetail($data);?>
						<tr class="table-row">
							<!-- pass variable to javascript -->
							<td class="stock-produk" hidden><?php echo $produk['stock']?></td>
							<td class="id-keranjang" hidden><?php echo $keranjang->id_keranjang?></td>
							<td class="id-produk" hidden><?php echo $produk['id_produk']?></td>
							<td hidden></td>
							<td hidden></td>
							<!-- end -->
							<td style="padding-left:30px"><a href="<?php echo base_url('control_keranjang/deleteDataKeranjang/'.$keranjang->id_keranjang)?>" onclick="return confirm('Setuju?')"><i class="fa fa-trash" style="font-size: 25px;"></i></a></td>
							<td class="column-1">
								<?php ?>
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="<?php echo base_url('assets/upload/'.$produk['gambar_produk'])?>" alt="IMG-PRODUCT">
								</div>
							</td>
							<td class="column-2"><?php  echo $produk['nama_produk'];?></td>
							<td class="column-3 cart"><?php echo $produk['harga_produk']?></td>
							<td class="column-4">
								<div class="flex-w bo5 of-hidden w-size17" style="margin-left:50px">
									
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2" onclick="kurang(this)">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>

									<input class="size8 m-text18 t-center num-product" type="text" name="jumlah_pembelian" value="<?php echo $keranjang->jumlah_pembelian?>" disabled>

									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2" onclick="tambah(this)">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>
							</td>
							<td class="column-5 jumlah"><?php echo rupiah($produk['harga_produk']*$keranjang->jumlah_pembelian);?></td>
						</tr>
                        <?php }?>
						
						<?php }?>
					</table>
				</div>
			</div>

			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Cart Totals
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

					<span id="totalbayar" class="m-text21 w-size20 w-full-sm">
						Rp. 0
					</span>
				</div>

				<!--  -->
				<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					
				</div>
				<form method="post" action="<?= base_url('control_pemesanan')?>">							
				<div class="size15 trans-0-4">
					<!-- Button -->
					
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Proceed to Checkout
					</button>

				</div>
				</form>
			</div>
		</div>
	</section>