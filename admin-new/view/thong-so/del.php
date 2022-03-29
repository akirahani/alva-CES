<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	$operator = ["id" => "="];
	$condition = ["id" => $id];

	#Delete
	$query->Xoa("thongso", $operator, $condition);
	header("location:thong-so");
?>