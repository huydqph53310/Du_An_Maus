<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baggage Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
        }

        .navbar {
            background-color: #f9fdff;
        }

        .navbar-brand img {
            width: 150px;
            height: 45px;
        }

        #search {
            width: 250px;
            transition: width 0.5s ease-in-out;
        }

        #search:focus {
            width: 400px;
        }

        .hero-section {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
        }

        .hero-section img {
            max-width: 100%;
            height: auto;
        }

        .pricing-section {
            margin-top: 20px;
        }

        .pricing-section h5 {
            margin-bottom: 15px;
        }

        .pricing-section table {
            width: 100%;
            margin-bottom: 20px;
        }

        footer {
            margin-top: 40px;
            background-color: #343a40;
            color: white;
            padding: 40px 20px;
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .footer-section h4 {
            font-size: 18px;
            border-bottom: 2px solid white;
            padding-bottom: 10px;
            margin-bottom: 20px;
            color: #f8f9fa;
        }

        .footer-section p {
            font-size: 14px;
            line-height: 1.6;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            margin-bottom: 10px;
        }

        .footer-section ul li a {
            color: #adb5bd;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section ul li a:hover {
            color: #ffc107;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="?act=trangchu"><img src="Data/Logo/logo.png" alt="HuyDevShop Logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="?act=trangchu"><?= $NgonNgu == 1 ? "Trang Chủ" : "Home" ?><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?act=bookticket"><?= $NgonNgu == 1 ? "Đặt vé" : "Book tickets" ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <?= $NgonNgu == 1 ? "Ngôn Ngữ" : "Language" ?>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="?act=language&type=1&url=trangchu">Vietnamese</a>
                        <a class="dropdown-item" href="?act=language&type=0&url=trangchu">English</a>
                        <a class="dropdown-item" href="?act=language&type=2&url=trangchu">Chinese</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <?= $NgonNgu == 1 ? "Tài Khoản" : "Account" ?>
                    </a>
                    <?php if (isset($_SESSION["Email"])) { ?>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="admin/?act=user"><?= $NgonNgu == 1 ? "Thông Tin Tài Khoản" : "Account Info" ?></a>
                            <a class="dropdown-item" href="?act=logout"><?= $NgonNgu == 1 ? "Đăng Xuất" : "Logout" ?></a>
                            <?php if ($vaitro == 1) { ?>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="admin"><?= $NgonNgu == 1 ? "Trang Quản Trị" : "Admin Panel" ?></a>
                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="?act=signup"><?= $NgonNgu == 1 ? "Đăng Ký" : "Sign Up" ?></a>
                            <a class="dropdown-item" href="?act=signin"><?= $NgonNgu == 1 ? "Đăng Nhập" : "Sign In" ?></a>
                        </div>
                    <?php } ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?act=user"><?= $NgonNgu == 1 ? "QuocHuy CLUB" : "QuocHuy CLUB" ?></a>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0" method="post" action="">
                <input class="form-control mr-sm-2" type="text" placeholder="<?= $NgonNgu == 1 ? "Tìm Kiếm" : "Search" ?>" aria-label="Search" name="search" id="search">
                <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="smf" value="<?= $NgonNgu == 1 ? "Tìm Kiếm" : "Search" ?>">
            </form>
        </div>
    </nav>
    <div class="container">
        <!-- Header Section -->
        <div class="hero-section">
            <h2>Mua thêm hành lý</h2>
            <p>Hành lý kí gửi được phép sử dụng khi bay hạng.</p>
            <div class="my-3">
                <img src="data/Huydev/Icon/Baggage - vi.png" alt="Luggage Image">
            </div>
            <a href="admin/?act=BuyHanhLy" class="btn btn-primary" onclick="">Mua Ngay</a>
        </div>

        <!-- Pricing Section -->
        <div class="pricing-section">
            <h5>Bảng phí áp dụng</h5>
            <p>Mua trước giờ bay tối thiểu 03 giờ</p>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Gói hành lý</th>
                        <th>10kg</th>
                        <th>20kg</th>
                        <th>30kg</th>
                        <th>40kg</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Giá VND</td>
                        <td>150,000</td>
                        <td>250,000</td>
                        <td>350,000</td>
                        <td>450,000</td>
                    </tr>
                </tbody>
            </table>

            <h5>Mua tại sân</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Gói hành lý</th>
                        <th>10kg</th>
                        <th>20kg</th>
                        <th>30kg</th>
                        <th>40kg</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Giá VND</td>
                        <td>180,000</td>
                        <td>300,000</td>
                        <td>400,000</td>
                        <td>500,000</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Additional Information -->
        <div class="additional-info">
            <p class="text-muted">Phí hành lý quá cân tại cửa khởi hành sẽ áp dụng phí bổ sung.</p>
        </div>
    </div>
    <!-- Modal for product details -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="notificationContent"><?= $thongbao ?></p>
                </div>
                <form>
                    <label for="name">Tên:</label>
                    <input type="text" id="name" name="name" required>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    <label for="message">Tin nhắn:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                    <button type="submit">Gửi</button>
                </form>
                <div class="modal-footer">
                    <a href="?act=<?= $link ?>"><button class="btn btn-secondary">Đóng</button></a>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h4>QUOC HUY AIRWAY</h4>
                <p>Cam kết mang đến cho hành khách trải nghiệm bay an toàn, thoải mái và đáng nhớ với đội ngũ phi công giàu kinh nghiệm và dịch vụ khách hàng xuất sắc.</p>
            </div>
            <div class="footer-section">
                <h4>Liên kết nhanh</h4>
                <ul>
                    <li><a href="/book">Đặt vé</a></li>
                    <li><a href="/info">Thông tin chuyến bay</a></li>
                    <li><a href="/contact">Liên hệ</a></li>
                    <li><a href="/faq">Câu hỏi thường gặp</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Dịch vụ</h4>
                <ul>
                    <li><a href="/business-class">Hạng thương gia</a></li>
                    <li><a href="/premium-economy">Hạng phổ thông cao cấp</a></li>
                    <li><a href="/lounges">Phòng chờ</a></li>
                    <li><a href="/extra-baggage">Hành lý thêm</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Chính sách và Quyền riêng tư</h4>
                <ul>
                    <li><a href="/privacy">Chính sách riêng tư</a></li>
                    <li><a href="/terms">Điều khoản sử dụng</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Kết nối với chúng tôi</h4>
                <ul class="social-media-links">
                    <li><a href="https://www.facebook.com/QuocHuyAirway">Facebook</a></li>
                    <li><a href="https://www.instagram.com/QuocHuyAirway">Instagram</a></li>
                    <li><a href="https://www.twitter.com/QuocHuyAirway">Twitter</a></li>
                    <li><a href="https://www.linkedin.com/QuocHuyAirway">LinkedIn</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 QUOC HUY AIRWAY. All rights reserved.</p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>