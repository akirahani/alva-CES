<?php
	if(isset($_POST['add']))
	{
       $loaitin = new loaiTin();
       $loaitin->ThemMoi($query);
	}
?>
<div class="blog small">

	<div class="bread">
		<h1>Loại tin <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" />

		<p class="tit-label">Tên không dấu</p>
		<input type="text" name="slug" required spellcheck="false" autocomplete="off" class="input-text" />

		<p class="tit-label"></p>
		<input type="submit" name="add" value="Thêm mới" />
	</form>
</div>