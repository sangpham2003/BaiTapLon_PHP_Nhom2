<?php
session_start();
if (isset($_GET['doLogin'])) {
    $_SESSION['doLogin'] = 1;
    $_SESSION['MaTK'] = $_GET['MaTK'];
} else {
    $_SESSION['doLogin'] = 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_detal.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"
        integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style_cart.css">
    <link rel="stylesheet" href="css/style_ads.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <title>Trang chủ admin</title>
    <style>
        body {
            background-color: rgb(253, 252, 240);
        }
        .wrapper {
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
            color: rgb(34, 34, 34);
            text-decoration: none;
            display: block;
            border-right: 1px white solid;
            padding-right: 30px;
            padding-left: 30px;
            transition: background-color 0.5s ease;
        }
        #menu a:hover {
            background-color: red;
            color: bisque;
        }
        .wrapper a:hover {
            color: coral;
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
        <p style="font-size: 25px;">
            <a href="" style="text-decoration: none;">Quản lý website đặt vé xem phim</a></p>
    </div>
</div>
<div id="menu">
    <nav>
        <ul>
            <li><a href="#">Trang chủ</a></li>
            <li><a href="./views/BaoTriTaiKhoan/listTK.php">Bảo trì tài khoản</a></li>
            <li><a href="adminWeb.php?action=listRap">Bảo trì rạp phim</a></li>
            <li><a href="">Bảo trì phim</a></li>
        </ul>
    </nav>     
</div>

<?php
require_once 'controllers/BaoTriRapController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

$controller = new BaoTriRapController();

switch ($action) {
    case 'index':
        break;
    case 'listRap':
        $controller->index();
        break;
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store();
        break;
    case 'edit':
        if ($id !== null) {
            $controller->edit($id);
        } else {
            echo "Không tìm thấy thông tin rạp phim để sửa";
        }
        break;
    case 'update':
        if ($id !== null) {
            $controller->update($id);
        } else {
            echo "Không tìm thấy thông tin rạp phim để cập nhật";
        }
        break;
    case 'delete':
        if ($id !== null) {
            $controller->delete($id);
        } else {
            echo "Không tìm thấy thông tin rạp phim để xóa";
        }
        break;
    default:
        echo "Không tìm thấy hành động yêu cầu";
        break;
}
?>
<a href="./index.php">Quay về trang người dùng</a>
</body>
</html>
