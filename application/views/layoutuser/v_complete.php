<section class="bgwhite p-b-65">
    <div class="container">
        <div class="row">
            <div class="thxpage">
                <h1>Thank You !</h1>
                <img src="<?php echo base_url('assets/upload/complete.png')?>">
                <h5>Your order was completed successfully</h5>
                <p>You can visit My Order page in account logo any time to check the status, <br> 
                    And learn how to pay of your order, Or click link below to print your receipt. </p>
                <?php foreach($pemesanan as $pemesanan){?>
                <a href="<?php echo $pemesanan->pdf_url?>"><u>Print Receipt</u> <i class="fa fa-file-pdf-o"></i></a>
                <?php }?>
                <a href="<?php echo base_url()?>" style="color:white;" class="btn btn-a bg-b">Back to Homepage</a>
            </div>
        </div>
    </div>
</section>