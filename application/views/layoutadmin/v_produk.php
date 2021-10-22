<?php 
function rupiah($angka){
	$hasil_rupiah = "Rp." . number_format($angka,2,',','.'); 
	return $hasil_rupiah;
}
?>
<div class="main_contant">
    <div class="bread-crumbs">
            <div class="head-spacing">
            
            <h2>Daftar Produk</h2>
            <div class="hr">
			<hr>
		    </div>
            
            <a style="color: white; margin-bottom:-20px;margin-top:5px;" class="btn-tambah" data-toggle="modal" data-target="#modalTambah">Tambah Produk</a>
            
            </div>
    </div>

    <div class="content_table">
    <div class="main">
        <table class="table table-bordered" width="100%" id="dataTable" >
            <thead>
                <tr>
                    <td>Name</td>
                    <td>Gambar Produk</td>
                    <td>Harga</td>
                    <td>Stock</td>
                    <td>Kategori</td>
                    <td>Deskripsi</td>
                    <td>Opsi</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($produk as $produk){?>
                <tr>
                    <td><?php echo $produk->nama_produk?></td>
                    <td><img src="<?php echo base_url('assets/upload/'.$produk->gambar_produk)?>" style="width:50px;height:50px"></td>
                    <td><?php echo rupiah($produk->harga_produk)?></td>
                    <td><?php echo $produk->stock?></td>
                    <td><?php echo $produk->kategori?></td>
                    <td width="200px"><?php echo $produk->deskripsi?></td>
                    <td><a style="color: white;" data-toggle="modal" data-target="#modalUbah<?php echo $produk->id_produk?>" class="btn-edit"><i class="fa fa-edit"></i> Ubah</a>
                    <a href="<?php echo base_url('control_produk/hapusProduk/'.$produk->id_produk)?>" onclick="return confirm('Setuju?')" class="btn-delete"><i class="fa fa-trash"></i></a></td>
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

<!-- Modal Tambah-->
    <!-- <div class="modal-bg">
        <div class="modal">
        <?php echo form_open_multipart('control_produk/buatProduk');?>
            <h2>Tambah Produk</h2>
            <label>Nama Produk : </label>
            <input type="text" name="nama_produk">
            <label>Harga Produk : </label>
            <input type="text" id="rupiah1" name="harga_produk" placeholder="Rp.000,00">
            <label>Stock : </label>
            <input type="number" name="stock">
            <label>Gambar Produk : </label>
            <input type="file" name="gambar_produk">
            <label>Kategori Produk : </label>
            <input type="text" name="kategori">
            <label>Deskripsi : </label>
            <textarea rows="4" placeholder="Deskripsi produk..." name="deskripsi"></textarea>
            <button>Tambah</button>
            <?php echo form_close()?>
            <span class="modal-close">X</span>
        </div>
    </div> -->

<!-- Modal Tambah-->
<div style="background-color:rgba(0,0,0,0.7);" class="modal fade" id="modalTambah" role="dialog">
	<div class="modal-dialog">
    <?php echo form_open_multipart('control_produk/buatProduk');?>
	<div class="modal-content">
      	<div class="modal-content-a">
          <h3 class="modal-title" id="exampleModalLabel">Tambah Data Produk</h3>
          <div class="hr">
			<hr>
			</div>
			<div class="modal-body">
                    <div class="form-control-a col-sm">
                        <label for="nama_produk">Nama Produk</label>
						<input type="text" name="nama_produk" required>
                    </div>

                    <div class="form-control-a col-sm">
                        <label for="nama_produk">Harga Produk</label>
						<input type="text" placeholder="Rp.000,00" name="harga_produk" id="rupiah1">
                    </div>

                    <div class="form-control-a col-sm">
                        <label for="nama_produk">Stok Produk</label>
						<input type="number" name="stock" required>
                    </div>

                    <div class="form-control-a col-sm">
                        <label for="nama_produk">Gambar Produk</label>
						<input type="file" name="gambar_produk" required>
                    </div>

                    <div class="form-control-a col-sm">
                        <label for="nama_produk">Kategori Produk</label>
						<select name="kategori">
                        <option value="Anting">Anting</option>
                        <option value="Kalung">Kalung</option>
                        <option value="Strap">Strap</option>
                        <option value="CinCin">Cin Cin</option>
                        <option value="JepitRambut">Jepit Rambut</option>
                        </select>
                    </div>

                    <div class="form-control-a col-sm">
                        <label for="nama_produk">Deskripsi Produk</label>
						<textarea rows="4" name="deskripsi"></textarea>
                    </div>

					<div class="form-control-a col-sm">
					<button type="submit" class="btn btn-a bg-b">Tambah</button>
					</div>
			</div>
		</div>
	</div>
    <?php echo form_close()?>
    </div>
</div>

<!-- Modal Ubah -->
<?php foreach($prd as $prd){?>
<div style="background-color:rgba(0,0,0,0.7);" class="modal fade" id="modalUbah<?php echo $prd->id_produk?>" role="dialog">
	<div class="modal-dialog">
    <?php echo form_open_multipart('control_produk/ubahProduk/'.$prd->id_produk);?>
	<div class="modal-content">
      	<div class="modal-content-a">
          <h3 class="modal-title" id="exampleModalLabel">Ubah Data Produk</h3>
        <div class="hr">
			<hr>
		</div>
			<div class="modal-body">
                    <div class="form-control-a col-sm">
                        <label for="nama_produk">Nama Produk</label>
						<input type="text" name="nama_produk" value="<?php echo $prd->nama_produk?>" required>
                    </div>

                    <div class="form-control-a col-sm">
                        <label for="nama_produk">Harga Produk</label>
						<input type="text" placeholder="Rp.000,00" name="harga_produk" id="rupiah2" value="<?php echo $prd->harga_produk?>">
                    </div>

                    <div class="form-control-a col-sm">
                        <label for="nama_produk">Stok Produk</label>
						<input type="number" name="stock" value="<?php echo $prd->stock?>" required>
                    </div>

                    <div class="form-control-a col-sm">
                        <label for="nama_produk">Gambar Produk</label>
						<input type="file" name="gambar_produk">
                    </div>

                    <div class="form-control-a col-sm">
                        <label for="nama_produk">Kategori Produk</label>
						<select name="kategori">
                        <?php if($prd->kategori == "Anting"){?>
                        <option value="Anting" selected>Anting</option>
                        <option value="Kalung">Kalung</option>
                        <option value="Strap">Strap</option>
                        <option value="CinCin">Cin Cin</option>
                        <option value="JepitRambut">JepitRambut</option>
                        <?php }else if($prd->kategori == "Kalung"){?>
                        <option value="Anting">Anting</option>
                        <option value="Kalung" selected>Kalung</option>
                        <option value="Strap">Strap</option>
                        <option value="CinCin">Cin Cin</option>
                        <option value="JepitRambut">JepitRambut</option>
                        <?php }else if($prd->kategori == "Strap"){?>
                        <option value="Anting">Anting</option>
                        <option value="Kalung">Kalung</option>
                        <option value="Strap" selected>Strap</option>
                        <option value="CinCin">Cin Cin</option>
                        <option value="JepitRambut">JepitRambut</option>
                        <?php }else if($prd->kategori == "CinCin"){?>
                        <option value="Anting">Anting</option>
                        <option value="Kalung">Kalung</option>
                        <option value="Strap">Strap</option>
                        <option value="CinCin" selected>Cin Cin</option>
                        <option value="JepitRambut">JepitRambut</option>
                        <?php }else if($prd->kategori == "JepitRambut"){?>
                        <option value="Anting">Anting</option>
                        <option value="Kalung">Kalung</option>
                        <option value="Strap">Strap</option>
                        <option value="CinCin">Cin Cin</option>
                        <option value="JepitRambut" selected>JepitRambut</option>
                        <?php }?>
                        </select>
                    </div>

                    <div class="form-control-a col-sm">
                        <label for="nama_produk">Deskripsi Produk</label>
						<textarea rows="4" name="deskripsi"><?php echo $prd->deskripsi?></textarea>
                    </div>

					<div class="form-control-a col-sm">
					<button type="submit" class="btn btn-a bg-b">Ubah</button>
					</div>
			</div>
		</div>
	</div>
    <?php echo form_close()?>
    </div>
</div>
<?php }?>


