var related_products_main = document.querySelector('.related_products_main'); // Cha
var list_products = document.querySelectorAll('.promotion_item.product_item'); // Danh sách các products
var related_products_container = related_products_main.querySelector('.promotion_main.dis_flex'); // Thẻ ul
var previous = document.querySelector('.fa-angle-left.pre_next_icon'); // Lấy ra nút previous
var next = document.querySelector('.fa-angle-right.pre_next_icon'); // Lấy ra nút next
var product_item_length = list_products[0].offsetWidth; //Chiều dài của 1 products
var length_next = product_item_length + 16 ; // Cộng cả phần margin ra
var cnt = list_products.length; // SỐ lượng products hiện có
var changesProduct = function(value){
    console.log(1);
    if(value == 1){
        if(cnt > list_products.length) related_products_container.style = `transform:translateX(-${length_next}px)`;
        cnt--;
    }else{
        if(cnt < list_products.length) related_products_container.style = `transform:translateX(${length_next}px)`;
        cnt++;
    }
}
if(list_products.length > 5){
    next.addEventListener("click",changesProduct(1));
}