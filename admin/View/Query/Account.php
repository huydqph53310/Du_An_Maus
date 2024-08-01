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
    <title>Thông tin cá nhân</title>
<link rel="icon" href="Data/Huydev/Icon/user.png" type="image/x-icon">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
        }
        .profile-container {
            margin-top: 20px;
        }
        .profile-card {
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .profile-card h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-card .profile-info {
            margin-bottom: 10px;
        }
        .profile-card .profile-info label {
            font-weight: bold;
        }
        .profile-card .profile-info p {
            margin: 0;
        }
        .profile-sidebar {
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .profile-sidebar .sidebar-item {
            margin-bottom: 20px;
        }
        .profile-sidebar .sidebar-item a {
            text-decoration: none;
            color: #333;
        }
        .profile-sidebar .text-center img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-bottom: 10px;
        }
        .profile-sidebar .sidebar-item a:hover {
            text-decoration: underline;
        }
        .btn-custom {
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 8px;
        }
        .btn-custom:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="?act=trangchu"><img src="Data/Logo/logo.png" alt="" style="width: 150px; height: 45px"></a>
        
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="?act=trangchu"><?= $mod->NgonNgu == 1 ? "Trang Chủ" : "Home" ?><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                    <?= $mod->NgonNgu == 1 ? "Ngôn Ngữ" : "Language" ?>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="?act=language&type=1">Vietnamese</a>
                    <a class="dropdown-item" href="?act=language&type=0">English</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <?= $mod->NgonNgu  == 1 ? "Tài Khoản" : "Account" ?>
                    </a>
                    <?php
                    if (isset($_SESSION["Email"])) { ?>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="?act=user"><?= $mod->NgonNgu  == 1 ? "Thôn Tin \nTài Khoản" : "Info Account " ?></a>
                            <a class="dropdown-item" href="?act=logout"><?= $mod->NgonNgu  == 1 ? "Đăng Xuất" : "Logout" ?></a>
                            <?php if ($mod->VaiTro == 1) { ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="?act=admin"><?= $mod->VaiTro == 1 ? "Trang quản trị" : "Tab Manganer" ?></a>
                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="?act=singup"><?= $mod->NgonNgu  == 1 ? "Đăng ký" : "Sing up" ?></a>
                            <a class="dropdown-item" href="?act=singin"><?= $mod->NgonNgu  == 1 ? "Đăng Nhập" : "Sing in" ?></a>
                        </div>
                    <?php } ?>
                </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="post" action="">
            <input class="form-control mr-sm-2" type="text" placeholder="<?= $mod->NgonNgu == 1 ? "Tìm Kiếm" : "Search" ?>" aria-label="Search" name="search" id="search">
            <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="smf" value="<?= $mod->NgonNgu == 1 ? "Tìm Kiếm" : "Search" ?>">
        </form>
    </div>
</nav>
<div class="container profile-container">
    <div class="row">
        <div class="col-md-3 profile-sidebar">
            <div class="text-center">
                <img src="https://via.placeholder.com/100" class="rounded-circle" alt="Avatar">
                <h3><?= $mod->HoVaTen ?></h3>
                <p><?= $mod->SoDienThoai ?></p>
                <a href="#">Xem hồ sơ</a>
            </div>
            <hr>
            <div class="sidebar-item">
                <h5>Điểm thưởng của bạn</h5>
                <p><strong>4.622</strong></p>
                <a href="#">Kiểm tra các chuyến bay của bạn</a>
            </div>
            <div class="sidebar-item">
                <a href="#">Chọn Ghế phù hợp</a>
            </div>
            <div class="sidebar-item">
                <a href="#">Khách hàng thân thiết</a>
            </div>
            <div class="sidebar-item">
                <a href="#">Đặt khách sạn, nhà hàng</a>
            </div>
            <div class="sidebar-item">
                <a href="#">Đặt đồ ăn</a>
            </div>
            <div class="sidebar-item">
                <a href="?act=ChangePassWord">Đổi mật khẩu</a>
            </div>
            <div class="sidebar-item">
                <a href="?act=logout"><?= $mod->NgonNgu == 1 ? "Đăng Xuất" : "Logout" ?></a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-card">
                <h2>Thông tin cá nhân</h2>
                <div class="profile-info">
                    <label>Họ và tên:</label>
                    <p><?= $mod->HoVaTen ?></p>
                </div>
                <div class="profile-info">
                    <label>Số điện thoại:</label>
                    <p>0865720862</p>
                </div>
                <div class="profile-info">
                    <label>Giới tính:</label>
                    <p>Nam</p>
                </div>
                <button class="btn btn-danger btn-block">Chỉnh sửa thông tin</button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>