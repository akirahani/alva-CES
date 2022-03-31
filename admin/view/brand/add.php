<?php
	if(isset($_POST['update']))
	{
		// Process
		$fields = ["ten"];
		$post_form = [
			"ten" => $_POST['ten']
		];
		$query->ThemMoi("brand", $fields, $post_form);
		header("location:chuyen-de");
	}
?>
<div class="blog small">
	<div class="bread">
		<h1>Chuyên đề <span>| danh sách</span></h1>
		<div class="button"><button><a href="them-chuyen-de">Thêm mới</a></button></div>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input class="input-text" type="text" name="ten" placeholder="Tên" autocomplete="off" />

		<p class="tit-label"></p>
		<input type="submit" name="update" value="Thêm mới" />
	</form>
</div>