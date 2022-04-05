<?php
	if(isset($_POST['insert']))
	{
		$chinhsach = new ChinhSach();
		$chinhsach->ThemMoi($query,$lib);
	}
?>
<div class="blog medium">

	<div class="bread">
		<h1>Chính sách <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" />
		
		<p class="tit-label">Tên không dấu</p>
		<input type="text" name="slug" required spellcheck="false" autocomplete="off" class="input-text" />

		<p class="tit-label">Hình ảnh</p> 500 x 359
		<div class ="desktop" required  style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="desktop" class="btn btn-info mt-2" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="desktop" name="file"   accept="image/*"  class="mb-2" multiple hidden required/>
        </label> 

		<p class="tit-label">Mô tả</p>
		<textarea rows="5" spellcheck="false" name="mota"></textarea>

		<p class="tit-label">Nội dung</p>
		<textarea rows="5" spellcheck="false" name="noidung" class="ckeditor"></textarea>

		<p class="tit-label"></p>
		<input type="submit" name="insert" value="Thêm mới">
	</form>
</div>
<script type="text/javascript" src="view/chinh-sach/chinhsach.js"></script>