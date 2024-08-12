<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="icon" href="Data/Huydev/Icon/sign-in-alt.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-signin {
            width: 100%;
            max-width: 400px;
            padding: 15px;
            margin: auto;
        }
        .form-signin .form-floating:focus-within {
            z-index: 2;
        }
        .form-signin input[type="email"],
        .form-signin input[type="password"] {
            margin-bottom: 10px;
        }
        .heading {
            font-size: 40px;
            text-align: center;
            margin-bottom: 20px;
        }
        html,
        body {
            height: 100%;
        }
        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }
        .alert-lock {
            font-weight: bold;
            color: red;
            text-align: center;
            margin-top: 10px;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body class="text-center">
    <div class="form-signin">
        <h1 class="heading">LOGIN</h1>
        <form action="" method="POST">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="floatingInput" placeholder="name@example.com" value="<?= $Email?>" >
                <label for="floatingInput"><?= $ngonngu == 1 ? 'Tài Khoản' : 'Email'?></label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="floatingPassword" placeholder="Password" value="<?= $PassWord?>">
                <label for="floatingPassword"><?= $ngonngu == 1 ? 'Mật Khẩu' : 'PassWord'?></label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="FLOGIN"><?= $ngonngu == 1 ? 'Đăng Nhập' : 'Login'?></button>
    </form>
    <?php if($thongBaoLoi !== "") {?>
        <div class="alert alert-danger" role="alert" style="margin: 20px;">
        <?= $thongBaoLoi?>
        </div>
        <?php }?>
    <span class="container"><a href="admin/?act=quenmk">Quên mật khẩu ?</a></span>
    <span class="container"><a href="?act=singup">Đăng Ký</a></span>
    <div class="footer">
    &copy; 2024 QuocHuyAirway <a href="?act=trangchu">Trang Chủ</a> &andand;&andand;
    </div>
    <div class="footer">
    &copy; mọi thắc mắc vui lòng liên hệ &xrArr; Huydev.id.vn@gmail.com
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
