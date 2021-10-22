<?php
include('layoutLogin/head.php');
?>

<body class="bg-admin">
    <div class="container">
        
            
        <div class="center-item">
            <h1 class="text-center">nuepins.com</h1>
            <?= $this->session->flashdata('message')?>
            <form method="post" action="<?= base_url('control_register/registerAdmin')?>">

            <div class="form-control-admin col-sm-40">
            <input type="text" placeholder="Firstname" name="firstnameAdmin">
            </div>

            <div class="form-control-admin col-sm-40">
            <input type="text" placeholder="Lastname" name="lastnameAdmin">
            </div>

            <div class="form-control-admin col-sm-40">
            <input type="email" placeholder="Email" name="emailAdmin">
            </div>

            <div class="form-control-admin col-sm-40">
            <input type="password" placeholder="Password" name="pwdAdmin">
            </div>

            <div class="form-control-admin col-sm-40">
            <input type="password" placeholder="Re Password" name="pwdAdmin">
            </div>
            
            <div class="button-md-center">
            <button type="submit" class="btn btn-bt-confirm bg-bt-confirm">Register</button>
            </div>
            </form>
        </div>

        
        
    </div>    


<?php
include('layoutLogin/scripts.php');
?>