<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/favicon/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/favicon/favicon-32x32.png">
    <link rel="manifest" href="/assets/favicon/site.webmanifest">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/view_cart.css">
    <link rel="stylesheet" href="./assets/css/container_over.css">
    <title>Web bán sách</title>
</head>
<body>
    
    <?php 
        include "./assets/connect.php";
        include "modal_sign.php" ;
    ?>
    <?php
        $_SESSION['sum_money'] = 0;
        function convertMoney($value) {
            if ($value<0) return "-".convertMoney(-$value);
            return number_format(round($value/1000)*1000);
        }
    ?>

      <?php include "header.php" ?>  
      <!--  -->
        <div class="view_cart_container">
            
            <div class="cart_left">
                <h3>Giỏ hàng của bạn</h3>
                <hr>
                <p>Bạn đang có <strong><?php echo $_SESSION['sum_cart'] ?></strong> sản phẩm trong giỏ</p>
                <ul class="list_cart_books">
                    <?php 
                    if(isset($_SESSION['cart']))
                    foreach( $_SESSION['cart'] as $book_id => $value){ 
                    ?>
                        <?php
                            $_SESSION['sum_cart'] += $value;
                            $_SESSION['sum_money'] += $book_cart['price'] * $value;
                            $sql_select = "SELECT * FROM products WHERE id = '$book_id'";
                            $book_cart = mysqli_fetch_array(mysqli_query($connect,$sql_select));
                        ?>
                        <li>
                            <div class="cart_book_img">
                                <a href="products.php?id=<?php echo $book_id ?>&quantity=<?php echo $value ?>"><img src="./assets/admin/products/photos/<?php echo $book_cart['photo'] ?>" alt=""></a>
                            </div>
                            <div class="cart_book_container">
                                <a class="cart_book_close" href="delete_cart.php?id=<?php echo $book_id  ?>"><i class="fa-solid fa-xmark cart_book_close_icon"></i></a>
                                <a href="products.php?id=<?php echo $book_id ?>&quantity=<?php echo $value ?>"><h4 class="cart_book_name"><?php echo $book_cart['products_name'] ?></h4></a>
                                <div class="cart_book_quantity_cost">
                                    <form class="cart_form_quantity" action="quantity_cart.php?" >
                                        <input type="hidden" name="id"  value="<?php echo $book_id ?>">
                                        <input class="quantity_minus" type="submit" name="quantity_minus"  value="-" >
                                        <input class="quantity_view" type="text" name="quantity_view"  value="<?php echo $value; ?>" readonly>
                                        <input class="quantity_add" type="submit" name="quantity_add"  value="+">
                                    </form>
                                    <div class="cart_book_cost">
                                        <?php echo convertMoney($book_cart['price'] * $value);  ?> đ
                                    </div>
                                </div>
                            </div>
                        </li>
                        
                    <?php } ?>
                </ul>
            </div>
            <div class="cart_right">
                <h1>Thông tin đơn hàng</h1><hr>
                <h2>Tổng tiền: <?php echo convertMoney($_SESSION['sum_money'])  ?> đ</h2>
                <ul>
                    <li>Phí vận chuyển sẽ được tính ở trang thanh toán. </li>
                    <li>Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</li>
                </ul>
                <button>Thanh Toán</button>
            </div>
        </div>
   
        <?php include "new_feed.php" ?>
   </div>
    <?php include "footer.php" ?>
   <script src="./assets/process_js/slider_action.js"></script>
</body>
</html>