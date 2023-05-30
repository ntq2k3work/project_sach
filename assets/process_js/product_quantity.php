<script>
var product_buy = document.querySelector('.product_buy');
var product_dentail = document.querySelector('.product_dentail');
var dentail_status_off = product_dentail.querySelector('.dentail_status_off'); // Thay thế cho hết hàng

if(product_buy){
    var add = product_buy.querySelector('#add');
    var subtract = product_buy.querySelector('#subtract');
    var quantity = product_buy.querySelector('#quantity');
    //  thẻ dentail_status_off biểu thị cho hết hàng
    // Mặc định là còn hàng
    if(dentail_status_off){
        product_buy.style.display = "none"; // Nếu mà tồn tại thì không cho mua hàng
    }else{
        product_buy.style.display = "flex"; // Nếu không tồn tại thì cho mua
        add.addEventListener("click",function(){
            <?php $quantity ++; ?>
            quantity.value = Number(quantity.value) +1;

        });
    }
    // Nếu số lượng đang lớn hơn 1 thì cho trừ
    subtract.addEventListener("click",function(event){
        if(quantity.value <= 1){
            event.preventDefault();
        }else {
            <?php $quantity --; ?>
            quantity.value = Number(quantity.value) -1;
        }
    });
}
</script>
