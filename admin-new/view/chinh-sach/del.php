<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
	$fields = [];
	$operator = ["id" => "="];
	$condition = ["id" => $id];
	$data_detail = $query->ChiTiet("chinhsach", $fields, $operator, $condition);
	#Delete
	unlink('../uploads/chinh-sach/'.$data_detail->hinh);
	$query->Xoa("chinhsach", $operator, $condition);
	header("location:chinh-sach");
?>