<?php 
        $error_sign ="";
        if(isset($_GET['errorsi'])) $error_sign ="Tài khoản hoặc mật khẩu không chính xác!";
        if(isset($_GET['errorsu'])) $error_sign ="Tài khoản hoặc email đã tồn tại !";
?>
<?php if($error_sign){?>
    <div id="modal" class="on_form">
        <div class="notify">
            <div class="notify_content "><?php echo $error_sign  ?></div>
            <i class="fa-solid fa-xmark notify_icon"></i>
        </div>
    </div>
<?php } ?>
<script src="./assets/process_js/modal_sign.js"></script>