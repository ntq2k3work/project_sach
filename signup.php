<div class="sign_form sign_up">
                        <div class="sign_form_header">
                            <p class="sign_form_title1">TẠO TÀI KHOẢN</p>
                            <!-- <p class="sign_form_title2">Nhập te và mật khẩu của bạn</p> -->
                        </div>
                        <hr style="opacity: 0.3; margin: 12px;">
                        <form action="process_signup.php" class="sign_form_signup " method="post">
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