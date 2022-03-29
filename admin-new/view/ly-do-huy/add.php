<?php
	if(isset($_POST['add']))
	{
		$fields = ["ten"];
		$post_form = [
			"ten" => $_POST['ten']
		];
		$query->ThemMoi("lydohuy", $fields, $post_form);
		header("location:ly-do-huy");
	}
?>
<div class="blog small">
	<div class="bread">
		<h1>Lý do hủy đơn <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" class="form">

		<p class="tit-label">Tên</p>
		<input required type="text" name="ten" spellcheck="false" autocomplete="off" class="input-text" />
		
		<p class="tit-label"></p>
		<input type="submit" class="submit thanh-cong" name="add" value="Thêm mới">
	</form>
</div>