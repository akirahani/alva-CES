<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
    $data_detail = $query->ChiTiet("danhmuc", [],["id" => "="],["id" => $id]);
	if(isset($_POST['update']))
	{
        $danhmuc = new DanhMuc();
        $danhmuc->CapNhat($query,$id);
	}
?>
<div class="blog small">

	<div class="bread">
		<h1>Danh mục <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->ten?>" />

		<p class="tit-label">Tên không dấu</p>
		<input type="text" name="slug" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->slug?>" />

		<p class="tit-label"></p>
		<input type="submit" name="update" class="submit" value="Cập nhật">
	</form>
</div>