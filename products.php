<?php session_start(); ?>
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
    <link rel="stylesheet" href="./assets/css/style_product.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <title>Web bán sách</title>
</head>
<body>
    <?php
        function convertMoney($value){
            if($value < 0) return '-'. convertMoney(-$value);
            return number_format(round($value/1000)*1000);
        }
        include "./assets/connect.php";
        include "./assets/print_error.php";
        $id = "";
        /// Nếu cố tình sửa id thì sẽ chuyển hướng sang trang lỗi
        if(empty($_GET['id'])){
            header('location:error.php?error=ID không thể trống !');   
            exit;
        }
        $sql_select_manufactures = "select * from manufactures";
        $list_manufactures = mysqli_query($connect,$sql_select_manufactures);
        //Kiểm tra id có tồn tại không
        $id = $_GET['id'];
        $sql_check_id = mysqli_query($connect,"SELECT EXISTS (SELECT * FROM products WHERE id = '$id')");
        $check_id = mysqli_fetch_array($sql_check_id);
        if(!$check_id[0]){
            header('location:error.php?error=ID không tồn tại!');
            exit;
        }
        include "header.php";
        $id = $_GET['id'] ;
        /// Lấy thông tin từ ID
        $sql_product = "select * from products inner join manufactures on products.id_manufactures = manufactures.id_manufactures where id = '$id'";
        $book = mysqli_fetch_array(mysqli_query($connect,$sql_product));
        $category = $book['category'];
        $list_category_book = "select * from products inner join manufactures on products.id_manufactures = manufactures.id_manufactures where category = '$category' and id != '$id'";
        $category_books = mysqli_query($connect,$list_category_book);
        $quantity = 1;
    ?>
    <ol class="breadcrumb"></ol>
    <div class="product_container">
        <div class="product_container_left">
            <img src="./assets/admin/products/photos/<?php echo $book['photo'] ?>" alt="">
        </div>
        <div class="product_container_right">
            <div class="product_dentail_ship">
                <div class="product_dentail">
                    <h2 class="product_dentail_name" title="<?php echo $book['products_name'] ?>"><?php echo $book['products_name'] ?></h2>
                    <p class="mtb_10">Tình trạng: 
                        <?php if($book['quantity'] > 0) {?>  <b class="dentail_status_on"><?php echo "Còn hàng" ?></b> <?php }?>
                        <?php if($book['quantity'] <= 0) {?>  <b class="dentail_status_off"><?php echo "Hết hàng" ?></b> <?php }?>
                    </p>
                    <p class="mtb_10">Nhà xuất bản: <b class="dentail_status_on"><?php echo $book['name'] ?></b></p>
                    <div class="product_price_sale">
                        <?php if($book['sale_percents'] > 0){ ?>
                            <div class="product_sale"><?php echo '-'.$book['sale_percents'].'%' ?></div>
                            <del class="product_price price_old"><?php echo convertMoney($book['price']) ?> <u>đ</u></del>
                        <?php } ?>
                        <h2 class="product_price price_new"><?php
                            if($book['sale_percents'] == 0){
                                echo convertMoney($book['price']);
                            }
                            else echo convertMoney($book['price']*(100-$book['sale_percents'])/100) ?><u>đ</u>
                        </h2>
                    </div>
                </div>
                <div class="product_ship">
                    <div class="ship_section">
                        <p class="ship_section_icon fa-solid fa-box"></p> <p>Cam kết 100% chính hãng</p>
                    </div>
                    <div class="ship_section">
                        <p class="ship_section_icon fa-solid  fa-truck-fast"></p> <p>Giao hàng dự kiến: <br> <b>Thứ 2 - Thứ 6 từ 9h00 - 17h00</b> </p>
                    </div>
                    <div class="ship_section">
                        <p class="ship_section_icon fa-solid fa-phone"></p> <p>Hỗ trợ 24/7 <br> Với các kênh chat, email & phone</p>
                    </div>
                </div>
            </div>
            <div class="product_buy">
                <form class="product_buy_left" method="post">
                    <input type="button" value="-" id="subtract">
                    <input type="text" name="quantity" id="quantity" value="<?php if(isset($_GET['quantity'])) echo $_GET['quantity'] ;else echo $quantity;?>" style="text-align: center;" readonly>
                    <input type="button" value="+" id="add">
                </form>
                <a class="product_buy_right" href="add_cart.php?id=<?php echo $id ?>&quantity">
                    <span></span>
                    <p>Thêm vào giỏ</p>
                </a>
            </div>
            <hr style="opacity:0.3">
            <div class="product_description">
                <h4>Mô tả</h4>
                <p class="description_content"><?php echo nl2br($book['description']) ?></p>
            </div>
        </div>
    </div>
    <hr style="opacity: 0.3;">
    <h1 class="products_header">Sản phẩm liên quan</h1>
    <div class="related_products">
        <?php if(mysqli_num_rows($category_books)){?>
            <i class="fa fa-angle-left pre_next_icon"></i>
            <i class="fa fa-angle-right pre_next_icon"></i>
        <?php } ?>
        <div class="related_products_main">
            <ul class="promotion_main dis_flex">
                    <?php foreach($category_books as $book){ ?>
                        <div class="promotion_item product_item">
                            <a href="products.php?id=<?php echo $book['id'] ?>" class="product_item_link">
                                <?php if($book['sale_percents'] != 0){?>
                                    <div class="product_item_sale"><?php echo $book['sale_percents']?>%</div>
                                <?php } ?>
                                <div class="product_item_img">
                                    <img src="./assets/admin/products/photos/<?php echo $book['photo']  ?>" alt="Ảnh sản phẩm">
                                </div>
                                <div class="product_item_main">
                                    <div class="product_item_content">
                                        <p class="product_item_content_head"><?php echo $book['name'] ?></p>
                                        <p class="product_item_content_title"><?php echo $book['products_name'] ?></p>
                                    </div>
                                    <div class="product_item_cost dis_flex">
                                        <div class="product_item_cost_new">
                                            <?php if($book['sale_percents'] == 0){
                                                echo convertMoney($book['price']);
                                            }
                                            else echo convertMoney($book['price']*(100-$book['sale_percents'])/100) ?><sup><u>đ</u></sup>
                                        </div>
                                        <del class="product_item_cost_order opacity_08"><?php echo convertMoney($book['price']) ?><sup><u>đ</u></sup></del>
                                    </div>
                                </div>
                            </a>
                            <div class="product_shopping">
                                <a href="add_cart.php?id=<?php echo $book['id'] ?>" class="product_shopping_add">Thêm giỏ hàng</a>
                                <div class="product_icon"><i class="fa-solid fa-cart-shopping"></i></div>
                            </div>
                        </div>
                    <?php } ?>
            </ul>
        </div>
    </div>
    <?php include "./assets/process_js/product_quantity.php" ?>
    <script src="./assets/process_js/related_products_action.js"></script>
    <?php include "new_feed.php" ?>
    <?php include "footer.php" ?>
</body>