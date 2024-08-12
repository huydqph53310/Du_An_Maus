<?php
class AdminController
{
    // Khai báo thuộc tính
    // Code...
    public $connect, $time;

    // Khai báo phương thức 
    public function __construct()
    {
        if (!$this->connect) {
            $this->connect = new Query();
            $this->time = 0;
        }
    }

    // Khai báo phương thức 

    public function __destruct()
    {
        // Code...
    }

    public function Admin()
    {
        include "View/Query/admin.php";
    }

    // thực hiện công việc của tab type -> loại
    public function Type()
    {
        include "View/Service/loai.php";
    }

    public function AddType()
    {
        session_start();
        $login = $this->connect->ShowAccount($_SESSION["Email"]);
        $ngonngu = $login->NgonNgu;
        $thongBaoLoi = "";
        $thongBaoThanhCong = "";
        $add = new LoaiHang(null, null, null, null, null);
        if (isset($_POST["Fadd"])) {
            $name = $_POST["name"];
            $add = new LoaiHang(null, $name, $_POST["status"], $add->HinhAnh, 1);
            if ($name === "") {
                $thongBaoLoi = "Trường còn trống";
            }
            if ($_FILES["file_name"]["tmp_name"] !== "") {
                $t = $_FILES["file_name"]["tmp_name"];
                $s = "../upload/" . $_FILES["file_name"]["name"];
                if (move_uploaded_file($t, $s)) {
                    $add->HinhAnh = "upload/" . $_FILES["file_name"]["name"];
                } else {
                    $thongBaoLoi  = "Loi upload anh";
                }
            }
            if ($thongBaoLoi == "") {
                $addtt = $this->connect->AddLoaiHang($add);
                if ($addtt == 1) {
                    $thongBaoThanhCong = "Thêm dữ liệu thành công";
                }
            }
        }
        include "View/Service/CreateType.php";
    }

    public function EditType($id)
    {
        if ($id !== "") {
            $thongBaoLoi = "";
            $thongBaoThanhCong = "";
            $update = new LoaiHang(null, null, null, null, null);
            if (isset($_POST["Fedit"])) {
                $update = new LoaiHang(null, $_POST["name"], $_POST["status"], $_POST["linkimg"], $update->count);
                if ($_POST["name"] === "") {
                    $thongBaoLoi = "Lỗi Trống trường không thể thêm";
                }
                if ($_FILES["Fileanh"]["tmp_name"] !== "") {
                    $s1 = $_FILES["Fileanh"]["tmp_name"];
                    $s2 = "upload/" . $_FILES["Fileanh"]["name"];
                    if (move_uploaded_file($s1, $s2)) {
                        $update->HinhAnh = "upload/" . $_FILES["Fileanh"]["name"];
                    } else {
                        echo "<br>";
                        $thongBaoLoi = "Không thể up load ảnh";
                    }
                }
                if ($thongBaoLoi == "") {
                    $edit = $this->connect->UpdateLoaiHang($id, $update);
                    if ($edit == 1 || $edit == 0) {
                        $thongBaoThanhCong = "Thay đổi dữ liệu thành công";
                        header("Location: ?act=thongbao&if=Bạn đã Thay đổi dữ liệu thành công&id=typemanager");
                    }
                }
            }
        } else {
            echo "Không có giá trị id nào được truyền vào";
        }
        include "View/Service/EditType.php";
    }

    public function DellType($id)
    {
        if ($id != "") {
            $dell  = $this->connect->DellTypeForId($id);
            if ($dell == 1) {
                header("Location: ?act=thongbao&if=Bạn đã xóa dữ liệu thành công&id=typemanager");
            }
        } else {
            echo "Không có giá trị id nào được truyền vào";
        }
    }


    /// quản lý tài khoản

