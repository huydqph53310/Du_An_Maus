<?php
class HangHoaKyGui
{
    public $MaHangHoa,$MaChuyenBay, $HinhAnh, $from, $to, $thoigianxuat, $thoigiannhap, $MaKhachhang, $TenKhachhang, $GhiChu,$trongluong;
    public function __construct($MaHangHoa,$MaChuyenBay, $HinhAnh, $from, $to, $thoigianxuat, $thoigiannhap, $MaKhachhang, $TenKhachhang, $GhiChu,$trongluong)
    {
        $this->MaHangHoa = $MaHangHoa;
        $this->MaChuyenBay = $MaChuyenBay;
        $this->HinhAnh = $HinhAnh;
        $this->from = $from;
        $this->to = $to;
        $this->thoigianxuat = $thoigianxuat;
        $this->thoigiannhap = $thoigiannhap;
        $this->MaKhachhang = $MaKhachhang;
        $this->TenKhachhang = $TenKhachhang;
        $this->GhiChu = $GhiChu;
        $this->trongluong = $trongluong;
    }
    public function __destruct()
    {
    }
}
