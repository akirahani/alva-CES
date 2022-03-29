<?php 
	require_once "../../admin/model/Da.php";
	$da = new Da();
	$id_danhmuc = $_POST['danhmuc'];
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
	if(!empty($arr_ts_save))
	{
		$str_thongso = implode(",", $arr_ts_save);
		$query_da = 'SELECT da.id, da.ten, da.vuong, da.slug, da.gioithieu FROM da, dathongso WHERE dathongso.thongso='.$arr_ts_save[0].'  AND da.id=dathongso.da GROUP BY da.id';
		$data_da = $da->DanhSachBoLoc($query_da);
		$status = "have";
	}
	else
	{
		$query_da = 'SELECT da.id, da.ten, da.vuong, da.slug, da.gioithieu FROM da, dadanhmuc WHERE da.id=dadanhmuc.da AND dadanhmuc.danhmuc='.$id_danhmuc.' GROUP BY da.id';
		$data_da = $da->DanhSachBoLoc($query_da);
		$status = "empty";
	}
	$arr_view = [];
	$arr_view = [
		"da" => $data_da,
		"thongso" => $status,
		"truyvan" => $query_da
	];
	echo json_encode($arr_view);
?>