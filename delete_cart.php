<?php
    session_start();
    $id = $_GET['id'];
    $quantity = $_GET['quantity'];
    unset($_SESSION['cart'][$id]);
    echo $_SESSION['sum_cart'];
    $previous_page = $_SERVER['HTTP_REFERER'];
    header("location:$previous_page");
?>