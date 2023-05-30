<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/style_admin.css">
    <title>Document</title>
</head>
<body>
    <?php   include "../connect.php"; ?>
    <?php if(!empty($_SESSION['error'])){ ?>
    <script>alert("Tài khoản hoặc mật khẩu không chính xác")</script>
    <?php } ?>
    <?php unset($_SESSION['error']) ?>
        <div class="admin_container">
            <div class="container">

                <div class="header">
                    Đăng Nhập
                </div>
                <form action="process_login_admin.php" class="form_container" method="post">
                    <div class="section">
                        <label for="name_account">Nhập tài khoản: </label>
                        <input type="text" name="name_account" id="name_account" placeholder="Nhập tên tài khoản" > 
                        <div class="error"><i class="fa-solid fa-exclamation"></i></div>
                        <div class="message_error"></div>
                    </div>
                    <div class="section">
                        <label for="password">Nhập mật khẩu: </label>
                        <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" >
                        <div class="error"><i class="fa-solid fa-exclamation"></i></div>
                        <div class="message_error"></div>
                    </div>
                    <input type="submit" value="Đăng nhập" class="submit">
                </form>
                <a href="forgot_admin.php" class="back">Forgot Password</a>
            </div>
        </div>
</body>
    <script src="../validate/validate_login_ad.js"></script>
</html>