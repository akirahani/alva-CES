<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
	$operator = ["id" => "="];
	$condition = ["id" => $id];
	$query->Xoa("landing", $operator, $condition);
	// Xử lý save
    $data_landing = $query->DanhSach("landing", [], [], [], [], [], []);
    $arr_landing = [];
    foreach ($data_landing as $key => $value) {
    	$arr_landing[$value->link] = [$value->id, $value->ten];
    }
    $fields = ["landing"];
    $condition = ["id"];
    $post_form = [
		"landing" => json_encode($arr_landing),
        "id" => 1
    ];
    $query->CapNhat("company", $fields, $condition, $post_form);
?>
