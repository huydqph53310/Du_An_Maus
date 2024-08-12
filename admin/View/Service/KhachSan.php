<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["Email"])) {
    header("Location: admin/?act=thongbao&if=Bạn cần đăng nhập tài khoản mới có thể sử dụng dịch vụ này&id=trangchu");
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>HuyDevShop - Trang Chủ</title>
    <link rel="icon" href="Data/Huydev/Icon/airplane-fill.svg" type="image/x-icon">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

        .container {
            padding: 20px;
        }

        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .card p {
            padding: 15px;
            text-align: center;
            font-size: 1rem;
            color: #333;
            margin: 0;
        }

        .card p:hover {
            color: #007bff;
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

        .social-media-links {
            display: flex;
            gap: 10px;
        }

        .social-media-links li {
            display: inline;
        }

        .footer-bottom {
            text-align: center;
            border-top: 1px solid #6c757d;
            padding-top: 20px;
            margin-top: 20px;
            font-size: 14px;
            color: #adb5bd;
        }

        .banner-content {
            position: absolute;
            bottom: 50%;
            left: 50%;
            transform: translate(-50%, 50%);
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
            color: white;
        }

        .banner-content h2 {
            font-size: 2rem;
            font-weight: bold;
        }

        .banner-content p span {
            color: #ffc107;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .promo-button {
            background-color: #ffc107;
            color: black;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 1em;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }

        .promo-button:hover {
            background-color: #e0a800;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
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
                        <a class="dropdown-item" href="?act=language&type=1&url=bookticket">Vietnamese</a>
                        <a class="dropdown-item" href="?act=language&type=0&url=bookticket"">English</a>
                        <a class=" dropdown-item" href="?act=language&type=0&url=bookticket"">Chinese</a>
                    </div>
                </li>
                <li class=" nav-item dropdown">
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

    <!-- Start of Booking Section -->
    <div class="container mt-5">
        <h2 class="mb-3">Book Your Flight</h2>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#moneyTab">Đặt vé</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#pointsTab">Làm thủ tục</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#moneyPointsTab">Đặt Khách Sạn</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Đặt vé tab -->
            <div id="moneyTab" class="container tab-pane active"><br>
                <form>
                    <!-- Flight Type Selection -->
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="flightType" id="oneWay" autocomplete="off" checked> Một chiều
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="flightType" id="roundTrip" autocomplete="off"> Khứ hồi
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="flightType" id="multiCity" autocomplete="off"> Đa chặng
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- City and Date Input -->
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="fromCity">Từ</label>
                            <input type="text" class="form-control" id="fromCity" placeholder="Hà Nội">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="toCity">Tới</label>
                            <input type="text" class="form-control" id="toCity" placeholder="Enter destination">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="departDate">Ngày Đi</label>
                            <input type="date" class="form-control" id="departDate">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="returnDate">Ngày Về</label>
                            <input type="date" class="form-control" id="returnDate">
                        </div>
                    </div>
                    <!-- Passengers and Discount Code -->
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="passengers">Hành Khách</label>
                            <input type="number" class="form-control" id="passengers" placeholder="1">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="discountCode">Nhập Mã Giảm</label>
                            <input type="text" class="form-control" id="discountCode" placeholder="Enter code">
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="custom-control custom-checkbox mt-4">
                                <input type="checkbox" class="custom-control-input" id="bambooClub">
                                <label class="custom-control-label" for="bambooClub">Dùng tài khoản Bamboo Club của bạn để book vé!</label>
                            </div>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Tìm Chuyến Bay</button>
                </form>
            </div>

            <!-- Làm thủ tục tab -->
            <div id="pointsTab" class="container tab-pane fade"><br>
                <form>
                    <div class="form-group">
                        <label for="bookingCode">Mã Đặt Chỗ</label>
                        <input type="text" class="form-control" id="bookingCode" placeholder="123XXX">
                    </div>
                    <div class="form-group">
                        <label for="lastName">Họ</label>
                        <input type="text" class="form-control" id="lastName" placeholder="NGUYEN">
                    </div>
                    <p>Làm thủ tục trực tuyến trong khoảng 24 giờ đến 1 giờ trước khi chuyến bay khởi hành.</p>
                    <button type="submit" class="btn btn-primary">Làm Thủ Tục</button>
                </form>
            </div>

            <!-- Đặt vé của tôi tab -->
            <div id="moneyPointsTab" class="container tab-pane fade"><br>
                <form>
                    <div class="form-group">
                        <label for="bookingOrTicketNumber">Mã Khách Sạn</label>
                        <input type="text" class="form-control" id="bookingOrTicketNumber" placeholder="Mã Khách Sạn">
                    </div>
                    <div class="form-group">
                        <label for="surname">Mã Khách Hàng</label>
                        <input type="text" class="form-control" id="surname" placeholder="Mã Khách Hàng">
                    </div>
                    <button type="submit" class="btn btn-primary">Tìm Kiếm</button>
                </form>
            </div>
        </div>
    </div>
    <!-- End of Booking Section -->

    <!-- Footer Section -->
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDzwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>