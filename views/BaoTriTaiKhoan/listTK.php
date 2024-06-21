<?php
// Đoạn code này nên đặt ở đầu file PHP, trước khi bắt đầu đoạn HTML
require_once '../../config.php';
require_once '../../models/TaiKhoanModel.php';
// Khởi tạo đối tượng TaiKhoanModel với kết nối đã được thiết lập từ file config.php
$TaiKhoanModel = new TaiKhoanModel($connect);

// Hàm sắp xếp
function sortID($model, $bien) {
    $result = $model->getListTK();
    $ids = array_column($result, 'MaTK');

    if ($bien == true) {
        array_multisort($ids, SORT_ASC, $result);
    } else {
        array_multisort($ids, SORT_DESC, $result);
    }

    return $result;
}

// Kiểm tra và xử lý form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['sortID'])) {
        if ($_POST['sortID'] == "tangdan") {
            $result = sortID($TaiKhoanModel, true);
        } else {
            $result = sortID($TaiKhoanModel, false);
        }
    } else {
        $result = $TaiKhoanModel->getListTK();
    }

    // Tìm kiếm theo tên và email
    if (isset($_POST['findName']) && !empty($_POST['findName'])) {
        $name = $_POST['findName'];
        $result = array_filter($result, function ($item) use ($name) {
            return stripos($item['TenTK'], $name) !== false;
        });
    }

    if (isset($_POST['findEmail']) && !empty($_POST['findEmail'])) {
        $email = $_POST['findEmail'];
        $result = array_filter($result, function ($item) use ($email) {
            return stripos($item['Email'], $email) !== false;
        });
    }
} else {
    $result = $TaiKhoanModel->getListTK();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách tài khoản</title>
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
        }
        #selection {
            margin-top: 10px;
            margin-bottom: 10px;
            text-align: left; /* Căn giữa các div con theo hàng ngang */
        }

        #selection .child {
            display: inline-block; /* Đảm bảo các div con hiển thị theo hàng ngang */
        }
        
        
        </style>
        
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
                <ul>
                <li><a href="../../adminWeb.php">Trang chủ</a></li>
                    <li><a href="./listTK.php">Bảo trì tài khoản</a></li>
                    <li><a href="">Bảo trì rạp phim </a></li>
                    <li><a href="">Bảo trì phim</a></li>
                </ul>
            </nav>     
    </div> 

    <h2>Danh sách tài khoản</h2>
    <form action="" method="post">
        <div id="selection">
            <select name="sortID" id="sortID">
                <option value="tangdan" class="child">ID Tăng dần</option>
                <option value="giamdan" class="child">ID Giảm dần</option>
            </select>
            <input type="text" id="findName" name="findName" placeholder="Nhập tên tài khoản tìm">
            <input type="text" id="findEmail" name="findEmail" placeholder="Nhập email muốn tìm">
            <button>Tìm kiếm</button>
        </div>
    </form>
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