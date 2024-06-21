<?php
    require_once '../../config.php';
    require_once '../../models/TaiKhoanModel.php';
    // Khởi tạo đối tượng TaiKhoanModel với kết nối đã được thiết lập từ file config.php
    $TaiKhoanModel = new TaiKhoanModel($connect);
    $id=$_GET['id'];
    $taikhoan=$TaiKhoanModel->getTK($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa tài khoản</title>
    <link rel="stylesheet" href="./style.css">
    <script>
        // Hàm kiểm tra thay đổi và yêu cầu nhập mật khẩu cũ
        function checkChanges() {
            // Lấy giá trị hiện tại của các trường input
            var currentTenTK = document.getElementById("TenTK").value;
            var currentMatKhau = document.getElementById("MatKhau").value;
            var currentTenNguoiDung = document.getElementById("TenNguoiDung").value;
            var currentNgaySinh = document.getElementById("NgaySinh").value;
            var currentDiaChi = document.getElementById("DiaChi").value;
            var currentSDT = document.getElementById("SDT").value;
            var currentEmail = document.getElementById("Email").value;

            // Nếu có bất kỳ thay đổi nào
            if (currentTenTK !== "<?php echo $taikhoan['TenTK']; ?>" ||
                currentMatKhau !== "<?php echo $taikhoan['MatKhau']; ?>" ||
                currentTenNguoiDung !== "<?php echo $taikhoan['TenNguoiDung']; ?>" ||
                currentNgaySinh !== "<?php echo $taikhoan['NgaySinh']; ?>" ||
                currentDiaChi !== "<?php echo $taikhoan['DiaChi']; ?>" ||
                currentSDT !== "<?php echo $taikhoan['SDT']; ?>" ||
                currentEmail !== "<?php echo $taikhoan['Email']; ?>") {
                
                // Hiển thị yêu cầu nhập mật khẩu cũ
                var oldPassword = prompt("Nhập mật khẩu cũ để tiếp tục lưu thay đổi:");
                
                // Kiểm tra xem người dùng đã nhập mật khẩu cũ hay chưa
                if (oldPassword === null || oldPassword === "") {
                    // Nếu không nhập mật khẩu cũ, không lưu thay đổi
                    alert("Bạn cần nhập mật khẩu cũ để lưu thay đổi.");
                    return false; // Ngăn không cho form submit
                } else {
                    // Nếu đã nhập mật khẩu cũ, cho phép form submit
                    return true;
                }
            }

            // Nếu không có thay đổi, cho phép form submit
            return true;
        }
    </script>
    <style>
        body{
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
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div>
        <p style="font-size: 25px;">Website đặt vé xem phim</p>
    </div>
    <div id="dk_dk">
    <?php    
        echo '<a href="./XemTK.php?id=' .$id.'">Xem thông tin;</a>';
        echo '<a href="../../index.php?doLogin=0">Đăng xuất</a>';
    ?>
    </div></div>
    <div id="menu">
            <nav>
                <ul>
                    <li><a href="../../index.php">Trang chủ</a></li>
                    <li><a href="">Phim</a></li>
                    <li><a href="">Rạp phim</a></li>
                    <li><a href="">Ưu đãi</a></li>
                </ul>
            </nav>
            <div>
                <p>Tìm kiếm phim, rạp</p>
            <input type="text" placeholder="Nhập từ khóa tìm kiếm">
            </div>
            
        </div>
    
    <form action="../../controllers/XemThongTinTKController.php?id=<?php echo $id;?>" method="post" onsubmit="return checkChanges();">

        <table>
        <h2>Xem thông tin tài khoản</h2>
            <tr>
                <td><label for="TenTK">Tên tài khoản:</label></td>
                <td><input type="text" id="TenTK" name="TenTK" value="<?php echo $taikhoan['TenTK']; ?>"readonly class="readonly-input"><br></td>
            </tr>
            <tr>
                <td><label for="MatKhau">Mật khẩu mới:</label></td>
                <td>
                <input type="password" id="MatKhau" name="MatKhau" value="<?php echo $taikhoan['MatKhau']; ?>"><br></td>
            </tr>
            <tr>
                <td><label for="TenNguoiDung">Tên Người dùng:</label></td>
                <td><input type="text" id="TenNguoiDung" name="TenNguoiDung" value="<?php echo $taikhoan['TenNguoiDung']; ?>"><br></td>
            </tr>
            <tr>
                <td><label for="NgaySinh">Ngày sinh:</label></td>
                <td><input type="date" id="NgaySinh" name="NgaySinh" value="<?php echo $taikhoan['NgaySinh']; ?>"><br></td>
            </tr>
            <tr>
                <td><label for="DiaChi">Địa chỉ:</label></td>
                <td> <input type="text" id="DiaChi" name="DiaChi" value="<?php echo $taikhoan['DiaChi']; ?>"><br></td>
            </tr>
            <tr>
                <td><label for="SDT">Số điện thoại:</label></td>
                <td><input type="text" id="SDT" name="SDT" value="<?php echo $taikhoan['SDT']; ?>"readonly class="readonly-input"><br></td>
            </tr>
            <tr>
                <td><label for="Email">Email:</label></td>
                <td><input type="Email" id="Email" name="Email" value="<?php echo $taikhoan['Email']; ?>"readonly class="readonly-input"><br></td>
            </tr>
            <tr>
                <td><button type="submit">Lưu</button></td>
            </tr>
            
        </table>
    </form>
</body>
</html>