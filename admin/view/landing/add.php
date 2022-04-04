<?php
	if(isset($_POST['insert']))
	{
		$landing = new Landing();
		$landing->ThemMoi($query);
	}
?>
<div class="blog small">
	<div class="bread">
		<h1>Landing <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>
	<form method="post" class="form">
		<div class="nhom">
			<p class="tit-label">Tên</p>
			<input type="text" name="ten" spellcheck="false" autocomplete="off" class="input-text" required />
		</div>
		
		<div class="nhom">
			<p class="tit-label">Link</p>
			<input type="text" name="link" spellcheck="false" autocomplete="off" class="input-text" required />
		</div>

		<div class="nhom">
			<p class="tit-label">Ngày bắt đầu</p>
			<input type="text" name="ngaydau" spellcheck="false" autocomplete="off" class="input-text chon-ngay" required />
		</div>

		<div class="nhom">
			<p class="tit-label">Ngày kết thúc</p>
			<input type="text" name="ngayhet" spellcheck="false" autocomplete="off" class="input-text chon-ngay" required />
		</div>

		<div class="nhom">
			<p class="tit-label"></p>
			<input type="submit" name="insert" value="Thêm mới"/>
		</div>
	</form>
</div>