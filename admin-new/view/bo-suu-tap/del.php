<?php
	#Nhóm - Trang - Phân quyền
    // require_once "model/PhanQuyen.php";
    // $phanquyen = new PhanQuyen();
    // $data_phanquyen = $phanquyen->NhomTrangQuyen($__NHOM__, 3);
    // if( empty($data_phanquyen) || $data_phanquyen->xoa == 0 )
    // {
    // 	header("location:./");
    // }
    // else
    // {
		isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
		$operator = ["id" => "="];
		$condition = ["id" => $id];

		#Delete
		$query->Xoa("bosuutap", $operator, $condition);
		header("location:bo-suu-tap");
	// }
?>