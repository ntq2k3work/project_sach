<!-- <?php 
    include "assets/bk/connect.php";
    session_start();
    if(!isset($_SESSION['id'])){
        header('location:error.php');
        exit;
    }
?> -->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        echo $_SESSION['name'] . ' '.$_SESSION['id'];
    ?>
    <a href="signout.php">Đăng xuất</a>
</body>
</html> -->


<!-- -------------------------- -->

<div class="user_form">
    <div class="user_main">
        <p class="user_name"><?php echo $_SESSION['name'] ?> </p>
        <ul>
            <li class="user_information"><a href="">Thông tin cá nhân</a></li>
            <li class="user_information"><a href="">Danh sách hàng đã đặt</a></li>
        </ul>
    </div>
    <hr style="opacity: 0.3; margin: 12px;">
    <ul class="sign_help">
        <li class="move_sign_up"><a href="signout.php">Đăng xuất</a></li>
    </ul>
</div>
<style>
    .user_form{
        position: absolute;
        top: calc( 100% + 16px );
        right: 80%;
        transform: translateX(20%);
        background-color: #fff;
        width: 350px;
        padding: 16px 0;
        box-shadow: 0 1px 5px 2px rgba(0, 0, 0, 0.1);
        color: #677279;
        display: none;
        border-radius: 5px;
    }
    .user_name{
        text-align: center;
        font-size: 18px;
        color: #000;
        margin: 10px 0;
    }
    .user_form ul{
        padding-left: 10px;
    }
    .user_form ul>li{
        list-style: circle;
        /* padding-left: 10px; */
    }
    .user_information{
        margin-left: 16px;
    }
    .user_information a{
        text-decoration: none;
        padding: 8px 0;
        display: block;
    }
</style>