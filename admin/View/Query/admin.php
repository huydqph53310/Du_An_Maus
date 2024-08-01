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

  <!-- Main Container -->
  <div class="container main-container">
    <div class="row">
      <div class="col-md-4">
        <div class="card text-center">
          <div class="card-body">
            <i class="fas fa-list-alt text-primary"></i>
            <h5 class="card-title mt-2">Quản lý Loại</h5>
            <p class="card-text">Quản lý và cập nhật các loại hàng hóa.</p>
            <a href="?act=typemanager" class="btn btn-outline-primary">Truy cập</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-center">
          <div class="card-body">
            <i class="fas fa-box text-success"></i>
            <h5 class="card-title mt-2">Quản lý Hàng hóa</h5>
            <p class="card-text">Quản lý và cập nhật các mặt hàng trong danh sách.</p>
            <a href="hanghoa.php" class="btn btn-outline-success">Truy cập</a>
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
            <a href="binhluan.php" class="btn btn-outline-warning">Truy cập</a>
          </div>
        </div>
      </div>

    <!-- Các khối hiện tại -->
    <!-- Khối Quản lý vé mới -->
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm text-center">
        <div class="card-body">
        <i class="fas fa-ticket-alt text-warning"></i>
        <h5 class="card-title">Quản lý vé</h5>
          <p class="card-text">Quản lý và cập nhật các loại vé. Quản lý ngày bay</p>
          <a href="#" class="btn btn-outline-warning">Truy cập</a>
        </div>
      </div>
    </div>
    <!-- Khối Quản lý ưu đãi mới -->
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm text-center">
        <div class="card-body">
        <i class="fas fa-tags text-warning"></i>
          <h5 class="card-title">Quản lý ưu đãi</h5>
          <p class="card-text">Quản lý các chương trình khuyến mãi và ưu đãi đặc biệt.</p>
          <a href="#" class="btn btn-outline-success">Truy cập</a>
        </div>
      </div>
    </div>

      <div class="col-md-4">
        <div class="card text-center">
          <div class="card-body">
            <i class="fas fa-chart-bar text-danger"></i>
            <h5 class="card-title mt-2">Thống kê</h5>
            <p class="card-text">Xem thống kê doanh số và báo cáo.</p>
            <a href="thongke.php" class="btn btn-outline-danger">Truy cập</a>
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
