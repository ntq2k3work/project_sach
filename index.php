    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/reset.css">
    <link rel="stylesheet" href="./assets/style.css">
    <link rel="stylesheet" href="./assets/responsive.css">
    <title>Web bán sách</title>
</head>
<body>
    <?php
        $ketnoi = mysqli_connect('localhost','root','','truyen_tranh_by_quan');
        mysqli_set_charset($ketnoi,'utf8');
        $sql_lay_cac_san_pham = "select * from san_pham";
        $danh_sach_san_pham = mysqli_query($ketnoi,$sql_lay_cac_san_pham);
    ?>

    <header>
        <div id="header_container">
            <nav>
                <ul class="menu">
                    <li><a href="">Trang chủ</a></li>
                    <li><a href="">Truyện mới</a></li>
                    <li><a href="">Phổ biến</a></li>
                    <li>
                        <a href="#" >Thể loại <i class="sub_menu_icon fa-sharp fa-solid fa-caret-down"></i></a>
                        <ul class="sub_menu">
                            <div class="row_4 sub_menu_row">
                                <li class="col_on_row4"> <b><a href="">Tất cả</a></b></li>
                                <li class="col_on_row4"> <a href="#">Ecchi</a></li>
                                <li class="col_on_row4"> <a href="#">Mecha</a></li>
                                <li class="col_on_row4"> <a href="#">Slice of Life</a></li>
                            </div>
                            <div class="row_4 sub_menu_row">
                                <li class="col_on_row4"> <a href="#">Action</a></li>
                                <li class="col_on_row4"> <a href="#">Fantasy</a></li>
                                <li class="col_on_row4"> <a href="#">Smut</a></li>
                                <li class="col_on_row4"> <a href="#">Gender Bender</a></li>
                            </div>
                            <div class="row_4 sub_menu_row">
                                <li class="col_on_row4"> <a href="#">Adult</a></li>
                                <li class="col_on_row4"> <a href="#">Mistery</a></li>
                                <li class="col_on_row4"> <a href="#">Ngôn Tình</a></li>
                                <li class="col_on_row4"> <a href="#">Soft Yaoi</a></li>
                            </div>
                            <div class="row_4 sub_menu_row">
                                <li class="col_on_row4"> <a href="#">Action</a></li>
                                <li class="col_on_row4"> <a href="#">Fantasy</a></li>
                                <li class="col_on_row4"> <a href="#">Smut</a></li>
                                <li class="col_on_row4"> <a href="#">Gender Bender</a></li>
                            </div>
                            <div class="row_4 sub_menu_row">
                                <li class="col_on_row4"> <a href="#">Adult</a></li>
                                <li class="col_on_row4"> <a href="#">Mistery</a></li>
                                <li class="col_on_row4"> <a href="#">Ngôn Tình</a></li>
                                <li class="col_on_row4"> <a href="#">Soft Yaoi</a></li>
                            </div>
                        </ul>
                    </li>
                    <!-- Xem thêm -->
                    <!-- <li>
                        <a href="#" >Xem thêm <i class="sub_menu_icon fa-sharp fa-solid fa-caret-down"></i></a>
                        <ul class="sub_menu top_right">
                            <div class=" sub_menu_row">
                                <li class=""><a href="#">Bán chạy</a></li>
                                <li class=""> <a href="#">Giảm giá</a></li>
                                <li class=""> <a href="#">Mecha</a></li>
                                <li class=""> <a href="#">Slice of Life</a></li>
                            </div>
                        </ul>
                    </li> -->
                </ul>
            </nav>
                <form class="header_search">
                    <input type="text" name="search" id="" placeholder="Tìm kiếm ..." >
                    <i class="search_icon fa-solid fa-magnifying-glass"></i>
                </form>
                <div class="login">
                    <a href="#" class="login_div">Đăng nhập</a>
                    <a href="#" class="login_div border_radius10">Đăng ký</a> 
                </div>
        </div>
    </header>
    <div id="slider">
        <div class="slider_img">
            <img src="./assets/img/Hinh-anh-quyen-sach (4).jpg" alt="">
        </div>
        <div class="slider_content">
            <h1>NTQ BOOK</h1>
            <p> Để cho con một hòm vàng không bằng dạy cho con một quyển sách hay</p>
        </div>
    </div>
    <div id="container">
        <div id="container_contain">
            <div class="container_left">
                <div class="row_4 product">
                    <?php foreach($danh_sach_san_pham as $san_pham){ ?>
                        <div class="product_section col_on_row4">
                            <div class="product_img">
                                <img src="<?php echo $san_pham['Link_anh']; ?>" alt="" >
                                <div class="product_sale">-<?php echo $san_pham['Giam_Gia']; ?>%</div>
                            </div>
                            <div class="product_section_content">
                                <div class="product_section_header">
                                    <h1>Doraemon</h1>
                                    <p class="category"><?php echo $san_pham['Tieu_de']; ?></p>
                                    <p><?php echo $san_pham['noi_dung']; ?> </p>
                                </div>
                                <div class="product_cost">
                                    <p class="cost"><?php echo $san_pham['Gia_Ban']; ?>  <sub>đ</sub></p>
                                    <del class="cost cost_base "><?php echo $san_pham['Gia_Goc']; ?> <sub>đ</sub></del>
                                    <div class="product_shopping">
                                        <button>Mua Ngay</button>
                                        <button>Thêm vào giỏ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="container_right">
                <h1>Danh mục</h1>
                <ul>
                    <li><a href="">Top</a></li>
                    <li><a href="">Ưa chuộng</a></li>
                    <li><a href="">Bán chạy</a></li>
                    <li><a href="">Giảm giá</a></li>
                    <li><a href="">Khu Vực</a></li>
                </ul>
            </div>
        </div>
    </div>
    <footer></footer>
</body>
</html>