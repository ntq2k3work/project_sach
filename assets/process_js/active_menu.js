// Active sign in
var sign_extend = document.querySelector('.sign_extend');
var sign_in = document.querySelector('.sign_in');
var sign_up = document.querySelector('.sign_up');
var move_sign_up = document.querySelectorAll('.move_sign_up');
var move_sign_in = document.querySelectorAll('.move_sign_in');
var move_forgot_pass = document.querySelectorAll('.move_forgot_pass');
var forgot_pass = document.querySelector('.forgot_pass');
var body = document.querySelector('body');
console.log(body);
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

    sign_extend.onclick = function(){
        if(!sign_in.classList.contains('on_form') ){
            sign_in.classList.add('on_form');
            search_form.classList.remove('on_form');
        }else{
            sign_in.classList.remove('on_form');
        }
        sign_up.classList.remove('on_form');
        forgot_pass.classList.remove('on_form');
    }
/// Active search
var header_action_search = document.querySelector('.header_action_search');
var search_extend = document.querySelector('.search_extend');
var search_form = document.querySelector('.search_form');
    search_extend.addEventListener("click",function(){
        if(!search_form.classList.contains('on_form') ){
            search_form.classList.add('on_form');
            sign_up.classList.remove('on_form');
            forgot_pass.classList.remove('on_form');
            sign_in.classList.remove('on_form');
        }else{
            search_form.classList.remove('on_form');
        }
    });
    
    body.onclick = function(){
        console.log(1);
    forgot_pass.classList.remove('on_form');
    sign_up.classList.remove('on_form');
    sign_in.classList.remove('on_form');
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