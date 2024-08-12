<?php
class  Controller
{
    // Khai báo thuộc tính
    // Code...
    public $connect, $time;

    // Khai báo phương thức 
    public function __construct()
    {
        $this->connect = new Query();
        $this->time = 1;
    }

    public function __destruct()
    {
        // Code...
    }


    public function language($a, $url)
    {
        session_start();
        switch ($a) {
            case 0:
                $mod = $this->connect->ChangeLanguage($_SESSION["id"], 0);
                header("Location: ?act=$url");
                break;
            case 1:
                $mod = $this->connect->ChangeLanguage($_SESSION["id"], 1);
                header("Location: ?act=$url");
                break;
            default:
                $this->time = 0;
                break;
        }
    }

    public function trangChu()
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
        $list = $this->connect->ShowLoaiHang();
        $uudai = $this->connect->ShowVoucher();
        $location = $this->connect->ShowLocation();
        if (isset($_POST["smf"])) {
            header("location: ?act=search&huyhack&huydz&huydepzai&?q=" . $_POST["search"]);
        } else {
            include "View/action/TrangChu.php";
        }
    }

    public function singin()
    {
        $ngonngu = $this->time;
        // $ListUser = $this->connect->DownUser();
        $idkh = -1;
        $Email = "";
        $PassWord = "";
        $thongBaoLoi = "";
        $checktk = false;
        $checkmk = false;
        if (isset($_POST["FLOGIN"])) {
            $Email = $_POST["floatingInput"];
            $PassWord = $_POST["floatingPassword"];
            if ($Email == "" || $PassWord == "") {
                $thongBaoLoi = "Email Hoặc PassWord Không được để trống";
            } else {
                $login = $this->connect->ShowAccount($Email);
                if ($login !== false) {
                    if ($Email === $login->Email && md5($PassWord) === $login->MatKhauDangNhap && $login->Ban === 0) {
                        session_start();
                        $_SESSION["Email"] = $Email;
                        $_SESSION["id"] = $login->MaKhachHang;
                        Sleep(3);
                        header("Location: ?act=trangchu");
                    } else {
                        $thongBaoLoi = "Thông tin tài khoản mật khẩu không chính xác";
                    }
                    if ($login->Ban === 1) {
                        $thongBaoLoi = "Tài Khoản đã bị Tạm khóa để kiểm tra. Vui lòng thử lại sau.";
                    }
                } else {
                    $thongBaoLoi = "Thông tin tài khoản mật khẩu không chính xác";
                }
            }
        }
        include "admin/View/Account/singin.php";
    }

    public function singup()
    {
        $ngonngu = $this->time;
        $thongBaoLoi = "";
        $thongBaoLoiConfirmPass = "";
        $thongBaoDieuKhoan = "";
        $thongBaoThanhCong = "";
        $thongBaoTonTaiTk = "";
        $accountStatus = isset($_POST['account_status']) ? $_POST['account_status'] : '';
        $ListUser = $this->connect->DownUser();
        $user = new Actor(null, null, null, null, null, null, null, null, null, null);

        if (isset($_POST["Flogin"])) {
            Sleep(3);
            $user = new Actor(null, $_POST["password"], $_POST["username"], null, $_POST["email"], 1, $_POST["role"], $_POST["phone"], $_POST["language"], 0);
            if ($user->HoVaTen == "" || $user->MatKhauDangNhap == "" || $user->Email == "" || $user->SoDienThoai == "") {
                $thongBaoLoi = "Không được để trống các trường";
                // var_dump($ListUser);
            } else {
                foreach ($ListUser as $value) {
                    foreach ($value as $key => $var) {
                        if ($key === "SoDienThoai" || $key == "Email") {
                            if ($user->SoDienThoai === $var || $user->Email === $var) {
                                $thongBaoTonTaiTk = "Tài khoản đã được tồn tại trên hệ thống";
                            }
                        }
                    }
                }
            }
            if (empty($_POST['account_status'])) {
                $thongBaoDieuKhoan = "Bạn chưa đồng ý điều khoản";
            }
            if (strtolower($_POST["password"]) !== strtolower($_POST["confirm-password"])) {
                $thongBaoLoiConfirmPass = "Mật khẩu xác nhận không đúng";
            }
            if ($thongBaoLoi == "" &&  $thongBaoLoiConfirmPass == "" && $thongBaoDieuKhoan == "" && $thongBaoTonTaiTk == "") {
                $insert = $this->connect->CreateUser($user);
                if ($insert == 1) {
                    $thongBaoThanhCong = "Đăng ký tài khoản thành công";
                }
            }
        }
        include "admin/View/Account/singup.php";
    }

    public function logout()
    {
        Sleep(3);
        session_start();
        session_unset();
        header("Location: ?act=trangchu");
        include "View/action/TrangChu.php";
    }
    public function TimKiem()
    {
        Sleep(3);
        $ngonngu = $this->time;
        $thongTin = "";
        if (isset($_GET["?q"])) {
            $thongTin = $_GET["?q"];
            echo "f" . $_GET["?q"];
            var_dump($_GET["?q"]);
        }
        if (isset($_POST["smf"])) {
            var_dump($_POST);
            $thongTin = $_POST["search"];
            // $this->TimKiem($_POST["search"]);
            header("location: ?act=search&huydev&huydz&huydepzai&?q=" . $_POST["search"]);
        }
        include "View/action/TimKiem.php";
    }

    public function DichVu($id, $count)
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
        $mahk = $count;
        $mahk++;
        $updateCount = new LoaiHang(null, null, null, null, $mahk);
        $data = $this->connect->CountType($id, $updateCount);
        $maLoai = $id;
        if ($maLoai == "2") {
            include "admin/View/Service/KhachSan.php";
        } else if ($maLoai == "1") {
            include "admin/View/Tickets/BookTicket.php";
        } else if ($maLoai == "3") {
            include "admin/View/KyGui/HanhLy.php";
        }
    }

    /// điều hướng trang đặt vé

    public function BookTicket()
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
        include "admin/View/Tickets/BookTicket.php";
    }
}
