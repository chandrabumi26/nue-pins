<!-- Slide1 -->
<?php 
function rupiah($angka){
	$hasil_rupiah = "Rp." . number_format($angka,0,',','.'); 
	return $hasil_rupiah;
}
?>
<section class="slide1">
		<div class="container">
			<div class="wrap-slick1">
			<div class="slick1">
				<!-- Foreach from New Arrivals -->

				<div class="item-slick1 item1-slick1" style="background-image: url(<?php echo base_url()?>/assets/fashe/images/nuecover.jpg);">
					
				</div>

				<div class="item-slick1 item1-slick1" style="background-image: url(<?php echo base_url()?>/assets/fashe/images/nuecover2.jpg);">
					<div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
							
						</h2>
					</div>
				</div>

			</div>
			</div>
		</div>
	</section>

	<!-- Banner -->
	<section class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="<?php echo base_url()?>/assets/fashe/images/strap.png" alt="IMG-BENNER" width="300" height="375">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="<?php echo base_url('categories/strap')?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Strap
							</a>
						</div>
					</div>

					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="<?php echo base_url()?>/assets/fashe/images/rings.jpg" alt="IMG-BENNER" width="300" height="375">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="<?php echo base_url('categories/rings')?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Rings
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="<?php echo base_url()?>/assets/fashe/images/necklace.jpg" alt="IMG-BENNER" width="300" height="375">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="<?php echo base_url('categories/necklace')?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4" width="300" height="375">
								Necklaces
							</a>
						</div>
					</div>

					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="<?php echo base_url()?>/assets/fashe/images/earings.png" alt="IMG-BENNER" width="300" height="375"> 

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="<?php echo base_url('categories/earings')?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Earings
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
					<!-- block1 -->
					<div class="block1 hov-img-zoom pos-relative m-b-30">
						<img src="<?php echo base_url()?>/assets/fashe/images/pins.png" alt="IMG-BENNER" width="300" height="375">

						<div class="block1-wrapbtn w-size2">
							<!-- Button -->
							<a href="<?php echo base_url('categories/clips')?>" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
								Pins
							</a>
						</div>
					</div>

					
				</div>
			</div>
		</div>
	</section>

	<!-- Featured Product -->
	<section class="newproduct bgwhite p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Featured Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">

				<?php 
				$prod = $this->model_produk->readFeatured();
				foreach($prod as $prod){?>
					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="<?php echo base_url('assets/upload/'.$prod->gambar_produk)?>" width="400" height="350">

								<div class="block2-overlay trans-0-4">
									<!-- <div class="block2-btn-addcart w-size1 trans-0-4">
										
										<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
											Add to Cart
										</button>
									</div> -->
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
									<?php echo $prod->nama_produk?>
								</a>

								<span class="block2-price m-text6 p-r-5">
									<?php echo rupiah($prod->harga_produk)?>
								</span>
							</div>
						</div>
					</div>
				<?php }?>

				</div>
			</div>

		</div>
	</section>

	<!-- Lookbook !Optional--> 
	<!-- <section class="banner2 bg5 p-t-55 p-b-55">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
					<div class="hov-img-zoom pos-relative">
						<img src="https://i.ibb.co/mhH2J7V/Screenshot-1.png" alt="IMG-BANNER">

						<div class="ab-t-l sizefull flex-col-c-m p-l-15 p-r-15">
							<span class="m-text9 p-t-45 fs-20-sm">
								The Beauty
							</span>

							<h3 class="l-text1 fs-35-sm">
								Lookbook
							</h3>

							<a href="#" class="s-text4 hov2 p-t-20 ">
								View Collection
							</a>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
					<div class="bgwhite hov-img-zoom pos-relative p-b-20per-ssm">
						<img src="https://i.ibb.co/mhH2J7V/Screenshot-1.png" alt="IMG-BANNER">

						<div class="ab-t-l sizefull flex-col-c-b p-l-15 p-r-15 p-b-20">
							<div class="t-center">
								<a href="product-detail.html" class="dis-block s-text3 p-b-5">
									Gafas sol Hawkers one
								</a>

								<span class="block2-oldprice m-text7 p-r-5">
									$29.50
								</span>

								<span class="block2-newprice m-text8">
									$15.90
								</span>
							</div>

							<div class="flex-c-m p-t-44 p-t-30-xl">
								<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
									<span class="m-text10 p-b-1 days">
										69
									</span>

									<span class="s-text5">
										days
									</span>
								</div>

								<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
									<span class="m-text10 p-b-1 hours">
										04
									</span>

									<span class="s-text5">
										hrs
									</span>
								</div>

								<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
									<span class="m-text10 p-b-1 minutes">
										32
									</span>

									<span class="s-text5">
										mins
									</span>
								</div>

								<div class="flex-col-c-m size3 bo1 m-l-5 m-r-5">
									<span class="m-text10 p-b-1 seconds">
										05
									</span>

									<span class="s-text5">
										secs
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> -->

	<!-- Instagram -->
	<section class="instagram p-t-20">
		<div class="container">
			<div class="sec-title p-b-52 p-l-15 p-r-15">
			<h3 class="m-text5 t-center">
				@ follow us on Instagram
			</h3>
		</div>

		<div class="flex-w">
			<!-- Block4 -->
			<div class="block4 wrap-pic-w">
				<img src="https://i.ibb.co/GnwcTHw/119999128-125272219031702-7903571260909238237-n-1.jpg" alt="" style="width:400px; height:350px;" >

				<a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">16</span>
					</span>

					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
						Pacage in your way!
						</p>

						<span class="s-text9">
							Photo by @nue_pins
						</span>
					</div>
				</a>
			</div>

			<!-- Block4 -->
			<div class="block4 wrap-pic-w">
				<img src="https://i.ibb.co/R6JnXV9/119422555-130888048369629-1187117924287845740-n.jpg" alt="IMG-INSTAGRAM" style="width:400px; height:350px;">

				<a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">11</span>
					</span>

					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
						NUErings🤩 this friday!
						</p>

						<span class="s-text9">
							Photo by @nue_pins
						</span>
					</div>
				</a>
			</div>

			<!-- Block4 -->
			<div class="block4 wrap-pic-w">
				<img src="https://i.ibb.co/WfwKgQ3/116016633-179287190256714-2337305355091653302-n.jpg" alt="IMG-INSTAGRAM" style="width:400px; height:350px;">

				<a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">21</span>
					</span>

					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							mirror mirror on the wall, which the cutest necklace of them all 😜
						</p>

						<span class="s-text9">
							Photo by @nue_pins
						</span>
					</div>
				</a>
			</div>

			<!-- Block4 -->
			<div class="block4 wrap-pic-w">
				<img src="https://i.ibb.co/G3gYZDp/83656911-888424864909348-8632324673337705374-n.jpg" alt="IMG-INSTAGRAM" style="width:400px; height:350px;">

				<a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">26</span>
					</span>

					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
						You should have something unique inside your bags! 😋✨💝 .
						Feel free to choose!
						</p>

						<span class="s-text9">
							Photo by @nue_pins
						</span>
					</div>
				</a>
			</div>

			<!-- Block4 -->
			<div class="block4 wrap-pic-w">
				<img src="https://i.ibb.co/ncw9wGc/68896282-380775692595923-8542053169253746110-n.jpg" alt="IMG-INSTAGRAM" style="width:400px; height:350px;">

				<a href="#" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">20</span>
					</span>

					<div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
						<p class="s-text10 m-b-15 h-size1 of-hidden">
							#nuepinspiration 💖
						</p>

						<span class="s-text9">
							Photo by @nue_pins
						</span>
					</div>
				</a>
			</div>
		</div>
		</div>
	</section>

	<!-- Shipping -->
	<section class="shipping bgwhite p-t-62 p-b-46">
		<div class="flex-w p-l-15 p-r-15">
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Free Delivery
				</h4>

				<span class="s-text11 t-center">
					Don't need to think the delivery cost, we take care of it!
				</span>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
				<h4 class="m-text12 t-center">
					Register and Buy!
				</h4>

				<span class="s-text11 t-center">
					Register to buy our products!
				</span>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Store Opening
				</h4>

				<span class="s-text11 t-center">
				📍Localstrunk PIM, PS, MOI & GI (Temproray Closed)
				</span>
			</div>
		</div>
	</section>