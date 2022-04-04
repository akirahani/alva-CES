<?php
	isset($_GET['id']) ? $id=$_GET['id'] : $id=0;
    $detail = $query->ChiTiet("landing", [], ["id" => "="], ["id" => $id]);
	if(isset($_POST['update']))
	{
		$landing = new Landing();
		$landing->CapNhat($query,$id);
	}
?>

<div class="blog small">
	<div class="bread">
		<h1>Landing <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>
	<form method="post" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" spellcheck="false" autocomplete="off" class="input-text" required="" value="<?=$detail->ten?>" />
		
		<p class="tit-label">Link</p>
		<input type="text" name="link" spellcheck="false" autocomplete="off" class="input-text" required="" value="<?=$detail->link?>"/>
		
		<p class="tit-label">Ngày bắt đầu</p>
		<input type="text" name="ngaydau" spellcheck="false" autocomplete="off" class="input-text ngaydau" value="<?=$detail->ngaydau?>"/>
		
		<p class="tit-label">Ngày kết thúc</p>
		<input type="text" name="ngayhet" spellcheck="false" autocomplete="off" class="input-text ngayhet" value="<?=$detail->ngayhet?>"/>
		
		<p class="tit-label"></p>
		<input type="submit" name="update" value="Cập nhật" />
	</form>
</div>