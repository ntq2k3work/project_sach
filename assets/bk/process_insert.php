<?php
    $Ten = $_POST['Ten'];
    $The_Loai = $_POST['The_Loai'];
    $noi_dung = $_POST['noi_dung'];
    $Link_anh = $_POST['Link_anh'];
    $So_Luong = $_POST['So_Luong'];
    $Gia_Goc = $_POST['Gia_Goc'];
    $Gia_Ban = $_POST['Gia_Ban'];
    $Giam_Gia = $_POST['Giam_Gia'];
    
    $ketnoi = mysqli_connect('localhost','root','','truyen_tranh_by_quan');
    mysqli_set_charset($ketnoi,'utf8');

    $sql_insert_san_pham = "
            insert into san_pham(Ten,The_Loai,noi_dung,Link_anh,So_Luong,Gia_Goc,Gia_Ban,Giam_Gia)
            values('$Ten','$The_Loai','$noi_dung','$Link_anh',$So_Luong,$Gia_Goc,$Gia_Ban,$Giam_Gia)";
    mysqli_query($ketnoi,$sql_insert_san_pham);

    mysqli_close($ketnoi);

?>