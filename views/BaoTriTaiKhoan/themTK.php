<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm tài khoản</title>
    <link rel="stylesheet" href="./style.css">
    <style>body{
            background-color: rgb(253,252,240);
        }
        .wrapper{
            display: grid;
            grid-template-columns: 70% 30%;
            align-content: center;
             text-align: center;
        }
        #menu {
            display: grid;
            grid-template-columns: 70% 30%;
            background-color: #FEF7DD;
            align-content: center;
            text-align: center;

        }

        #menu ul {
            display: grid;
            grid-template-columns: auto auto auto auto auto auto;
            list-style-type: none;
            align-content: center;
        }

        #menu li {
            
            text-justify: auto;
            text-align: center;
        }

        #menu a {
            border-radius: 10px;
            line-height: 50px;
            color: rgb(34,34,34);
            text-decoration: none;
            display:block;
            border-right: 1px white solid;
            padding-right: 30px;
            padding-left: 30px;
            transition: background-color 0.5s ease; /* Thêm hiệu ứng chuyển màu chậm */
        }

        #menu a:hover{
            background-color: red;
            color:bisque;
        }
        .wrapper a:hover{
            color:coral;
        }

        #menu input {
            margin: 6px 10px;
            border-radius: 5px;
        }</style>
</head>
<body>

<div class="wrapper">
    <div>
        <p style="font-size: 25px;">
            <a href="" style="text-decoration: none;">Quản lý website đặt vé xem phim</a></p>
    </div>
</div>
    <div id="menu">
            <nav>
                <ul><li><a href="../../adminWeb.php">Trang chủ</a></li>
                    <li><a href="./listTK.php">Bảo trì tài khoản</a></li>
                    <li><a href="">Bảo trì rạp phim </a></li>
                    <li><a href="">Bảo trì phim</a></li>
                </ul>
            </nav>     
    </div> 
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