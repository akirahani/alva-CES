<?php
	if(isset($_POST['add']))
	{
		$catalog = new Catalog();
       	$catalog->ThemMoi($query);
	}
?>
<div class="blog small">
	<div class="bread">
		<h1>Catalog <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" />
		
		<p class="tit-label">Hình ảnh</p> 800 x 521 px
		<div class ="file" required  style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="file" class="btn btn-info mt-2" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="file" name="file"   accept="image/*"  class="mb-2" multiple hidden required/>
        </label>

		<p class="tit-label"></p>
		<input type="submit" name="add" value="Thêm mới" />
	</form>
</div>
<script src="view/catalog/catalog.js"></script>