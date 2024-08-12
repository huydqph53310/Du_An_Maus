<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION["Email"])) {
  header("Location: ?act=trangchu");
}
$connect = new Query();
$login = $connect->ShowAccount($_SESSION["Email"]);
$list = $connect->ShowLuggage();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="icon" href="Data/Huydev/Icon/data-management.png" type="image/x-icon">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý Loại</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="?act=admin">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_DIR ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?act=typemanager">Dịch Vụ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?act=luggagemanager">Hàng hóa ký gửi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?act=actormanager">Khách hàng</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?act=binhluan">Bình Luận</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?act=tickets">Vé máy bay</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?act=uudai">Ưu đãi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?act=diemden">Điểm đến</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?act=thongke">Thống kê</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="">
    <div class="p-3 mb-2 bg-primary text-white" style="margin-top: 30px;"><?= $login->NgonNgu == 1 ? "Quản lý hàng hóa ký gửi" : "consignment Luggage" ?></div>
    <table class="table table-striped">
      <thead>
        <tr>
          <th><input type="checkbox" id="check1"></th>
          <th>Mã Hàng Hóa</th>
          <th>Mã Chuyến Bay</th>
          <th>Hình Ảnh</th>
          <th>From</th>
          <th>To</th>
          <th>Thời Gian Xuất</th>
          <th>Thời Gian Nhập</th>
          <th>Mã Khách Hàng</th>
          <th>Tên Khách Hàng</th>
          <th>Ghi chú</th>
          <th>Chức năng</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($list as $type) { ?>
          <tr>
            <th><input type="checkbox" id="check"></th>
            <th><?= $type->MaHangHoa ?></th>
            <th><?= $type->MaChuyenBay ?></th>
            <th><?= $type->HinhAnh ?></th>
            <th><?= $type->from ?></th>
            <th><?= $type->to ?></th>
            <th><?= $type->thoigianxuat ?></th>
            <th><?= $type->thoigiannhap ?></th>
            <th><?= $type->MaKhachhang ?></th>
            <th><?= $type->TenKhachhang ?></th>
            <th><?= $type->GhiChu ?></th>
            <th>
              <a href="?act=edittype&id=<?= $type->MaHangHoa ?>"><button class="btn btn-primary">Sửa</button></a>
              <a href="?act=delltype&id=<?= $type->MaHangHoa ?>"><button class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không')">Xóa</button></a>
            </th>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>