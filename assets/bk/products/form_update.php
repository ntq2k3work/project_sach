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
        include "../menu.php";
        $id = "";
        if(empty($_GET['error'])){
            if(empty($_GET['id'])){
                header('location:index.php?error=Vui lòng nhập id!');   
                exit;
            }
            $sql_select_manufactures = "select * from manufactures";
            $list_manufactures = mysqli_query($connect,$sql_select_manufactures);
            //Kiểm tra id có tồn tại không
            $id = $_GET['id'];
            $sql_check_id = mysqli_query($connect,"SELECT EXISTS (SELECT * FROM products WHERE id = '$id')");
            $check_id = mysqli_fetch_array($sql_check_id);
            if(!$check_id[0]){
                header('location:index.php?error=ID không tồn tại!');
                exit;
            }
        }
        if(!empty($_GET['id'])) $id = $_GET['id'];
        $sql_select = "select * from products where id = '$id'";
        $list_selected = mysqli_query($connect,$sql_select);
        $item_infomation = mysqli_fetch_array($list_selected);
    ?>
    <h4><?php if($error != "") echo $show_error ;if($success !="") echo $show_success; ?></h4>
    <form action="process_update.php?id=<?php echo $id ?>" method="post"  enctype="multipart/form-data">
        <label for="" >Tên</label>
        <input type="text" name="name" value="<?php if(!empty($_GET['id']))  echo $item_infomation['products_name'] ?>"><br>
        <label for="">Thể loại</label>
        <input type="text" name="category" value="<?php if(!empty($_GET['id'])) echo $item_infomation['category'] ?>" ><br>
        <label for="">Thời gian phát hành</label>
        <input type="date" name="Release_Time" value="<?php if(!empty($_GET['id'])) echo $item_infomation['Release_Time'] ?>" ><br>
        <label for="">Mô tả</label>
        <textarea name="description" id="" cols="30" rows="10"><?php if(!empty($_GET['id'])) echo $item_infomation['description'] ?></textarea><br>
        <input type="text" hidden name="photo_old" value="<?php if(!empty($_GET['id']))  echo $item_infomation['photo']?>">
        <label for="">Ảnh cũ</label>
        <img src="photos/<?php if(!empty($_GET['id']))  echo $item_infomation['photo']?>" height="400px" width="auto" alt=""><br>
        <label for="">File ảnh mới</label>
        <input type="file" name="photo" id="photo"> <br>
        <label for="">Số lượng </label>
        <input type="number" name="quantity" value="<?php if(!empty($_GET['id'])) echo $item_infomation['quantity'] ?>"><br>
        <label for="">Giá</label>
        <input type="text" name="price" value="<?php if(!empty($_GET['id']))  echo $item_infomation['price']?>"><br>
        <label for="">Giảm giá</label>
        <input type="number" name="sale_percents" value="<?php if(!empty($_GET['id']))  echo $item_infomation['sale_percents']?>"><br>
        <label for="manufactures">Nhà sản xuất</label>
        <select name="id_manufactures" id="manufactures">
            <?php foreach ($list_manufactures as $value) { ?>
                <option value="<?php if(!empty($_GET['id']))  echo $value['id_manufactures']?>"><?php if(!empty($_GET['id']))  echo $value['name']?></option>
            <?php } ?>
        </select><br>
        <input type="submit" value="Update">
        
    </form>
    <script>

    </script>
</body>
</html>