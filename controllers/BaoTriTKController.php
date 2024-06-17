<?php
    require_once '../config.php';
    require_once '../models/TaiKhoan.php';
    
    class BaoTriTKController {
        private $model;
    
        public function __construct() {
            global $conn;
            $this->model = new TaiKhoan($conn);
        }
    
        public function list() {
            $accounts = $this->model->getAllTK();
            require '../views/accounts/list.php';
        }
    
        public function add() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->model->addTK($_POST['taikhoan'], $_POST['email'], $_POST['matkhau'], $_POST['ngaysinh'], $_POST['diachi'], $_POST['sodienthoai'], $_POST['ten']);
                
                echo '<script>
    alert("Thêm tài khoản thành công!");
    window.location.href = "../views/accounts/list.php";
</script>';
                exit();
            } else {
                require '../views/accounts/add.php';
            }
        }
    
        public function edit($id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->model->updateTK($id, $_POST['taikhoan'], $_POST['email'], $_POST['matkhau'], $_POST['ngaysinh'], $_POST['diachi'], $_POST['sodienthoai'], $_POST['ten']);
                echo '<script>
    alert("Sửa tài khoản thành công!");
    window.location.href = "../views/accounts/list.php";
</script>';
                exit();
            } else {
                $account = $this->model->getTK($id);
                require '../views/accounts/edit.php';
            }
        }
    
        public function delete($id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Xử lý yêu cầu xóa tài khoản
                $this->model->deleteTK($id);
                echo '<script>
                        alert("Xóa tài khoản thành công!");
                        window.location.href = "../views/accounts/list.php";
                      </script>';
                exit();
            } else {
                // Hiển thị form xác nhận xóa tài khoản
                echo '<script>
                        var confirmed = confirm("Bạn có chắc chắn muốn xóa tài khoản này?");
                        if (confirmed) {
                            // Nếu người dùng đồng ý xóa, gửi yêu cầu POST để xóa
                            var form = document.createElement("form");
                            form.method = "post";
                            form.action = ""; // Thay đổi action nếu cần
                            form.style.display = "none";
                            document.body.appendChild(form);
                            
                            // Tạo input ẩn để gửi id của tài khoản cần xóa
                            var input = document.createElement("input");
                            input.type = "hidden";
                            input.name = "id";
                            input.value = "' . $id . '"; // Giá trị của id
                            form.appendChild(input);
                            
                            form.submit();
                        } else {
                            // Nếu người dùng không đồng ý xóa, chuyển hướng đến trang danh sách
                            window.location.href = "../views/accounts/list.php";
                        }
                      </script>';
            }

    }
}

?>