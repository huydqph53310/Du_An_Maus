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

  <div class="container mt-5">
    <div class="p-3 mb-2 bg-primary text-white" style="margin-top: 30px;"><?= $ngonNgu == 1 ? "Quản lý bình luận" : "Comment management" ?></div>
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