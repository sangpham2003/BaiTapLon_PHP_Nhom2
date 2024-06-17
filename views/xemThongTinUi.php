<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Xem thông tin cá nhân</h1>
    <form action="../controllers/xemThongTinController.php?php echo $account['1']; ?>" method="post">
        <label for="username">Tài khoản:</label>
        <input type="text" id="username" name="username" value="<?php echo $account['username']; ?>" required>
        <br>
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" value="<?php echo $account['password']; ?>" required>
        <br>
        <label for="gender">Ten người dùng:</label>
        <input type="text" id="gender" name="gender" value="<?php echo $account['gender']; ?>" required>
        <br>
        <label for="dob">Ngày sinh:</label>
        <input type="date" id="dob" name="dob" value="<?php echo $account['dob']; ?>" required>
        <br>
        <label for="address">Địa chỉ :</label>
        <input type="text" id="address" name="address" value="<?php echo $account['address']; ?>" required>
        <br>
        <label for="phone">Số điện thoại:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $account['phone']; ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $account['email']; ?>" required>
        <br>
        <button type="submit">Lưu</button>
    </form>
    <a href="./list.php">Back to Account List</a>
    </form>
</body>
</html>