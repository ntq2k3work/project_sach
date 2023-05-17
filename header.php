<?php 
    include "./assets/bk/connect.php";
    // session_start(); 
    if(isset($_COOKIE['dnuser'])){
        $token = $_COOKIE['dnuser'];
        $sql_customer = "select * from account where token = '$token' limit 1";
        $customer = mysqli_query($connect,$sql_customer);
        if(mysqli_num_rows($customer) == 1){
            $customer_ar = mysqli_fetch_array($customer);
            $_SESSION['id'] = $customer_ar['id'];
            $_SESSION['name'] = $customer_ar['first_name'] ." ". $customer_ar['last_name'];    
        }
    }
    // if(isset($_SESSION['id'])){
    //     header('location:index.php');
    //     exit;
    // }
    
?>
<header>
        <div id="header_container">
            <a class="header_logo" href="index.php">
                <img src="./assets/favicon/android-chrome-512x512.png" alt="">
                <img src="../assets/favicon/android-chrome-512x512.png" alt="">
            </a>
            <ul class="header_list_menu">
                <li>
                    <a href="">Danh mục sách <i class="fa-solid fa-chevron-down menu_icon_c1"></i></a>
                    <ul class="sub_menu list_book_menu_sub">
                        <li class="sub_menu_2">
                            <a href="sach-kinh-doanh.php" title="Sách kinh doanh">Sách kinh doanh <i class="fa-solid fa-chevron-right menu_icon_c2"></i></a>
                            <ul class="sub_menu_3">
                                <li><a href="./all_book.php?category=Lanh-dao" title="Lãnh đạo">Lãnh đạo</a></li>
                                <li><a href="./all_book.php?category=Marketing" title="Marketing">Marketing</a></li>
                                <li><a href="./all_book.php?category=Tai-chinh" title="Tài chính">Tài chính</a></li>
                            </ul>
                        </li>
                        <li class="sub_menu_2">
                            <a href="./all_book.php?category=sach-ki-nang">Sách kĩ năng <i class="fa-solid fa-chevron-right menu_icon_c2"></i></a>
                            <ul class="sub_menu_3">
                                <li><a href="">Lãnh đạo</a></li>
                                <li><a href="">Marketing</a></li>
                                <li><a href="">Tài chính</a></li>
                            </ul>
                        </li>
                        <li><a href="">Sách tâm lý học</a></li>
                        <li class="sub_menu_2">
                            <a href="">Sách học tập <i class="fa-solid fa-chevron-right menu_icon_c2"></i></a>
                            <ul class="sub_menu_3">
                                <li><a href="">Lãnh đạo</a></li>
                                <li><a href="">Marketing</a></li>
                                <li><a href="">Tài chính</a></li>
                            </ul>
                        </li>
                        <li class="sub_menu_2">
                            <a href="">Sách văn học - Tiểu thuyết <i class="fa-solid fa-chevron-right menu_icon_c2"></i></a>
                            <ul class="sub_menu_3">
                                <li><a href="">Lãnh đạo</a></li>
                                <li><a href="">Marketing</a></li>
                                <li><a href="">Tài chính</a></li>
                            </ul>
                        </li>
                        <li><a href="">Sách thiếu nhi</a></li>
                        <li><a href="">Quà tặng cột sống</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Giới thiệu <i class="fa-solid fa-chevron-down menu_icon_c1"></i></a>
                    <ul class="sub_menu header_introduce">
                        <li><a href="">Về chúng tôi</a></li>
                        <li><a href="">Trang web</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Tin tức <i class="fa-solid fa-chevron-down menu_icon_c1"></i></a>
                    <ul class="sub_menu header_new">
                        <li><a href="">Điểm sách</a></li>
                        <li><a href="">Tác giả</a></li>
                        <li><a href="">Sự kiện</a></li>
                        <li><a href="">Blog</a></li>
                    </ul>
                </li>
                <li>
                    <a href="">Xem thêm <i class="fa-solid fa-chevron-down menu_icon_c1"></i></a>
                    <ul class="sub_menu">
                        <li><a href="">Truyện Anime</a></li>
                        
                        <li><a href="">Khuyến Mãi</a></li>
                        <li><a href="">Best-Seller</a></li>
                        <li><a href="">Mới Phát Hành</a></li>
                        <li><a href="">Bài Viết Mới Nhất</a></li>
                    </ul>
                </li>
            </ul>
            <div class="header_action dis_flex">
                <div class="header_action_section header_action_search">
                    <i class="header_action_icon fa-solid fa-magnifying-glass search_extend"></i>
                    <form class="search_form">
                        <label for="">Tìm kiếm</label> <hr style="opacity: 0.3;">
                        <div class="search_input">
                            <input type="text" name="" dplaceholder="Nhập tên sản phẩm để tìm kiếm" required> <i class="fa-solid fa-magnifying-glass search_icon"></i>
                        </div>
                    </form>
                </div>
                <div class="header_action_section header_action_user">
                    <i class="header_action_icon fa-solid fa-user sign_extend"></i>
                    <?php 
                        if(!isset($_SESSION['id'])){ 
                            include 'forgot.php';
                            include 'signin.php';
                            include 'signup.php';
                        }else{
                            include 'user.php';
                        }
                    ?>
                </div>
                <div class="header_action_section header_action_shopping">
                    <i class="header_action_icon fa-solid fa-cart-shopping"></i>
                    <sup class="shopping_count">0</sup>
                </div>
            </div>
        </div>
        <?php include './assets/process_js/active_menu.php' ?>
   </header>