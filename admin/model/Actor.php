<?php 

class Actor{
    public $MaKhachHang, $MatKhauDangNhap, $HoVaTen, $HinhAnh, $Email, $KichHoat, $VaiTro, $SoDienThoai, $NgonNgu, $Ban;

    public function __construct($MaKhachHang, $MatKhauDangNhap, $HoVaTen, $HinhAnh, $Email, $KichHoat, $VaiTro, $SoDienThoai, $NgonNgu, $Ban){
        $this->MaKhachHang = $MaKhachHang;
        $this->MatKhauDangNhap = $MatKhauDangNhap;
        $this->HoVaTen = $HoVaTen;
        $this->HinhAnh = $HinhAnh;
        $this->Email = $Email;
        $this->KichHoat = $KichHoat;
        $this->VaiTro = $VaiTro;
        $this->SoDienThoai = $SoDienThoai;
        $this->NgonNgu = $NgonNgu;
        $this->Ban = $Ban;
    }
    public function __destruct(){
        
    }
}
