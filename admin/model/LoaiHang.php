<?php 

Class LoaiHang{
    public $MaLoaiHang, $TenLoaiHang, $TrangThai, $HinhAnh, $count;

    public function __construct($MaLoaiHang, $TenLoaiHang, $TrangThai, $HinhAnh, $count)
    {
        $this->MaLoaiHang = $MaLoaiHang;
        $this->TenLoaiHang = $TenLoaiHang;
        $this->TrangThai = $TrangThai;
        $this->HinhAnh = $HinhAnh;
        $this->count = $count;
    }
    public function __destruct(){
        
    }
}

?>