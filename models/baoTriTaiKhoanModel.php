
<?php
    
    class TaiKhoan
    {   
        private $conn;
        public function __construct($db) {
            $this->conn = $db;
        }
        public $id;
        public $taikhoan;
        public $email;
        public $matkhau;
        public $ngaysinh;
        public $diachi;
        public $sodienthoai;
        public $ten;
        public function getTK($id) {
            $sql = "SELECT * FROM taikhoan WHERE id = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        }
    
        public function getAllTK() {
            $sql = "SELECT * FROM taikhoan";
            $result = $this->conn->query($sql);
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    
        public function addTK($taikhoan, $email, $matkhau, $ngaysinh, $diachi, $sodienthoai, $ten) {
            $sql = "INSERT INTO  `taikhoan`(`TenTK`,`Email`, `MatKhau`,`NgaySinh`, `DiaChi`,   `SDT`, `TenNguoiDung`) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sssssss", $taikhoan, $email, $matkhau, $ngaysinh, $diachi, $sodienthoai, $ten);
            return $stmt->execute();
        }
    
        public function updateTK($id, $taikhoan, $email, $matkhau, $ngaysinh, $diachi, $sodienthoai, $ten) {
            $sql = "UPDATE taikhoan SET `TenTK`=?, `Email`=?, `MatKhau`=?, `NgaySinh`=?, `DiaChi`=?, `SDT=?, `TenNguoiDung`=? WHERE `MaTK`=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sssssssi", $taikhoan, $email, $matkhau, $ngaysinh, $diachi, $sodienthoai, $ten, $id);
            return $stmt->execute();
        }
    
        public function deleteTK($id) {
            $sql = "DELETE FROM taikhoan WHERE `MaTK`=?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $id);
            return $stmt->execute();
        }
    }
?>