<?php
// 1. Nhúng các file cần thiết
include "AdminControlLer/AdminController.php";
include "model/Query.php";
include "model/Actor.php";
include "model/NewBee.php";
include "model/LoaiHang.php";
include "model/Product.php";
include "model/Comment.php";
include "model/Config.php";
include "model/HangHoaKyGui.php";
include "model/DiemDen.php";
include "model/UuDai.php";

define("BASEURL", "HUYDEVSHOP/");
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

$thongBao = "";
if (isset($_GET["if"])) {
    $thongBao = $_GET["if"];
}

$URL = BASE_DIR;
// 3. Kiểm tra giá trị "act"
switch ($act) {
    case "":
        header("Location: ?act=admin");
        /// khi mới bắt đầu trỏ vào admin thì sẽ bắt sự kiện ném vào trang quản trị
        break;

        //////--------------------------------------------------
        /* 
        Quản lý của trang admin!!! 
        */
    case "trangchu":
        header("location: $URL");
        break;
    case "admin": // trang quản lý
        $productCtrl = new AdminController();
        $productCtrl->Admin();
        break;

        //////--------------------------------------------------
        /* 
       Quản lý điểm đến, những sân bay
        */
    case "diemden": /// các điểm đến sẽ được quản lý trong admin
        $productCtrl = new AdminController();
        $productCtrl->DiemDen();
        break;
    case "createlocation":
        $productCtrl = new AdminController();
        $productCtrl->CreateLocation();
        break;
    case "editlocation":
        $productCtrl = new AdminController();
        $productCtrl->EditLocation($id);
        break;
    case "deletelocation":
        $productCtrl = new AdminController();
        $productCtrl->DelLocation($id);
        break;
        //////--------------------------------------------------
        /* 
        Phần về loại hàng
        */
    case "typemanager": // quản lý loại hàng
        $productCtrl = new AdminController();
        $productCtrl->Type();
        break;

    case "addtype": // thêm loại hàng
        $productCtrl = new AdminController();
        $productCtrl->AddType();
        break;

    case "edittype": // thêm loại hàng
        $productCtrl = new AdminController();
        $productCtrl->EditType($id);
        break;

    case "delltype": // thêm loại hàng
        $productCtrl = new AdminController();
        $productCtrl->DellType($id);
        break;
        //////--------------------------------------------------
        // phần khách hàng
    case "quenmk":
        $productCtrl = new AdminController();
        $productCtrl->QuenMK();
        break;
    case "laylaimk":
        $productCtrl = new AdminController();
        $productCtrl->LayLaiMK($id);
        break;
    case "user": // thông tin tài khoản được đổ về
        $productCtrl = new AdminController();
        $productCtrl->ShowAccount();
        break;


    case "actormanager": // quản lý khách hàng
        $productCtrl = new AdminController();
        $productCtrl->ActorManager();
        break;

    case "actormanager/Ban": // quản lý chặn tài khoản
        $productCtrl = new AdminController();
        $productCtrl->ChangBanAccount($id);
        break;

    case "dellaccount": // quản lý xóa tài khoản
        $productCtrl = new AdminController();
        $productCtrl->DellAccount($id);
        break;

    case "ChangePassWord": // quản lý thay đổi mật khẩu
        $productCtrl = new AdminController();
        $productCtrl->ChangePass();
        break;
        //////--------------------------------------------------
    case "thongbao":
        $productCtrl = new AdminController();
        $productCtrl->ThongBao($thongBao, $id);
        break;
        /////---------------------------------------------------
        // quản trị hành lý ký gửi
    case "luggagemanager":
        $productCtrl = new AdminController();
        $productCtrl->LuggageManager();
        break;
    case "BuyHanhLy":
        $productCtrl = new AdminController();
        $productCtrl->BuyHanhLy();
        break;
        /////--------------------------------------------------
        /// quanr trij thong ke
    case "thongke": // quản lý thay đổi mật khẩu
        $productCtrl = new AdminController();
        $productCtrl->ThongKe();
        break;
        ////---------------------------------------------------
        // quản trị bình luận
    case "binhluan": // quản lý thay đổi mật khẩu
        $productCtrl = new AdminController();
        $productCtrl->BinhLuan();
        break;
        /// -----------------------------------------------------
        // quản trị ưu đãi
    case "uudai":
        $productCtrl = new AdminController();
        $productCtrl->UuDai();
        break;
    case "edituudai":
        $productCtrl = new AdminController();
        $productCtrl->EditUuDai($id);
        break;
    case "createvoucher":
        $productCtrl = new AdminController();
        $productCtrl->CreateUudai();
        break;
    default:
        include "view/404.php";
        break;
}
