<?php

require_once 'models/BookingModel.php';
function selectMovies(){
    $_SESSION['phims'] = getDanhSachPhim();
    require __DIR__ . '/../views/Booking/selectMovie.php';
}
function showCinemas() {
    $maPhim = $_GET['maPhim'];
    $_SESSION['raps'] = getRaps($maPhim); // Assuming getRaps() fetches the list of cinemas
    require __DIR__ . '/../views/Booking/SelectCinema.php';
}

function showShowtimes() {
    $maPhim = $_GET['maPhim'];
    $maRap = $_GET['maRap'];
    $_SESSION['showtimes'] = getShowtimesByMaRapAndMaPhim($maRap,$maPhim); // Fetch showtimes for the selected cinema
    require __DIR__ . '/../views/Booking/SelectShowtimes.php';
}
function showSeats() {
    $maSuatChieu = isset($_GET['maSuatChieu']) ? $_GET['maSuatChieu'] : null;
    // Fetch room and seat information for the selected showtime
    $roomSeats = getRoomSeats($maSuatChieu);
    
    // Store in session or pass to view
    $_SESSION['roomSeats'] = $roomSeats;
    
    // Load seat selection view (seatSelection.php)
    require __DIR__ . '/../views/Booking/SelectSeats.php';
}
// Controller function to show payment method selection after seat selection
function showPaymentMethodSelection() {
    // Get selected booking details from POST
    $maSuatChieu = $_POST['maSuatChieu'];
    $viTri = $_POST['viTri']; // Assuming this is the seat ID or booking ID
    // Store in session or pass to view if necessary
    $_SESSION['maSuatChieu'] = $maSuatChieu;
    $_SESSION['viTri'] = $viTri;
    
    // Load payment method selection view (paymentMethodSelection.php)
    require __DIR__ .  '/../views/Booking/SelectPaymentMethodSelection.php';
}
function bookingTicket(){
    $maPhim = $_POST['maPhim'];
    $maRap =$_POST['maRap'];
    $_SESSION['showtimes'] = getShowtimesByMaRapAndMaPhim($maRap, $maPhim);
    require __DIR__ .  '/../views/Booking/BookingTicket.php';
}

function confirmTicket() {

        $bookingData = [
            'maSuatChieu' => intval($_POST['maSuatChieu']),
            'maTK' => $_POST['MaTK'],
            'giaVe' => getTicketPrice($_POST['maSuatChieu']),
            'pttt' => $_POST['paymentMethod'],
            'viTri' => intval($_POST['viTri'])
        ];

        if (saveBooking($bookingData)) {
        require __DIR__ .  '/../views/Booking/ConfirmTicket.php';
            
        } else {
            echo "Them du lieu that bai";
        }

}

?>