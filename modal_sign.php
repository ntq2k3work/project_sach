
<?php 
        $notification ="";
        if(isset($_SESSION['errorsi'])) $notification ="Tài khoản hoặc mật khẩu không chính xác!";
        if(isset($_SESSION['errorsu'])) $notification ="Tài khoản hoặc email đã tồn tại !";
        if(isset($_SESSION['successmail'])) $notification ="Email đã được gửi !";
?>
<?php if(isset($_SESSION['errorsi']) || isset($_SESSION['errorsu']) || isset($_SESSION['successmail'])){?>
    <div id="modal" class="on_form">
        <div class="notify">
            <div class="notify_content "><?php echo $notification  ?></div>
            <i class="fa-solid fa-xmark notify_icon"></i>
        </div>
    </div>
<?php } 
    unset($_SESSION['errorsu']);
    unset($_SESSION['errorsi']);
    unset($_SESSION['successmail']);

?>
    <script src="./assets/process_js/modal_sign.js"></script>
