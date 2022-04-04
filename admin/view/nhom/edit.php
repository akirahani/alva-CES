<?php

    
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $data_detail = $query->ChiTiet("nhom", $fields, $operator, $condition);

	if(isset($_POST['update']))
	{
		$fields = ["ten"];
        $condition = ["id"];
        $post_form = [
			"ten" => $_POST['ten'],
            "id" => $id
        ];
        $query->CapNhat("nhom", $fields, $condition, $post_form);
		header("location:list");
	}
?>

<div class="blog small">
	<div class="bread">
		<h1>Nhóm <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->ten?>" />
		
		<p class="tit-label"></p>
		<input type="submit" name="update" value="Cập nhật" />
	</form>
</div>