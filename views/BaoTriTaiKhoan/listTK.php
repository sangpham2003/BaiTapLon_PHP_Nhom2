
<?php
// Đoạn code này nên đặt ở đầu file PHP, trước khi bắt đầu đoạn HTML
require_once '../../config.php';
require_once '../../models/TaiKhoanModel.php';
// Khởi tạo đối tượng TaiKhoanModel với kết nối đã được thiết lập từ file config.php
$TaiKhoanModel = new TaiKhoanModel($connect);
// Gọi phương thức để lấy danh sách tài khoản
$result = $TaiKhoanModel->getListTK();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách tài khoản</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <?php
        include('../../adminWeb.php');
    ?>
    <h2>Danh sách tài khoản</h2>
    <table>
        <thead>
            <tr>
                <th>Mã TK</th>
                <th>Tên TK</th>
                <th>Mật khẩu</th>
                <th>Tên người dùng</th>
                <th>Ngày sinh</th>
                <th>Địa chỉ</th>
                <th>SĐT</th>
                <th>Email</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $taikhoan): ?>
                <tr>
                    <td><?php echo $taikhoan['MaTK']; ?></td>
                    <td><?php echo $taikhoan['TenTK']; ?></td>
                    <td><?php echo $taikhoan['MatKhau']; ?></td>
                    <td><?php echo $taikhoan['TenNguoiDung']; ?></td>
                    <td><?php echo $taikhoan['NgaySinh']; ?></td>
                    <td><?php echo $taikhoan['DiaChi']; ?></td>
                    <td><?php echo $taikhoan['SDT']; ?></td>
                    <td><?php echo $taikhoan['Email']; ?></td>
                    <td class="action-links">
                       <button><a href="./suaTK.php?id=<?php echo $taikhoan['MaTK']; ?>">Sửa</a></button> 
                       <!-- <button><a href="../../controllers/BaoTriTaiKhoanController.php?query=xoa&id= <?php echo $taikhoan['MaTK'];?>">xóa</a></button>  -->
                       <button onclick="confirmDelete(<?php echo $taikhoan['MaTK']; ?>)">Xóa</button>
                    </td>
                    <script>
    function confirmDelete(id) {
    if (confirm("Bạn có chắc chắn muốn xóa?")) {
        // Nếu người dùng xác nhận, chuyển hướng đến URL xóa
        window.location.href = "../../controllers/BaoTriTaiKhoanController.php?query=xoa&id=" + id;
    } else {
        // Người dùng đã huỷ bỏ xóa
        // Không cần làm gì
    }
}
</script>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button><a href="./themTK.php">Thêm</a></button>
    
</body>
</html>