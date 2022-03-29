<?php 
	#Detail
	$fields = [];
	$operator = ["slug" => "="];
	$condition = ["slug" => $p];
	$data_detail = $query->ChiTiet("tintuc", $fields, $operator, $condition);
	#Detail
	if(!empty($data_detail))
	{
		$data_list = $query->DanhSach("tintuc", ["vuong", "ten", "ngay", "slug"], [], ["id" => "DESC"], [5], []);
		$tit = $data_detail->ten;
		$des = $data_detail->ten;
		$key = "Đá xuyên sáng, đá tự nhiên, đá xuyên sáng Hải Phòng";
		$link = $__URL__;
		$thumbs = $ROOT."uploads/tin-tuc/".$data_detail->vuong;
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