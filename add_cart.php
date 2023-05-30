<?php 
    include "./assets/connect.php";
    session_start();
    if(empty($_GET['id'])){
        header("location:error.php");
        exit;
    }
    $id = $_GET['id'];
    $sql_check = "SELECT * FROM products WHERE id = '$id'";
    $check = mysqli_fetch_row(mysqli_query($connect,$sql_check));
    if(!$check[0]){
        header("location:error.php");
        exit;
    }
    if(empty($_SESSION['cart'])){
        $_SESSION['cart']["$id"] = 1;
    }else{
        if(!empty($_SESSION['cart']["$id"])) {
            $_SESSION['cart']["$id"] ++;
        }else{
            $_SESSION['cart']["$id"] = 1;
        }
    }
    print_r($_SESSION['cart']);
    session_start();
    $_SESSION['add_compelete'] = "Thêm giỏ hàng thành công";
    $previous_page = $_SERVER['HTTP_REFERER'];
    header("location:$previous_page");
?>