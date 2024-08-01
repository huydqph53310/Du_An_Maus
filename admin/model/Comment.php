<?php 
Class Comment{
    public $MaBinhLuan, $NoiDung, $MaSanPhamDuocBinhLuan, $MaKhacHangGuiBinhLuan, $ThoiGianTao;

    public function __construct($MaBinhLuan, $NoiDung, $MaSanPhamDuocBinhLuan, $MaKhacHangGuiBinhLuan, $ThoiGianTao){
        $this->MaBinhLuan = $MaBinhLuan;
        $this->NoiDung = $NoiDung;
        $this->MaSanPhamDuocBinhLuan = $MaSanPhamDuocBinhLuan;
        $this->ThoiGianTao = $ThoiGianTao;
    }
    public function __destruct(){
        
    }
}


?>