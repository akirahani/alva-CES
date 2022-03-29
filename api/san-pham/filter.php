<?php 
	require_once "../../admin/model/Loai.php";
	require_once "../../admin/model/DanhMuc.php";
	require_once "../../admin/model/ThongSo.php";

	$loai = new Loai();
	$danhmuc = new DanhMuc();
	$thongso = new ThongSo();
	
	$data_danhmuc = $danhmuc->DanhSach();
	$data_loai = $loai->DanhSach();

	$arr_danhmuc = [];
	$arr_dm_l=[];
	foreach ($data_danhmuc as $key => $value) 
	{
		$arr_dm_l[$value->id] = [];
		foreach ($data_loai as $keyl => $valuel) 
		{
			$str_danhmuc = explode(",", $valuel->danhmuc);
			if(in_array($value->id, $str_danhmuc))
			{
				array_push($arr_dm_l[$value->id], $valuel->id);
			}
		}
		array_push($arr_danhmuc, ["id" => $value->id, "ten" => $value->ten, "loai" => $arr_dm_l[$value->id]]);
	}

	$data_thongso = $thongso->DanhSach();
	$arr_thongso = [];
	foreach ($data_thongso as $key => $value) 
	{
		$arr_thongso[$value->id] = [
			"danhmuc" => $value->danhmuc, 
			"loai" => $value->loai, 
			"ten" => $value->ten
		];
	}
	echo json_encode(["filter" => $arr_danhmuc, "thongso" => $arr_thongso]);
?>