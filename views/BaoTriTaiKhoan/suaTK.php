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
</head>
<body>
<?php
        require('../../adminWeb.php');
    ?>
    <form action="../../controllers/BaoTriTaiKhoanController.php?query=sua&id= <?php echo $id;?>" method="post">

        <table>
        <h2>Sửa thông tin tài khoản</h2>
            <tr>
                <td><label for="TenTK">Tên tài khoản:</label></td>
                <td><input type="text" id="TenTK" name="TenTK" value="<?php echo $taikhoan['TenTK']; ?>" readonly class="readonly-input"><br></td>
            </tr>
            <tr>
                <td><label for="MatKhau">Mật khẩu:</label></td>
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
                <td><input type="text" id="SDT" name="SDT" value="<?php echo $taikhoan['SDT']; ?>" readonly class="readonly-input"><br></td>
            </tr>
            <tr>
                <td><label for="Email">Email:</label></td>
                <td><input type="Email" id="Email" name="Email" value="<?php echo $taikhoan['Email']; ?>" readonly class="readonly-input"><br></td>
            </tr>
            <tr>
                <td><button>Lưu</button></td>
            </tr>
            
        </table>
        <a href="./listTK.php">Quay lại</a>
       
        
        
        
        
        
        
        
        
        
       
        
        
        
        
       
        


    </form>
</body>
</html>