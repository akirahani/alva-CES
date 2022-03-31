<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
	$fields = [];
	$operator = ["id" => "="];
	$condition = ["id" => $id];
	$data_detail = $query->ChiTiet("duan", $fields, $operator, $condition);
	#Delete
	unlink('../uploads/du-an/'.$data_detail->vuong);
	unlink('../uploads/du-an/'.$data_detail->dai);
	$arr_album = explode(",", $data_detail->album);
	foreach ($arr_album as $key => $value) {
		unlink('../uploads/du-an/'.$value);
	}
	$query->Xoa("duan", $operator, $condition);
	header("location:du-an");
?>