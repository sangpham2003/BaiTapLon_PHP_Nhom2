php
Sao chép mã
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Tài Khoản</title>
</head>
<body>
<h1>Thêm Tài Khoản</h1>
    <form action="index.php?action=quanlytaikhoan&query=them" method="post">
        <label for="taikhoan">Tài khoản:</label>
        <input type="text" id="taikhoan" name="taikhoan" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="matkhau">Mật khẩu:</label>
        <input type="password" id="matkhau" name="matkhau" required>
        <br>
        <label for="ngaysinh">Ngày sinh:</label>
        <input type="date" id="ngaysinh" name="ngaysinh" required>
        <br>
        <label for="diachi">Địa chỉ:</label>
        <input type="text" id="diachi" name="diachi" required>
        <br>
        <label for="sodienthoai">Số điện thoại:</label>
        <input type="text" id="sodienthoai" name="sodienthoai" required>
        <br>
        <label for="ten">Tên:</label>
        <input type="text" id="ten" name="ten" required>
        <br>
        <button type="submit">Thêm Tài Khoản</button>
    </form>
    <a href="index.php?action=quanlytaikhoan&query=danhsach">Back to Account List</a>
</body>
</html>