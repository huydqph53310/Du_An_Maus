<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
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
    </style>
</head>
<body>

<div class="container registration-form">
    <h2 class="text-center">Đăng ký</h2>
    <form action="" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="username">Tên đăng nhập</label>
                <input type="text" class="form-control" id="username" placeholder="Nhập tên đăng nhập">
                <span style="color: red;"><?= $thongBaoLoi?></span>
            </div>
            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Nhập email">
                <span style="color: red;"><?= $thongBaoLoi?></span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="phone">Số Điện Thoại</label>
                <input type="text" class="form-control" id="phone" placeholder="Nhập số điện thoại">
                <span style="color: red;"><?= $thongBaoLoi?></span>
            </div>
            <div class="form-group col-md-6">
                <label for="role">Chọn vai trò</label>
                <select class="form-control" id="role">
                <option value="0">Khách hàng</option>
                <option value="1">Quản trị</option>
                </select>
            </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
                <label for="password">Mật khẩu</label>
                <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu">
                <span style="color: red;"><?= $thongBaoLoi?></span>
            </div>
            <div class="form-group col-md-6">
                <label for="confirm-password">Xác nhận mật khẩu</label>
                <input type="password" class="form-control" id="confirm-password" placeholder="Xác nhận mật khẩu">
                <span style="color: red;"><?= $thongBaoLoiConfirmPass?></span>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="language">Chọn ngôn ngữ</label>
                <select class="form-control" id="language">
                <option value="1">VietNamese</option>
                <option value="0">English</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <div class="form-check mt-4">
                <input type="checkbox" class="form-check-input" id="account_status" name="account_status" value="1">
                <label class="form-check-label" for="account-status">Đồng ý với điều khoản của công ty</label>
                </div>
                <span style="color: red;"><?= $thongBaoDieuKhoan?></span>
            </div>
        </div>
                <button type="submit" class="btn btn-primary btn-block" name="Flogin">Đăng ký</button>
                <span style="color: green;"><?= $thongBaoThanhCong?></span>
                <span style="color: red;"><?= $thongBaoTonTaiTk?></span>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
