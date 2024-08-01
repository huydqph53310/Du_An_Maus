<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION["Email"])) {
  header("Location: ?act=trangchu");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="Data/Huydev/Icon/profile.png" type="image/x-icon">

  <title>Quản lý Tài Khoản</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.html">Admin Dashboard</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="loai.html">Loại</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="hanghoa.html">Hàng hóa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="khachhang.html">Khách hàng</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="binhluan.html">Bình luận</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="thongke.html">Thống kê</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container mt-5">
    <h2>Quản lý Tài Khoản</h2>
    <a href="?act=singup"><button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addLoaiModal">Thêm Tài Khoản</button></a>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Mã Khách Hàng</th>
          <th>Họ Và Tên</th>
          <th>Email</th>
          <th>SĐT</th>
          <th>Ngôn Ngữ</th>
          <th>Hình Ảnh</th>
          <th>Vai Trò</th>
          <th>Trạng thái Ban</th>
          <th>Trạng thái</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($KH as $va) {
        ?>
          <tr>

            <th><?= $va->MaKhachHang ?></th>
            <th><?= $va->HoVaTen ?></th>
            <th><?= $va->Email ?></th>
            <th><?= $va->SoDienThoai ?></th>
            <th><?= $va->NgonNgu ?></th>
            <th><?= $va->HinhAnh ?></th>
            <th><?= $va->VaiTro ?></th>
            <?php
            if ($va->MaKhachHang == $_SESSION["id"]) { ?>
              <th><?= $va->Ban == 1 ? '<a href="" onclick="return alert(`Bạn không thể thao tác với tài khoản này`)">Khóa</a>' : '<a href="" onclick="return alert(`Bạn không thể thao tác với tài khoản này`)">Mở</a>' ?></th>
              <th><a href=""><button type="button" class="btn btn-secondary" onclick="return alert(`Bạn không thể thao tác với tài khoản này`)">Xóa</button></a></th>
            <?php } else { ?>
              <th><?= $va->Ban == 1 ? '<a href="?act=actormanager/Ban&type=1&id= ' . $va->MaKhachHang . ' " onclick="return confirm(`Bạn có muốn chắc muốn mở tài khoản này`)">Khóa</a>' : '<a href="?act=actormanager/Ban&type=0&id= ' . $va->MaKhachHang . '" onclick="return confirm(`Bạn có muốn chắc muốn khóa tài khoản này`)">Mở</a>' ?></th>
              <th><a href="?act=dellaccount&id=<?= $va->MaKhachHang ?>"><button type="button" class="btn btn-secondary" onclick="return confirm('Bạn có muốn chắc xóa tài khoản này')">Xóa</button></a></th>
            <?php } ?>
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