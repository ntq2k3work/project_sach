<?php
include "../connect.php";
 $account = $_POST['account'];
 $password = $_POST['password'];
    $sql_check = "select exists(select * from account where name_account = '$account' and password = '$password')";
    $check_ar = mysqli_query($connect,$sql_check);
    $check = mysqli_fetch_array($check_ar);
    if($check[0] == 1){
        echo 2;
    }else{
        header('location:../../../index.php?errorsi=1');
    }

mysqli_close($connect);
?>
