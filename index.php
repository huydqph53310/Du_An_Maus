<?php
// 1. Nhúng các file cần thiết
include "Controller/Controller.php";
include "admin/model/Query.php";
include "admin/model/Actor.php";
include "admin/model/NewBee.php";
include "admin/model/LoaiHang.php";
include "admin/model/Product.php";
include "admin/model/Comment.php";
include "admin/model/Config.php";
include "admin/model/UuDai.php";
include "admin/model/DiemDen.php";

// $huydz = "http://huydev.id.vn/admin/WEB2014_Ontap1/1";
// echo $huydz;
// echo "<br>";
// echo md5(BASEURL);
// echo "<br>";
// if (md5($huydz) === md5(BASEURL)) {
//     echo "true";
// } else {
//     echo false;
// }
// 2. Lấy các giá trị cần thiết từ đường dẫn url
// 2.1. Lấy giá trị param "act"
$act = "";
if (isset($_GET["act"])) {
    $act = $_GET["act"];
}

// 2.2. Lấy giá trị "id"
$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$search = "";
if (isset($_GET["search"])) {
    $search = $_GET["search"];
}

$language = "";
if (isset($_GET["type"])) {
    $language = $_GET["type"];
}

$count = "";
if (isset($_GET["count"])) {
    $count = $_GET["count"];
}

$url = "";
if (isset($_GET["url"])) {
    $url = $_GET["url"];
}

// 3. Kiểm tra giá trị "act"
switch ($act) {
    case "":
        header("Location: ?act=trangchu");
        break;
    case "trangchu": // đường dẫn đến trang chủ
        $productCtrl = new Controller();
        $productCtrl->trangChu();
        break;
    case "search": // đường dẫn tìm kiếm
        $productCtrl = new Controller();
        $productCtrl->TimKiem();
        break;
    case "signin": // đăng nhập
        $productCtrl = new Controller();
        $productCtrl->singin();
        break;
    case "signup": // đăng ký
        $productCtrl = new Controller();
        $productCtrl->singup();
        break;
    case "language": // đổi ngôn ngữ
        $productCtrl = new Controller();
        $productCtrl->language($language, $url);
        break;
    case "logout": // đăng xuất
        $productCtrl = new Controller();
        $productCtrl->logout();
        break;

    case "dichvu":
        $productCtrl = new Controller();
        $productCtrl->DichVu($id, $count);
        break;

    case "bookticket":
        $productCtrl = new Controller();
        $productCtrl->BookTicket();
        break;
    default:
        include "view/404.php";
        break;
}
