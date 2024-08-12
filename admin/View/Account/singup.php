<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Data/Huydev/Icon/user-add.png" type="image/x-icon">

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
        <?php if ($thongBaoThanhCong !== "") { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $thongBaoThanhCong ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } else if ($thongBaoLoi !== "") { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Đã sảy ra lỗi trong quá trình tạo Tk
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
        <h2 class="text-center">Đăng ký</h2>
        <form action="" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="username" class="label">Tên đăng nhập</label>
                    <input type="text" class="form-control" name="username" placeholder="Nhập tên đăng nhập">
                    <span style="color: red;"><?= $thongBaoLoi ?></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="email" class="label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Nhập email">
                    <span style="color: red;"><?= $thongBaoLoi ?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="phone" class="label">Số Điện Thoại</label>
                    <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại">
                    <span style="color: red;"><?= $thongBaoLoi ?></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="role" class="label">Chọn vai trò</label>
                    <select class="form-control" name="role">
                        <option value="0">Khách hàng</option>
                        <option value="1">Quản trị</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="password" class="label">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
                    <span style="color: red;"><?= $thongBaoLoi ?></span>
                </div>
                <div class="form-group col-md-6">
                    <label for="confirm-password" class="label">Xác nhận mật khẩu</label>
                    <input type="password" class="form-control" name="confirm-password" placeholder="Xác nhận mật khẩu">
                    <span style="color: red;"><?= $thongBaoLoiConfirmPass ?></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="language" class="label">Chọn ngôn ngữ</label>
                    <select class="form-control" name="language">
                        <option value="1" class="label">VietNamese</option>
                        <option value="0" class="label">English</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="form-check mt-4">
                    <input type="checkbox" class="form-check-input" name="account_status" name="account_status" value="1">
                    <label class="form-check-label" for="account-status" id="label">Đồng ý với điều khoản của công ty</label>
                </div>
                <span style="color: red;"><?= $thongBaoDieuKhoan ?></span>
            </div>
            <button type="submit" class="btn btn-outline-primary btn-block" name="Flogin">Đăng ký</button>
            <span style="color: red;"><?= $thongBaoTonTaiTk ?></span>
        </form>
        <div class="footer">
             &copy; Quay về trang quản lý khách hàng <a href="admin/?act=actormanager">Quản lý khách hàng</a>
            <br>
            &copy; 2024 QuocHuyAirway <a href="?act=trangchu">Trang Chủ</a>
        </div>
        <div class="footer">
            &copy; mọi thắc mắc vui lòng liên hệ &xrArr; Huydev.id.vn@gmail.com
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>