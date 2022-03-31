<?php
	isset($_GET['id']) ? $id=$_GET['id'] : $id=0;
	isset($_GET ['page']) ? $page_get = intval($_GET ['page']) : $page_get = 1;

	$operator = ["id" => "="];
	$condition = ["id" => $id];
	$query->Xoa("tenmien", $operator, $condition);

	header("location:list?page=".$page_get);
?>