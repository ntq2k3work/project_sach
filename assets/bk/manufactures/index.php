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
        include "../connect.php";
        $sql_select_all = "select * from manufactures";
        $sql_select_all_process = mysqli_query($connect,$sql_select_all);
    ?>

    <h2>Đây là khu vực quản lý sản xuất </h2>
    <div><a href="form_insert.php">Thêm nhà sản xuất</a></div>
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
    <table border="1" width="100%">
        <tr>
            <th>id</th>
            <th>Tên</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Sửa</th>
            <th>Xoá</th>
        </tr>
        <?php foreach ($sql_select_all_process as $value) { ?>
            <tr>
                <td> <?php echo $value['id_manufactures'] ?></td>
                <td> <?php echo $value['name'] ?></td>
                <td> <?php echo $value['address'] ?></td>
                <td> <?php echo $value['sdt'] ?></td>
                <td> <?php echo $value['email'] ?></td>
                <td><a href="./form_update.php?id=<?php echo $value['id_manufactures'] ?>">Sửa</a></td>
                <td><a href="./process_delete.php?id=<?php echo $value['id_manufactures'] ?>" onclick="return confirm('Xác nhận xoá');">Xoá</a></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>