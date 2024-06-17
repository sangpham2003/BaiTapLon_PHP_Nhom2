
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách tài khoản</title>
</head>
<body>
    <h1>Danh sách tài khoản</h1>
    <a href="../accounts/add.php">Thêm tài khoản</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tài khoản</th>
            <th>Email</th>
            <th>Mật khẩu</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Tên</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($accounts as $account): ?>
        <tr>
            <td><?php echo $account['id']; ?></td>
            <td><?php echo $account['taikhoan']; ?></td>
            <td><?php echo $account['email']; ?></td>
            <td><?php echo $account['matkhau']; ?></td>
            <td><?php echo $account['ngaysinh']; ?></td>
            <td><?php echo $account['diachi']; ?></td>
            <td><?php echo $account['sodienthoai']; ?></td>
            <td><?php echo $account['ten']; ?></td>
            <td>
                <a href="&id=<?php echo $account['id']; ?>">Sửa</a>
                <a href="&id=<?php echo $account['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>