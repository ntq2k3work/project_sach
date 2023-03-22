<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./process_insert.php" method="post">
        <div class="input_section">
            <label for="ten">Tên sản phẩm</label>
            <input type="text" name="Ten" id="ten">
        </div>
        <div class="input_section">
            <label for="tieu_de">Tiêu đề sản phẩm</label>
            <input type="text" name="Tieu_de" id="tieu_de">
        </div>
        <div class="input_section">
            <label for="noi_dung">Nội dung</label>
            <textarea name="noi_dung" id="noi_dung" cols="40" rows="20"></textarea>
        </div>
        <div class="input_section">
            <label for="Link_anh">Link ảnh</label>
            <input type="text" name="Link_anh">
        </div>
        <div class="input_section">
            <label for="So_Luong">Số lượng</label>
            <input type="text" name="So_Luong">
        </div>
        <div class="input_section">
            <label for="Gia_Goc">Giá gốc</label>
            <input type="text" name="Gia_Goc">
        </div>
        <div class="input_section">
            <label for="Gia_Ban">Giá đã giảm</label>
            <input type="text" name="Gia_Ban">
        </div>
        <div class="input_section">
            <label for="Giam_Gia">Giảm giá</label>
            <input type="text" name="Giam_Gia">
        </div>
        <div class="input_section">
            <input type="submit" value="Upload">
        </div>
    </form>
</body>
</html>