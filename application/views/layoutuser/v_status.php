<?php 
function rupiah($angka){
	$hasil_rupiah = "Rp." . number_format($angka,0,',','.'); 
	return $hasil_rupiah;
}
?>

<section class="bgwhite p-b-65">
    <div class="container">
        <div class="row">
            <h3 class="m-t-30 m-text5" style="margin-bottom: -25px;">
                    My Orders
            </h3>
            <?php $abc = count($pemesanan);
                    if($abc == 0){?>
                    <div class="noitem-status">
                        <h5>You dont order any items yet</h5>
                    </div>
                    <?php }?>
            <!-- Foreach Pemesanan where id user -->
            <?php foreach($pemesanan as $pemesanan){
                $params = array('server_key' => 'SB-Mid-server-4NkRw7zQKJF__bYcrUfdrEhf', 'production' => false);
                $this->load->library('veritrans');
                $this->veritrans->config($params);
                $tes = $this->veritrans->status($pemesanan->order_id);?>
                <div class="box-status">
                <div class="status-header">
                    <div class="header-item-left m-l-20 m-t-20">
                        <div class="header-items">
                    <h5 class="m-b-5" style="font-weight: bold;">Order Date</h5>
                    <label> <?php echo $pemesanan->order_date?></label>
                    </div>
                        <div class="header-items">
                            <h5 class="m-b-5" style="font-weight: bold;">Order ID</h5>
                            <label> <?php echo $pemesanan->order_id?></label>
                        </div>
                    </div>
                    
                    <div class="header-item-right m-r-15 m-t-10">
                    <?php $item = $this->model_pemesanan->readInnerPemesanan($pemesanan->order_id);
                    $abcde = ""; $id="";foreach($item as $row){
                        $abcde = $row->status_pemesanan;
                        $id = $row->order_id;
                    } 
                    if($tes->transaction_status == 'pending' && $abcde == 'Transaksi sedang diproses'){?> 
                    <a href="<?php echo $pemesanan->pdf_url?>" class="flex-c-m size10 bg1 bo-rad-10 hov1 s-text1 trans-0-4">Learn how to Pay</a>
                    <?php }else if($tes->transaction_status == 'settlement' && $abcde == 'Transaksi sedang diproses'){?>
                        <a href="#" class="flex-c-m size10 bg1 bo-rad-10 hov1 s-text1 trans-0-4" disabled>Payment Accepted</a>
                    <?php }else if($tes->transaction_status == 'settlement' && $abcde == 'on delivery'){?>
                        <a href="<?php echo base_url('control_pemesanan/delivered/'.$id)?>" class="flex-c-m size10 bg1 bo-rad-10 hov1 s-text1 trans-0-4">Item Delivered?</a>
                    <?php }?>
                    </div>
                </div>
                <div class="hr">
                <hr>
                </div>
                <div class="status-body">
                    <div class="body-row" style="margin-bottom: -25px;">
                    <h5 class="m-text6 m-l-20 m-t-10" style="font-weight: bold;">Payment Status : </h5>
                    <p class="m-l-10 m-t-7">
                    <?php echo $tes->transaction_status;
                    ?>
                    </p>
                    </div>
                    <!-- Foreach pemesanan group by order id -->
                    <?php
                    foreach($item as $item){
                        $data = array('id_produk' => $item->id_produk);
						$produk = $this->model_produk->readDetail($data);
                    ?>
                    <div class="body-row">
                        <img src="<?php echo base_url('assets/upload/'.$produk['gambar_produk'])?>" alt="IMG-BENNER">

                        <div class="body-item-produk">
                            <label style="font-weight: bold;font-size:20px;"><?php echo $produk['nama_produk']?></label>

                            <div class="status-pemesanan-item">
                            <label style="margin-left: 10px;">Order Status :</label>
                            <p style="margin-left: 10px; margin-top: -5px;"><?php 
                            if($tes->transaction_status == 'settlement'&& $pemesanan->status_pemesanan == 'Already delivered' ){ 
                                echo "Already Delivered";
                            }else if($tes->transaction_status == 'settlement'&& $pemesanan->resi !== NULL){
                                echo "Order is on Delivery";
                            }else if($tes->transaction_status == 'expire'){
                                echo "Order has ben canceled, Payment time expired";
                            }else if($tes->transaction_status == 'cancel'){
                                echo "Order has ben canceled by Admin";
                            }else if($tes->transaction_status == 'pending'){
                                echo "Transaction is on Process";
                            }else {
                                echo "Order is being packed"; 
                            }
                            ?></p>
                            </div>

                            <div class="delivery-item">
                            <label style="margin-left: 10px; margin-top:10px">Shipment :</label>
                            <p style="margin-left: 10px; margin-top: -5px;"><?php 
                            if($pemesanan->resi === NULL){
                                echo "There is no Shipment yet";
                            }else{
                                echo $pemesanan->resi;
                            }
                            ?></p>
                            </div>
                        </div>

                        <div class="body-item">
                        <label style="font-weight: bold;font-size:20px;">Buy Quantity</label>
                        <h4 class="m-text2" style="margin-top: 50px">x <?php echo $item->quantity?></h4>
                        </div>

                        <div class="body-item">
                        <label style="font-weight: bold;font-size:20px;">Total Payment</label>
                        <h4 class="m-text2" style="margin-top: 50px"><?php
                        $total = $item->quantity * $produk['harga_produk'];
                        echo rupiah($total);
                        ?></h4>
                        </div>
                    </div>
                    <?php }?>
                </div>
                <!-- End foreach pemesanan group by order id -->
            </div>
            <?php }?>
            <!-- End foreach pemesanan where id_user -->

        </div>
    </div>
</section>