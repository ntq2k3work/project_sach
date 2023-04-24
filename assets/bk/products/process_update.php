<?php
    //Kiểm tra id có trống không
    if(empty($_GET['id'])){
        header('location:index.php?error=Vui lòng nhập ID!');
        exit;
    }
    
    $id = $_GET['id'];

    if(empty($_POST['name']) || empty($_POST['category']) || empty($_POST['description'])  || empty($_POST['price']) ){
        header('location:form_update.php?error=Phải điền đẩy đủ thông tin');
        exit;
    }
    include "../connect.php";

    $products_name = addslashes($_POST['name']);
    $category = addslashes($_POST['category']);
    $Release_Time = addslashes($_POST['Release_Time']);
    $description = addslashes($_POST['description']);
    $photo_old = addslashes($_POST['photo_old']);
    $quantity = addslashes($_POST['quantity']);
    $price = addslashes($_POST['price']);
    $sale_percents = addslashes($_POST['sale_percents']);
    $photo_new = $_FILES['photo'];
    // $sale = $_POST['sale'];
    $id_manufactures = addslashes($_POST['id_manufactures']);
    ///Kiểm tra số lượng có lớn hơn 0 không
    if($quantity < 0){
        header('location:form_update.php?error=Số lượng không thể âm');
        exit;
    }
    ///Kiểm tra giá tiền có lớn hơn 0 không
    if($price < 0){
        header('location:form_update.php?error=Giá tiền không thể âm');
        exit;
    }
    if($sale_percents < 0){
        header('location:form_update.php?error=Giá giảm không thể âm');
        exit;
    }
    /// Nếu trùng thì cộng số lượng lên = sô lượng thêm vào
    $sql_check = "select exists(select * from products where products_name = '$products_name' and category = '$category' and Release_Time ='$Release_Time' and sale_percents = '$sale_percents'  and quantity = '$quantity'  and description = '$description' and price = '$price' and id_manufactures = '$id_manufactures')";
    $check_array = mysqli_query($connect,$sql_check);
    $check = mysqli_fetch_array($check_array);
    if($check[0] && $photo_new['size'] == 0){
        header("location:index.php?$id&error=Sản phẩm đã tồn tại !");
        exit; 
    }else{
        /// Update khi thông tin thay đổi
        $sql_update = "update products
                set products_name = '$products_name',category = '$category',Release_Time = '$Release_Time',description = '$description',quantity = '$quantity',price = '$price',sale_percents = '$sale_percents',id_manufactures = '$id_manufactures'
                where id = '$id' ";
        mysqli_query($connect,$sql_update);
        /// Nếu tồn tại ảnh mới thì update
        if($photo_new['size'] > 0){
                $folder = 'photos/';
            ///Đến số dấu chấm trong ảnh
            $cnt = 0;
            for($i = 0 ; $i < strlen($photo_new['name']);$i++){
                if($photo_new['name'][$i] == '.') $cnt++;
            }
            ///Xử lí upload file từ client
            $file_extension = explode('.',$photo_new['name'])[$cnt]; /// Lấy định dạng ảnh
            if($cnt == 0) $file_extension = 'jpg';
            $file_name = time() . '.' .$file_extension; ///Thay đổi tên ảnh trên sever để tránh trùng
            $path_file = $folder . $file_name; //Đường dẫn ảnh
            move_uploaded_file($photo_new["tmp_name"],$path_file); //Di chuyển ảnh từ thư mục tmp đến thư mục cần lưu qua đường dẫn
            //Quay lại khi sửa thành công
            $sql_update_photo = "update products
                set photo = '$file_name' where id = '$id' ";
            mysqli_query($connect,$sql_update_photo);
        }
    }
    
    
    header('location:index.php?success=Thay đổi thành công');
    mysqli_close($connect);
?>