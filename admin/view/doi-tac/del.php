<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
	$fields = [];
	$operator = ["id" => "="];
	$condition = ["id" => $id];
	$data_detail = $query->ChiTiet("doitac", $fields, $operator, $condition);
	#Delete
	unlink('../uploads/doi-tac/'.$data_detail->hinh);
	$query->Xoa("doitac", $operator, $condition);
	header("location:doi-tac");
?>