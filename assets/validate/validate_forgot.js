var name_account = document.querySelector('#name_account');
var submit = document.querySelector('.submit');
var form_container = document.querySelector('.form_container');
var regex_email = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;

var error = name_account.parentElement.querySelector('.error');
var message_error = name_account.parentElement.querySelector('.message_error');
name_account.onblur = function(){
    if(regex_email.test(name_account.value) === false){
        error.classList.add('on_form');
        message_error.innerHTML = "Vui lòng điền đúng thông tin !"
    }else{
        if(error.classList.contains('on_form')){
            error.classList.remove('on_form');
        }
        message_error.innerHTML = "";
    }
}
name_account.oninput = function(){
    message_error.innerHTML = "";
}

submit.onclick = function(e){
    if(regex_email.test(name_account.value) === false){
        error.classList.add('on_form');
        message_error.innerHTML = "Vui lòng điền đúng thông tin !"
    }else{
        form_container.submit();
    }
}