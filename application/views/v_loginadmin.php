<?php
include('layoutLogin/head.php');
?>

<body class="bg-admin">
    <div class="container">
        
            
        <div class="center-item">
            <h1 class="text-center">nuepins.com</h1>
            <?= $this->session->flashdata('message')?>
            <form method="post" action="<?= base_url('control_login/checkAdminAccount')?>">
            <div class="form-control-admin col-sm-40">
            <input type="email" placeholder="Email" name="emailAdmin" id="emailAdmin">
            </div>

            <div class="form-control-admin col-sm-40">
            <input type="password" placeholder="Password" name="pwdAdmin" id="pwdAdmin">
            </div>
            
            <div class="button-md-center">
            <button type="submit" class="btn btn-bt-confirm bg-bt-confirm">Login</button>
            </div>
            </form>
        </div>

        
        
    </div>    


<?php
include('layoutLogin/scripts.php');
?>