    public function ShowAccount()
    {
        /// fix bug: not found type object
        /// thêm biến để chặt chẽ code hơn
        $ngonNgu = -1;
        $vaiTro = -1;
        $hoVaTen = "";
        $sdt = -1;
        session_start();
        if (isset($_SESSION["Email"])) {
            $showDetailAccount = $this->connect->ShowAccount($_SESSION["Email"]);
            $ngonNgu = $showDetailAccount->NgonNgu;
            $vaiTro = $showDetailAccount->VaiTro;
            $hoVaTen = $showDetailAccount->HoVaTen;
            $sdt = $showDetailAccount->SoDienThoai;
        }
        // $ngonngu = $this->time;
        include_once "View/Account/Account.php";
    }

    public function ActorManager()
    {
        include "View/Actor/khachhang.php";
    }


    public function ChangBanAccount($id)
    {
        $mod = $this->connect->FindAccount($id);
        switch ($mod->Ban) {
            case 0:
                $Ban = $this->connect->ChangeBan($id, 1);
                header("Location: ?act=thongbao&if=Bạn đã thay đổi thông tin thành công&id=actormanager");
                break;
            case 1:
                $Ban = $this->connect->ChangeBan($id, 0);
                header("Location: ?act=thongbao&if=Bạn đã thay đổi thông tin thành công&id=actormanager");
                break;
            default:
                break;
        }
        // var_dump($mod);
    }

    public function DellAccount($id)
    {
        $dell = $this->connect->DelAccount($id);
        header("Location: ?act=thongbao&if=Bạn đã xóa tài khoản thành công&id=actormanager");
    }

    public function ChangePass()
    {
        session_start();
        $login = $this->connect->ShowAccount($_SESSION["Email"]);
        $ngonngu = $login->NgonNgu;
        $Email = "";
        $PassWord = "";
        $thongBaoLoi = "";
        $thongBaoThanhCong = "";
        $checktk = false;
        $checkmk = false;
        if (isset($_POST["FLOGIN"])) {
            $PassWordOld = $_POST["oldpass"];
            $PassWordNew = $_POST["newpass"];
            $RepaidPassWordNew = $_POST["repaidpass"];
            if ($PassWordOld == "" || $PassWordNew == "") {
                $thongBaoLoi = "PassWord Không được để trống";
            } else {
                if ($login !== false) {
                    if (md5($PassWordOld) === $login->MatKhauDangNhap) {
                        if ($PassWordOld === $PassWordNew) {
                            $thongBaoLoi = "Mật khẩu mới không được trùng với mật khẩu cũ";
                        } else {
                            if ($PassWordNew === $RepaidPassWordNew) {
                                $thongBaoThanhCong = "Chúc mừng bạn đã thay đổi mật khẩu thành công <br>";
                                $repate = $this->connect->ChangePass($_SESSION["id"], md5($PassWordNew));
                                header("Location: ?act=thongbao&if=Bạn đã thay đổi mật khẩu thành công&id=trangchu");
                                // echo '<script>alert("Bạn đã đổi mật khẩu thành công vui lòng quay lại trang đăng nhập");</>';                      
                            } else {
                                $thongBaoLoi = "Mật khẩu xác nhận không chính xác không chính xác <br>";
                            }
                        }
                    } else {
                        $thongBaoLoi = "Mật khẩu cũ không chính xác <br>";
                    }
                } else {
                    $thongBaoLoi = "Mật khẩu cũ không chính xác <br>";
                }
            }
        }
        include "View/Account/ChangePass.php";
    }

    public function QuenMK()
    {
        $ngonngu = $this->time;
        $thongBaoLoi = "";
        $thongBaoThanhCong = "";
        if (isset($_POST["CheckPass"])) {
            $Email = $_POST["PhoneNumber"];
            $find = $this->connect->ShowAccount($Email);
            if ($find != false) {
                header("Location: ?act=laylaimk&id=$find->Email");
            } else {
                $thongBaoLoi = "Không tìm thấy số điện thoại tồn tại trên hệ thống";
            }
        }
        include "View/Account/CheckPass.php";
    }

