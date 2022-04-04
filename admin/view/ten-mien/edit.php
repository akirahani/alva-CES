<?php
    isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
    isset($_GET ['page']) ? $page_get = intval($_GET ['page']) : $page_get = 1;

    $data_tenmien = $query->ChiTiet("tenmien", [], ["id" => "="], ["id" => $id]);

    if(isset($_POST['edit']))
    {
        $mien = new Mien();
        $mien->CapNhat($query,$id);
    }
?>
<div class="blog small">
	<div class="bread">
		<h1>Tên miền <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" class="form">

		<p class="tit-label">Name</p>
		<input value="<?=$data_tenmien->ten;?>" required="" type="text" name="ten" spellcheck="false" autocomplete="off" class="input-text" />

        <p class="tit-label">Link</p>
        <input value="<?=$data_tenmien->dns;?>" required="" type="text" name="dns" spellcheck="false" autocomplete="off" class="input-text" />

        <p class="tit-label">Appro date</p>
        <input value="<?=$data_tenmien->ngay;?>" required="" type="text" name="ngaymua" spellcheck="false" autocomplete="off" class="input-text chon-ngay" />

        <p class="tit-label">Expired date</p>
        <input value="<?=$data_tenmien->ngayhet;?>" required="" type="text" name="ngayhet" spellcheck="false" autocomplete="off" class="input-text chon-ngay" />

		<p class="tit-label"></p>
		<input type="submit" name="edit" value="Update" />

	</form>
</div>