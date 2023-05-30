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
        <div class="admin_container">
            <div class="container">

                <div class="header">
                    Khôi Phục Tài Khoản
                </div>
                <form action="process_login_admin.php" class="form_container">
                    <div class="section">
                        <label for="name_account">Nhập email: </label>
                        <input type="email" name="name_account" id="name_account" placeholder="Nhập email để khôi phục" >
                        <div class="error"><i class="fa-solid fa-exclamation"></i></div>
                        <div class="message_error"></div>
                    </div>
                    <input type="button" value="Gửi lại mật khẩu" class="submit">
                </form>
                <a href="index.php" class="back">Đăng Nhập</a>
            </div>
        </div>
</body>
<script src="../validate/validate_forgot.js"></script>
</html>