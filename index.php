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
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/container_over.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <title>Web bán sách</title>
</head>
<body>
    
    <?php 
        include "./assets/bk/connect.php";
        include "modal_sign.php" ;
    ?>
    <?php
        function convertMoney($value) {
            if ($value<0) return "-".convertMoney(-$value);
            return number_format(round($value/1000)*1000);
        }
        
       $sql_new_book = "SELECT * FROM products INNER JOIN manufactures ON products.id_manufactures = manufactures.id_manufactures
       where DATEDIFF(CURDATE(),Release_Time) <= 61";
       $sql_sale = "SELECT * FROM products INNER JOIN manufactures ON products.id_manufactures = manufactures.id_manufactures where sale_percents > 0";
        $list_new_book = mysqli_query($connect,$sql_new_book);
        $list_sale_book = mysqli_query($connect,$sql_sale);
       mysqli_close($connect);
    ?>

   <?php include "header.php" ?>  
      <!--  -->
   <div id="slider">
        <div class="slider_pre_next">
            <i class="fa fa-angle-left pre_next_icon"></i>
            <i class="fa fa-angle-right pre_next_icon"></i>
        </div>
        <ul class="slider_dots">
            <li class="slider_dots_icon cl_ccc" data-index = "0"><i class=" fa-solid fa-circle"></i></li>
            <li class="slider_dots_icon" data-index = "1"><i class=" fa-solid fa-circle"></i></li>
            <li class="slider_dots_icon" data-index = "2"><i class=" fa-solid fa-circle"></i></li>
        </ul>
        <div class="slider_wrapper">
            <div class="slider_main dis_flex">
                <div class="slider_item slider_1"></div>
                <div class="slider_item slider_2"></div>
                <div class="slider_item slider_3"></div>
            </div>
        </div>
   </div>
   <div id="container">
        <div class="list_book_outstanding">
            <h2>Danh Mục Sách Nổi Bật</h2>
            <ul class="list_book_outstanding_main dis_flex">
                <li>
                    <div class="outstanding_item">
                        <a href="">
                            <div class="outstanding_item_img">
                                <img src="./assets/img/constanding/categorybanner_1_img.webp" alt="">
                            </div>
                            <h3>Best-Seller</h3>
                        </a>
                        <a href="">
                            Mua ngay <i class=" fa fa-angle-right"></i>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="outstanding_item">
                        <a href="">
                            <div class="outstanding_item_img">
                                <img src="./assets/img/constanding/categorybanner_1_img.webp" alt="">
                            </div>
                            <h3>Best-Seller</h3>
                        </a>
                        <a href="">
                            Mua ngay <i class=" fa fa-angle-right"></i>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="outstanding_item">
                        <a href="">
                            <div class="outstanding_item_img">
                                <img src="./assets/img/constanding/categorybanner_1_img.webp" alt="">
                            </div>
                            <h3>Best-Seller</h3>
                        </a>
                        <a href="">
                            Mua ngay <i class=" fa fa-angle-right"></i>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="outstanding_item">
                        <a href="">
                            <div class="outstanding_item_img">
                                <img src="./assets/img/constanding/categorybanner_1_img.webp" alt="">
                            </div>
                            <h3>Best-Seller</h3>
                        </a>
                        <a href="">
                            Mua ngay <i class=" fa fa-angle-right"></i>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="outstanding_item">
                        <a href="">
                            <div class="outstanding_item_img">
                                <img src="./assets/img/constanding/categorybanner_1_img.webp" alt="">
                            </div>
                            <h3>Best-Seller</h3>
                        </a>
                        <a href="">
                            Mua ngay <i class=" fa fa-angle-right"></i>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Khuyến mãi -->
        <div class="list_book_promotion">
            <div class="promotion_head">
                <h2>Sản Phẩm Khuyến Mãi</h2>
            </div>
            <ul class="promotion_main dis_flex">
                <?php foreach($list_sale_book as $book){ ?>
                    <div class="promotion_item product_item">
                        <a href="products.php?id=<?php echo $book['id'] ?>" class="product_item_link">
                            <?php if($book['sale_percents'] != 0){?>
                                <div class="product_item_sale"><?php echo $book['sale_percents']?>%</div>
                            <?php } ?>
                            <div class="product_item_img">
                                <img src="./assets/bk/products/photos/<?php echo $book['photo']  ?>" alt="Ảnh sản phẩm">
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
                            <p class="product_shopping_add">Thêm giỏ hàng</p>
                            <div class="product_icon"><i class="fa-solid fa-cart-shopping"></i></div>
                        </div>
                    </div>
                <?php } ?>
                
                
                
            </ul>
            <button class="promotion_view_all">
                <span></span>
                <p>Xem Tất Cả</p>
            </button>
        </div>
        <!-- Best Seller -->
        <div class="seller">
            <div class="seller_head ">
                <h2 class="seller_head_left">
                    <i class="fa-sharp fa-solid fa-face-grin-wide"></i> Best-Seller
                </h2>
                <ul class="seller_head_right dis_flex">
                    <li><a href="">Sách Kỹ Năng - Kinh Doanh</a></li>
                    <li><a href="">Sách Tâm Lý Học</a></li>
                    <li><a href="">Sách Văn Học- Tiểu Thuyết</a></li>
                    <li><a href="">Sách Mẹ & Bé</a></li>
                </ul>
            </div>
            <ul class="seller_main">
                <a href="" class="seller_item product_item">
                    <div class="product_item_img">
                        <img src="./assets/img/doraemon/Doraemon1.jpg" alt="">
                    </div>
                    <div class="product_item_main">
                        <div class="product_item_content">
                            <p class="product_item_content_head">Đại học kinh tế quốc dân</p>
                            <p class="product_item_content_title">11 Nguyên Tắc Phát Triên Năng Lực Lãnh Đạo</p>
                        </div>
                        <div class="product_item_cost dis_flex">
                            <div class="product_item_cost_new">169,000 <sup><u>đ</u></sup></div>
                            <del class="product_item_cost_order opacity_08">169,000 <sup><u>đ</u></sup></del>
                        </div>
                    </div>
                    <div class="product_shopping">
                        <p class="product_shopping_add">Thêm giỏ hàng</p>
                        <p class="product_icon"><i class="fa-solid fa-cart-shopping"></i></p>
                    </div>
                </a>
                <a href="" class="seller_item product_item">
                    <div class="product_item_img">
                        <img src="./assets/img/doraemon/Doraemon1.jpg" alt="">
                    </div>
                    <div class="product_item_main">
                        <div class="product_item_content">
                            <p class="product_item_content_head">Đại học kinh tế quốc dân</p>
                            <p class="product_item_content_title">11 Nguyên Tắc Phát Triên Năng Lực Lãnh Đạo</p>
                        </div>
                        <div class="product_item_cost dis_flex">
                            <div class="product_item_cost_new">169,000 <sup><u>đ</u></sup></div>
                            <del class="product_item_cost_order opacity_08">169,000 <sup><u>đ</u></sup></del>
                        </div>
                    </div>
                    <div class="product_shopping">
                        <p class="product_shopping_add">Thêm giỏ hàng</p>
                        <p class="product_icon"><i class="fa-solid fa-cart-shopping"></i></p>
                    </div>
                </a>
                <a href="" class="seller_item product_item">
                    <div class="product_item_img">
                        <img src="./assets/img/doraemon/Doraemon1.jpg" alt="">
                    </div>
                    <div class="product_item_main">
                        <div class="product_item_content">
                            <p class="product_item_content_head">Đại học kinh tế quốc dân</p>
                            <p class="product_item_content_title">11 Nguyên Tắc Phát Triên Năng Lực Lãnh Đạo</p>
                        </div>
                        <div class="product_item_cost dis_flex">
                            <div class="product_item_cost_new">169,000 <sup><u>đ</u></sup></div>
                            <del class="product_item_cost_order opacity_08">169,000 <sup><u>đ</u></sup></del>
                        </div>
                    </div>
                    <div class="product_shopping">
                        <p class="product_shopping_add">Thêm giỏ hàng</p>
                        <p class="product_icon"><i class="fa-solid fa-cart-shopping"></i></p>
                    </div>
                </a>
                <a href="" class="seller_item product_item">
                    <div class="product_item_img">
                        <img src="./assets/img/doraemon/Doraemon1.jpg" alt="">
                    </div>
                    <div class="product_item_main">
                        <div class="product_item_content">
                            <p class="product_item_content_head">Đại học kinh tế quốc dân</p>
                            <p class="product_item_content_title">11 Nguyên Tắc Phát Triên Năng Lực Lãnh Đạo</p>
                        </div>
                        <div class="product_item_cost dis_flex">
                            <div class="product_item_cost_new">169,000 <sup><u>đ</u></sup></div>
                            <del class="product_item_cost_order opacity_08">169,000 <sup><u>đ</u></sup></del>
                        </div>
                    </div>
                    <div class="product_shopping">
                        <p class="product_shopping_add">Thêm giỏ hàng</p>
                        <p class="product_icon"><i class="fa-solid fa-cart-shopping"></i></p>
                    </div>
                </a>
                <a href="" class="seller_item product_item">
                    <div class="product_item_img">
                        <img src="./assets/img/doraemon/Doraemon1.jpg" alt="">
                    </div>
                    <div class="product_item_main">
                        <div class="product_item_content">
                            <p class="product_item_content_head">Đại học kinh tế quốc dân</p>
                            <p class="product_item_content_title">11 Nguyên Tắc Phát Triên Năng Lực Lãnh Đạo</p>
                        </div>
                        <div class="product_item_cost dis_flex">
                            <div class="product_item_cost_new">169,000 <sup><u>đ</u></sup></div>
                            <del class="product_item_cost_order opacity_08">169,000 <sup><u>đ</u></sup></del>
                        </div>
                    </div>
                    <div class="product_shopping">
                        <p class="product_shopping_add">Thêm giỏ hàng</p>
                        <p class="product_icon"><i class="fa-solid fa-cart-shopping"></i></p>
                    </div>
                </a>
                <a href="" class="seller_item product_item">
                    <div class="product_item_img">
                        <img src="./assets/img/doraemon/Doraemon1.jpg" alt="">
                    </div>
                    <div class="product_item_main">
                        <div class="product_item_content">
                            <p class="product_item_content_head">Đại học kinh tế quốc dân</p>
                            <p class="product_item_content_title">11 Nguyên Tắc Phát Triên Năng Lực Lãnh Đạo</p>
                        </div>
                        <div class="product_item_cost dis_flex">
                            <div class="product_item_cost_new">169,000 <sup><u>đ</u></sup></div>
                            <del class="product_item_cost_order opacity_08">169,000 <sup><u>đ</u></sup></del>
                        </div>
                    </div>
                    <div class="product_shopping">
                        <p class="product_shopping_add">Thêm giỏ hàng</p>
                        <p class="product_icon"><i class="fa-solid fa-cart-shopping"></i></p>
                    </div>
                </a>
                <a href="" class="seller_item product_item">
                    <div class="product_item_img">
                        <img src="./assets/img/doraemon/Doraemon1.jpg" alt="">
                    </div>
                    <div class="product_item_main">
                        <div class="product_item_content">
                            <p class="product_item_content_head">Đại học kinh tế quốc dân</p>
                            <p class="product_item_content_title">11 Nguyên Tắc Phát Triên Năng Lực Lãnh Đạo</p>
                        </div>
                        <div class="product_item_cost dis_flex">
                            <div class="product_item_cost_new">169,000 <sup><u>đ</u></sup></div>
                            <del class="product_item_cost_order opacity_08">169,000 <sup><u>đ</u></sup></del>
                        </div>
                    </div>
                    <div class="product_shopping">
                        <p class="product_shopping_add">Thêm giỏ hàng</p>
                        <p class="product_icon"><i class="fa-solid fa-cart-shopping"></i></p>
                    </div>
                </a>
                
            </ul>
        </div>
        <!-- Mới phát hành -->
        <div class="new_book_update">
            <div class="new_book_update_head">
                <h2 class="new_book_update_head_content">Sách mới phát hành</h2>
                <div class="new_book_update_head_view">
                    <a href="">Mua ngay <i class=" fa fa-angle-right sz"></i></a>
                </div>
            </div>
            <div class="new_book_update_main dis_flex">
                <div class="new_book_update_left">
                        <img src="./assets/img/new_update_sale.webp" alt="">
                        <div class="new_book_update_left_content">
                            <h2 class="d d1">Ưu đãi</h2>
                            <h1 class="d d2">Sale - 20%</h1>
                            <h2 class="d d3 opacity_08">Freeship đơn hàng từ 250k</h2>
                        </div>
                </div>
                <ul class="new_book_update_right">
                    <?php foreach($list_new_book as $book){ ?>
                    <div class="new_update_item product_item">
                        <a href="products.php?id=<?php echo $book['id']?>" class="product_item_link">
                            <?php if($book['sale_percents'] != 0){?>
                                <div class="product_item_sale"><?php echo $book['sale_percents']?>%</div>
                            <?php } ?>
                            <div class="product_item_img">
                                <img src="./assets/bk/products/photos/<?php echo $book['photo']  ?>" alt="Ảnh sản phẩm">
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
                            <p class="product_shopping_add">Thêm giỏ hàng</p>
                            <div class="product_icon"><i class="fa-solid fa-cart-shopping"></i></div>
                        </div>
                    </div>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="book_dont_know">
                <div class="dont_know_item">
                    <img src="./assets/img/dont_know/homebanner_1_img.jpg" alt="">
                </div>
                <div class="dont_know_item">
                    <img src="./assets/img/dont_know/homebanner_2_img.jpg" alt="">
                </div>
                <div class="dont_know_item">
                    <img src="./assets/img/dont_know/homebanner_3_img.jpg" alt="">
                </div>
        </div>
        <div class="new_status">
            <h2 class="new_status_head">
                <i class="fa-sharp fa-solid fa-face-grin-wide"></i> Bài viết mới nhất
            </h2>
            <div class="new_status_main">
                <a class="new_status_left" href="">
                    <div class="new_status_left_img">
                            <div class="new_status_img">
                                <img src="./assets/img/640956.jpg" alt="">
                            </div>
                    </div>
                    <div class="new_status_left_title">
                        <h2>Có gì trong cuốn sách tiktok đầu tiên tại Việt Nam</h2>
                        <p class="opacity_08">10 Tháng 07 , 2020 </p>
                    </div>
                </a>
                <div class="new_status_right">
                    <ul class="new_status_right_items">
                        <li>
                            <div class="new_status_right_item">
                                <img src="./assets/img/640956.jpg" alt="">
                            </div>
                            <div class="new_status_right_item_content">
                                <a href="">
                                    Drawdown - Cuốn sách phi lợi nhuận vì môi trường lọt vào đề cử Đơn vị tiên phong có đóng góp cho cộng đồng của WeChoice Awards 2019
                                </a>
                                <p class="opacity_08">15 tháng 01 , 2020 <i class="new_status_icon fa-sharp fa-solid fa-face-grin-wide"></i></p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php include "new_feed.php" ?>
   </div>
    <?php include "footer.php" ?>
   <script src="./assets/process_js/slider_action.js"></script>
</body>
</html>