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
  <link rel="icon" href="Data/Huydev/Icon/data-management.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <style>
    .main-container {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }

    .card {
      width: 18rem;
      margin: 15px;
    }

    .card-body i {
      font-size: 2rem;
    }
  </style>
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
  <br>
  <h5 class="text-center">Các Thẻ Nhanh được khởi tạo</h5>
  <br>
  <!-- Main Container -->
  <div class="container main-container">
    <div class="row">
      <div class="col-md-4">
        <div class="card text-center">
          <div class="card-body">
            <i class="fas fa-list-alt text-primary"></i>
            <h5 class="card-title mt-2">Quản lý Dịch Vụ</h5>
            <p class="card-text">Quản lý và cập nhật các Dịch vụ của hãng.</p>
            <a href="?act=typemanager" class="btn btn-outline-primary">Truy cập</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center">
          <div class="card-body">
            <i class="fas fa-box text-success"></i>
            <h5 class="card-title mt-2">Quản lý Hàng hóa Ký gửi</h5>
            <p class="card-text">Các hàng hóa đang chờ hoặc đang vận chuyển</p>
            <a href="?act=luggagemanager" class="btn btn-outline-success">Truy cập</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center">
          <div class="card-body">
            <i class="fas fa-user text-info"></i>
            <h5 class="card-title mt-2">Quản lý Khách hàng</h5>
            <p class="card-text">Quản lý, sử lý thông tin khách hàng.</p>
            <a href="?act=actormanager" class="btn btn-outline-info">Truy cập</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center">
          <div class="card-body">
            <i class="fas fa-comments text-warning"></i>
            <h5 class="card-title mt-2">Quản lý Bình luận</h5>
            <p class="card-text">Quản lý các bình luận của khách hàng.</p>
            <a href="?act=binhluan" class="btn btn-outline-warning">Truy cập</a>
          </div>
        </div>
      </div>

      <!-- Các khối hiện tại -->
      <!-- Khối Quản lý vé mới -->

      <div class="col-md-4">
        <div class="card text-center">
          <div class="card-body">
            <i class="fas fa-ticket-alt text-warning"></i>
            <h5 class="card-title mt-2">Quản lý Vé</h5>
            <p class="card-text">Quản lý và cập nhật các loại vé. Quản lý ngày bay</p>
            <a href="admin/?act=actormanager" class="btn btn-outline-warning">Truy cập</a>
          </div>
        </div>
      </div>
      <!-- Khối Quản lý ưu đãi mới -->
      <div class="col-md-4">
        <div class="card mb-4 text-center">
          <div class="card-body">
            <i class="fas fa-tags text-success"></i>
            <h5 class="card-title mt-2">Quản lý ưu đãi</h5>
            <p class="card-text">Quản lý các chương trình khuyến mãi và ưu đãi đặc biệt.</p>
            <a href="?act=uudai" class="btn btn-outline-success">Truy cập</a>
          </div>
        </div>
      </div>


      <div class="col-md-4">
        <div class="card mb-4 text-center">
          <div class="card-body">
            <i class="fas fa-map-marker-alt text-danger"></i>
            <h5 class="card-title mt-2">Quản lý điểm đến</h5>
            <p class="card-text">Quản lý các chương trình khuyến mãi và ưu đãi đặc biệt.</p>
            <a href="?act=diemden" class="btn btn-outline-danger">Truy cập</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center">
          <div class="card-body">
            <i class="fas fa-chart-bar text-danger"></i>
            <h5 class="card-title mt-2">Thống kê</h5>
            <p class="card-text">Xem thống kê doanh số và báo cáo.</p>
            <a href="?act=thongke" class="btn btn-outline-danger">Truy cập</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>