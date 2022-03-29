<?php 
	$data_danhmuc = $arr_danhmuc->$ps;
	if(!empty($data_danhmuc))
	{
		$id_danhmuc = $data_danhmuc[0];
		$ten_danhmuc = $data_danhmuc[1];
		$slug_danhmuc = $data_danhmuc[2];
		$data_dadanhmuc = $query->DanhSach("dadanhmuc",["da"],["danhmuc"=>"="],[],[],["danhmuc"=>$id_danhmuc]);
		$data_vanda = $query->DanhSach("da", ["vuong", "ten", "slug", "gioithieu", "id"]);
		$number_vanda = count($data_dadanhmuc);
		#SEO
		$tit = $ten_danhmuc;
		$des = $ten_danhmuc;
		$key = $ten_danhmuc;
		$link = $__URL__;
		$thumbs = $ROOT."uploads/info.jpg";
		#Xử lý sản phẩm
		$arr_vanda = [];
		foreach ($data_vanda as $key => $value) {
			$arr_vanda[$value->id] = $value;
		}
	}
	else
	{
		header("location:./");
	}
?>