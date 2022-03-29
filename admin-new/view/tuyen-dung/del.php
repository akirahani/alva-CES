<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
	$fields = [];
	$operator = ["id" => "="];
	$condition = ["id" => $id];
	$data_detail = $query->ChiTiet("tuyendung", $fields, $operator, $condition);
	#Delete
	unlink('../uploads/tuyen-dung/'.$data_detail->hinh);
	$query->Xoa("tuyendung", $operator, $condition);
	header("location:tuyen-dung");
?>