<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="wrap_header">
				<!-- Logo -->
				<a href="<?php echo base_url()?>" class="logo">
					<h2 style="color: white;
                                font-family: Verdana, Geneva, Tahoma, sans-serif;
                                font-weight: bold;">nuepins.com</h2>
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">

                            <li>
							<a href="<?php echo base_url()?>">Home</a>
								<!-- <a href="<?php echo base_url()?>/assets/fashe/cart.html">Home</a> -->
							</li>

							<li>
								<a href="#">Catalog</a>
								<ul class="sub_menu">
									<li><a href="<?php echo base_url('categories/clips')?>">Hair Clip</a></li>
									<li><a href="<?php echo base_url('categories/earings')?>">Earings</a></li>
									<li><a href="<?php echo base_url('categories/necklace')?>">Necklace</a></li>
									<li><a href="<?php echo base_url('categories/strap')?>">Strap</a></li>
									<li><a href="<?php echo base_url('categories/rings')?>">Rings</a></li>
								</ul>
							</li>

							<li>
								<a href="<?php echo base_url('about')?>">About</a>
							</li>

						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					<?php if($this->session->has_userdata('email')){?>
						<p style="color: white;
						font-family: Verdana, Geneva, Tahoma, sans-serif;
						font-size: 15px;
						margin-right:10px"
						><?php echo $nama?></p>
						<div class="header-wrapicon2">
						<img src="<?php echo base_url()?>/assets/fashe/images/icons/account-logo.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
							<li class="header-cart-item">
							<a href="<?php echo base_url('control_pemesanan/loadPemesananUser')?>"> My Orders</a>
							</li>
							<div class="hr">
							<hr>
							</div>
							<li class="header-cart-item">
							<a href="<?php echo base_url('control_login/logoutUser')?>"> Logout</a>
							</li>
							</ul>
						</div>	
					</div>
					<?php }else{?>
						<a style="color: white;
								margin-right:-10px;
								cursor:pointer" data-toggle="modal" data-target="#myModal">
							Join Us Now!
						</a>
							
					<?php }?>

					<span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="<?php echo base_url()?>/assets/fashe/images/icons/shop-bag.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<!-- Count cart where id_user -->
						<?php $abc = count($headcount);
						
						if($abc==0){?>
						<span class="header-icons-noti">0</span>
						<?php }else{?>
							<span class="header-icons-noti"><?php echo $abc?></span>
						<?php }?>
						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<?php if($abc==0){?>
									<li class="header-cart-item">
									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											There is no Item in your cart
										</a>
										
										<span class="header-cart-item-info">
											
										</span>
									</div>
								</li>
								<?php }else{?>
								<!-- Foreach cart -->
								<?php foreach($headcount as $headcount){
									$data = array('id_produk' => $headcount->id_produk);
									$prd = $this->model_produk->readDetail($data);
									?>
								<li class="header-cart-item">
									<div class="header-cart-item-img" onclick="location.href='<?php echo base_url('control_keranjang/deleteDataKeranjang/'.$headcount->id_keranjang)?>'">
										<img src="<?php echo base_url('assets/upload/'.$prd['gambar_produk'])?>">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											<?php echo $prd['nama_produk'];?>
										</a>
										
										<span class="header-cart-item-info">
											<?php echo $headcount->jumlah_pembelian?> x <?php echo $prd['harga_produk']?>
										</span>
									</div>
								</li>
								<?php }?>
								<?php }?>
							</ul>

							<div class="header-cart-total">
								
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="<?php echo base_url('control_keranjang/loadKeranjangUser')?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>
								
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Dekstop End -->

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.html" class="logo-mobile">
				<img src="<?php echo base_url()?>/assets/fashe/images/icons/logo.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="#" class="header-wrapicon1 dis-block">
						<img src="<?php echo base_url()?>/assets/fashe/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>

					<span class="linedivide2"></span>

					<div class="header-wrapicon2">
						<img src="<?php echo base_url()?>/assets/fashe/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="<?php echo base_url()?>/assets/fashe/images/item-cart-01.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											White Shirt With Pleat Detail Back
										</a>

										<span class="header-cart-item-info">
											1 x $19.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="<?php echo base_url()?>/assets/fashe/images/item-cart-02.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Converse All Star Hi Black Canvas
										</a>

										<span class="header-cart-item-info">
											1 x $39.00
										</span>
									</div>
								</li>

								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="<?php echo base_url()?>/assets/fashe/images/item-cart-03.jpg" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											Nixon Porter Leather Watch In Tan
										</a>

										<span class="header-cart-item-info">
											1 x $17.00
										</span>
									</div>
								</li>
							</ul>

							<div class="header-cart-total">
								Total: $75.00
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="<?php echo base_url()?>/assets/fashe/cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
							<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
							<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>

                    <li class="item-menu-mobile">
						<a href="<?php echo base_url()?>/assets/fashe/cart.html">Home</a>
					</li>

					<li class="item-menu-mobile">
						<a href="#">Category</a>
						<ul class="sub-menu">
							<li><a href="index.html">Rings</a></li>
							<li><a href="home-02.html">Necklace</a></li>
							<li><a href="<?php echo base_url('control_produk/loadKategori/Strap')?>">Strap</a></li>
						</ul>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>

					<li class="item-menu-mobile">
						<a href="product.html">Shop</a>
					</li>

					<li class="item-menu-mobile">
						<a href="product.html">Sale</a>
					</li>

					<li class="item-menu-mobile">
						<a href="about.html">About</a>
					</li>

					<li class="item-menu-mobile">
						<a href="contact.html">Contact</a>
					</li>
				</ul>
			</nav>
		</div>
		<!-- Header Mobile End -->
	</header>
	<!-- Header End -->

	<!-- Modal Login-->
	<div style="background-color:rgba(0,0,0,0.7);" class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog">
	<div class="modal-content">

      	<div class="modal-content-a">
		
		
			<div class="modal-body">
				<button type="button" class="close" id="closemodal" data-dismiss="modal">&times;</button>


				<div class="circle-image">
					<img src="<?php echo base_url()?>/assets/fashe/images/logo.jpg" alt="">
				</div>
				<?= $this->session->flashdata('message')?>
				<form id="formLogin" name="formLogin" method="post" action="<?= base_url('control_login/checkUserAccount')?>" onsubmit="return validatedLogin()">

					<div class="form-control">
						<input type="email" placeholder="Email" name="emailLogin" id="emailLogin">
						<i class="fa fa-check-circle"></i>
						<i id="validEmail"class="fa fa-exclamation-circle "></i>
						<small id="smallEmail">Error message</small>
					</div>

					<div class="form-control">
						<input type="password" placeholder="Password" name="pwdLogin" id="pwdLogin">
						<i class="fa fa-check-circle"></i>
						<i id="validPwd"class="fa fa-exclamation-circle "></i>
						<small id="smallPwd">Error message</small>
					</div>

					<div class="form-control-a col-sm">
					<button type="submit" class="btn btn-a bg-b">Login</button>
					</div>
				</form>
				<div class="hr">
				<hr>
				</div>
				<div class="text-center">
					<a style="color: rgb(24, 104, 252);" class="small" data-toggle="modal" data-dismiss="modal" data-target="#modalRegister">Create an Account!</a>
				</div>
				
			</div>
		
		
		</div>
    
	</div> 
	</div>
	</div>

	<!-- Modal Register-->
	<div style="background-color:rgba(0,0,0,0.7);" class="modal fade" id="modalRegister" role="dialog">
	<div class="modal-dialog">
	<div class="modal-content">

      	<div class="modal-content-a">
		
		
			<div class="modal-body">
				<button type="button" class="close" id="closemodal" data-dismiss="modal">&times;</button>


				<div class="circle-image">
					<img src="<?php echo base_url()?>/assets/fashe/images/logo.jpg" alt="">
				</div>
				<div class="text-center">
					<h4>Register Nuepins Account</h4>
				</div>
				<?= $this->session->flashdata('message')?>
				<form id="form" name="form" method="post" action="<?= base_url('control_register/registerAccount')?>" onsubmit="return validated()">

				<div class="form-group-a roy">
					<div class="form-control-a col-sm-6">
					<input type="text" placeholder="First Name" name="firstname" id="firstname">
					<i class="fa fa-check-circle"></i>
					<i id="valid1"class="fa fa-exclamation-circle "></i>
					<small id="small1">Error message</small>
					</div>

					<div class="form-control-a col-sm-6">
					<i class="fa fa-check-circle"></i>
					<i id="valid2" class="fa fa-exclamation-circle "></i>
					<input type="text" placeholder="Last Name" name="lastname" id="lastname">
					<small id="small2">Error message</small>
					</div>
				</div>

				<div class="form-control-a col-sm">
				<i class="fa fa-check-circle"></i>
				<i id="valid3" class="fa fa-exclamation-circle "></i>
				<input autocomplete="off" type="email" placeholder="Email" name="email" id="email">
				<small id="small3">Error message</small>
				</div>

				<div class="form-control-a col-sm">
				<!-- <i class="fa fa-check-circle"></i>
				<i id="valid3" class="fa fa-exclamation-circle "></i> -->
				<input autocomplete="off" type="text" placeholder="Phone Number" name="no_handphone" id="no_handphone">
				<!-- <small id="small3">Error message</small> -->
				</div>

				<div class="form form-group-a roy">
					<div class="form-control-a col-sm-6">
					<i class="fa fa-check-circle"></i>
					<i id="valid4" class="fa fa-exclamation-circle "></i>
					<input type="password" placeholder="Password" name="pwd" id="pwd">
					<small id="small4">Error message</small>
					</div>

					<div class="form-control-a col-sm-6">
					<i class="fa fa-check-circle"></i>
					<i id="valid5" class="fa fa-exclamation-circle "></i>
					<input type="password" placeholder="Repeat Password" name="pwd2" id="pwd2">
					<small id="small5">Error message</small>
					</div>
				</div>

					<div class="form-control-a col-sm">
					<button type="submit" class="btn btn-a bg-b">Register</button>
					</div>
				</form>
				<div class="hr">
				<hr>
				</div>
				<div class="text-center">
					<a style="color: rgb(24, 104, 252);" class="small" data-toggle="modal" data-dismiss="modal" data-target="#myModal">Already have account?</a>
				</div>
				
			</div>
		
		
		</div>
    
	</div> 
	</div>
	</div>

