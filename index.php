<?php
// 1. Nhúng các file cần thiết
include_once "Controller/Controller.php";
include_once "admin/model/Query.php";
include_once "admin/model/Actor.php";
include_once "admin/model/NewBee.php";
include_once "admin/model/LoaiHang.php";
include_once "admin/model/Product.php";
include_once "admin/model/Comment.php";
define("BASEURL", "http://huydev.id.vn/admin/WEB2014_Ontap1/");
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
    case "singin": // đăng nhập
        $productCtrl = new Controller();
        $productCtrl->singin();
        break;
    case "singup": // đăng ký
        $productCtrl = new Controller();
        $productCtrl->singup();
        break;
    case "language": // đổi ngôn ngữ
        $productCtrl = new Controller();
        $productCtrl->language($language);
        break;
    case "logout": // đăng xuất
        $productCtrl = new Controller();
        $productCtrl->logout();
        break;
    case "user": // thông tin tài khoản được đổ về
        $productCtrl = new Controller();
        $productCtrl->ShowAccount();
        break;
    case "admin": // trang quản lý
        $productCtrl = new Controller();
        $productCtrl->Admin();
        break;
    case "typemanager": // quản lý loại hàng
        $productCtrl = new Controller();
        $productCtrl->Type();
        break;
    case "addtype": // thêm loại hàng
        $productCtrl = new Controller();
        $productCtrl->AddType();
        break;
    case "edittype": // thêm loại hàng
        $productCtrl = new Controller();
        $productCtrl->EditType($id);
        break;
    case "delltype": // thêm loại hàng
        $productCtrl = new Controller();
        $productCtrl->DellType($id);
        break;
    case "actormanager": // quản lý khách hàng
        $productCtrl = new Controller();
        $productCtrl->ActorManager();
        break;
    case "actormanager/Ban": // quản lý chặn tài khoản
        $productCtrl = new Controller();
        $productCtrl->ChangBanAccount($id);
        break;
    case "dellaccount": // quản lý xóa tài khoản
        $productCtrl = new Controller();
        $productCtrl->DellAccount($id);
        break;
    case "ChangePassWord": // quản lý thay đổi mật khẩu
        $productCtrl = new Controller();
        $productCtrl->ChangePass();
        break;
    case "thongke": // quản lý thay đổi mật khẩu
            $productCtrl = new Controller();
            $productCtrl->ThongKe();
            break;
        // case "book-detail":
        //     $productCtrl = new BookController();
        //     $productCtrl->showDetail($id);
        //     break;

        // case "book-update":
        //     $productCtrl = new BookController();
        //     $productCtrl->showUpdate($id);
        //     break;
    default:
        include "view/404.php";
        break;
}
