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
    <link rel="icon" href="Data/Huydev/Icon/editing.png" type="image/x-icon">

    <title>Chỉnh Sửa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa;
        }
        .registration-form {
            width: 80%;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .alert-lock {
            font-weight: bold;
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>


<div class="container registration-form">
<?php if($thongBaoThanhCong !== ""){?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= $thongBaoThanhCong?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php } 
else if($thongBaoLoi !== ""){?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    Đã sảy ra lỗi trong quá trình tạo Loại mới
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php }?>
    <h2 class="text-center"><?= $login->NgonNgu == 1 ? "Chỉnh sửa loại sản phẩm" : "Edit Type"?></h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name" class="label"><?= $login->NgonNgu == 1 ? "Tên loại" : "Type Name"?></label>
                <input type="text" class="form-control" name="name" placeholder="<?= $login->NgonNgu == 1 ? "Nhập tên loại hàng" : "Input Type Name"?>" value="<?=  $find->TenLoaiHang?>">
                <span style="color: red;"><?= $thongBaoLoi?></span>
            </div>
            <div class="form-group col-md-6">
                <label for="status" class="label"><?= $login->NgonNgu == 1 ? "Chọn Trạng Thái" : "Chose Status"?></label>
                <select class="form-control" name="status" value="<?=  $find->TenLoaiHang?>">
                <option value="1"><?= $login->NgonNgu == 1 ? "Hiển thị" : "Show"?></option>
                <option value="0"><?= $login->NgonNgu == 1 ? "Ẩn" : "Block"?></option>
                </select>
            </div>
        </div>
        <div class="form-group col-md-6">
                <label for="status" class="label">Thêm Hình Ảnh</label>
                <input type="file" name="Fileanh">
                Đường dẫn Ảnh <input type="text" name="linkimg" value="<?= $find->HinhAnh?>">
            </div>
            <button type="submit" class="btn btn-outline-primary btn-block" name="Fedit"><?= $login->NgonNgu == 1 ? "Thay đổi" : "Change"?></button>  
    </form>
    <div class="footer">
    &And; Quay lại trang Quản trị <a href="?act=admin">Admin</a>
    </div>
    <div class="footer">
    &copy; 2024 HuyDevShop <a href="?act=trangchu">Trang Chủ</a>
    </div>
    <div class="footer">
    &copy; mọi thắc mắc vui lòng liên hệ &xrArr; Huydev.id.vn@gmail.com
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
