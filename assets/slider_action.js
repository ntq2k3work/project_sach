var slider = document.querySelector('#slider');
var slider_main = slider.querySelector('.slider_main');
var slider_prev = slider.querySelector('.slider_pre_next_icon.fa-angle-left');
var slider_next = slider.querySelector('.slider_pre_next_icon.fa-angle-right');
var slider_item = slider.querySelectorAll('.slider_item');
var slider_width = slider_item[0].offsetWidth; //Lấy độ dài 1 slider_item
var slider_length = slider_item.length; //Lấy số phần tử

/// Xử lí dots
var slider_dots = slider.querySelector('.slider_dots');
var slider_dots_items = slider_dots.querySelectorAll('.slider_dots_icon');
var ar_dots_items = [...slider_dots_items];
let currentIndex = 0;

function dotAction(index){
    ar_dots_items.forEach(element => {
        for(let e of ar_dots_items){
            if(e.classList.contains('cl_ccc')) e.classList.remove("cl_ccc");
        }
    })   
    currentIndex = index;
    ar_dots_items[index].classList.add("cl_ccc");
}
ar_dots_items.forEach((element,index) => {
    element.addEventListener("click",function(e){
        dotAction(index);
        slider_next.click();
    })
});

/// Xử lí prev - next
let positionX = 0;
slider_next.addEventListener("click",function(e){
    if(currentIndex == ar_dots_items.length - 1){
        currentIndex = 0;
    }else currentIndex ++;
    dotAction(currentIndex);
    changesSlider(1);
});
slider_prev.addEventListener("click",function(){
    if(currentIndex == 0){
        currentIndex = ar_dots_items.length - 1;
    }else currentIndex --;
    dotAction(currentIndex);
    changesSlider(-1);
});
function changesSlider(value){
    if(value === 1){
        if(positionX === -slider_width*(slider_length-1)){
            positionX = slider_width;
            slider_main.style =`transform:translateX(${positionX}px)`;
        }
        if(- positionX < slider_width*(slider_length-1)) positionX -= slider_width;
        slider_main.style =`transform:translateX(${positionX}px)`;
    }else{
        if(positionX == 0){
            positionX = - slider_width*(slider_length);
            slider_main.style =`transform:translateX(${positionX}px)`;
        }
        if(- positionX > 0)
        positionX += slider_width;
        slider_main.style =`transform:translateX(${positionX}px)`;
    }
}

