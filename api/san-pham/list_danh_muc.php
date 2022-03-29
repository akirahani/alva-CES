<?php
if(isset($_POST['danhmuc']))
{
	require_once "../../admin/model/Loai.php";
	require_once "../../admin/model/Da.php";
	require_once "../../admin/model/DanhMuc.php";
	require_once "../../admin/model/DuAn.php";
	require_once "../../admin/model/TinTuc.php";

	$loai = new Loai();
	$da = new Da();
	$danhmuc = new DanhMuc();
	$duan = new DuAn();
	$tintuc = new TinTuc();

	// Danh mục sản phẩm
	$data_danhmuc = $danhmuc->DanhSach();
	$arr_danhmuc=[];
	foreach ($data_danhmuc as $key => $value) 
	{
		$tmp_danhmuc = [
			"id" => $value->id,
			"ten" => $value->ten,
			"slug" => $value->slug
		];
		array_push($arr_danhmuc, $tmp_danhmuc);	
	}

	// Loại sản phẩm
	$data_loai = $danhmuc->DanhSach();
	$arr_loai = [];
	foreach ($data_loai as $key => $value) 
	{
		$tmp_loai = [
			"id" => $value->id,
			"ten" => $value->ten,
			"slug" => $value->slug
		];
		array_push($arr_loai, $tmp_loai);	
	}

	// Sản phẩm vân đá
	$data_da = $da->DanhSachTheoDanhMuc($_POST['danhmuc']);
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
			"loai" => $value->loai,
			"xuatxu" => $value->xuatxu,
			"gioithieu" => $value->gioithieu,
			"slug" => $value->slug
		];
		array_push($arr_da, $tmp_da);
	}

	// Tin tức
	$data_tintuc = $tintuc->DanhSachNoiBat();
	$arr_tintuc = [];
	foreach ($data_tintuc as $key => $value) {
		$tmp_tintuc = [
			"id" => $value->id,
			"ten" => $value->ten,
			"slug" => ""
		];
		array_push($arr_tintuc, $tmp_tintuc);
	}

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

	echo json_encode(["danhmuc" => $arr_danhmuc, "loai" => $arr_loai, "vanda" => $arr_da, "duan" => $arr_duan, "tintuc" => $arr_tintuc]);
}
else
{
	echo json_encode([]);
}
?>