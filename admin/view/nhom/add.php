<?php

	if(isset($_POST['submit']))
	{
		// Process
		$fields = ["ten"];
		$post_form = [
			"ten" => $_POST['ten']
		];
		$query->ThemMoi("nhom", $fields, $post_form);
		header("location:list");
	}
?>

<div class="blog small">
	<div class="bread">
		<h1>Nhóm <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" spellcheck="false" autocomplete="off" class="input-text" />
		
		<p class="tit-label"></p>
		<input type="submit" name="submit" value="Thêm mới" />
	</form>
</div>