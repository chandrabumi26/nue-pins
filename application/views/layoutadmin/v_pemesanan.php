<!-- <?php 
function rupiah($angka){
	$hasil_rupiah = "Rp." . number_format($angka,2,',','.'); 
	return $hasil_rupiah;
}
?> -->
<div class="main_contant">
    <div class="bread-crumbs">
            <div class="head-spacing">
            
            <h2>Daftar Pemesanan</h2>
            <div class="hr">
			<hr>
		    </div>
            </div>
    </div>

    <div class="content_table">
    <div class="main">
    
        <table class="table table-striped table-bordered dt-responsive" width="100%" id="dataTable" >
            <thead>
                <tr>
                    <td>Tanggal Order</td>
                    <td>Order ID</td>
                    <td>Status Pemesanan</td>
                    <td>Nama User</td>
                    <td>Pembelian Produk</td>
                    <td>Status Pembayaran</td>
                    <td style="max-width:100px;">Nomor Resi</td>
                    <td>Total Pembayaran</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pemesanan as $pemesanan){
                    $data = array('id_user' => $pemesanan->id_user);
                    $firstname = $this->model_login->readuserById($data);
                    ?>
                <tr>
                    <td><?php echo $pemesanan->order_date?></td>
                    <td><?php echo $pemesanan->order_id?></td>
                    <td><?php 
                    $params = array('server_key' => 'SB-Mid-server-4NkRw7zQKJF__bYcrUfdrEhf', 'production' => false);
                    $this->load->library('veritrans');
                    $this->veritrans->config($params);
                    $tes = $this->veritrans->status($pemesanan->order_id);
                    if($tes->transaction_status == 'settlement' && $pemesanan->status_pemesanan == 'Transaksi sedang diproses'){
                        echo "Pembayaran sudah dilakukan";
                    }else if($tes->transaction_status == 'settlement' && $pemesanan->status_pemesanan == 'on delivery'){
                        echo "Sedang Diantar";
                    }else if($tes->transaction_status == 'settlement' && $pemesanan->status_pemesanan == 'Already delivered'){
                        echo "Sudah Sampe";
                    }else if($tes->transaction_status == 'pending'){
                        echo "Pembayaran belum dilakukan";
                    }else if($tes->transaction_status == 'expire'){
                        echo "Tanggal transaksi telah kadaluarsa";
                    }else if($tes->transaction_status == 'cancel'){
                        echo "Transaksi dibatalkan";
                    }
                    ?></td>
                    <td><?php echo $firstname['firstname']?></td>
                    <?php $item = $this->model_pemesanan->readInnerPemesanan($pemesanan->order_id);?>
                    <td><?php foreach($item as $item){
                        $data = array('id_produk' => $item->id_produk);
						$produk = $this->model_produk->readDetail($data);
                        echo $produk['nama_produk'];?>
                        <br>
                        <?php }?>
                    </td>
                    <td><?php 
                    echo $tes->transaction_status;
                    ?></td>
                    <td>
                    <?php if($tes->transaction_status == 'expire'){
                        echo "Tanggal transaksi telah kadaluarsa";
                    }else if($tes->transaction_status == 'cancel'){
                        echo "Transaksi telah dibatalkan";
                    }else if($tes->transaction_status == 'pending'){
                        echo "Pembayaran belum dilakukan";
                    }else if($pemesanan->status_pemesanan == 'Already delivered'){
                        echo $pemesanan->resi;
                    }else if($tes->transaction_status == 'settlement'){
                        echo $pemesanan->resi?>
                    <a style="color: white;" data-toggle="modal" data-target="#modalUbah<?php echo $pemesanan->order_id?>" class="btn-edit"><i class="fa fa-edit"></i> Masukan</a>
                    <?php }?>
                    </td>
                    <td><?php echo rupiah($pemesanan->total_gross)?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    
    </div>
    </div>

</div>
<!-- End Main content -->
</div>
<!-- End Vertical -->

<?php foreach($pmsn as $pmsn){?>
<div style="background-color:rgba(0,0,0,0.7);" class="modal fade" id="modalUbah<?php echo $pmsn->order_id?>" role="dialog">
	<div class="modal-dialog">
    <form method="post" action="<?php echo base_url('control_pemesanan/updateResi/'.$pmsn->order_id)?>">
	<div class="modal-content">
      	<div class="modal-content-a">
          <h3 class="modal-title" id="exampleModalLabel">Pengisian Nomor Resi</h3>
        <div class="hr">
			<hr>
		</div>
			<div class="modal-body">
                    <div class="form-control-a col-sm">
                        <label for="nama_produk">Agen Pengiriman</label>
						<select name="agen">
                        <option value="JNE" selected>JNE</option>
                        <option value="J&T">J&T</option>
                        </select>
                    </div>

                    <div class="form-control-a col-sm">
                        <label for="nama_produk">Nomor Resi</label>
						<input type="text" name="no_resi" required>
                    </div>

					<div class="form-control-a col-sm">
					<button type="submit" class="btn btn-a bg-b">Submit</button>
					</div>
			</div>
		</div>
	</div>
    </form>
    </div>
</div>
<?php }?>


