<div class="sidebar-nav">
        <div class="logo">
            <a href="#">
                <h1 style="font-weight:bold;">Nuepins</h1>
            </a>
            <a href="#">
                <img src="img/logo-2.png">
            </a>
        </div>
        <div class="hr">
			<hr>
		</div>
        <div class="profile">
            <div class="avtar">
                <div class="circle-image">
					<img src="<?php echo base_url()?>/assets/fashe/images/logo.jpg" alt="">
                </div>
            </div>
            <div class="name-pos">
                <h3><?php echo $nama?></h3>
                <h5>Admin</h5>
            </div>
        </div>

        <div class="side-nav">
            <ul>
                <li>
                    <span><i class="fas fa-home"></i></span>
                    <a href="<?php echo base_url('admin/home')?>">Dashbord</a>
                </li>
                <li>
                    <span><i class="fa fa-list"></i></span>
                    <a href="<?php echo base_url('admin/produk')?>">Daftar Produk</a>
                </li>
                <li>
                    <span><i class="fab fa-wpforms"></i></span>
                    <a href="<?php echo base_url('control_pemesanan/loadDataPemesanan')?>">Daftar Pemesanan</a>
                </li>
                <li>
                    <span><i class="fas fa-sign-out-alt"></i></span>
                    <a href="<?php echo base_url('control_login/logoutAdmin')?>">Log Out</a>
                </li>
            </ul>
        </div>

    </div>