<script> 
// Active sign in
var sign_extend = document.querySelector('.sign_extend');
var sign_in = document.querySelector('.sign_in');
var sign_up = document.querySelector('.sign_up');
var move_sign_up = document.querySelectorAll('.move_sign_up');
var move_sign_in = document.querySelectorAll('.move_sign_in');
var move_forgot_pass = document.querySelectorAll('.move_forgot_pass');
var forgot_pass = document.querySelector('.forgot_pass');
var body = document.querySelector('body');
var user_form = document.querySelector('.user_form');
// Search
var header_action_search = document.querySelector('.header_action_search');
var search_extend = document.querySelector('.search_extend');
var search_form = document.querySelector('.search_form');
//Shopping
var shopping_extend = document.querySelector('.shopping_extend');
var cart = document.querySelector('.cart');
    function move(value,sign_one,sign_two,sign_three){
        value.forEach(element => {
            element.onclick = function(){
                if(!sign_one.classList.contains('on_form')){
                    sign_one.classList.add('on_form');
                }
                if(sign_two.classList.contains('on_form')){
                    sign_two.classList.remove('on_form');
                }
                if(sign_three.classList.contains('on_form')){
                    sign_three.classList.remove('on_form');
                }
            }
        });
    }
    move(move_forgot_pass,forgot_pass,sign_in,sign_up);
    move(move_sign_up,sign_up,sign_in,forgot_pass);
    move(move_sign_in,sign_in,forgot_pass,sign_up);
// Hiển thị đăng nhập khi ấn vào biểu tượng user
    <?php if (!isset($_SESSION['id'])){?>
        sign_extend.onclick = function(){
            if(!sign_in.classList.contains('on_form') ){
                sign_in.classList.add('on_form');
                search_form.classList.remove('on_form');
                cart.classList.remove('on_form');
            }else{
                sign_in.classList.remove('on_form');
            }
            sign_up.classList.remove('on_form');
            forgot_pass.classList.remove('on_form');
            }
        body.onclick = function(){
            forgot_pass.classList.remove('on_form');
            sign_up.classList.remove('on_form');
            sign_in.classList.remove('on_form');
            search_form.classList.remove('on_form');
            cart.classList.remove('on_form');
        }
        sign_extend.addEventListener("click",function(e){
            e.stopPropagation();
        });
        sign_in.addEventListener("click",function(e){
            e.stopPropagation();
        });
        sign_up.addEventListener("click",function(e){
            e.stopPropagation();
        });
        forgot_pass.addEventListener("click",function(e){
            e.stopPropagation();
        });
        search_extend.addEventListener("click",function(e){
            e.stopPropagation();
        });
        shopping_extend.addEventListener("click",function(e){
            e.stopPropagation();
        });
        cart.addEventListener("click",function(e){
            e.stopPropagation();
        });
    <?php } ?>
// Hiển thị user khi đã đăng nhập
    <?php if (isset($_SESSION['id'])){?>
        sign_extend.addEventListener("click",function(){
            search_form.classList.remove('on_form');
            cart.classList.remove('on_form');
            if(!user_form.classList.contains('on_form') ){
                user_form.classList.add('on_form');
            }else{
                user_form.classList.remove('on_form');
            }
        });
        // body.onclick = function(){
        //     search_form.classList.remove('on_form');
        // }
        // search_form.addEventListener("click",function(e){
        //     e.stopPropagation();
        // });
    <?php } ?>
/// Active search

    search_extend.addEventListener("click",function(){
        if(!search_form.classList.contains('on_form') ){
            search_form.classList.add('on_form');
            <?php if (!isset($_SESSION['id'])){?>
                sign_up.classList.remove('on_form');
                forgot_pass.classList.remove('on_form');
                sign_in.classList.remove('on_form');
            <?php }else{ ?>
                user_form.classList.remove('on_form');
            <?php } ?>
            cart.classList.remove('on_form');
        }else{
            search_form.classList.remove('on_form');
        }
    });
// Shopping Cart
    shopping_extend.addEventListener("click",function(){
        if(!cart.classList.contains('on_form') ){
            cart.classList.add('on_form');
            <?php if (!isset($_SESSION['id'])){?>
                sign_up.classList.remove('on_form');
                forgot_pass.classList.remove('on_form');
                sign_in.classList.remove('on_form');
            <?php }else{ ?>
                user_form.classList.remove('on_form');
            <?php } ?>
            search_form.classList.remove('on_form');
        }else{
            cart.classList.remove('on_form');
        }
    });
</script>