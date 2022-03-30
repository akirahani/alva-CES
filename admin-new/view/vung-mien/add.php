<?php
	if(isset($_POST['insert']))
	{
        $fields = ["ten", "slug"];
		$post_form = [
			"ten" => $_POST['ten'],
			"slug" => $_POST['slug']
		];
		$query->ThemMoi("vungmien", $fields, $post_form);
        header("location:list");
	}
?>
<div class="blog small">

	<div class="bread">
		<h1>Vùng miền <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" />

		<p class="tit-label">Tên không dấu</p>
		<input type="text" name="slug" required spellcheck="false" autocomplete="off" class="input-text" />

		<p class="tit-label"></p>
		<input type="submit" name="insert" value="Thêm mới" />
	</form>
</div>