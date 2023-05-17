<?php 
    include "./assets/bk/connect.php";
    $email = $_POST['email'];
    $password = substr(md5(rand(1,10000000)),0,6);
    $sql_reset_pass = "update account set password = '$password' where email = '$email'";
    mysqli_query($connect,$sql_reset_pass);
    $header = "From:NTQ Book\r\n";
    $subject = "Khôi phục mật khẩu";
    $content = "Đây là mật khẩu mới của bạn: ".$password." .Vui lòng thay đổi mật khẩu thuận tiện hơn !\n"."Đường dẫn: http://localhost/Project_Learn/index.php";
    mail($email,$subject,$content,$header);
    session_start();
    $_SESSION['successmail'] = 1;
    $previous_page = $_SERVER['HTTP_REFERER'];
    header("location:$previous_page");
    mysqli_close($connect);
?>