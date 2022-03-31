<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
	$operator = ["id" => "="];
	$condition = ["id" => $id];
	$query->Xoa("vungmien", $operator, $condition);
	header("location:vung-mien");
?>