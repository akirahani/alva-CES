<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
	$fields = [];
	$operator = ["id" => "="];
	$condition = ["id" => $id];
	$data_detail = $query->ChiTiet("catalog", $fields, $operator, $condition);
	#Delete
	unlink('../uploads/catalog/'.$data_detail->hinh);
	$query->Xoa("catalog", $operator, $condition);
?>