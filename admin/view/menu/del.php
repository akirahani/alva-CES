<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
	$fields = [];
	$operator = ["id" => "="];
	$condition = ["id" => $id];
	$data_detail = $query->ChiTiet("menu", $fields, $operator, $condition);
	#Delete
	unlink('../uploads/menu/'.$data_detail->hinh);
	$query->Xoa("menu", $operator, $condition);
	header("location:menu");
?>
