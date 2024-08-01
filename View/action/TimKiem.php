<!doctype html>
<html lang="en">

<head>
    <title>HuyDevShpp - Trang Chủ</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="?act=trangchu">HUY DEV SHOP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="?act=trangchu"><?= $ngonngu == 1 ? "Trang Chủ" : "Home" ?><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <?= $ngonngu == 1 ? "Ngôn Ngữ" : "language" ?>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="?act=language&type=1">Vietnamese</a>
                        <a class="dropdown-item" href="?act=language&type=0">English</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <?= $ngonngu == 1 ? "Tài Khoản" : "Account" ?>
                    </a>
                   <?php session_start(); 
                   if(isset($_SESSION["Email"])){?>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="?act=user"><?= $ngonngu == 1 ? "Tài Khoản" : "Account "?></a>
                        <a class="dropdown-item" href="?act=logout"><?= $ngonngu == 1 ? "Đăng Xuất" : "Logout" ?></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here </a>
                    </div>
                   <?php } else{?>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="?act=singup"><?= $ngonngu == 1 ? "Đăng ký" : "Sing up" ?></a>
                        <a class="dropdown-item" href="?act=singin"><?= $ngonngu == 1 ? "Đăng Nhập" : "Sing in" ?></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here </a>
                    </div>
                   <?php }?>

                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="post" action="">
                <input class="form-control mr-sm-2" type="text" placeholder="<?= $ngonngu == 1 ? "Tìm Kiếm" : "Search" ?>" aria-label="Search" name="search" id="search">
                <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="smf" value="<?= $ngonngu == 1 ? "Tìm Kiếm" : "Search" ?>"></input>
            </form>
        </div>
    </nav>
    <!-- nav -->

    <!-- Trang Tim Kiem -->

    <h1 style="align-items: center;">Trang Tìm kiếm + <?= $thongTin ?></h1>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>