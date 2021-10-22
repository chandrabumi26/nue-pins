<?php 
function rupiah($angka){
	$hasil_rupiah = "Rp." . number_format($angka,0,',','.'); 
	return $hasil_rupiah;
}
?>
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">
            <div class="leftbody">
                <!--  Checkout Header -->
                <h3 class="m-t-30 m-text5">
                    Shipping Details
                </h3>
                <div class="hr m-r-50">
				<hr>
				</div>
                <!-- /Checkout Header -->

                <!-- Form input -->
                <form id="payment-form" method="post" action="<?=site_url()?>/snap/finish">
                    <label class="m-l-20 m-t-10">Receiver Name</label>

                    <div class="form-group-a roy m-r-30 m-t-5">
                        <div class="form-control-a col-sm-6">
                            <input id="namadepan" type="text" placeholder="First Name" name="firstname">
                        </div>

                        <div class="form-control-a col-sm-6">
                            <input id="namabelakang" type="text" placeholder="Lastname" name="lastname">
                        </div>
                    </div>

                    <label class="m-l-20 m-t-10">Phone Number</label>
                    <div class="form-control-a m-r-30 m-l-20 m-t-5">
                    <input id="phone_number" name="phone_number"></input>
                    </div>

                    <label class="m-l-20 m-t-10">Street Address</label>
                    <div class="form-control-a m-r-30 m-l-20 m-t-5">
                    <textarea rows="4" id="namajalan" name="namajalan"></textarea>
                    </div>

                    <label class="m-l-20 m-t-10">Province</label>
                    <div class="form-control-a m-r-30 m-l-20 m-t-5">
                    <select id="provinsi" name="provinsi">
                        <option value="">--Select Province--</option>
                        <?php foreach($provinsi as $provinsi){?>
                            <option value="<?php echo $provinsi->nama?>"><?php echo $provinsi->nama?></option>
                        <?php }?>
                    </select>
                    </div>

                    <label class="m-l-20 m-t-10">City</label>
                    <div class="form-control-a m-r-30 m-l-20 m-t-5">
                    <select id="kota" name="kota">
                        <option value="">--Select City--</option>
                    </select>
                    </div>

                    <label class="m-l-20 m-t-10">District</label>
                    <div class="form-control-a m-r-30 m-l-20 m-t-5">
                    <select id="kecamatan" name="kecamatan">
                        <option value="">--Select District--</option>
                    </select>
                    </div>

                    <label class="m-l-20 m-t-10">Sub District</label>
                    <div class="form-control-a m-r-30 m-l-20 m-t-5">
                    <select id="kelurahan" name="kelurahan">
                        <option value="">--Select Sub District--</option>
                    </select>
                    </div>

                    <label class="m-l-20 m-t-10">Zip Code</label>
                    <div class="form-control-a col-sm-6 m-t-5">
                    <input type="text" placeholder="Zip Code" name="kodepos" id="kodepos">
                    </div>
                

            </div>
            <div class="rightbody">
                <div class="box-checkout">
                <h4 class="m-t-30 m-l-20 m-text5">
                    Order Information
                </h4>
                <div class="hr">
				<hr>
				</div>
                
                <div class="form-group-a roy m-r-30 m-t-30">
                    <div class="form-control-a col-sm-6">
                        <h4 class="m-text2">Product Name</h4>
                    </div>

                    <div class="form-control-a col-sm-6">
                        <h4 class="m-text2">Total Price</h4>
                    </div>
                </div>

                <div class="hr m-r-15 m-l-15" style="margin-top: -20px;">
				<hr>
				</div>
                 
                <div class="form-group-a roy m-r-30 m-t-10">
                    <?php 
                    $total = 0;
                    foreach($keranjang as $keranjang){
                    $data = array('id_produk' => $keranjang->id_produk);
                    $produk = $this->model_produk->readDetail($data);
                    ?>
                    <div class="form-control-a col-sm-6">
                        <p><?php  echo $produk['nama_produk'];?></p><p> x <?php echo $keranjang->jumlah_pembelian?></p>
                    </div>
                    <div class="form-control-a col-sm-6">
                    <p><?php echo rupiah($keranjang->total_pembayaran);?></p>
                    </div>
                    <?php $total += $keranjang->total_pembayaran;};?>
                    <input type="hidden" name="result_type" id="result-type" value="">
                    <input type="hidden" name="result_data" id="result-data" value="">
                    <input id="totalbayar" type="hidden" value="<?php echo $total?>">
                </div>

                <div class="hr m-r-15 m-l-15" style="margin-top: -20px;">
				<hr>
				</div>
                
                <div class="form-group-a roy m-r-30 m-t-30">
                    <div class="form-control-a col-sm-6">
                        <h4 class="m-text2">Sub total :</h4>
                    </div>

                    <div class="form-control-a col-sm-6">
                        <h4 class="m-text2"><?php echo rupiah($total);?></h4>
                    </div>
                </div>

                <div class="hr m-r-15 m-l-15" style="margin-top: -20px;">
				<hr>
				</div>

                <div class="box-checkout-spacing">
                </div>

                <button id="pay-button" class="flex-c-m sizefull bg1 hov1 s-text1 trans-0-4" style="height: 50px; border-bottom-right-radius: 20px;
  border-bottom-left-radius: 20px;">
						Place an Order
				</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</section>