    public function LayLaiMK($id)
    {
        $ngonngu = $this->time;
        $thongBaoLoi = "";
        $thongBaoThanhCong = "";
        if (isset($_POST["NewChange"])) {
            $mkn = $_POST["newpass"];
            $rpmk = $_POST["repeatpass"];
            if ($mkn === $rpmk) {
                $change = $this->connect->UpdatePassByEmail($id, md5($mkn));
                if ($change == 1 || $change == 0) {
                    header("Location: ?act=thongbao&if=Bạn đã thay đổi mật khẩu thành công&id=signin");
                }
            } else {
                $thongBaoLoi = "Mật khẩu xác nhận không đúng";
            }
        }
        include "View/Account/NewPass.php";
    }

    public function ThongBao($thongBao, $id)
    {
        $thongbao = "";
        $link = "";
        $link = $id;
        $thongbao = $thongBao;
        include "View/Query/ThongBao.php";
    }

    //// quản trị hành lý

    public function LuggageManager()
    {
        include "View/KyGui/LuggageManager.php";
    }
    public function BuyHanhLy()
    {
        session_start();
        if ($this->connect !== null) {
            if (isset($_SESSION["Email"])) {
                $trangChuShow = $this->connect->ShowAccount($_SESSION["Email"]);
                $NgonNgu = $trangChuShow->NgonNgu;
                $vaitro = $trangChuShow->VaiTro;
            } else {
                $trangChuShow = $this->connect->ShowNewBee(1);
                $NgonNgu = $trangChuShow->NgonNgu;
            }
        }
        $thongBaoLoi = "";
        $thongBaoThanhCong = "";
        $HangHoa = new HangHoaKyGui(null, null, null, null, null, null, null, null, null, null, null);
        if (isset($_POST["BuyVe"])) {
            $HangHoa = new HangHoaKyGui(null, $_POST["IdFlgiht"], $_POST["from"], $_POST["to"], $_POST["date"], $_POST["MKH"], $_POST["NameKH"], $_POST["Note"], $_POST["nang"], $_POST["voucher"], $_POST["money"]);
            if ($HangHoa->MaChuyenBay == "" || $HangHoa->from == "" || $HangHoa->to == "" || $HangHoa->MaKhachhang == "" || $HangHoa->TenKhachhang == "" || $HangHoa->trongluong == "") {
                $thongBaoLoi = "không được để trống";
            }
            if ($thongBaoLoi == "") {
                $datacheck = $this->connect->CreateLuggage($HangHoa);
                if ($datacheck == "Success") {
                    header("Location: ?act=thongbao&if=Bạn đã Mua thêm Dự trữ thành công&id=BuyHanhLy");
                }
            }
        }
        include "View/KyGui/BuyHanhLy.php";
    }
    /// quan tri thong ke
    public function ThongKe()
    {
        $list = $this->connect->ShowLoaiHang();
        include "View/Statistical/thongke.php";
    }


    /// quản trị điểm đến

    public function DiemDen()
    {
        include "View/Location/DiemDen.php";
    }

    public function CreateLocation()
    {
        $thongBaoLoi = "";
        $thongBaoThanhCong = "";
        $locationNew = new DiemDen(null, null, null, null, null);
        if (isset($_POST["diemdennew"])) {
            $locationNew = new DiemDen(null, $_POST["name_location"], $locationNew->image, $_POST["Ma_TP"], 1);
            if ($locationNew->name == "" || $locationNew->MaTP == "") {
                $thongBaoLoi = "không được để trống";
            }
            if ($_FILES["file_upload"]["tmp_name"] !== "") {
                $thamSo1 = $_FILES["file_upload"]["tmp_name"];
                $thamSo2 = "../upload/" . $_FILES["file_upload"]["name"];
                if (move_uploaded_file($thamSo1, $thamSo2)) {
                    /// thành công
                    $locationNew->image = "upload/" . $_FILES["file_upload"]["name"];
                } else {
                    // thất bại
                    $thongBaoLoi = "Thất bại do bạn lỗi";
                }
            }
            echo "<hr>";
            if ($thongBaoLoi == "") {
                $datacheck = $this->connect->AddLocation($locationNew);
                if ($datacheck == "Success") {
                    $thongBaoThanhCong = "Thêm dữ liệu thành công";
                }
            }
        }
        include "View/Location/createlocation.php";
    }

