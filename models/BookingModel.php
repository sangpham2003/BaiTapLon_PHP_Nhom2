<?php
require_once __DIR__ . '/../config/connect.php';
function getDanhSachPhim() {
    // Kết nối tới cơ sở dữ liệu
    $conn = getDatabaseConnection();

    // Câu lệnh SQL để lấy danh sách phim
    $sql = "SELECT MaPhim, TenPhim, TheLoai, ThoiLuong, KhoiChieu, Anh, MoTa FROM PHIM";
    
    // Thực thi câu lệnh SQL
    $result = $conn->query($sql);

    // Kiểm tra và lấy kết quả
    if ($result->num_rows > 0) {
        $danhSachPhim = [];
        while ($row = $result->fetch_assoc()) {
            $danhSachPhim[] = $row;
        }
    } else {
        $danhSachPhim = null; // Không có phim nào trong cơ sở dữ liệu
    }

    // Đóng kết nối
    $conn->close();

    return $danhSachPhim;
}
function getRaps($maPhim) {
    $conn = getDatabaseConnection();
    $sql = "
        SELECT RAP.MaRap, RAP.TenRap, RAP.DiaChi
        FROM RAP
        JOIN PHONG ON RAP.MaRap = PHONG.MaRap
        JOIN SUATCHIEU ON PHONG.MaPhong = SUATCHIEU.MaPhong
        WHERE SUATCHIEU.MaPhim = ?
    ";

    // Prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $maPhim);
    $stmt->execute();

    // Fetch the results
    $result = $stmt->get_result();

    // Check if there are results and fetch data
    if ($result->num_rows > 0) {
        $raps = [];
        while ($row = $result->fetch_assoc()) {
            $raps[] = $row;
        }
    } else {
        $raps = null; // No raps found for the given MaPhim
    }

    // Close the connection
    $stmt->close();
    $conn->close();

    return $raps;
}
    function getShowtimesByMaRapAndMaPhim($maRap,$maPhim) {
        $conn = getDatabaseConnection();
    
        // Prepare SQL query to retrieve showtimes with associated room and cinema
        $sql = "SELECT sc.MaSuatChieu, p.TenPhim, sc.NgayChieu, sc.ThoiGianBatDau, ph.TenPhong, r.TenRap, r.DiaChi
        FROM SUATCHIEU sc
        INNER JOIN PHIM p ON sc.MaPhim = p.MaPhim
        INNER JOIN PHONG ph ON sc.MaPhong = ph.MaPhong
        INNER JOIN RAP r ON ph.MaRap = r.MaRap
        WHERE r.MaRap = ? AND sc.MaPhim = ?";

    
        // Prepare and bind parameters
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $maRap, $maPhim);
    
        // Execute query
        $stmt->execute();
    
        // Bind result variables
        $stmt->bind_result($maSuatChieu, $tenPhim, $ngayChieu, $thoiGianBatDau, $tenPhong, $tenRap, $diaChi);
    
        // Initialize an empty array to store showtime details
        $showtimes = array();
    
        // Fetch results and store in the array
        while ($stmt->fetch()) {
            $showtimes[] = array(
                'MaSuatChieu' => $maSuatChieu,
                'TenPhim' => $tenPhim,
                'NgayChieu' => $ngayChieu,
                'ThoiGianBatDau' => $thoiGianBatDau,
                'TenPhong' => $tenPhong,
                'TenRap' => $tenRap,
                'DiaChi' => $diaChi
            );
        }
    
        // Close statement
        $stmt->close();
    
        // Return array of showtime details
        return $showtimes;
    }

    // Function to fetch room and seat information by MaSuatChieu (showtime ID)
function getRoomSeats($maSuatChieu) {
    $conn = getDatabaseConnection();
    // Prepare SQL query to retrieve room and seat information for a specific showtime
    $sql = "SELECT p.MaPhong, p.TenPhong, p.SoLuongGhe
            FROM PHONG p
            INNER JOIN SUATCHIEU sc ON p.MaPhong = sc.MaPhong
            WHERE sc.MaSuatChieu = ?";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $maSuatChieu);

    // Execute query
    $stmt->execute();

    // Bind result variables
    $stmt->bind_result($maPhong, $tenPhong, $soLuongGhe);

    // Fetch result
    $stmt->fetch();

    // Close statement
    $stmt->close();

    // Return room and seat information
    return array(
        'MaPhong' => $maPhong,
        'TenPhong' => $tenPhong,
        'SoLuongGhe' => $soLuongGhe
    );
}

    function getSeatsByShowtime($maSuatChieu) {
    $conn = getDatabaseConnection();
    $stmt = $conn->prepare('SELECT * FROM VEPHIM WHERE MaSuatChieu = ?');
    $stmt->execute([$maSuatChieu]);
    return $stmt;
}

function saveBooking($bookingData) {
    $conn = getDatabaseConnection();
    $stmt = $conn->prepare('INSERT INTO VEPHIM (MaSuatChieu, MaTK, GiaVe, PTTT, ViTri) VALUES (?, ?, ?, ?, ?)');
    return $stmt->execute([
        $bookingData['maSuatChieu'],
        $bookingData['maTK'],
        $bookingData['giaVe'],
        $bookingData['pttt'],
        $bookingData['viTri']
    ]);

}
function getTicketPrice($maSuatChieu) {
    $conn = getDatabaseConnection();
    
    try {
        // Chuẩn bị câu truy vấn SQL để lấy giá vé từ bảng SUATCHIEU
        $stmt = $conn->prepare('SELECT GiaVe FROM SUATCHIEU WHERE MaSuatChieu = ?');
        $stmt->bind_param('i', $maSuatChieu);
        $stmt->execute();
        
        // Lấy kết quả của truy vấn
        $stmt->bind_result($giaVe);
        
        // Fetch kết quả
        $stmt->fetch();
        
        // Đóng câu truy vấn
        $stmt->close();
        
        // Đóng kết nối đến cơ sở dữ liệu
        $conn->close();
        
        return $giaVe; // Trả về giá vé
    } catch(Exception $e) {
        echo "Lỗi khi thực hiện truy vấn: " . $e->getMessage();
        return null; // Trả về null nếu có lỗi
    }
}
?>