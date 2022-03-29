<?php
	#Nhóm - Trang - Phân quyền
    require_once "model/PhanQuyen.php";
    $phanquyen = new PhanQuyen();
    $data_phanquyen = $phanquyen->NhomTrangQuyen($__NHOM__, 1);
    if( empty($data_phanquyen) || $data_phanquyen->xoa == 0 )
    {
    	header("location:./");
    }
    else
    {
		require_once "model/Trang.php";
		$trang = new Trang();
		isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
		$trang -> Xoa($id);
		header("location:trang");
	}
?>