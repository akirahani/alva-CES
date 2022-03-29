<?php 
	$data_list = $query->DanhSach("chinhsach", [], [], [], [], [], []);
	$arr_chinhsach = [];
	foreach ($data_list as $key => $value) 
	{
		$arr_chinhsach[$value->slug] = $value;
	}
	if(array_key_exists($one, $arr_chinhsach))
	{
		$tit = $arr_chinhsach[$one]->ten;
		$des = $arr_chinhsach[$one]->mota;
		$des = "Chính sách, quy định sử dụng website";
		$link = $__URL__;
		$thumbs = $ROOT."uploads/chinh-sach/".$arr_chinhsach[$one]->hinh;
	}
	else
	{
		$tit = $data_company->ten;
		$des = $data_company->des;
		$key = $data_company->keyword;
		$link = $__URL__;
		$thumbs = $ROOT."uploads/thumbs.png";
	}
?>