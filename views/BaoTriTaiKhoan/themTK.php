<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm tài khoản</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <form action="../../controllers/BaoTriTaiKhoanController.php?query=them" method="post">
    <table>
        <h2>Sửa thông tin tài khoản</h2>
            <tr>
                <td><label for="TenTK">Tên tài khoản:</label></td>
                <td><input type="text" id="TenTK" name="TenTK" placeholder="Điền tên tài khoản" required><br></td>
            </tr>
            <tr>
                <td><label for="MatKhau">Mật khẩu:</label></td>
                <td>
                <input type="password" id="MatKhau" name="MatKhau" placeholder="Mật khẩu"  required><br></td>
            </tr>
            <tr>
                <td><label for="TenNguoiDung">Tên Người dùng:</label></td>
                <td><input type="text" id="TenNguoiDung" name="TenNguoiDung" placeholder="Tên" required><br></td>
            </tr>
            <tr>
                <td><label for="NgaySinh">Ngày sinh:</label></td>
                <td><input type="date" id="NgaySinh" name="NgaySinh" ><br></td>
            </tr>
            <tr>
                <td><label for="DiaChi">Địa chỉ:</label></td>
                <td> <input type="text" id="DiaChi" name="DiaChi" placeholder="Địa chỉ" ><br></td>
            </tr>
            <tr>
                <td><label for="SDT">Số điện thoại:</label></td>
                <td><input type="text" id="SDT" name="SDT" placeholder="Số điện thoại"><br></td>
            </tr>
            <tr>
                <td><label for="Email">Email:</label></td>
                <td><input type="Email" id="Email" name="Email" placeholder="Email" ><br></td>
            </tr>
            <tr>
                <td colspan="2" class="center-align">
                    <button>Thêm</button>
                </td>
            </tr>

</table>
    </form>
    <a href="./listTK.php">Quay lại</a>
</body>
</html>