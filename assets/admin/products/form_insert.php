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
        include "../../menu.php";
        include "../../connect.php";
        $sql_select_manufactures = "select * from manufactures ";
        $result = mysqli_query($connect,$sql_select_manufactures);

    ?>
    <h4>
        <?php 
            if(isset($_GET['error'])){
                echo $show_error;
            }else echo $show_success;

        ?>
    </h4>
    <form action="process_insert.php" method="post" enctype="multipart/form-data">
        <label for="">Tên </label>    
        <input type="text" name = "name"> <br>
        <label for="">Thể loại </label>
        <input type="text" name = "category"><br>
        <label for="">Mô tả</label>
        <textarea name="description" id="" cols="40" rows="30"></textarea><br>
        <label for="">Thời gian phát hành</label>
        <input type="date" name = " Release_Time"> <br>
        <label for="">File ảnh</label>
        <input type="file" name="photo" id="photo"> <br>
        <label for="">Số lượng</label>
        <input type="number" name="quantity" id="" value="1"><br>
        <label for="">Giá tiền </label>
        <input type="text" name ="price"><br>
        <label for="">Giảm giá</label>
        <input type="number" value="0" name ="sale_percents"><br>
        Nhà sản xuất
        <select name="id_manufactures" id="">
            <?php foreach ($result as $value) { ?>
                <option value="<?php echo $value['id_manufactures']?>" ><?php echo $value['name'] ?></option>    
             <?php } ?>
        </select><br>
        <button>Upload</button>
    </form>
</body>
</html>