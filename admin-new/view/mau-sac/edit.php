<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
	
	#Detail
    $fields = [];
    $operator = ["id" => "="];
    $condition = ["id" => $id];
    $data_detail = $query->ChiTiet("mausac", $fields, $operator, $condition);

	if(isset($_POST['update']))
	{
		$fields = ["ten", "slug", "thutu"];
        $condition = ["id"];
        $post_form = [
			"ten" => $_POST['ten'],
			"slug" => $_POST['link'],
			"thutu" => $_POST['thutu'],
            "id" => $id
        ];
        $query->CapNhat("mausac", $fields, $condition, $post_form);
		header("location:mau-sac");
	}
?>
<div class="blog small">
	<div class="bread">
		<h1>Màu sắc <span>| cập nhật</span></h1>
		<div class="button"><button><a href="them-dung-tich">Thêm mới</a></button></div>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input class="input-text" type="text" name="ten" value="<?=$data_detail->ten;?>" />

		<p class="tit-label">Link</p>
		<input class="input-text" type="text" name="link" autocomplete="off" value="<?=$data_detail->slug;?>" />

		<p class="tit-label">Thứ tự</p>
		<input class="input-text" type="number" name="thutu" autocomplete="off" value="<?=$data_detail->thutu;?>" />

		<p class="tit-label"></p>
		<input type="submit" name="update" value="Cập nhật" />
	</form>
</div>