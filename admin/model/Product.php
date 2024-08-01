<?php 
Class Product{
    public $MahangHoa, $TenLoaiHang, $HinhAnh, $DonGia, $MucGIamGia, $MaLoaiHang, $NgayNhap, $MoTaHangHoa, $TrangThaiDacBiet, $SoLuotXem;

    public function __construct($MahangHoa, $TenLoaiHang, $HinhAnh, $DonGia, $MucGIamGia, $MaLoaiHang, $NgayNhap, $MoTaHangHoa, $TrangThaiDacBiet, $SoLuotXem){
        $this->MahangHoa = $MahangHoa;
        $this->TenLoaiHang = $TenLoaiHang;
        $this->HinhAnh = $HinhAnh;
        $this->DonGia = $DonGia;
        $this->MucGIamGia = $MucGIamGia;
        $this->MaLoaiHang = $MaLoaiHang;
        $this->NgayNhap = $NgayNhap;
        $this->MoTaHangHoa = $MoTaHangHoa;
        $this->TrangThaiDacBiet = $TrangThaiDacBiet;
        $this->SoLuotXem = $SoLuotXem;
    }
    public function __destruct(){
        
    }
}
?>