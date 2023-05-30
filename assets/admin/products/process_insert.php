<?php

    if(empty($_POST['name']) || empty($_POST['description']) || empty($_FILES['photo']) || empty($_POST['quantity']) || empty($_POST['price']) ){
        header('location:form_insert.php?error=Phải điền đẩy đủ thông tin');
        exit;
    }
    include "../connect.php";

    $products_name = addslashes($_POST['name']);
    $category = addslashes($_POST['category']);
    $Release_Time = addslashes($_POST['Release_Time']);
    $description = $_POST['description'];
    $photo = $_FILES['photo'];
    $quantity = addslashes($_POST['quantity']);
    $price = addslashes($_POST['price']);
    $sale_percents = addslashes($_POST['sale_percents']);
    $id_manufactures = addslashes($_POST['id_manufactures']);
    ///Kiểm tra số lượng có lớn hơn 0 không
    if($quantity <= 0){
        header('location:form_insert.php?error=Số lượng không thể nhỏ hơn 1');
        exit;
    }
    ///Kiểm tra giá tiền có lớn hơn 0 không
    if($price < 0){
        header('location:form_insert.php?error=Giá tiền không thể âm');
        exit;
    }
    ///Kiểm tra giá giảm có lớn hơn 0 không
    if($sale_percents < 0){
        header('location:form_insert.php?error=Giá giảm không thể âm');
        exit;
    }
    $folder = 'photos/';
    ///Đến số dấu chấm trong ảnh
    $cnt = 0;
    for($i = 0 ; $i < strlen($photo['name']);$i++){
        if($photo['name'][$i] == '.') $cnt++;
    }
    ///Xử lí upload file từ client
    $file_extension = explode('.',$photo['name'])[$cnt]; /// Lấy định dạng ảnh
    $file_name = time() . '.' .$file_extension; ///Thay đổi tên ảnh trên sever để tránh trùng
    $path_file = $folder . $file_name; //Đường dẫn ảnh
    move_uploaded_file($photo["tmp_name"],$path_file); //Di chuyển ảnh từ thư mục tmp đến thư mục cần lưu qua đường dẫn


    
    /// Nếu trùng thì cộng số lượng lên = sô lượng thêm vào
    $sql_check = "select exists(select * from products where products_name = '$products_name' and category = '$category' and Release_Time = '$Release_Time' and description = '$description' and price = '$price' and id_manufactures = '$id_manufactures')";
    $check_array = mysqli_query($connect,$sql_check);
    $check = mysqli_fetch_array($check_array);
    if($check[0]){
        //Update số lượng

        $sql_update_quantity = "update products
            set quantity = quantity + $quantity
            where products_name = '$products_name' and category = '$category' and Release_Time = '$Release_Time' and description = '$description' and price = '$price' and id_manufactures = '$id_manufactures';
        ";

        mysqli_query($connect,$sql_update_quantity);
        header("location:form_insert.php?success=Sản phẩm đã tồn tại, tăng số lượng sản phẩm lên $quantity !");
    }else{
        /// Thêm 
        $sql_insert_products = "insert into products(products_name,category,Release_Time,description,photo,quantity,price,sale_percents,id_manufactures)
            values('$products_name','$category','$Release_Time','$description','$file_name','$quantity','$price','$sale_percents','$id_manufactures')"; //đã bỏ sale
    
        mysqli_query($connect,$sql_insert_products);
    
        header('location:form_insert.php?success=Thêm sản phẩm thành công !');
    }
    mysqli_close($connect);
?>