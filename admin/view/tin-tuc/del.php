<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
	$fields = [];
	$operator = ["id" => "="];
	$condition = ["id" => $id];
	$data_detail = $query->ChiTiet("tintuc", $fields, $operator, $condition);
	#Delete
	unlink('../uploads/tin-tuc/'.$data_detail->vuong);
	unlink('../uploads/tin-tuc/'.$data_detail->dai);
	$query->Xoa("tintuc", $operator, $condition);
	#Xử lý tin tức
	$data_list = $query->DanhSach("tintuc", ["ten", "vuong", "mota", "ngay", "slug"], [], ["id" => "DESC"], [3], []);
	$fields = ["tintuc"];
    $condition = ["id"];
    $post_form = [
		"tintuc" => json_encode($data_list),
        "id" => 1
    ];
    $query->CapNhat("company", $fields, $condition, $post_form);
	header("location:tin");
?>
