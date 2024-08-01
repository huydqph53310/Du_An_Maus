<?php 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if(!isset($_SESSION["Email"])){
  header("Location: ?act=trangchu");
}
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
          <a class="nav-link" href="?act=trangchu">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?act=typemanager">Loại</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="hanghoa.html">Hàng hóa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?act=actormanager">Khách hàng</a>
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
    <h2><?= $login->NgonNgu == 1 ? "Quản lý Loại" : "TypeManganer"?></h2>
    <a href="?act=addtype">
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addLoaiModal">Thêm Loại</button>
    </a>
    <table class="table table-striped">
      <thead>
        <tr>
          <th><input type="checkbox" id="check1"></th>
          <th>Mã loại hàng</th>
          <th>Tên loại hàng</th>
          <th>Trạng thái</th>
          <th>Chức Năng</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($list as $type) {?>
          <tr>
            <th><input type="checkbox" id="check"></th>
            <th><?= $type->MaLoaiHang?></th>
            <th><?= $type->TenLoaiHang?></th>
            <th><?= $type->TrangThai?></th>
            <th>
              <a href="?act=edittype&id=<?= $type->MaLoaiHang?>"><button class="btn btn-primary">Sửa</button></a>
              <a href="?act=delltype&id=<?= $type->MaLoaiHang?>"><button class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không')">Xóa</button></a>
            </th>
          </tr>
        <?php }?>
      </tbody>
    </table>
  </div>
  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