    public function EditLocation($id)
    {
        $thongBaoLoi = "";
        $thongBaoThanhCong = "";
        $updateLocation = new DiemDen(null, null, null, null, null);
        if (isset($_POST["editdiemden"])) {
            $updateLocation = new DiemDen(null, $_POST["name_location"], $updateLocation->image, $_POST["Ma_TP"], 1);
            if ($updateLocation->name == "" || $updateLocation->MaTP == "") {
                $thongBaoLoi = "không được để trống";
            }
            if ($_FILES["file_upload"]["tmp_name"] !== "") {
                $thamSo1 = $_FILES["file_upload"]["tmp_name"];
                $thamSo2 = "../upload/" . $_FILES["file_upload"]["name"];
                if (move_uploaded_file($thamSo1, $thamSo2)) {
                    /// thành công
                    $updateLocation->image = "upload/" . $_FILES["file_upload"]["name"];
                } else {
                    // thất bại
                    $thongBaoLoi = "Thất bại do bạn lỗi";
                }
            }
            if ($thongBaoLoi == "") {
                $datacheck = $this->connect->EditLocation($id, $updateLocation);
                if ($datacheck == 1 || $datacheck == 0) {
                    $thongBaoThanhCong = "Sửa dữ liệu thành công mời bạn quay lại danh sách";
                }
            }
        }
        include "View/Location/EditLocation.php";
    }

    public function DelLocation($id)
    {
        $dell = $this->connect->DeleteLocation($id);
        header("Location: ?act=thongbao&if=Bạn đã xóa điểm đến thành công&id=diemden");
    }
    public function BinhLuan()
    {
        session_start();
        if ($this->connect !== null) {
            $binhLuan_Show = $this->connect->ShowAccount($_SESSION["Email"]);
            $ngonNgu = $binhLuan_Show->NgonNgu;
            $list = $this->connect->ShowLocation();
            $danhSach[] = $list;
        }
        include "View/Comment/binhluan.php";
    }


    public function UuDai()
    {
        include "View/Voucher/UuDai.php";
    }

    public function CreateUudai()
    {
        include "View/Voucher/CreateVoucher.php";
    }

    public function EditUuDai($id){
        if ($id !== "") {
            $thongBaoLoi = "";
            $thongBaoThanhCong = "";
            $update = new UuDai(null, null, null, null, null);
            if (isset($_POST["Fedit"])) {
                $update = new UuDai(null, $_POST["name"], $_POST["status"],$_POST["status"], $update->url);
                if ($_POST["name"] === "") {
                    $thongBaoLoi = "Lỗi Trống trường không thể thêm";
                }
                if ($_FILES["Fileanh"]["tmp_name"] !== "") {
                    $s1 = $_FILES["Fileanh"]["tmp_name"];
                    $s2 = "..upload/" . $_FILES["Fileanh"]["name"];
                    if (move_uploaded_file($s1, $s2)) {
                        $update->url = "upload/" . $_FILES["Fileanh"]["name"];
                    } else {
                        echo "<br>";
                        $thongBaoLoi = "Không thể up load ảnh";
                    }
                }
                if ($thongBaoLoi == "") {
                    // $edit = $this->connect->UpdateLoaiHang($id, $update);
                    if ($update == 1 || $update == 0) {
                        $thongBaoThanhCong = "Thay đổi dữ liệu thành công";
                        header("Location: ?act=thongbao&if=Bạn đã Thay đổi dữ liệu thành công&id=typemanager");
                    }
                }
            }
        } else {
            echo "Không có giá trị id nào được truyền vào";
        }
        include "View/Voucher/EditVoucher.php";
    }
}
