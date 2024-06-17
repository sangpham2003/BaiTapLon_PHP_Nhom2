CREATE TABLE PHIM (
  MaPhim    int(11) NOT NULL AUTO_INCREMENT, 
  TenPhim   varchar(30), 
  TheLoai   varchar(255), 
  ThoiLuong varchar(30), 
  KhoiChieu time(7), 
  Anh       varchar(30), 
  MoTa      text, 
  PRIMARY KEY (MaPhim));
CREATE TABLE PHONG (
  MaPhong    int(11) NOT NULL AUTO_INCREMENT, 
  MaRap      int(11) NOT NULL, 
  TenPhong   int(11), 
  SoLuongGhe int(11), 
  PRIMARY KEY (MaPhong));
CREATE TABLE RAP (
  MaRap  int(11) NOT NULL AUTO_INCREMENT, 
  TenRap varchar(30), 
  DiaChi varchar(30), 
  PRIMARY KEY (MaRap));
CREATE TABLE SUATCHIEU (
  MaSuatChieu    int(11) NOT NULL AUTO_INCREMENT, 
  MaPhim         int(11) NOT NULL, 
  MaPhong        int(11) NOT NULL, 
  NgayChieu      datetime NULL, 
  ThoiGianBatDau time, 
  PRIMARY KEY (MaSuatChieu));
CREATE TABLE TAIKHOAN (
  MaTK         int(11) NOT NULL AUTO_INCREMENT, 
  TenTK        varchar(30) NOT NULL, 
  MatKhau      varchar(30) NOT NULL, 
  DiaChi       varchar(30), 
  NgaySinh     date, 
  Email        varchar(30), 
  SDT          varchar(15), 
  TenNguoiDung varchar(30) NOT NULL, 
  PRIMARY KEY (MaTK));
CREATE TABLE VEPHIM (
  MaVe        int(11) NOT NULL AUTO_INCREMENT, 
  MaSuatChieu int(11) NOT NULL, 
  MaTK        int(11) NOT NULL, 
  GiaVe       int(11), 
  PTTT        varchar(255), 
  ViTri       int(11), 
  PRIMARY KEY (MaVe));
ALTER TABLE VEPHIM ADD CONSTRAINT FKVEPHIM112359 FOREIGN KEY (MaTK) REFERENCES TAIKHOAN (MaTK);
ALTER TABLE PHONG ADD CONSTRAINT FKPHONG351691 FOREIGN KEY (MaRap) REFERENCES RAP (MaRap);
ALTER TABLE SUATCHIEU ADD CONSTRAINT FKSUATCHIEU191445 FOREIGN KEY (MaPhim) REFERENCES PHIM (MaPhim);
ALTER TABLE SUATCHIEU ADD CONSTRAINT FKSUATCHIEU717343 FOREIGN KEY (MaPhong) REFERENCES PHONG (MaPhong);
ALTER TABLE VEPHIM ADD CONSTRAINT FKVEPHIM734000 FOREIGN KEY (MaSuatChieu) REFERENCES SUATCHIEU (MaSuatChieu);