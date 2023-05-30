<?php 
    include "./assets/connect.php";
    $name_account = addslashes($_POST['account']);
    $password = addslashes($_POST['password']);
    $sql_check = "select count(*) from account 
    where password = '$password' and (name_account = '$name_account' or email = '$name_account')";
    $check = mysqli_query($connect,$sql_check);
    $number_rows = mysqli_fetch_array($check)['count(*)'];

    if($number_rows == 0){
        session_start();
        $_SESSION['errorsi'] = 1;
        header("location:index.php");
        exit;
    }
    $remember = false;
    if(isset($_POST['remember'])) $remember = true;
    $sql_customer = "select * from account where password = '$password' and (name_account = '$name_account' or email = '$name_account')";
    $customer = mysqli_fetch_array(mysqli_query($connect,$sql_customer));
    session_start();
    $_SESSION['name'] = $customer['first_name'] ." ". $customer['last_name'];
    $_SESSION['id'] = $customer['id'];
    if($remember){
        $token = uniqid('user_%',true);
        $id = $customer['id'];
        $sql_update = "update account set token = '$token' where id = '$id'";
        mysqli_query($connect,$sql_update);
        setcookie('dnuser',$token,time() + 86400);
    }
    $previous_page = $_SERVER['HTTP_REFERER'];
    header("location:$previous_page");
    mysqli_close($connect);
?>