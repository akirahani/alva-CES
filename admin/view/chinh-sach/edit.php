<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
    $data_detail = $query->ChiTiet("chinhsach",  [], ["id" => "="], ["id" => $id]);

	if(isset($data_detail->hinh))
	{
		$hinh_old = $data_detail->hinh;
	}
	else
	{
		$hinh_old = NULL;
	}
	if(isset($_POST['update']))
	{
		$chinhsach = new ChinhSach();
		$chinhsach->CapNhat($query,$id,$lib);
	}
?>
<div class="blog medium">

	<div class="bread">
		<h1>Chính sách <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->ten?>" />
		
		<p class="tit-label">Tên không dấu</p>
		<input type="text" name="slug" required spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->slug?>" />

		<p class="tit-label">Hình ảnh</p> 500 x 359
		<div class ="desktop" required  style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="desktop" class="btn btn-info mt-2" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="desktop" name="file"   accept="image/*"  class="mb-2" multiple hidden required/>
        </label> 
		<?php
		if($data_detail->hinh != NULL)
		{
			echo '<br><br><p><img src="../uploads/chinh-sach/'.$data_detail->hinh.'" height="150" />';
		}
		?>
		
		<p class="tit-label">Mô tả</p>
		<textarea rows="5" spellcheck="false" name="mota"><?=$data_detail->mota?></textarea>

		<p class="tit-label">Nội dung</p>
		<textarea rows="5" spellcheck="false" name="noidung" class="ckupdateor"><?=$data_detail->noidung?></textarea>

		<p class="tit-label"></p>
		<input type="submit" name="update" value="Cập nhật">
	</form>
</div>
<script type="text/javascript" src="view/chinh-sach/chinhsach.js"></script>