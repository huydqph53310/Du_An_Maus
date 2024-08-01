<?php 

Class LoaiHang{
    public $MaLoaiHang, $TenLoaiHang, $TrangThai, $HinhAnh;

    public function __construct($MaLoaiHang, $TenLoaiHang, $TrangThai, $HinhAnh)
    {
        $this->MaLoaiHang = $MaLoaiHang;
        $this->TenLoaiHang = $TenLoaiHang;
        $this->TrangThai = $TrangThai;
        $this->HinhAnh = $HinhAnh;
    }
    public function __destruct(){
        
    }
}

?>