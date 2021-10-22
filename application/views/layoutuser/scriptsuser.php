<!--===============================================================================================-->
    <script type="text/javascript" src="<?php echo base_url()?>/assets/fashe/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url()?>/assets/fashe/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url()?>/assets/fashe/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>/assets/fashe/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url()?>/assets/fashe/vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>


<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url()?>/assets/fashe/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>/assets/fashe/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url()?>/assets/fashe/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url()?>/assets/fashe/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url()?>/assets/fashe/vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script src="<?php echo base_url()?>/assets/fashe/js/main.js"></script>
  	<script type="text/javascript" src="<?php echo base_url()?>/assets/nuejsLogin.js"></script>
	  <script type="text/javascript" src="<?php echo base_url()?>/assets/nuejs.js"></script>
	  <script type="text/javascript" src="<?php echo base_url()?>/assets/keranjangbelanja.js"></script>
	  <script type="text/javascript" src="<?php echo base_url()?>/assets/kategorimodal.js"></script>

	  <!-- Midtrans -->
	  <script type="text/javascript">
  
    $('#pay-button').click(function (event) {
      event.preventDefault();
      $(this).attr("disabled", "disabled");
		
	  var namadepan = $("#namadepan").val();
	  var namabelakang = $("#namabelakang").val();
	  var namajalan = $("#namajalan").val();
	  var provinsi = $("#provinsi").val();
	  var kota = $("#kota").val();
	  var kecamatan = $("#kecamatan").val();
	  var kelurahan = $("#kelurahan").val();
	  var kodepos = $("#kodepos").val();
	  var totalbayar = $("#totalbayar").val();
	  var phone_number = $('#phone_number').val();
    $.ajax({
	type: 'POST',
      url: '<?=site_url()?>/snap/token',
	  data: {
		  namadepan:namadepan, 
		namabelakang:namabelakang,
		namajalan:namajalan,
		provinsi:provinsi,
		kota:kota,
		kecamatan:kecamatan,
		kelurahan:kelurahan,
		kodepos:kodepos,
		totalbayar:totalbayar,
		phone_number:phone_number
	},
      cache: false,

      success: function(data) {
        //location = data;

        console.log('token = '+data);
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {
          
          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });

  </script>
  <!-- Select Provinsi -->
  <script>
	$(document).ready(function(){
		$('#provinsi').change(function(){
			var nama = $(this).val();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('control_pemesanan/getDataCity')?>",
				data: {
					nama:nama
				},
				dataType: "JSON",
				success: function(response){
					$('#kota').html(response);
				}
			});
		});

		$('#kota').change(function(){
			var nama = $(this).val();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('control_pemesanan/getDataKecamatan')?>",
				data: {
					nama:nama
				},
				dataType: "JSON",
				success: function(response){
					$('#kecamatan').html(response);
				}
			});
		});

		$('#kecamatan').change(function(){
			var nama = $(this).val();
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('control_pemesanan/getDataKelurahan')?>",
				data: {
					nama:nama
				},
				dataType: "JSON",
				success: function(response){
					$('#kelurahan').html(response);
				}
			});
		});
	});
  </script>

</body>
</html>