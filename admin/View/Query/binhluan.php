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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý Loại</title>
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
    <h2>Quản lý Loại</h2>
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addLoaiModal">Thêm Loại</button>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tên Loại</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <tbody>
        <!-- Dữ liệu loại sẽ được thêm vào đây -->
      </tbody>
    </table>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
