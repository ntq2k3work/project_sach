var name_account = document.querySelector('#name_account');
var password = document.querySelector('#password');
var submit = document.querySelector('.submit');
var form_container = document.querySelector('.form_container');
var regex_ac = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;

// Ẩn lỗi khi đang nhập thông tin
function inp(Value){
    var message_error = Value.parentElement.querySelector('.message_error');
    var error = Value.parentElement.querySelector('.error');
    message_error.innerHTML = "";
    if(error.classList.contains('on_form')){
        error.classList.remove('on_form');
    }
}
name_account.oninput = inp(name_account);
password.oninput = inp(password);

// Hiện thông báo lỗi khi k nhập thông tin
function notify_er_login(tag){
    var error = tag.parentElement.querySelector('.error');
    var message_error = tag.parentElement.querySelector('.message_error');
    if(tag.value.length == 0){
        error.classList.add('on_form');
        message_error.innerHTML = "Vui lòng nhập trường này !";
    }else{
        if(error.classList.contains('on_form')){
            error.classList.remove('on_form');
        }
        message_error.innerHTML = "";
    }
}
submit.onclick = function(e){
    if(name_account.value.length == 0 || password.value.length == 0){
        notify_er_login(name_account);
        notify_er_login(password);
        e.preventDefault();
    }
}

