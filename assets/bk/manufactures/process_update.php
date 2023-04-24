<?php
    include "../../connect.php";
    //Kiểm tra id có trống không
    if(empty($_GET['id'])){
        header('location:index.php?error=Vui lòng nhập ID!');
        exit;
    }
    
    $id = $_GET['id'];
   
    // Kiểm tra xem thông tin nhập vào có trống không 
    if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['email'])){
        header("location:form_update.php?id=$id&error=Phải điền đầy đủ thông tin"); //Nếu trống thì quay lại và thông báo
        exit;
    }
    //Lấy thông tin được nhập vào
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    //Check unique nhà sản xuất
    $sql_exist = mysqli_query($connect,"SELECT EXISTS(SELECT * FROM manufactures where name = '$name' AND address = '$address' AND sdt = '$phone' AND email = '$email')");
    $check_exist = mysqli_fetch_array($sql_exist);
    if($check_exist[0]){
        header("location:form_update.php?id=$id&error=Nhà sản xuất đã tồn tại");
        exit;
    }
    //insert nhà sản xuất vào database
    $sql_update = " update manufactures
        set name = '$name',address = '$address',sdt = '$phone',email = '$email'
        where id_manufactures = '$id'
    ";

    mysqli_query($connect,$sql_update);

    //Quay lại khi sửa thành công
    header('location:index.php?success=Thay đổi thành công');
    mysqli_close($connect);
?>