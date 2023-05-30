<?php session_start(); ?>
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
        include "../../connect.php";
        include "../../menu.php";
        $id = "";
        include "check_id_manufactures.php";
        if(!empty($_GET['id'])) $id = $_GET['id'];
        $sql_select = "select * from manufactures where id_manufactures = '$id'";
        $list_selected = mysqli_query($connect,$sql_select);
        $item_infomation = mysqli_fetch_array($list_selected);
    ?>
    
    <h4><?php if(!empty($_SESSION['error'])) echo $_SESSION['error'] ; if(!empty($_SESSION['success'])) echo $_SESSION['success']?></h4>
    <?php unset($_SESSION['error']);unset($_SESSION['success']) ?>
    <form action="./process_update.php?id=<?php echo $id ?>" method="post">
        <label for="" >Tên</label>
        <input type="text" name="name" value="<?php if(!empty($_GET['id']))  echo $item_infomation['name'] ?>"><br>
        <label for="">Địa chỉ</label>
        <input type="text" name="address" value="<?php if(!empty($_GET['id'])) echo $item_infomation['address'] ?>" ><br>
        <label for="">Sđt </label>
        <input type="text" name="phone" value="<?php if(!empty($_GET['id'])) echo $item_infomation['sdt'] ?>"> <span class="error error_phone" ></span><br>
        <label for="">Email</label>
        <input type="email" name="email" value="<?php if(!empty($_GET['id']))  echo $item_infomation['email']?>"> <span class="error error_email"></span><br>
        <input type="submit" value="Update">
        
    </form>
    <script>
        function validateForm(input,error,regex,text1,text2){
            input.onblur = function(){
                console.log(input.value);
                if(input.value ==""){
                    error.innerHTML = text1;
                }else{
                    if(!input.value.match(regex)){
                        error.innerHTML = text2;
                    }else{
                        error.innerHTML = "";
                    }
                }
            }
        }
        //regex 
        var regex_phone = /^(\+84|0)[1-9]\d{8,9}$/mg ;
        var regex_email = /^\w+([\.-_]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        /// Lấy ra thẻ input
        var input_phone = document.querySelector("input[name='phone']");
        var input_email = document.querySelector("input[name='email']");
        var error_phone = document.querySelector('.error_phone');
        var error_email = document.querySelector('.error_email');
        // Gọi validate
        validateForm(input_phone,error_phone,regex_phone,"Vui lòng nhập số điện thoại","Số điện thoại không hợp lệ");
        validateForm(input_email,error_email,regex_email,"Vui lòng nhập email","Email không hợp lệ");
    </script>
</body>
</html>