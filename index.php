<?php
            session_start();
            if(isset($_GET['doLogin'])){
                if($_GET['doLogin']==0){
                    $_SESSION['doLogin']=0;
                }
                else{
                    $_SESSION['doLogin']=1;
                }
                
            }else{
                // $_SESSION['doLogin']=0;
                $_SESSION['doLogin']=0;
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
    <link rel="stylesheet" href="./header_nav.css">
    <title>Trang chủ</title>
</head>
<body>
    
<div class="wrapper">
    <div>
        <p style="font-size: 25px;">Website đặt vé xem phim</p>
    </div>
    <div id="dk_dk">
    <?php
            if($_SESSION['doLogin']==1){
                if(isset($_GET['MaTK'])){
                    $_SESSION['MaTK']=$_GET['MaTK'];
                }
                
                echo '<a href="./views/XemThongTin/XemTK.php?id=' .$_SESSION['MaTK'].'">Xem thông tin;</a>';
                echo '<a href="./index.php?doLogin=0">Đăng xuất</a>';
               
            }else{
                echo ' <a href="./views/login.php">Đăng nhập</a>
                         <a href="./views/register.php">Đăng kí</a>';  
            }
        
        ?>
    </div></div>
    <div id="menu">
            <nav>
                <ul>
                    <li><a href="#">Trang chủ</a></li>
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
    
    
    
</body>
<!-- <script type="text/javascript" src="js/modal.js"></script> -->
</html>