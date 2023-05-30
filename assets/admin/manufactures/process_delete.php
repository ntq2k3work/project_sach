<?php
    include "../../connect.php";

    $id = $_GET['id'];

    /// Xoá các sản phẩm có ràng buộc khoá ngoại với nhà sản xuất
    $sql_delete_products = "DELETE FROM products WHERE id_manufactures = '$id' ";
    mysqli_query($connect,$sql_delete_products);
    // Xoá nhà sản xuất
    $sql_delete = "DELETE FROM manufactures WHERE id_manufactures = '$id' ";
    mysqli_query($connect,$sql_delete);
    
    header('location:index.php?success=Xoá thành công');
?>