<?php
	if(isset($_POST['submit']))
	{
		$post_trang = [
			"ten" => $_POST['ten'],
			"trang" => $_POST['trang'],
		];
		
		$query->ThemMoi('trang',["ten","trang"],$post_trang);
		header("location:list");
	}
?>

<div class="blog small">
	<div class="bread">
		<h1>Trang <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data">
		<p class="tit-label">Tên</p>
			<input type="text" name="ten" spellcheck="false" autocomplete="off" class="input-text" />
		<p class="tit-label">Đường link</p>
		<input type="text" name="trang" spellcheck="false" autocomplete="off" class="input-text" />
		<p class="tit-label"></p>
		<button type="submit" class="submit" name="submit">Thêm mới</button>
	</form>
</div>