<?php
	if(isset($_POST['submit']))
	{
		$post_trang = [
			"name" => $_POST['name'],
			"trang" => $_POST['trang'],
		];
		
		$query->ThemMoi('trang',["name","trang"],$post_trang);
		header("location:list");
	}
?>

<div class="blog small">
	<div class="bread">
		<h1>Trang <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" class="form" enctype="multipart/form-data">
		<p class="tit-label">Tên</p>
			<input type="text" name="name" spellcheck="false" autocomplete="off" class="input-text" />
		<p class="tit-label">Đường link</p>
		<input type="text" name="trang" spellcheck="false" autocomplete="off" class="input-text" />
		<p class="tit-label"></p>
		<button type="submit" class="submit" class="form input" name="submit">Thêm mới</button>
	</form>
</div>