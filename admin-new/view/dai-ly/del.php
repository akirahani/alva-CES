<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
	$fields = [];
	$operator = ["id" => "="];
	$condition = ["id" => $id];
	$data_detail = $query->ChiTiet("daily", $fields, $operator, $condition);
	#Delete
	$arr_album = explode(",", $data_detail->album);
	foreach ($arr_album as $key => $value) {
		unlink('../uploads/dai-ly/'.$value);
	}
	$query->Xoa("daily", $operator, $condition);
	header("location:dai-ly");
?>