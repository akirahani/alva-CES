<?php 
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	$operator = ["id" => "="];
	$condition = ["id" => $id];
	#Delete
	$query->Xoa("danhmuc", $operator, $condition);
	// Xử lý danh mục
    $data_danhmuc = $query->DanhSach("danhmuc", [], [], [], [], [], []);
    $arr_danhmuc = [];
    foreach ($data_danhmuc as $key => $value) 
    {
    	$arr_danhmuc[$value->slug] = [$value->id, $value->ten, $value->slug];
    }
    $fields = ["danhmuc"];
    $condition = ["id"];
    $post_form = [
		"danhmuc" => json_encode($arr_danhmuc),
        "id" => 1
    ];
    $query->CapNhat("company", $fields, $condition, $post_form);
    header("location:danh-muc");
?>