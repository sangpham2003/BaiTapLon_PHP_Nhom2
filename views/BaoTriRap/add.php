<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm rạp phim</title>
</head>
<body>
    <h1>Thêm rạp phim</h1>
    <form action="adminWeb.php?action=store" method="post">
        <label for="tenRap">Tên rạp:</label>
        <input type="text" id="tenRap" name="tenRap" required>
        <br>
        <label for="diaChi">Địa chỉ:</label>
        <input type="text" id="diaChi" name="diaChi" required>
        <br>
        <label for="anh">Ảnh:</label>
        <input type="text" id="anh" name="anh" required>
        <br>
        <label for="soDienThoai">Số điện thoại:</label>
        <input type="text" id="soDienThoai" name="soDienThoai" required>
        <br>
        <button type="submit">Thêm</button>
    </form>
    <a href="adminWeb.php?action=index">Quay lại</a>
</body>
</html>
