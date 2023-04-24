<?php
    include "../menu.php";
    include "../connect.php";
    $id = $_GET['id'];
    $sql_delete = "delete from products where id = '$id'";
    mysqli_query($connect,$sql_delete);
    header('location:index.php?success=Xoá thành công!');
?>