<?php
	if(isset($_POST['update']))
	{
		$fields = ["ten", "slug", "thutu"];
		$post_form = [
			"ten" => $_POST['ten'],
			"slug" => $_POST['link'],
			"thutu" => $_POST['thutu']
		];
		$query->ThemMoi("dungtich", $fields, $post_form);
		header("location:dung-tich");
	}
?>
<div class="blog small">
	<div class="bread">
		<h1>Dung tích <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input class="input-text" type="text" name="ten" autocomplete="off" />

		<p class="tit-label">Link</p>
		<input class="input-text" type="text" name="link" autocomplete="off" />

		<p class="tit-label">Thứ tự</p>
		<input class="input-text" type="number" name="thutu" autocomplete="off" />

		<p class="tit-label"></p>
		<input type="submit" name="update" value="Thêm mới" />
	</form>
</div>