<?php 
    session_start();
    $id = $_GET['id'];
    if($_GET['quantity_view'] > 1){
        if(isset($_GET['quantity_minus'])){
            $_SESSION['cart'][$id] --;
        }
    }
    if(isset($_GET['quantity_add'])){
        $_SESSION['cart'][$id] ++;
    }
    $previous_page = $_SERVER['HTTP_REFERER'];
    header("location:$previous_page");
?>