<?php
    if(empty($_GET['error'])){
        if(empty($_GET['id'])){
            header('location:index.php?error=Vui lòng nhập id!');   
            exit;
        }
        //Kiểm tra id có tồn tại không
        $id = $_GET['id'];
        $sql_check_id = mysqli_query($connect,"SELECT EXISTS (SELECT * FROM manufactures WHERE id_manufactures = '$id')");
        $check_id = mysqli_fetch_array($sql_check_id);
        if(!$check_id[0]){
            header('location:index.php?error=ID không tồn tại!');
            exit;
        }
    }

?>