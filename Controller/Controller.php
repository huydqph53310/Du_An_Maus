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
        $this->time = 0;
    }

    public function __destruct()
    {
        // Code...
    }


    public function language($a)
    {
        session_start();
        switch ($a) {
            case 0:
                $mod = $this->connect->ChangeLanguage($_SESSION["id"],0);
                header("Location: ?act=trangchu");
                break;
            case 1:
                $mod = $this->connect->ChangeLanguage($_SESSION["id"],1);
                header("Location: ?act=trangchu");
                break;
            default:
                $this->time = 0;
                break;
        }
    }

    public function trangChu()
    {
        session_start();
        $list = $this->connect->ShowLoaiHang();
        if(isset($_SESSION["Email"])){
            $mod = $this->connect->ShowAccount($_SESSION["Email"]);
        }else{
            $mod = $this->connect->ShowNewBee(1);
        }
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
               if($login !== false){
                if ($Email === $login->Email && md5($PassWord) === $login->MatKhauDangNhap && $login->Ban === 0) {
                    session_start();
                    $_SESSION["Email"] = $Email;
                    $_SESSION["id"] = $login->MaKhachHang;
                    Sleep(3);
                    header("Location: ?act=trangchu");
                }else{
                    $thongBaoLoi = "Thông tin tài khoản mật khẩu không chính xác";
                }
                 if($login->Ban === 1){
                    $thongBaoLoi = "Tài Khoản đã bị Tạm khóa để kiểm tra. Vui lòng thử lại sau.";
                }   
               }else{
                $thongBaoLoi = "Thông tin tài khoản mật khẩu không chính xác";
               }
            }
        }
        include "admin/View/Query/singin.php";
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
        include "admin/View/Query/singup.php";
    }

    public function logout()
    {
        Sleep(3);
        session_start();
        session_unset();
        unset($_SESSION["Email"]);
        unset($_SESSION["id"]);
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
    public function ShowAccount()
    {
        Sleep(2);
        session_start();
        $login = $this->connect->ShowAccount($_SESSION["Email"]);
        $ngonngu = $login->NgonNgu;
        $mod = $this->connect->ShowAccount($_SESSION["Email"]);
        // $ngonngu = $this->time;
        include "admin/View/Query/Account.php";
    }
    public function Admin(){
        Sleep(2);
        include "admin/View/Query/admin.php";
    }


    public function ActorManager(){
        Sleep(2);
        session_start();
        $login = $this->connect->ShowAccount($_SESSION["Email"]);
        $ngonngu = $login->NgonNgu;
        $KH = $this->connect->DownUser();
        include "admin/View/Query/khachhang.php";
    }


    public function ChangBanAccount($id){
        Sleep(2);
        $mod = $this->connect->FindAccount($id);
        switch ($mod->Ban) {
            case 0:
                $Ban = $this->connect->ChangeBan($id, 1);
                header("Location: ?act=actormanager");
                break;
            case 1:
                $Ban = $this->connect->ChangeBan($id, 0);
                header("Location: ?act=actormanager");
                break;
            default:
                # code...
                break;
        }
        // var_dump($mod);
    }

    public function DellAccount($id){
        Sleep(2);
        $dell = $this->connect->DelAccount($id);
        header("Location: ?act=actormanager");
    }

    public function ChangePass(){
        session_start();
        Sleep(2);
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
               if($login !== false){
                if (md5($PassWordOld) === $login->MatKhauDangNhap) {
                    if($PassWordOld === $PassWordNew){
                        $thongBaoLoi = "Mật khẩu mới không được trùng với mật khẩu cũ";
                    }else{
                        if($PassWordNew === $RepaidPassWordNew){
                            $thongBaoThanhCong = "Chúc mừng bạn đã thay đổi mật khẩu thành công <br>";
                            $repate = $this->connect->ChangePass($_SESSION["id"], md5($PassWordNew));
                            echo '<script></>';
                            // echo '<script>alert("Bạn đã đổi mật khẩu thành công vui lòng quay lại trang đăng nhập");</script>';                      
                        }else{
                            $thongBaoLoi = "Mật khẩu xác nhận không chính xác không chính xác <br>";
                        }
                    }
                }else{
                    $thongBaoLoi = "Mật khẩu cũ không chính xác <br>";
                }
               }else{
                $thongBaoLoi = "Mật khẩu cũ không chính xác <br>";
               }
            }
        }
        include "admin/View/Query/ChangePass.php";
    }

    // thực hiện công việc của tab type -> loại
    public function Type(){
        session_start();
        $login = $this->connect->ShowAccount($_SESSION["Email"]);
        $ngonngu = $login->NgonNgu;
        $list = $this->connect->ShowLoaiHang();
        include "admin/View/Query/loai.php";
    }

    public function AddType(){
        session_start();
        $login = $this->connect->ShowAccount($_SESSION["Email"]);
        $ngonngu = $login->NgonNgu;
        $thongBaoLoi = "";
        $thongBaoThanhCong = "";
        $add = new LoaiHang(null, null, null, null);
        if(isset($_POST["Fadd"])){
            $name = $_POST["name"];
            $add = new LoaiHang(null, $name, $_POST["status"], $_FILES["Fileanh"]);
            if($name === ""){
                $thongBaoLoi = "Trường còn trống";
            }
            if($_FILES["Fileanh"]["tmp_name"] !== ""){
                $s1 = $_FILES["Fileanh"]["tmp_name"];
                $s2 = "upload/" . $_FILES["Fileanh"]["name"];
                if (move_uploaded_file($s1, $s2)) {
                    $add->HinhAnh = "upload/" . $_FILES["Fileanh"]["name"];
                } else {
                    echo "<br>";
                    $thongBaoLoi = "Không thể up load ảnh";
                }
            }
            if($thongBaoLoi == ""){
                $addtt = $this->connect->AddLoaiHang($add);
                if($addtt == 1){
                    $thongBaoThanhCong = "Thêm dữ liệu thành công";
                }
            }

        }
        include "admin/View/Query/CreateType.php";
    }

    public function EditType($id){
      if($id !== ""){
        session_start();
        $find = $this->connect->FindTypeForId($id);
        $login = $this->connect->ShowAccount($_SESSION["Email"]);
        $ngonngu = $login->NgonNgu;
        $thongBaoLoi = "";
        $thongBaoThanhCong = "";
        if(isset($_POST["Fedit"])){
            $update = new LoaiHang(null, $_POST["name"], $_POST["status"], $_POST["linkimg"]);
            if($_POST["name"] === ""){
                $thongBaoLoi = "Lỗi Trống trường không thể thêm";
            }
            if($_FILES["Fileanh"]["tmp_name"] !== ""){
                $s1 = $_FILES["Fileanh"]["tmp_name"];
                $s2 = "upload/" . $_FILES["Fileanh"]["name"];
                if (move_uploaded_file($s1, $s2)) {
                    $update->HinhAnh = "upload/" . $_FILES["Fileanh"]["name"];
                } else {
                    echo "<br>";
                    $thongBaoLoi = "Không thể up load ảnh";
                }
            }
            if($thongBaoLoi == ""){
                $edit = $this->connect->UpdateLoaiHang($id, $update);
                if($edit == 1 || $edit == 0){
                    $thongBaoThanhCong = "Thay đổi dữ liệu thành công";
                }
            }
        }
      }
    else{
        echo "Không có giá trị id nào được truyền vào";
    }
        include "admin/View/Query/EditType.php";
    }

    public function DellType($id){
        if($id != ""){
            $dell  = $this->connect->DellTypeForId($id);
            if($dell == 1){
                header("Location: ?act=typemanager");
            }
        }else{
            echo "Không có giá trị id nào được truyền vào";
        }
    }
}
