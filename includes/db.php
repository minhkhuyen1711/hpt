
<?php
// Kết nối đến cơ sở dữ liệu MySQL
$con = mysqli_connect("localhost", "root", "", "thuongmaidientu");

// Kiểm tra kết nối
if (!$con) {
    // Nếu kết nối không thành công, in ra thông báo lỗi và dừng mã
    die("Không thể kết nối được với MySQL: " . mysqli_connect_error());
}

// Nếu kết nối thành công, thiết lập bộ mã hóa ký tự UTF-8
mysqli_query($con, "SET NAMES 'utf8'");

// Tiếp tục thực hiện các thao tác với cơ sở dữ liệu nếu cần
?>
