<?php
	require_once "../../admin/model/Loai.php";
	require_once "../../admin/model/Da.php";
	require_once "../../admin/model/DanhMuc.php";
	require_once "../../admin/model/DuAn.php";
	//require_once "../../admin/model/TinTuc.php";
	require_once "../../admin/model/ThongSo.php";

	$loai = new Loai();
	$da = new Da();
	$danhmuc = new DanhMuc();
	$duan = new DuAn();
	//$tintuc = new TinTuc();
	$thongso = new ThongSo();

	// Danh mục sản phẩm
	$data_danhmuc = $danhmuc->DanhSach();
	$data_loai = $loai->DanhSach();
	$arr_danhmuc=[];
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
		$tmp_danhmuc = [
			"id" => $value->id,
			"ten" => $value->ten,
			"loai" => $arr_dm_l[$value->id]
		];
		array_push($arr_danhmuc, $tmp_danhmuc);
	}

	// Thông số
	$data_thongso = $thongso->DanhSach();
	$arr_thongso = [];
	foreach ($data_thongso as $key => $value) {
		$arr_thongso[$value->id] = ["ten" => $value->ten, "danhmuc" => $value->danhmuc, "loai" => $value->loai];
	}

	// Loại sản phẩm
	$arr_loai = [];
	foreach ($data_loai as $key => $value) 
	{	
		$arr_loai[$value->id] = $value->ten;
	}

	// Sản phẩm vân đá
	$data_da = $da->DanhSach();
	$arr_da = [];
	foreach ($data_da as $key => $value) 
	{
		if($value->album != NULL)
		{
			$arr_slide = explode(",", $value->album);
		}
		else
		{
			$arr_slide = [];
		}
		$tmp_da = [
			"id" => $value->id,
			"ten" => $value->ten,
			"hinh" => $value->vuong,
			"slug" => "",
			"loai" => $value->danhmuc,
			"xuatxu" => $value->xuatxu,
			"gioithieu" => $value->gioithieu,
			"slug" => $value->slug
		];
		array_push($arr_da, $tmp_da);
	}

	// Tin tức
	// $data_tintuc = $tintuc->DanhSachNoiBat();
	// $arr_tintuc = [];
	// foreach ($data_tintuc as $key => $value) {
	// 	$tmp_tintuc = [
	// 		"id" => $value->id,
	// 		"ten" => $value->ten,
	// 		"slug" => $value->slug
	// 	];
	// 	array_push($arr_tintuc, $tmp_tintuc);
	// }

	// Dự án
	$data_duan = $duan->DanhSachLoai(1);
	$arr_duan = [];
	foreach ($data_duan as $key => $value) {
		$tmp_duan = [
			"id" => $value->id,
			"ten" => $value->ten,
			"hinh" => $value->vuong
		];
		array_push($arr_duan, $tmp_duan);
	}
	#echo json_encode(["danhmuc" => $arr_danhmuc, "loai" => $arr_loai, "vanda" => $arr_da, "duan" => $arr_duan, "tintuc" => $arr_tintuc, "thongso" => $arr_thongso]);
	echo json_encode(["danhmuc" => $arr_danhmuc, "loai" => $arr_loai, "vanda" => $arr_da, "duan" => $arr_duan, "thongso" => $arr_thongso]);
?>