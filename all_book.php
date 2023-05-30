<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png" />
  <link rel="manifest" href="/assets/favicon/site.webmanifest" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./assets/css/reset.css" />
  <link rel="stylesheet" href="./assets/css/header.css">
  <link rel="stylesheet" href="./assets/css/style_all_book.css" />
  <link rel="stylesheet" href="./assets/css/responsive.css" />
  <title>Web bán sách</title>
</head>

<body>
  <?php
  function convertMoney($value) {
    if ($value<0) return "-".convertMoney(-$value);
    return number_format(round($value/1000)*1000);
    }
    include "./assets/connect.php";
  $ar = array("Lanh-dao" => "Sách Kinh Doanh - Lãnh Đạo","Marketing" => "Sách Kinh Doanh - Marketing","Tai-chinh" => "Sách Kinh Doanh - Tài Chính","Kinh-doanh" => "Sách Kinh Doanh",
"PT_Ban_Than" => "Sách Kỹ Năng - Phát triển bản thân","Ki-nang" => "Sách kĩ năng","Nuoi_Day_con" => "Sách kĩ năng - Nuôi dạy con","Tam_Ly_Hoc" => "Sách Tâm Lý Học","Hoc_Tap" => "Sách học tập",
"Toan" => "Sách Học Tập - Toán","Ielts" => "Sách Học Tập - Ielts","Tieng_anh" => "Sách Học Tập - Tiếng anh",
"Van_Hoc" => "Sách văn học - Tiểu thuyết","TN_Tan_Van" => "Truyện ngắn - Tản văn","Tieu_thuyet" => "Tiểu thuyết","Truyen_cam_hung" => "Truyền cảm hứng"
);
  $category = $_GET['category'];
  $sql_query = "select * from products inner join manufactures on products.id_manufactures = manufactures.id_manufactures where category = '$ar[$category]'";
  $sql_count = "select count(*) from products where category = '$ar[$category]'";
  $list_book = mysqli_query($connect,$sql_query);
  $number_rows = mysqli_fetch_array(mysqli_query($connect,$sql_count))['count(*)'];
  // print_r($number_rows);
  // die()
  ?>
  <?php include "header.php" ?>

  <div id="container">
    <div class="container_path">

    </div>
    <div class="container_main">
      <div class="container_main_left">
        <div class="container_main_left_section">
          <h3 class="left_section_head">Danh mục sản phẩm <i class="fa-solid fa-chevron-up left_section_head_icon"></i></h3>
          <ul class="left_section_items">
            <li><a href="">Sách kinh doanh</a></li>
            <li><a href="">Sách kĩ năng</a></li>
            <li><a href="">Sách tâm lý học</a></li>
            <li><a href="">Sách văn học - Tiểu thuyết</a></li>
            <li><a href="">Sách mẹ & bé</a></li>
            <li><a href="">Sách học tập</a></li>
            <li><a href="">Combo Sách hot</a></li>
            <li><a href="">QUà tặng</a></li>
          </ul>
        </div>
        <div class="container_main_left_section">
          <h3 class="left_section_head">Nhà cung cấp <i class="fa-solid fa-chevron-up left_section_head_icon"></i></h3>
          <ul class="left_section_items">
            <li><input type="checkbox" name="" id="data-brand-p1"> <label for="data-brand-p1">Phụ nữ</label> </li>
            <li><input type="checkbox" name="" id="data-brand-p2"> <label for="data-brand-p2">Dân chí</label> </li>
            <li><input type="checkbox" name="" id="data-brand-p3"> <label for="data-brand-p3">Lao động</label> </li>
            <li><input type="checkbox" name="" id="data-brand-p4"> <label for="data-brand-p4">Thế giới</label> </li>
            <li><input type="checkbox" name="" id="data-brand-p5"> <label for="data-brand-p5">Thế giới</label> </li>
            <li><input type="checkbox" name="" id="data-brand-p6"> <label for="data-brand-p6">Thế giới</label> </li>
          </ul>
        </div>
        <div class="container_main_left_section">
          <h3 class="left_section_head">Lọc giá <i class="fa-solid fa-chevron-up left_section_head_icon"></i></h3>
          <ul class="left_section_items">
            <li><input type="checkbox" name="" id="data-brand-p7"> <label for="data-brand-p7">Dưới 1.000.000<sub><u>đ</u></sub></label> </li>
            <li><input type="checkbox" name="" id="data-brand-p8"> <label for="data-brand-p8">1.000.000<sub><u>đ</u></sub> - 2.000.000 <sub><u>đ</u></sub></label> </li>
            <li><input type="checkbox" name="" id="data-brand-p9"> <label for="data-brand-p9">Dưới 1000 000</label> </li>
            <li><input type="checkbox" name="" id="data-brand-p10"> <label for="data-brand-p10">Trên 1000 000</label> </li>
            <li><input type="checkbox" name="" id="data-brand-p11"> <label for="data-brand-p11">Trên 1000 000</label> </li>
            <li><input type="checkbox" name="" id="data-brand-p12"> <label for="data-brand-p12">Trên 1000 000</label> </li>
          </ul>
        </div>
      </div>
      <div class="container_main_right">
        <div class="container_main_right_img">
          <img src="./assets/img/collection_banner.webp" alt="">
        </div>
        <div class="container_main_right_content">
          <div class="container_main_right_head">
            <h2 class="right_head_left"><?php 
              $check = 0;
              foreach($ar as $x => $x_value) {
                if($x == $category){
                  $check = 1;
                  echo $x_value;
                  break;
                }
              }
              if($check == 0){
                echo "Không tồn tại thể loại này !";
                die();
              }
            ?></h2>
            <div class="right_head_right">
              <span> <?php echo $number_rows ?> Sản phẩm </span>
              <div class="right_head_sort">
                Sắp xếp
                <ul>
                  <li><a href="">Sản phẩm nổi bật</a></li>
                  <li><a href="">Giá : Tăng dần</a></li>
                  <li><a href="">Giá : Giảm dần</a></li>
                  <li><a href="">Tên : A-Z</a></li>
                  <li><a href="">Tên : Z-A</a></li>
                  <li><a href="">Cũ nhất</a></li>
                  <li><a href="">Mới nhất</a></li>
                  <li><a href="">Bán chạy nhất</a></li>
                  <li><a href="">Hàng tồn giảm dần</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="container_main_right_main">
            <?php foreach($list_book as $book){ ?>
              <div class=" product_item">
                        <a href="products.php?id=<?php echo $book['id'] ?>" class="product_item_link">
                            <?php if($book['sale_percents'] != 0){?>
                                <div class="product_item_sale"><?php echo $book['sale_percents']?>%</div>
                            <?php }elseif($book['quantity'] < 1){ ?>
                              <div class="END_product">Hết hàng</div>
                            <?php } ?>
                            <div class="product_item_img">
                                <img src="./assets/admin/products/photos/<?php echo $book['photo']  ?>" alt="Ảnh sản phẩm">
                            </div>
                            <div class="product_item_main">
                                <div class="product_item_content">
                                    <p class="product_item_content_head"><?php echo $book['name'] ?></p>
                                    <p class="product_item_content_title" title="<?php echo $book['products_name'] ?>"><?php echo $book['products_name'] ?></p>
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
                            <?php if($book['quantity'] > 0) { ?>
                              <a href="add_cart.php?id=<?php echo $book['id'] ?>" class="product_shopping_add">Thêm giỏ hàng</a>
                              <a href="add_cart.php?id=<?php echo $book['id'] ?>" class="product_icon"><i class="fa-solid fa-cart-shopping"></i></a>
                              <!-- <div class="product_icon"><i class="fa-solid fa-cart-shopping"></i></div> -->
                            <?php }else{ ?>
                              <div class="out_of_products"><u>Hết hàng</u></div>
                            <?php } ?>
                        </div>
                    </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="register_get_new_feed">
      <div class="register_get_new_feed_container">
        <div class="register_get_new_feed_content">
          <h2>Đăng ký nhận bản tin</h2>
          <p class="opacity_08">
            Để cập nhật những sản phẩm mới, nhận thông tin ưu đãi đặc biệt và
            thông tin giảm giá khác.
          </p>
        </div>
        <form action="" class="form_get_email">
          <input type="email" name="email" id="" placeholder="Nhập email của bạn" class="form_input get_email" />
          <button class="form_btn form_input">
            <span></span>
            <p>Xem Tất Cả</p>
          </button>
        </form>
      </div>
    </div>
  </div>
  <footer>
    <div class="footer_content">
      <h3>Create by NTQ</h3>
      <p class="opacity_08">Base on 1980books</p>
    </div>
    <div class="footer_contact">
      <div class="footer_icon">
        <i class="fa-brands fa-facebook"></i>
      </div>
      <div class="footer_icon">
        <i class="fa-brands fa-instagram"></i>
      </div>
      <div class="footer_icon">
        <i class="fa-brands fa-twitter"></i>
      </div>
      <div class="footer_icon">
        <i class="fa-solid fa-bug"></i>
      </div>
    </div>
  </footer>
  <script src="/assets/slider_action.js"></script>
</body>

</html>