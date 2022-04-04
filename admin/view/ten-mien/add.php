<?php
    if(isset($_POST['add']))
    {

    	$mien = new Mien();
    	$mien->ThemMoi($query);

    }
?>

<div class="blog small">
	<div class="bread">
		<h1>Tên miền <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>
	<form method="post" class="form">

		<p class="tit-label">Name</p>
		<input required="" type="text" name="ten" spellcheck="false" autocomplete="off" class="input-text" />

        <p class="tit-label">Link</p>
        <input required="" type="text" name="dns" spellcheck="false" autocomplete="off" class="input-text" />

        <p class="tit-label">Appro date</p>
        <input required="" type="text" name="ngaymua" spellcheck="false" autocomplete="off" class="input-text chon-ngay" />

        <p class="tit-label">Expired date</p>
        <input required="" type="text" name="ngayhet" spellcheck="false" autocomplete="off" class="input-text chon-ngay" />

		<p class="tit-label"></p>
		<input type="submit" name="add" value="Add"/>

	</form>
</div>