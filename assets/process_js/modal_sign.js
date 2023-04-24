var modal = document.querySelector('#modal');
var notify_icon = modal.querySelector('.notify_icon');
var notify = modal.querySelector('.notify');


function close(){
    if(!modal.classList.contains('on_form')){
        modal.classList.add('on_form');
    }else modal.classList.remove('on_form');
}
notify_icon.addEventListener("click",close);
modal.addEventListener("click",close);
notify.addEventListener("click",function(e){
    e.stopPropagation();
});