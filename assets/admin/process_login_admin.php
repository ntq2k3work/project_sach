<?php 
    require "../connect.php";
    $name_account = addslashes($_POST['name_account']);
    $password = addslashes($_POST['password']);
    $sql_check = "select * FROM admin WHERE name_account = '$name_account' and password = '$password'";
    $check = mysqli_num_rows(mysqli_query($connect,$sql_check));
    if($check == 1){
        $each = mysqli_fetch_array(mysqli_query($connect,$sql_check));
        session_start();
    }else{
        $previos_page = $_SERVER['HTTP_REFERER'];
        session_start();
        $_SESSION['error'] = "Tài khoản hoặc mật khẩu không chính xác";
        header("location:$previos_page");
    }
    mysqli_close($connect);
?>