<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	#Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $data_detail = $query->ChiTiet("vungmien", $fields, $operator, $condition);

	if(isset($_POST['update']))
	{
        $fields = ["ten", "slug"];
        $condition = ["id"];
        $post_form = [
			"ten" => $_POST['ten'],
			"slug" => $_POST['slug'],
            "id" => $id
        ];
        $query->CapNhat("vungmien", $fields, $condition, $post_form);
        header("location:list");
	}
?>
<div class="blog small">

	<div class="bread">
		<h1>Vùng miền <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->ten?>" />

		<p class="tit-label">Tên không dấu</p>
		<input type="text" name="slug" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->slug?>" />

		<p class="tit-label"></p>
		<input type="submit" name="update" value="Cập nhật" />
	</form>
</div>