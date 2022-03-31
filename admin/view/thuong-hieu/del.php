<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
	$fields = [];
	$operator = ["id" => "="];
	$condition = ["id" => $id];
	$data_detail = $query->ChiTiet("thuonghieu", $fields, $operator, $condition);
	#Delete
	unlink('../uploads/hang/'.$data_detail->hinh);
	$query->Xoa("thuonghieu", $operator, $condition);
	header("location:thuong-hieu");
?>
