<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION["Email"])) {
  header("Location: ?act=trangchu");
}
$connect = new Query();
$login = $connect->ShowAccount($_SESSION["Email"]);
$list = $connect->ShowLocation();
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
    <div class="p-3 mb-2 bg-primary text-white" style="margin-top: 30px;"><?= $login->NgonNgu == 1 ? "Quản lý điểm đến" : "Destination management" ?></div>
    <a href="?act=createlocation"><button class="btn btn-success mb-3" data-toggle="modal" data-target="#addLoaiModal">Thêm Điểm Đến</button></a>
    
    <table class="table table-striped">
      <thead>
        <tr>
          <th><input type="checkbox" id="check1"></th>
          <th>id</th>
          <th>Tên Điểm Đến</th>
          <th>Image</th>
          <th>Mã Thành Phố</th>
          <th>count</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($list as $type) { ?>
          <tr>
            <th><input type="checkbox" id="check"></th>
            <th><?= $type->id ?></th>
            <th><?= $type->name ?></th>
            <th><?= $type->image ?></th>
            <th><?= $type->MaTP ?></th>
            <th><?= $type->count ?></th>
            <th>
              <a href="?act=editlocation&id=<?= $type->id ?>"><button class="btn btn-primary">Sửa</button></a>
              <a href="?act=deletelocation&id=<?= $type->id ?>"><button class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không')">Xóa</button></a>
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