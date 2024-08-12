<?php

class Query
{
    public $pdo;

    public function __construct()
    {
        try {
            $host = DB_HOST;
            $port = DB_PORT;
            $db_name = DB_NAME;
            $username = DB_USERNAME;
            $password = DB_PASSWORD;
            // $this->pdo = new PDO("mysql:host=localhost, port=3306, dbname=huydevshop", "root","");   
            $this->pdo = new PDO("mysql:host=$host; port=$port; dbname=$db_name", $username, $password);
            // $this->pdo = new PDO("mysql:host=localhost; port=3306; dbname=huydek1m_db", "huydek1m_user", "TjNIeHvfEf");
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    public function __destruct()
    {
        $this->pdo = null;
    }

    // query khach hang
    ////
    ////
    ////
    ////
    ////
    ////
    // chi cua rieng khach hang
    public function CreateUser(Actor $actor)
    { // chỗ này thêm mới nè
        try {
            $sql = "INSERT INTO `khachhang` (MatKhauDangNhap,HoVaTen,HinhAnh,Email,KichHoat,VaiTro,SoDienThoai,NgonNgu,Ban) 
            VALUES (md5($actor->MatKhauDangNhap),'$actor->HoVaTen', '$actor->HinhAnh', '$actor->Email','$actor->KichHoat','$actor->VaiTro','$actor->SoDienThoai','$actor->NgonNgu','$actor->Ban')";
            $data = $this->pdo->exec($sql);
            return $data;
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    public function DownUser()
    { // chỗ này đổ dữ liệu của toàn bảng về nè
        try {
            $sql = "SELECT * FROM `khachhang`";
            $data = $this->pdo->query($sql)->fetchAll();
            $user = [];
            foreach ($data as $list) {
                $user[] = new Actor($list["MaKhachHang"], $list["MatKhauDangNhap"], $list["HoVaTen"], $list["HinhAnh"], $list["Email"], $list["KichHoat"], $list["VaiTro"], $list["SoDienThoai"], $list["NgonNgu"], $list["Ban"]);
            }
            return $user;
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    public function ShowAccount($Email)
    { // chỗ này đổ dữ liệu của user theo Email nè
        try {
            $sql = "SELECT * FROM `khachhang` WHERE `Email` like '%$Email%'";
            $data = $this->pdo->query($sql)->fetch();
            if ($data != false) {
                $idKH = new Actor($data["MaKhachHang"], $data["MatKhauDangNhap"], $data["HoVaTen"], $data["HinhAnh"], $data["Email"], $data["KichHoat"], $data["VaiTro"], $data["SoDienThoai"], $data["NgonNgu"], $data["Ban"]);
                return $idKH;
            } else {
                return false;
            }
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    public function UpdatePassByEmail($Email, $MK)
    { // chỗ này đổ dữ liệu của user theo Email nè
        try {
            try {
                $sql = "UPDATE `khachhang` SET `MatKhauDangNhap` = '$MK' WHERE `Email` like '%$Email%' ";
                $data = $this->pdo->exec($sql);
                return $data;
            } catch (Exception $err) {
                echo $err->getMessage();
            }
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }
    // public function FIndAccountByPhone($phoneNumber){ // chỗ này đổ dữ liệu của user theo Sdt nè
    //     try{
    //         $sql = "SELECT * FROM `khachhang` WHERE `SoDienThoai` like `$phoneNumber`";
    //         $data = $this->pdo->query($sql)->fetch();
    //         if($data != false){
    //             $idKH = new Actor($data["MaKhachHang"],$data["MatKhauDangNhap"], $data["HoVaTen"], $data["HinhAnh"], $data["Email"], $data["KichHoat"], $data["VaiTro"],$data["SoDienThoai"],$data["NgonNgu"],$data["Ban"]);
    //             return $idKH;   
    //         }else{
    //             return false;
    //         }
    //     }
    //     catch(Exception $err){
    //         echo $err->getMessage();
    //     }
    // }
    public function FindAccount($id)
    { // theo MaKhachHang
        try {
            $sql = "SELECT * FROM `khachhang` WHERE `MaKhachHang` = $id";
            $data = $this->pdo->query($sql)->fetch();
            if ($data != false) {
                $idKH = new Actor($data["MaKhachHang"], $data["MatKhauDangNhap"], $data["HoVaTen"], $data["HinhAnh"], $data["Email"], $data["KichHoat"], $data["VaiTro"], $data["SoDienThoai"], $data["NgonNgu"], $data["Ban"]);
                return $idKH;
            } else {
                return false;
            }
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    public function ChangeLanguage($id, $action)
    { // chỗ này đổi ngôn ngữ nè
        try {
            $sql = "UPDATE `khachhang` SET `NgonNgu` = '$action' WHERE `khachhang`.`MaKhachHang` = $id";
            $data = $this->pdo->exec($sql);
            return $data;
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    public function ChangeBan($id, $action)
    { // chỗ này quản lý chặn tài khoản nè
        try {
            $sql = "UPDATE `khachhang` SET `Ban` = '$action' WHERE `khachhang`.`MaKhachHang` = $id";
            $data = $this->pdo->exec($sql);
            return $data;
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    public function ShowNewBee($id)
    { // chỗ này là người dùng không đăng nhập nè
        try {
            $sql = "SELECT * FROM `newbee` WHERE `IDNEW` = $id";
            $data = $this->pdo->query($sql)->fetch();
            if ($data != false) {
                $NgonNgu = new NewBee($data["IDNEW"], $data["NgonNgu"]);
                return $NgonNgu;
            } else {
                return false;
            }
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }
    public function DelAccount($id)
    { // chỗ này xóa tài khoản nè
        try {
            $sql = "DELETE FROM `khachhang` WHERE MaKhachHang = $id";
            $data = $this->pdo->exec($sql);
            return $data;
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }
    public function ChangePass($id, $action)
    { // chỗ này thay đổi mật khẩu nè
        try {
            $sql = "UPDATE `khachhang` SET `MatKhauDangNhap` = '$action' WHERE `khachhang`.`MaKhachHang` = $id";
            $data = $this->pdo->exec($sql);
            return $data;
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    // query của loại hàng

    public function ShowLoaiHang()
    { // chỗ này đổ dữ liệu loại hàng về nè
        try {
            $sql = "SELECT * FROM `loai`";
            $data = $this->pdo->query($sql)->fetchAll();
            $listType = [];
            foreach ($data as $list) {
                $listType[] = new LoaiHang($list["MaLoaiHang"], $list["TenLoaiHang"], $list["TrangThai"], $list["HinhAnh"], $list["count"]);
            }
            return $listType;
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    public function AddLoaiHang(LoaiHang $loaiHang)
    { // chỗ này thêm mới loại hàng nè
        try {
            $sql = "INSERT INTO `loai` (TenLoaiHang,TrangThai, HinhAnh,count) VALUES
            ('$loaiHang->TenLoaiHang', '$loaiHang->TrangThai', '$loaiHang->HinhAnh', '$loaiHang->count')";
            $data = $this->pdo->exec($sql);
            return $data;
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    public function UpdateLoaiHang($id, LoaiHang $loaiHang)
    { // chỗ này cập nhật loại hàng nè
        try {
            $sql = "UPDATE `loai` SET TenLoaiHang = '$loaiHang->TenLoaiHang', TrangThai = '$loaiHang->TrangThai', HinhAnh ='$loaiHang->HinhAnh'
             WHERE `MaLoaiHang` = $id";
            $data = $this->pdo->exec($sql);
            return $data;
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    public function FindTypeForId($id)
    { // tìm loại hàng thao id
        try {
            $sql = "SELECT * FROM `loai` WHERE MaLoaiHang = $id";
            $data = $this->pdo->query($sql)->fetch();
            if ($data != false) {
                $loai = new LoaiHang($data["MaLoaiHang"], $data["TenLoaiHang"], $data["TrangThai"], $data["HinhAnh"], $data["count"]);
                return $loai;
            }
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    public function DellTypeForId($id)
    { // tìm loại hàng thao id
        try {
            $sql = "DELETE FROM `loai` WHERE MaLoaiHang = $id";
            $data = $this->pdo->exec($sql);
            return $data;
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    public function CountType($id, LoaiHang $loaiHang)
    {
        try {
            $sql = "UPDATE `loai` SET count = '$loaiHang->count' WHERE maloaihang = $id";
            $data = $this->pdo->exec($sql);
            return $data;
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    // query quan ly hàng ký gửi

    public function ShowLuggage()
    {
        try {
            $sql = "SELECT * FROM `hanghoa`";
            $data = $this->pdo->query($sql)->fetchAll();
            $Luggage = [];
            foreach ($data as $a) {
                $Luggage[] = new HangHoaKyGui($a["MaHangHoa"], $a["MaChuyenBay"], $a["HinhAnh"], $a["from"], $a["to"], $a["thoigianxuat"], $a["thoigiannhap"], $a["MaKhachhang"], $a["TenKhachhang"], $a["GhiChu"], $a["Trongluong"]);
            }
            return $Luggage;
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    public function CreateLuggage(HangHoaKyGui $hangHoaKyGui)
    {
        try {
            $sql = "INSERT INTO `hanghoa` (MaChuyenBay,HinhAnh, from,to,thoigianxuat, thoigiannhap, Makhachhang,Tenkhachhang,Ghichu, Trongluong) VALUES
            ('$hangHoaKyGui->MaChuyenBay', '$hangHoaKyGui->HinhAnh', '$hangHoaKyGui->from', '$hangHoaKyGui->to', '$hangHoaKyGui->thoigianxuat', '$hangHoaKyGui->thoigiannhap', '$hangHoaKyGui->MaKhachhang', '$hangHoaKyGui->TenKhachhang', '$hangHoaKyGui->GhiChu', '$hangHoaKyGui->trongluong')";
            $data = $this->pdo->exec($sql);
            return $data;
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    // quản lý điểm đến

    public function ShowLocation()
    {
        try {
            $sql = "SELECT * FROM `diemden`";
            $data = $this->pdo->query($sql)->fetchAll();
            $Luggage = [];
            foreach ($data as $a) {
                $Luggage[] = new DiemDen($a["id"], $a["name"], $a["imgae"], $a["maTp"], $a["count"]);
            }
            return $Luggage;
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    public function AddLocation(DiemDen $DiemDen)
    { // chỗ này thêm mới loại hàng nè
        try {
            $sql = "INSERT INTO `diemden` (name,imgae, maTp,count) VALUES
            ('$DiemDen->name', '$DiemDen->image', '$DiemDen->MaTP', '$DiemDen->count')";
            $data = $this->pdo->exec($sql);
            return $data;
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    public function FindLocationByID($id)
    { // chỗ này thêm mới loại hàng nè
        try {
            $sql = "SELECT * FROM `diemden` WHERE id = $id";
            $data = $this->pdo->query($sql)->fetch();
            if ($data != false) {
                $locationDetail =  new DiemDen($data["id"], $data["name"], $data["imgae"], $data["maTp"], $data["count"]);
                return $locationDetail;
            }
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }
    public function EditLocation($id, DiemDen $diemDen)
    { // chỗ này cập nhật loại hàng nè
        try {
            $sql = "UPDATE `diemden` SET name = '$diemDen->name', imgae = '$diemDen->image', maTp ='$diemDen->MaTP', count ='$diemDen->count'
             WHERE `id` = $id";
            $data = $this->pdo->exec($sql);
            return $data;
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }


    public function DeleteLocation($id)
    {
        try {
            $sql = "DELETE FROM `diemden` WHERE id = $id";
            $data = $this->pdo->exec($sql);
            return $data;
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }
    // quản lý các ưu đãi

    public function ShowVoucher()
    {
        try {
            $sql = "SELECT * FROM `uudai`";
            $data = $this->pdo->query($sql)->fetchAll();
            $Luggage = [];
            foreach ($data as $a) {
                $Luggage[] = new UuDai($a["id"], $a["Name"], $a["timein"], $a["timeout"], $a["url"]);
            }
            return $Luggage;
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }

    public function FindVoucherForId($id){
        try {
            $sql = "SELECT * FROM `uudai` WHERE id = $id";
            $data = $this->pdo->query($sql)->fetch();
            if($data != false){
                $Luggage = new UuDai($data["id"], $data["Name"], $data["timein"], $data["timeout"], $data["url"]);
                return $Luggage;
            }else{return false;}
        } catch (Exception $err) {
            echo $err->getMessage();
        }
    }
}
