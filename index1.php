<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>   
<?php
                if(isset($_SESSION['dangky'])){
                ?>
                   
                    <li><a href="index.php?quanly=thongtin"> Thông tin</a></li>
                    <li> <a href="index.php?dangxuat=1">Đăng xuất</a></li>
                <?php
                    }else{
                ?>
                     <li> <a href="index.php?quanly=dangnhap">Đăng nhập</a></li>
                     <li> <a href="index.php?quanly=dangky">Đăng ký</a></li>
                <?php
                    }
            ?>
</body>
</html>