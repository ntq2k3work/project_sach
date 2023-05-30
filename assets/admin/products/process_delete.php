<?php
    session_start();
    include "../../menu.php";
    include "../../connect.php";

    $id = $_GET['id'];
    $sql_delete = "delete from products where id = '$id'";
    mysqli_query($connect,$sql_delete);
    $_SESSION['success'] = "Xoá thành công!";
    header('location:index.php');
?>