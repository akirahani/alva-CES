<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
	$fields = [];
	$operator = ["id" => "="];
	$condition = ["id" => $id];
	$data_detail = $query->ChiTiet("bannerdanhmuc", $fields, $operator, $condition);
	#Delete
	unlink('../uploads/banner-danh-muc/'.$data_detail->hinh);
	$query->Xoa("bannerdanhmuc", $operator, $condition);
	#Xử lý banner
	$data_list = $query->DanhSach("bannerdanhmuc");
	$fields = ["bannerdanhmuc"];
    $condition = ["id"];
    $post_form = [
		"bannerdanhmuc" => json_encode($data_list),
        "id" => 1
    ];
    $query->CapNhat("company", $fields, $condition, $post_form);
	header("location:banner-danh-muc");
?>
