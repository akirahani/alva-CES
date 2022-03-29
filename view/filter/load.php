<?php
	require_once "../../admin/model/Loai.php";
	require_once "../../admin/model/ThongSo.php";
	require_once "../../admin/model/Da.php";
	$thongso = new ThongSo();
	$loai = new Loai();
	$da = new Da();
	
	#Xử loại thông số save
	$save_thongso = json_decode($_POST['thongso']);
	$arr_ts_save = [];
	foreach ($save_thongso as $key => $value) 
	{
		if(!in_array($value->id, $arr_ts_save))
		{
			array_push($arr_ts_save, $value->id);
		}
	}
	$str_thongso = implode(",", $arr_ts_save);
	$data_loai = $loai->DanhSach();
	$id_danhmuc = $_POST['danhmuc'];
	$arr_loai = [];
	foreach ($data_loai as $key => $value) 
	{
		$str_danhmuc = explode(",", $value->danhmuc);
		if(!empty($str_danhmuc))
		{
			if(in_array($id_danhmuc, $str_danhmuc))
			{
				array_push($arr_loai, ["id" => $value->id, "ten" => $value->ten]);
			}
		}
	}
	$data_thongso = $thongso->DanhSachDanhMucLoai(["danhmuc" => $id_danhmuc, "loai" => $_POST['loai']]);
	if(!empty($arr_ts_save))
	{
		$query_da = 'SELECT da.id, da.ten, da.vuong, da.slug, da.gioithieu FROM da, dathongso WHERE dathongso.thongso='.$arr_ts_save[0].'  AND da.id=dathongso.da GROUP BY da.id';
		$data_da = $da->DanhSachBoLoc($query_da);
		$json_da = $data_da;
	}
	else
	{
		$query_da = 'SELECT da.id, da.ten, da.vuong, da.slug, da.gioithieu FROM da, dadanhmuc WHERE da.id=dadanhmuc.da AND dadanhmuc.danhmuc='.$id_danhmuc.' GROUP BY da.id';
		$data_da = $da->DanhSachBoLoc($query_da);
		$json_da = $da->DanhSach();
	}
	$arr_view = [];
	$arr_view = [
		"danhmuc" => $id_danhmuc,
		"loai" => $arr_loai,
		"loaiactive" => (int) $_POST['loai'],
		"thongso" => $data_thongso,
		"thongsosave" => $arr_ts_save,
		"da" => $json_da
	];
	echo json_encode($arr_view);
?>