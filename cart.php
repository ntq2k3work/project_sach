<?php 
    include "./assets/connect.php";
    $_SESSION['sum_cart'] = 0;
?>

<div class="cart">
    <h2>Giỏ Hàng</h2>
    <hr style="opacity: 0.65;">
    <ul class="list_cart_books">
        <?php 
        if(isset($_SESSION['cart']))
        foreach( $_SESSION['cart'] as $book_id => $value){ 
        ?>
            <?php
                $_SESSION['sum_cart'] += $value;
                $sql_select = "SELECT * FROM products WHERE id = '$book_id'";
                $book_cart = mysqli_fetch_array(mysqli_query($connect,$sql_select));
            ?>
            <li>
                <div class="cart_book_img">
                    <a href="products.php?id=<?php echo $book_id ?>"><img src="./assets/admin/products/photos/<?php echo $book_cart['photo'] ?>" alt=""></a>
                </div>
                <div class="cart_book_container">
                    <input type="hidden" name="id" value="<?php echo $book_id ?>" disabled> 
                    <a class="cart_book_close" href="delete_cart.php?id=<?php echo $book_id  ?>"><i class="fa-solid fa-xmark cart_book_close_icon"></i></a>
                    <a href="products.php?id=<?php echo $book_id ?>"><h4 class="cart_book_name"><?php echo $book_cart['products_name'] ?></h4></a>
                    <div class="cart_book_quantity_cost">
                        <form class="cart_form_quantity" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                            <input class="quantity_minus" type="button" name="quantity_minus"  value="-" >
                            <input class="quantity_view" type="text" name="quantity_view"  value="<?php echo $value; ?>" readonly>
                            <input class="quantity_add" type="button" name="quantity_add"  value="+" href = "">
                        </form>
                        <div class="cart_book_cost">
                            <?php echo convertMoney($book_cart['price'] * $value);  ?> đ
                        </div>
                    </div>
                </div>
            </li>

        <?php } ?>
    </ul>
    <div class="cart_view_all">
        <a href="view_cart.php?<?php echo $_SESSION['sum_cart'] ?>">Xem tất cả</a>
    </div>

</div>
<sup class="shopping_count"><?php echo $_SESSION['sum_cart'] ?></sup>
<script>
    var cart_books_close = document.querySelectorAll('.cart_book_close');
    console.log(cart_books_close);
    
    cart_books_close.forEach(element => {
        replace_quantity(element);
    });
    var shopping_count = document.querySelector('.shopping_count');
    console.log(shopping_count.textContent);
    function replace_quantity(index){
        var quantity_minus = index.parentElement.querySelector('.quantity_minus');
        var quantity_view = index.parentElement.querySelector('.quantity_view');
        var quantity_add = index.parentElement.querySelector('.quantity_add');
        console.log(quantity_minus);
        quantity_minus.onclick = function(){
            if(quantity_view.value > 1){
                quantity_view.value  = Number(quantity_view.value) -1;
                shopping_count.textContent = Number(shopping_count.textContent) -1;
                <?php $_SESSION['sum_cart'] -- ;?>
                die($_SESSION['sum_cart']);
            }
        }
        quantity_add.onclick = function(){
            quantity_view.value  = Number(quantity_view.value) +1;
            shopping_count.textContent = Number(shopping_count.textContent) +1;
            <?php $_SESSION['sum_cart'] ++ ?>
            
        }
        
    }   

</script>


