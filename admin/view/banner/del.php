<?php
	
		isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
		$fields = [];
		$operator = ["id" => "="];
		$condition = ["id" => $id];
		$data_detail = $query->ChiTiet("banner", $fields, $operator, $condition);
		#Delete
		unlink('../uploads/banner/'.$data_detail->mobile);
		unlink('../uploads/banner/'.$data_detail->desktop);
		$query->Xoa("banner", $operator, $condition);
		#Xử lý banner
		$data_list = $query->DanhSach("banner", [], [], ["thutu" => "ASC"], [], []);
		$fields = ["banner"];
	    $condition = ["id"];
	    $post_form = [
			"banner" => json_encode($data_list),
	        "id" => 1
	    ];
	    $query->CapNhat("company", $fields, $condition, $post_form);
	
	
?>
