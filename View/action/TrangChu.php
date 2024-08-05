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
</head>
<style>
    /* #search {
        width: 250px;
        transition: 1s;
    }

    #search:focus {
        width: 500px;
    } */

    .container {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        /* Tạo ba cột bằng nhau */
        grid-auto-rows: minmax(200px, auto);
        /* Chiều cao hàng tự động */
        gap: 20px;
        /* Khoảng cách giữa các phần tử */
    }

    .container>div[id^="cards"] {
        /* background-color: #f0f0f0;
        /* Màu nền cho minh họa */
        /* Viền cho minh họa */
        /* padding: 10px; */
        /* Khoảng cách trong */
        cursor: pointer;
    }

    /* CSS for Airline Website Footer */
    footer {
        margin-top: 40px;
        background-color: #f0f0f0;
        color: black;
        font-family: Arial, sans-serif;
        padding: 20px 40px;
    }

    .footer-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }

    .footer-section h4 {
        font-size: 18px;
        border-bottom: 2px solid black;
        padding-bottom: 10px;
        margin-bottom: 20px;
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
        color: black;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-section ul li a:hover {
        color: red;
        /* Gold color on hover */
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
        border-top: 1px solid black;
        /* Light grey border for separation */
        padding-top: 20px;
        margin-top: 20px;
        font-size: 14px;
    }
</style>

<body>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f9fdff;">
        <a class="navbar-brand" href="?act=trangchu"><img src="Data/Logo/logo.png" alt="" style="width: 150px; height: 45px"></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="?act=trangchu"><?= $mod->NgonNgu == 1 ? "Trang Chủ" : "Home" ?><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown" href="?act=user"><?= $mod->NgonNgu  == 1 ? "Đặt vé" : "Book tickets" ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                        <?= $mod->NgonNgu  == 1 ? "Ngôn Ngữ" : "language" ?>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="?act=language&type=1">Vietnamese</a>
                        <a class="dropdown-item" href="?act=language&type=0">English</a>
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown" href="?act=user"><?= $mod->NgonNgu  == 1 ? "QuocHuy CLUB" : "QuocHuy CLUB" ?></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" method="post" action="">
                <input class="form-control mr-sm-2" type="text" placeholder="<?= $mod->NgonNgu == 1  ? "Tìm Kiếm" : "Search" ?>" aria-label="Search" name="search" id="search">
                <input class="btn btn-outline-success my-2 my-sm-0" type="submit" name="smf" value="<?= $mod->NgonNgu == 1 ? "Tìm Kiếm" : "Search" ?>"></input>
            </form>
        </div>
    </nav>
    <!-- and nav -->

    <!-- slide show -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="Data/Huydev/ImgSlideShow/slide[1].png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="Data/Huydev/ImgSlideShow/slide[2].png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="Data/Huydev/ImgSlideShow/slide[3].png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="Data/Huydev/ImgSlideShow/slide[4].png" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <h1 style="text-align: center; margin-top: 30px; color: burlywood">
       Dịch Vụ
    </h1>
    <div class="container" id="Product_List" style="margin-top: 20px;">
    </div>
    <?php
    $jsonCategories = json_encode($list);
    ?>
<h1 style="text-decoration: underline;"></h1>
    <script>
        const categories = <?php echo $jsonCategories; ?>;
        // Hàm để render các category
        function renderCategories() {
            categories.forEach(category => {
                console.log(category)
                if (category.TrangThai == 1) {
                    let row = document.createElement("div");
                    row.style.borderRadius = "5%"

                    row.classList.add("card");
                    row.id = "cards" + category.MaLoaiHang;
                    let img = document.createElement("img");
                    row.appendChild(img);
                    img.src = category.HinhAnh;
                    let name = document.createElement("p");
                    row.appendChild(name);
                    name.innerHTML = category.TenLoaiHang + "";
                    name.style.textAlign = "center";
                    row.addEventListener('mouseover', function() {
                        // Xử lý khi chuột lướt qua phần tử
                        row.style.transition = "all 1s";
                        row.style.backgroundColor = 'lightgreen';
                        img.style.transition = "transform 0.5s ease";
                        name.textContent = category.TenLoaiHang + "→";
                        name.style.textDecoration = "underline";
                    });
                    row.addEventListener('mouseout', function() {
                        row.style.backgroundColor = '#ffff';
                        name.textContent = category.TenLoaiHang + "";
                        name.style.textDecoration = "none";
                    });
                
                    var Mod = document.getElementById("Product_List");
                    if (Mod) {
                        Mod.appendChild(row);
                    }
                }
            });
        }   
        // // Gọi hàm renderCategories khi trang tải xong
        document.addEventListener('DOMContentLoaded', renderCategories);
    </script>
    <!-- danh muc -->
    <!-- uu dãi -->


    <h1 style="text-align: center; margin-top: 30px; color: burlywood">
        Các ưu đãi của Hãng
    </h1>
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

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
<script>
</script>

</html>