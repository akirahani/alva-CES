<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
	$operator = ["id" => "="];
	$condition = ["id" => $id];
	$query->Xoa("khoanggia", $operator, $condition);
	header("location:khoang-gia");
?>
