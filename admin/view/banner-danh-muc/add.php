<?php
	$data_danhmuc = $query->DanhSach("danhmuc");
	if(isset($_POST['update']))
	{
		$bannerDM = new BannerDM();
		$bannerDM->ThemMoi($query);
	}
?>
<div class="blog small">
	<div class="bread">
		<h1>Banner danh mục <span>| thêm mới</span></h1>
		<div class="clear"></div>
	</div>

	<form method="post" enctype="multipart/form-data" class="form">
		<p class="tit-label">Danh mục</p>
		<select name="danhmuc">
			<?php 
			foreach ($data_danhmuc as $key => $value) {
				echo '<option value="'.$value->id.'">'.$value->ten.'</option>';
			}
			?>
		</select>

		<p class="tit-label">Tên</p>
		<input class="input-text" type="text" name="ten" autocomplete="off" />

		<p class="tit-label">Hình</p> 395 x 207
		<div class ="desktop" style="border: 2px dashed #0087F7; border-radius:5px;">
            <img class="img-display">
        </div>
        <label for="desktop" class="desktop"   style="cursor: pointer;"> <i class="fas fa-upload"></i>Chọn ảnh
            <input type='file' id="desktop" name="file" accept="image/*" class="mb-2" multiple hidden />
        </label>

		<p class="tit-label">Link</p>
		<input class="input-text" type="text" name="link" autocomplete="off" />

		<p class="tit-label"></p>
		<input type="submit" name="update" value="Thêm mới" />
	</form>
</div>
<script src="view/banner-danh-muc/bannerDM.js"></script>