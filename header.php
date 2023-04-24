<header>
        <div id="header_container">
            <a class="header_logo" href="index.php">
                <img src="./assets/favicon/android-chrome-512x512.png" alt="">
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
                    <div class="sign_form sign_in">
                        <div class="sign_form_header">
                            <p class="sign_form_title1">ĐĂNG NHẬP TÀI KHOẢN</p>
                            <p class="sign_form_title2">Nhập tài khoản và mật khẩu của bạn</p>
                        </div>
                        <hr style="opacity: 0.3; margin: 12px;">
                        <form action="./assets/bk/account/process_signin.php" class="sign_form_input" method="post">
                            <input type="text" name="account" placeholder=" Nhập tài khoản hoặc email">
                            <input type="password" name="password"  placeholder=" Mật khẩu">
                            <div class="sign_policy">
                                This site is protected by reCAPTCHA and the <a href="https://policies.google.com/privacy" target="_blank"> Privacy Policy</a> and <a href="https://policies.google.com/terms" target="_blank">Terms of Service</a> apply.
                            </div>
                            <button class="sign_input_btn sign_in_btn">Đăng nhập</button>
                        </form>
                        <ul class="sign_help">
                            <li class="move_sign_up">Khách hàng mới?<a href="#">Tạo tài khoản</a></li>
                            <li class="move_forgot_pass">Quên mật khẩu?<a href="#">Khôi phục mật khẩu</a></li>
                        </ul>
                    </div>
                    <div class="sign_form forgot_pass">
                        <div class="sign_form_header">
                            <p class="sign_form_title1">KHÔI PHỤC MẬT KHẨU</p>
                            <p class="sign_form_title2">Nhập tài khoản hoặc email</p>
                        </div>
                        <hr style="opacity: 0.3; margin: 12px;">
                        <form action="./assets/bk/account/signin.php" class="sign_form_input" method="post">
                            <input type="text" name="account" placeholder=" Nhập tài khoản hoặc email">
                            <div class="sign_policy">
                                Chúng tôi sẽ gửi mật khẩu tới email của bạn.Vui lòng kiểm tra hộp thư hoặc spam để lấy lại mật khẩu !
                            </div>
                            <button class="sign_input_btn sign_forgot_btn">Gửi email</button>
                        </form>
                        <ul class="sign_help">
                            <li class="move_sign_in">Đã có tài khoản?<a href="#"> Đăng nhập</a></li>
                            <li class="move_sign_up">Khách hàng mới?<a href="#"> Tạo tài khoản</a></li>
                        </ul>
                    </div>
                    <div class="sign_form sign_up">
                        <div class="sign_form_header">
                            <p class="sign_form_title1">TẠO TÀI KHOẢN</p>
                            <!-- <p class="sign_form_title2">Nhập te và mật khẩu của bạn</p> -->
                        </div>
                        <hr style="opacity: 0.3; margin: 12px;">
                        <form action="./assets/bk/account/process_signup.php" class="sign_form_signup " method="post">
                            <div class="dis_flex_center">
                                <div class="form_section col_2">
                                    <label for="first_name">Họ: </label>
                                    <input type="text" name="first_name" id="first_name" placeholder=" Họ" class="col_2_input_name">
                                    <span class="message_error"></span>
                                </div>
                                <div class="form_section col_2">
                                    <label for="last_name">Tên: </label>
                                    <input type="text" name="last_name" id="last_name" placeholder=" Tên" class="col_2_input_name">
                                    <span class="message_error"></span>
                                </div>     
                            </div>                       
                            <div class="dis_flex_center">
                                <div class="form_section col_2">
                                    <label for="birthday">Ngày sinh: </label>
                                    <input type="date" name="birthday" id="birthday" class="col_1"  value="<?php echo date_default_timezone_set('Asia/Ho_Chi_Minh') ?>">
                                </div>                            
                                <div class="form_section col_2">
                                    <label for="phone">Số điện thoại: </label>
                                    <input type="text" name="phone" id="phone" class="col_1">
                                    <span class="message_error"></span>
                                </div>
                            </div>
                            <div class="form_section ">
                                <label for="address">Địa chỉ: </label>
                                <input type="text" name="address" id="address" class="col_1">
                            </div>                            
                            <div class="form_section ">
                                <label for="email">Email: </label>
                                <input type="email" name="email" id="email" class="col_1">
                                <span class="message_error"></span>
                            </div>                                                        
                            <div class="form_section">
                                <label for="account">Tên tài khoản: </label>
                                <input type="text" name="account" id="account" class="col_1">
                                <span class="message_error"></span>
                            </div>                            
                            <div class="form_section">
                                <label for="password">Mật khẩu: </label>
                                <input type="password" name="password" id="password" class="col_1">
                                <span class="message_error"></span>
                            </div>                            
                            <div class="form_section">
                                <label for="confirm_password">Xác nhận lại khẩu: </label>
                                <input type="password" name="confirm_password" id="confirm_password" class="col_1">
                                <span class="message_error"></span>
                            </div>                            
                            <div class="sign_policy">
                                <input type="checkbox" class="m10" name="accept"> Chấp nhận với tất cả điều khoản mà chúng tôi đưa ra !
                            </div>
                            <button class="sign_input_btn sign_up_btn">Đăng ký</button>
                        </form>
                        <ul class="sign_help">
                            <li class="move_sign_in">Đã có tài khoản?<a href="#"> Đăng nhập</a></li>
                            <li class="move_forgot_pass">Quên mật khẩu?<a href="#"> Khôi phục mật khẩu</a></li>
                        </ul>
                    </div>
                </div>
                <div class="header_action_section header_action_shopping">
                    <i class="header_action_icon fa-solid fa-cart-shopping"></i>
                    <sup class="shopping_count">0</sup>
                </div>
            </div>
        </div>
        <script src="./assets/process_js/active_menu.js"></script>
   </header>