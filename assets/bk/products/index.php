<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        // require "../menu.php";
        require "../connect.php";
        $sql_select_product = "SELECT id,products_name,category,Release_Time,description,photo,quantity,price,sale_percents,manufactures.name as manufactures_name FROM products INNER JOIN manufactures on products.id_manufactures = manufactures.	id_manufactures";
        $list_product = mysqli_query($connect,$sql_select_product);

    ?>
    <h1>Quản lý sản phẩm</h1>
    <div><a href="form_insert.php">Thêm sản phẩm</a></div>
    <?php 
        include "../connect.php";
        $error = "";
        $show_error = "";
        $success = "";
        $show_success = "";
            if(isset($_GET['error'])){ 
                $error = $_GET['error'];
                $show_error = "<span style=\"color: red;\">$error</span>";
            }
            if(isset($_GET['success'])){
                $success = $_GET['success'];
                $show_success = "<span style=\"color: green;\">$success</span>";
            }
    ?>
        
    <h4><?php if($error != "") echo $show_error ;if($success !="") echo $show_success; ?></h4>
    <table border="1" width = "100%" cellpadding='3' style="text-align:center;">
        <tr>
            <th>Tên</th>
            <th>Thể loại</th>
            <th>Phát hành</th>
            <th>Mô tả</th>
            <th>Ảnh</th>
            <th>Số lượng</th>
            <th>Giá tiền</th>
            <th>Giảm giá</th>
            <th>Nhà sản xuất</th>
            <th>Sửa</th>
            <th>Xoá</th>
        </tr>
        <?php
                foreach ($list_product as $value) {
        ?>
            <tr>
                <td><?php echo $value['products_name'] ?></td>
                <td><?php echo $value['category'] ?></td>
                <td><?php 
                        $date = date_create($value['Release_Time']);
                        echo date_format($date,'d-m-Y');
                    ?>
                </td>
                <td><?php echo nl2br($value['description']) ?></td>
                <td><img src="photos/<?php echo $value['photo'] ?>" width="100%" height="60px" alt="Ảnh sản phẩm" title="Ảnh sản phẩm"></td>
                <td><?php echo $value['quantity'] ?></td>
                <td><?php echo $value['price'] ?></td>
                <td><?php echo $value['sale_percents'] ?></td>
                <td><?php echo $value['manufactures_name'] ?></td>
                <td><a href="form_update.php?id=<?php echo $value['id'] ?>">Sửa</a></td>
                <td><a href="process_delete.php?id=<?php echo $value['id'] ?>" onclick=" return confirm('Bạn có chắc muốn xoá ?')">Xoá</a></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>