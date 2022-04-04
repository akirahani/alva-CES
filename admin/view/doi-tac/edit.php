<?php
	isset($_GET['id']) ? $id = $_GET['id'] : $id = 0;
    $data_detail = $query->ChiTiet("doitac",[], ["id" => "="], ["id" => $id]);
	if(isset($_POST['edit']))
	{
       $doitac = new DoiTac();
       $doitac->CapNhat($query,$id,$data_detail,$lib);
	}
?>
<div class="blog medium">

	<div class="bread">
		<h1>Đối tác <span>| cập nhật</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên đối tác</p>
		<input type="text" name="ten" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->ten?>" />
		
		<p class="tit-label">Hình ảnh</p>
				<div class ="file"  style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="file" class="btn btn-info mt-2" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="file" name="file"   accept="image/*"  class="mb-2" multiple hidden />
        </label>
		<?php
		if($data_detail->hinh != NULL)
		{
			echo '<br><br><p><img src="../uploads/doi-tac/'.$data_detail->hinh.'" height="150" />';
		}
		?>
		
		<p class="tit-label">Địa chỉ</p>
		<input type="text" name="diachi" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->diachi?>" />

		<p class="tit-label">Điện thoại</p>
		<input type="text" name="dienthoai" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->dienthoai?>" />

		<p class="tit-label">Website</p>
		<input type="text" name="website" spellcheck="false" autocomplete="off" class="input-text" value="<?=$data_detail->website?>" />

		<p class="tit-label">Mô tả</p>
		<textarea rows="5" spellcheck="false" name="mota"><?=$data_detail->mota?></textarea>

		<p class="tit-label"></p>
		<input type="submit" name="edit" value="Cập nhật" />
	</form>
</div>
<script src="view/doi-tac/doi-tac.js"></script>