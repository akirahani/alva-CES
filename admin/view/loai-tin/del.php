<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
	$operator = ["id" => "="];
	$condition = ["id" => $id];
	$query->Xoa("loaitin", $operator, $condition);
	// Xử lý save
    $data_loaitin = $query->DanhSach("loaitin", [], [], [], [], [], []);
    $arr_loaitin = [];
    foreach ($data_loaitin as $key => $value) 
    {
    	$arr_loaitin[$value->slug] = [$value->id, $value->ten];
    }
    $fields = [	"loaitin" ];
    $condition = ["id"];
	$post_form = [
		"id" => 1,
		"loaitin" => json_encode($arr_loaitin)
	];
    $query->CapNhat("company", $fields, $condition, $post_form);
	header("location:loai-tin");
?>