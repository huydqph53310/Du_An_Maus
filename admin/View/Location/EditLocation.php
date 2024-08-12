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
                Đã sảy ra lỗi trong quá trình tạo Điểm Đến
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
        <?php  
        $connect = new Query();
        $findById = $connect->FindLocationByID($id);
        ?>
        <h2 class="text-center">Chỉnh Sửa Điểm Đến</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name_location" class="label">Tên Điểm Đến</label>
                    <input type="text" class="form-control" name="name_location" placeholder="Nhập tên điểm đến" value="<?= $findById->name?>">
                    <span style="color: red;"><?= $thongBaoLoi ?></span>
                </div>
                
                <div class="form-group col-md-6">
                    <label for="phone" class="label">Mã Thành Phố</label>
                    <input type="text" class="form-control" name="Ma_TP" placeholder="Nhập Mã Thành Phố" value="<?= $findById->MaTP?>">
                    <span style="color: red;"><?= $thongBaoLoi ?></span>
                </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
                    <span>Chọn ảnh</span>
                    <input type="file" name="file_upload">
                    <label for="email" class="label">Đường Dẫn Ảnh</label>
                    <input type="text" class="form-control" name="Imgae" placeholder="Đường dẫn ảnh" value="<?= $findById->image?>">
                    <span style="color: red;"><?= $thongBaoLoi ?></span>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-primary btn-block" name="editdiemden">Lưu thay đổi</button>
          </form>
        <div class="footer">
            &copy; Quay về trang quản lý điểm đến <a href="?act=diemden">Quản lý điểm đến</a>
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