<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa rạp phim</title>
</head>
<body>
    <h1>Sửa rạp phim</h1>
    <form action="adminWeb.php?action=update&id=<?php echo $rap->getId(); ?>" method="post">
        <label for="tenRap">Tên rạp:</label>
        <input type="text" id="tenRap" name="tenRap" value="<?php echo $rap->getTenRap(); ?>" required>
        <br>
        <label for="diaChi">Địa chỉ:</label>
        <input type="text" id="diaChi" name="diaChi" value="<?php echo $rap->getDiaChi(); ?>" required>
        <br>
        <label for="anh">Ảnh:</label>
        <input type="text" id="anh" name="anh" value="<?php echo $rap->getAnh(); ?>" required>
        <br>
        <label for="soDienThoai">Số điện thoại:</label>
        <input type="text" id="soDienThoai" name="soDienThoai" value="<?php echo $rap->getSoDienThoai(); ?>" required>
        <br>
        <button type="submit">Cập nhật</button>
    </form>
    <a href="adminWeb.php?action=index">Quay lại</a>
</body>
</html>
