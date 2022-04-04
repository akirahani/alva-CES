<?php
	if(isset($_POST['insert']))
	{
		$duan = new DuAn();
        $duan->ThemMoi($query,$lib);
	}
?>
<div class="blog medium">

	<div class="bread">
		<h1>Dự án <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Tên</p>
		<input type="text" name="ten" required spellcheck="false" autocomplete="off" class="input-text" />
		
		<p class="tit-label">Hình vuông</p> 600 x 600 px
		  <div class ="vuong"  style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="vuong" class="btn btn-info mt-2" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="vuong" name="vuong"   accept="image/*"  class="mb-2" multiple hidden required/>
        </label> 

		<p class="tit-label">Hình dài</p> 600 x 314 px
        <div class ="dai"  style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="dai" class="btn btn-info mt-2" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="dai" name="dai"   accept="image/*"  class="mb-2" multiple hidden required/>
        </label> 

		<p class="tit-label">Album</p>
        <div class ="album" style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="album" class="btn btn-info mt-2" style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="album" name="album[]"   accept="image/*"  class="mb-2" multiple hidden required/>
        </label> 

		<p class="tit-label">Giới thiệu</p>
		<textarea rows="5" spellcheck="false" name="gioithieu" class="ckeditor"></textarea>

		<p class="tit-label">Nội dung</p>
		<textarea rows="5" spellcheck="false" name="noidung" class="ckeditor"></textarea>

		<p class="tit-label">Loại dự án</p>
		<label><input type="radio" name="loai" value="1"> Nổi bật</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<label><input type="radio" name="loai" value="0" checked> khách hàng</label>

		<p class="tit-label"></p>
		<input type="submit" name="insert" value="Thêm mới" />
	</form>
</div>
<script type="text/javascript" src="view/du-an/du-an.js"></script>