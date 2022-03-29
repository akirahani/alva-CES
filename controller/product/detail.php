<?php 
	require_once "admin/model/Da.php";
	require_once "admin/model/DanhMuc.php";
	$da = new Da();
	$danhmuc = new DanhMuc();
	$data_da = $da->ChiTietSlug($one);
	if(!empty($data_da))
	{
		$data_danhmuc = @$danhmuc->ChiTiet($data_da->danhmuc);
		$arr_vanda = explode(",", $data_da->album);
		$tit = $data_da->ten;
		$des = "";
		$key = "";
		$link = $__URL__;
		$thumbs = $ROOT."uploads/van-da/".$data_da->vuong;
	}
	else
	{
		$tit = "Sản phẩm đá ngọc tự nhiên xuyên sáng";
		$des = "Sản phẩm đá ngọc tự nhiên xuyên sáng";
		$key = "Đá ngọc tự nhiên, đá tự nhiên, đá xuyên sáng";
		$link = $__URL__;
		$thumbs = $__URL__."uploads/thumbs.png";
	}
?>