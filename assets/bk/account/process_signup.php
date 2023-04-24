<?php
 include "../connect.php";

    $first_name = addslashes($_POST['first_name']);
    $last_name = addslashes($_POST['last_name']);
    $birthday = addslashes($_POST['birthday']);
    $phone = addslashes($_POST['phone']);
    $address = addslashes($_POST['address']);
    $email = addslashes($_POST['email']);
    $account = addslashes($_POST['account']);
    $password = addslashes($_POST['password']);

$sql_check = "select exists( select * from account where email = '$email' or name_account = '$account')";
$check_ar = mysqli_query($connect,$sql_check);
$check = mysqli_fetch_array($check_ar);
if($check[0] == 1){
    header('location:../../../index.php?errorsu=1');
    exit;
}
$sql_insert = "insert into account(first_name,last_name,birthday,phone,address,email,name_account,password) 
    values('$first_name','$last_name','$birthday','$phone','$address','$email','$account','$password') ";
    
mysqli_query($connect,$sql_insert);
header('location:../../../index.php?success=Tạo tài khoản thành công!');

mysqli_close($connect);
?>