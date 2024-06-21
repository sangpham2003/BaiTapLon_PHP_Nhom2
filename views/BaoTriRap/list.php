<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách rạp phim</title>
</head>
<body>
    <h1>Danh sách rạp phim</h1>
    <a href="adminWeb.php?action=create">Thêm rạp phim</a>
    <table border="1">
        <thead>
            <tr>
                <th>Mã rạp</th>
                <th>Tên rạp</th>
                <th>Địa chỉ</th>
                <th>Ảnh</th>
                <th>Số điện thoại</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($raps as $rap): ?>
                <tr>
                    <td><?php echo $rap->getId(); ?></td>
                    <td><?php echo $rap->getTenRap(); ?></td>
                    <td><?php echo $rap->getDiaChi(); ?></td>
                    <td><img src="<?php echo $rap->getAnh(); ?>" alt="Ảnh rạp phim" width="100"></td>
                    <td><?php echo $rap->getSoDienThoai(); ?></td>
                    <td>
                        <a href="adminWeb.php?action=edit&id=<?php echo $rap->getId(); ?>">Sửa</a>
                        <a href="adminWeb.php?action=delete&id=<?php echo $rap->getId(); ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
