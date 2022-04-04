<?php
	if(isset($_POST['insert']))
	{
       $doitac = new DoiTac();
       $doitac->ThemMoi($query);
	}
?>
<div class="blog medium">

	<div class="bread">
		<h1>Đối tác <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên đối tác</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" required="" />
		
		<p class="tit-label">Hình ảnh</p>
		<div class ="file" required  style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="file" class="btn btn-info mt-2" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="file" name="file"   accept="image/*"  class="mb-2" multiple hidden required/>
        </label>

		<p class="tit-label">Địa chỉ</p>
		<input type="text" name="diachi" spellcheck="false" autocomplete="off" class="input-text"  required=""/>

		<p class="tit-label">Điện thoại</p>
		<input type="text" name="dienthoai" spellcheck="false" autocomplete="off" class="input-text" required=""/>

		<p class="tit-label">Website</p>
		<input type="text" name="website" spellcheck="false" autocomplete="off" class="input-text" required=""/>

		<p class="tit-label">Mô tả</p>
		<textarea rows="5" spellcheck="false" name="mota" required=""></textarea>

		<p class="tit-label"></p>
		<input type="submit" name="insert" value="Thêm mới"/>
	</form>
</div>
<script src="view/doi-tac/doi-tac.js"></script>