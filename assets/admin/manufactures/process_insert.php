<?php
    // Kiểm tra xem thông tin nhập vào có trống không 
    if(empty($_POST['name']) || empty($_POST['address']) || empty($_POST['phone']) || empty($_POST['email'])){
        header('location:form_insert.php?error=Phải điền đầy đủ thông tin'); //Nếu trống thì quay lại và thông báo
        exit;
    }
    //Lấy thông tin được nhập vào
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    include "../connect.php";
    //Check unique nhà sản xuất
    $sql_check_name = mysqli_query($connect,"SELECT EXISTS(SELECT * FROM manufactures where name = '$name' AND address = '$address' AND sdt = '$phone' AND email = '$email')");
    $check_name = mysqli_fetch_array($sql_check_name);
    if($check_name[0]){
        header('location:form_insert.php?error=Nhà sản xuất đã tồn tại');
        exit;
    }
    //insert nhà sản xuất vào database
    $sql_insert = "insert into manufactures(name,address,sdt,email)
    values('$name','$address','$phone','$email')";

    mysqli_query($connect,$sql_insert);

    //Quay lại khi thêm thành công
    header('location:form_insert.php?success=Thêm thành công');
    mysqli_close($connect);
?>