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
        
    ?>
    
    <h4><?php if($error != "") echo $show_error ;if($success !="") echo $show_success; ?></h4>
    <form action="./process_insert.php" method="post">
        <label for="">Tên</label>
        <input type="text" name="name"><span class="error error_name"></span><br>
        <label for="">Địa chỉ</label>
        <input type="text" name="address"><br>
        <label for="">Sđt </label>
        <input type="text" name="phone"> <span class="error error_phone" ></span><br>
        <label for="">Email</label>
        <input type="email" name="email"> <span class="error error_email"></span><br>
        <input type="submit" value="Upload" name="Upload">
        
    </form>
    <script>
        /// Hàm validate
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
    <?php mysqli_close($connect) ?>
</body>
</html>